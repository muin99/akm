<?php
require __DIR__ . '/../includes/bootstrap.php';
require __DIR__ . '/../includes/submissions.php';

$assetPrefix = '../';
$pathPrefix = '../';
$loginError = null;
$adminNotice = flash('admin_notice');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if (!csrf_valid($_POST['csrf'] ?? null) || !db_ready()) {
        $loginError = lang() === 'bn' ? 'লগইন যাচাই করা যায়নি।' : 'Login could not be verified.';
    } else {
        $statement = db()->prepare('SELECT id, name, password_hash FROM admin_users WHERE email = :email LIMIT 1');
        $statement->execute(['email' => trim((string) ($_POST['email'] ?? ''))]);
        $user = $statement->fetch();
        if ($user && password_verify((string) ($_POST['password'] ?? ''), $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id'] = (int) $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            header('Location: index.php?lang=' . rawurlencode(lang()));
            exit;
        }
        $loginError = lang() === 'bn' ? 'ইমেইল বা পাসওয়ার্ড মেলেনি।' : 'Email or password did not match.';
    }
}

if (!admin_logged_in()):
    $pageTitle = t('admin');
    require __DIR__ . '/../includes/header.php';
?>
<main id="main"><section class="page-hero"><span class="eyebrow"><?= h(t('admin')) ?></span><h1><?= lang() === 'bn' ? 'সেবা ডেস্ক লগইন' : 'Service desk login' ?></h1></section><section class="section pt-0"><div class="page-shell narrow"><div class="admin-panel"><?php if ($loginError): ?><div class="notice error"><?= h($loginError) ?></div><?php endif; ?><?php if (!db_ready()): ?><div class="notice error"><?= lang() === 'bn' ? 'ডাটাবেজ সংযোগ পাওয়া যায়নি।' : 'Database connection unavailable.' ?></div><?php endif; ?><form method="post"><input type="hidden" name="csrf" value="<?= h(csrf_token()) ?>"><input type="hidden" name="login" value="1"><input type="hidden" name="lang" value="<?= h(lang()) ?>"><div class="field"><label for="email">Email</label><input id="email" name="email" type="email" required autocomplete="username"></div><div class="field field-space"><label for="password"><?= lang() === 'bn' ? 'পাসওয়ার্ড' : 'Password' ?></label><input id="password" name="password" type="password" required autocomplete="current-password"></div><button class="button field-space" type="submit"><?= lang() === 'bn' ? 'লগইন' : 'Log in' ?></button></form></div></div></section></main>
<?php require __DIR__ . '/../includes/footer.php'; exit; endif;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    require_admin();
    $id = (int) $_POST['update_id'];
    $newStatus = (string) ($_POST['status'] ?? '');
    if (!csrf_valid($_POST['csrf'] ?? null) || !in_array($newStatus, SUBMISSION_STATUSES, true)) {
        flash('admin_notice', ['error' => lang() === 'bn' ? 'স্ট্যাটাস আপডেট বাতিল হয়েছে।' : 'Status update was rejected.']);
    } else {
        $pdo = db();
        $pdo->beginTransaction();
        $current = $pdo->prepare('SELECT status FROM submissions WHERE id = :id FOR UPDATE');
        $current->execute(['id' => $id]);
        $row = $current->fetch();
        if ($row) {
            $publicNote = trim((string) ($_POST['public_note'] ?? ''));
            $internalNote = trim((string) ($_POST['internal_note'] ?? ''));
            $update = $pdo->prepare('UPDATE submissions SET status = :status, public_note = :public_note, internal_note = :internal_note WHERE id = :id');
            $update->execute(['status' => $newStatus, 'public_note' => $publicNote ?: null, 'internal_note' => $internalNote ?: null, 'id' => $id]);
            $history = $pdo->prepare('INSERT INTO submission_status_history (submission_id, old_status, new_status, public_note, internal_note, changed_by) VALUES (:id, :old_status, :new_status, :public_note, :internal_note, :changed_by)');
            $history->execute(['id' => $id, 'old_status' => $row['status'], 'new_status' => $newStatus, 'public_note' => $publicNote ?: null, 'internal_note' => $internalNote ?: null, 'changed_by' => $_SESSION['admin_id']]);
            flash('admin_notice', ['success' => lang() === 'bn' ? 'স্ট্যাটাস আপডেট হয়েছে।' : 'Status updated.']);
        }
        $pdo->commit();
    }
    header('Location: index.php?id=' . $id . '&lang=' . rawurlencode(lang()));
    exit;
}

