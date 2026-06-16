<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/submissions.php';
$type = 'help';
$labels = service_labels($type);
$pageTitle = $labels['title'];
$hero = ['eyebrow' => t('public_service'), 'title' => $labels['title'], 'intro' => lang() === 'bn' ? 'সহায়তার প্রয়োজন, এলাকা ও যোগাযোগের উপায় দিন।' : 'Share the need, area, and a way to contact you.'];
require __DIR__ . '/includes/header.php';
?>
<main id="main"><?php require __DIR__ . '/includes/page-hero.php'; ?><?php require __DIR__ . '/includes/service-form.php'; ?></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
