<?php
require __DIR__ . '/includes/bootstrap.php';
$code = strtoupper(trim((string) ($_GET['code'] ?? '')));
$submission = null;
if ($code !== '' && db_ready()) {
    $statement = db()->prepare('SELECT tracking_code, type, status, public_note, created_at FROM submissions WHERE tracking_code = :code LIMIT 1');
    $statement->execute(['code' => $code]);
    $submission = $statement->fetch() ?: null;
}
$pageTitle = t('tracking');
$hero = [
    'eyebrow' => t('public_service'),
    'title' => lang() === 'bn' ? 'আবেদন ট্র্যাক করুন' : 'Track a request',
    'intro' => lang() === 'bn' ? 'ট্র্যাকিং কোডে শুধু অবস্থা ও অনুমোদিত পাবলিক নোট দেখা যায়।' : 'Tracking shows only status and approved public notes.',
    'image' => 'assets/images/constituency-fulbari.jpg',
    'image_alt' => lang() === 'bn' ? 'সেবা ট্র্যাকিং' : 'Service tracking',
    'actions' => [
        ['url' => page_url('services.php'), 'label' => t('services'), 'icon' => 'heart-handshake', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell narrow"><div class="form-panel form-panel--campaign">
        <form method="get"><input type="hidden" name="lang" value="<?= h(lang()) ?>"><div class="field"><label for="code"><?= lang() === 'bn' ? 'ট্র্যাকিং কোড' : 'Tracking code' ?></label><input id="code" name="code" value="<?= h($code) ?>" required maxlength="24" autocomplete="off"></div><button class="button field-space" type="submit"><?= h(t('track')) ?></button></form>
        <?php if ($code !== '' && !db_ready()): ?><div class="notice error field-space"><?= lang() === 'bn' ? 'ডাটাবেজ সংযোগ পাওয়া যায়নি।' : 'Database connection is unavailable.' ?></div><?php endif; ?>
        <?php if ($code !== '' && db_ready() && !$submission): ?><div class="notice error field-space"><?= lang() === 'bn' ? 'এই কোডে কোনো আবেদন পাওয়া যায়নি।' : 'No request was found for that code.' ?></div><?php endif; ?>
        <?php if ($submission): ?><article class="tracking-result field-space"><div class="meta"><span><?= h($submission['type']) ?></span><time><?= h(substr($submission['created_at'], 0, 10)) ?></time></div><strong class="tracking-code"><?= h($submission['tracking_code']) ?></strong><p><span class="badge"><?= h(status_label($submission['status'])) ?></span></p><?php if ($submission['public_note']): ?><p><?= h($submission['public_note']) ?></p><?php endif; ?></article><?php endif; ?>
    </div></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