$detailId = (int) ($_GET['id'] ?? 0);
$detail = null;
$files = [];
$historyRows = [];
if ($detailId && db_ready()) {
    $statement = db()->prepare('SELECT * FROM submissions WHERE id = :id');
    $statement->execute(['id' => $detailId]);
    $detail = $statement->fetch() ?: null;
    if ($detail) {
        $fileQuery = db()->prepare('SELECT id, original_name, mime_type, file_size FROM submission_files WHERE submission_id = :id');
        $fileQuery->execute(['id' => $detailId]);
        $files = $fileQuery->fetchAll();
        $historyQuery = db()->prepare('SELECT h.*, a.name AS admin_name FROM submission_status_history h LEFT JOIN admin_users a ON a.id = h.changed_by WHERE h.submission_id = :id ORDER BY h.created_at DESC');
        $historyQuery->execute(['id' => $detailId]);
        $historyRows = $historyQuery->fetchAll();
    }
}
$clauses = [];
$params = [];
foreach (['type', 'status'] as $filter) {
    if (!empty($_GET[$filter])) {
        $clauses[] = $filter . ' = :' . $filter;
        $params[$filter] = (string) $_GET[$filter];
    }
}
if (!empty($_GET['tracking'])) {
    $clauses[] = 'tracking_code LIKE :tracking';
    $params['tracking'] = '%' . trim((string) $_GET['tracking']) . '%';
}
if (!empty($_GET['date'])) {
    $clauses[] = 'DATE(created_at) = :date';
    $params['date'] = (string) $_GET['date'];
}
$rows = [];
if (db_ready()) {
    $query = 'SELECT id, tracking_code, type, status, name, phone, created_at FROM submissions' . ($clauses ? ' WHERE ' . implode(' AND ', $clauses) : '') . ' ORDER BY created_at DESC LIMIT 150';
    $list = db()->prepare($query);
    $list->execute($params);
    $rows = $list->fetchAll();
}
$pageTitle = t('admin');
require __DIR__ . '/../includes/header.php';
?>
<main id="main"><section class="page-hero"><span class="eyebrow"><?= h($_SESSION['admin_name'] ?? t('admin')) ?></span><h1><?= lang() === 'bn' ? 'সাবমিশন ড্যাশবোর্ড' : 'Submissions dashboard' ?></h1><p><a class="text-link" href="<?= h(page_url('logout.php')) ?>"><?= lang() === 'bn' ? 'লগআউট' : 'Log out' ?></a></p></section><section class="section pt-0"><div class="page-shell"><?php if ($adminNotice): ?><div class="notice <?= isset($adminNotice['error']) ? 'error' : 'success' ?>"><?= h($adminNotice['error'] ?? $adminNotice['success'] ?? '') ?></div><?php endif; ?><div class="admin-panel"><form class="form-grid admin-filters" method="get"><input type="hidden" name="lang" value="<?= h(lang()) ?>"><div class="field"><label>Type</label><select name="type"><option value="">All</option><?php foreach (SUBMISSION_TYPES as $value): ?><option value="<?= h($value) ?>" <?= ($_GET['type'] ?? '') === $value ? 'selected' : '' ?>><?= h($value) ?></option><?php endforeach; ?></select></div><div class="field"><label>Status</label><select name="status"><option value="">All</option><?php foreach (SUBMISSION_STATUSES as $value): ?><option value="<?= h($value) ?>" <?= ($_GET['status'] ?? '') === $value ? 'selected' : '' ?>><?= h(status_label($value)) ?></option><?php endforeach; ?></select></div><div class="field"><label>Tracking</label><input name="tracking" value="<?= h((string) ($_GET['tracking'] ?? '')) ?>"></div><div class="field"><label>Date</label><input type="date" name="date" value="<?= h((string) ($_GET['date'] ?? '')) ?>"></div><button class="button fit-button" type="submit"><?= lang() === 'bn' ? 'ফিল্টার' : 'Filter' ?></button></form><table class="data-table field-space"><thead><tr><th>Code</th><th>Type</th><th>Status</th><th>Citizen</th><th>Date</th></tr></thead><tbody><?php foreach ($rows as $row): ?><tr><td data-label="Code"><a class="text-link" href="<?= h(page_url('index.php?id=' . $row['id'])) ?>"><?= h($row['tracking_code']) ?></a></td><td data-label="Type"><?= h($row['type']) ?></td><td data-label="Status"><span class="badge"><?= h(status_label($row['status'])) ?></span></td><td data-label="Citizen"><?= h($row['name']) ?><br><small><?= h($row['phone']) ?></small></td><td data-label="Date"><?= h($row['created_at']) ?></td></tr><?php endforeach; ?></tbody></table></div><?php if ($detail): ?><article class="admin-panel detail-panel field-space"><h2><?= h($detail['tracking_code']) ?> <span class="badge"><?= h(status_label($detail['status'])) ?></span></h2><div class="grid-2"><div><h3><?= h($detail['subject']) ?></h3><p><?= nl2br(h($detail['message'])) ?></p><p><b><?= h($detail['name']) ?></b><br><?= h($detail['phone']) ?><?= $detail['email'] ? '<br>' . h($detail['email']) : '' ?><br><?= h($detail['upazila']) ?><?= $detail['address'] ? ', ' . h($detail['address']) : '' ?></p><?php if ($detail['nid']): ?><p><b>NID:</b> <?= h($detail['nid']) ?></p><?php endif; ?><h3><?= lang() === 'bn' ? 'ফাইল' : 'Files' ?></h3><?php foreach ($files as $file): ?><p><a class="text-link" href="<?= h(page_url('file.php?id=' . $file['id'])) ?>"><?= h($file['original_name']) ?></a> <small><?= h($file['mime_type']) ?>, <?= h((string) $file['file_size']) ?> bytes</small></p><?php endforeach; ?></div><form method="post"><input type="hidden" name="csrf" value="<?= h(csrf_token()) ?>"><input type="hidden" name="update_id" value="<?= h((string) $detail['id']) ?>"><input type="hidden" name="lang" value="<?= h(lang()) ?>"><div class="field"><label>Status</label><select name="status"><?php foreach (SUBMISSION_STATUSES as $value): ?><option value="<?= h($value) ?>" <?= $detail['status'] === $value ? 'selected' : '' ?>><?= h(status_label($value)) ?></option><?php endforeach; ?></select></div><div class="field field-space"><label><?= lang() === 'bn' ? 'পাবলিক নোট' : 'Public note' ?></label><textarea name="public_note"><?= h($detail['public_note']) ?></textarea></div><div class="field field-space"><label><?= lang() === 'bn' ? 'ইন্টারনাল নোট' : 'Internal note' ?></label><textarea name="internal_note"><?= h($detail['internal_note']) ?></textarea></div><button class="button field-space" type="submit"><?= lang() === 'bn' ? 'আপডেট' : 'Update' ?></button></form></div><h3><?= lang() === 'bn' ? 'ইতিহাস' : 'History' ?></h3><div class="timeline"><?php foreach ($historyRows as $entry): ?><article><time><?= h($entry['created_at']) ?></time><b><?= h(($entry['old_status'] ?: '-') . ' -> ' . $entry['new_status']) ?></b><p><?= h($entry['admin_name'] ?? 'Citizen intake') ?><?= $entry['public_note'] ? ' | ' . h($entry['public_note']) : '' ?></p></article><?php endforeach; ?></div></article><?php endif; ?></div></section></main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
