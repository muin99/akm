<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/submissions.php';

$type = (string) ($_POST['type'] ?? '');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . page_url('services.php'));
    exit;
}
$fallback = in_array($type, SUBMISSION_TYPES, true) ? $type . '.php' : 'services.php';
$errors = submission_errors($type);
if ($errors) {
    flash('form_error', ['messages' => $errors]);
    header('Location: ' . page_url($fallback));
    exit;
}

try {
    $stored = store_submission($type);
} catch (Throwable $exception) {
    flash('form_error', ['messages' => [$exception->getMessage()]]);
    header('Location: ' . page_url($fallback));
    exit;
}
$pageTitle = lang() === 'bn' ? 'আবেদন গৃহীত' : 'Request received';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="page-hero"><span class="eyebrow"><?= h(t('public_service')) ?></span><h1><?= h($pageTitle) ?></h1><p><?= lang() === 'bn' ? 'এই কোডটি দিয়ে অগ্রগতি দেখুন।' : 'Use this code to follow progress.' ?></p></section>
    <section class="section pt-0"><div class="page-shell narrow"><div class="tracking-result"><span class="eyebrow"><?= lang() === 'bn' ? 'ট্র্যাকিং কোড' : 'Tracking code' ?></span><strong class="tracking-code"><?= h($stored['tracking_code']) ?></strong><p><?= lang() === 'bn' ? 'বর্তমান অবস্থা: গৃহীত। ব্যক্তিগত তথ্য পাবলিক ট্র্যাকিংয়ে দেখানো হবে না।' : 'Current status: received. Private details will not appear in public tracking.' ?></p><div class="inline-actions"><a class="button" href="<?= h(page_url('tracking.php?code=' . rawurlencode($stored['tracking_code']))) ?>"><?= h(t('track')) ?></a><a class="text-link" href="<?= h(page_url('services.php')) ?>"><?= h(t('services')) ?></a></div></div></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
