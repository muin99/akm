<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/submissions.php';
$type = 'complaint';
$labels = service_labels($type);
$pageTitle = $labels['title'];
$hero = ['eyebrow' => t('public_service'), 'title' => $labels['title'], 'intro' => lang() === 'bn' ? 'অভিযোগের বিষয় পরিষ্কারভাবে লিখুন এবং প্রয়োজন হলে একটি সহায়ক ফাইল দিন।' : 'Describe the complaint clearly and add one supporting file only when needed.'];
require __DIR__ . '/includes/header.php';
?>
<main id="main"><?php require __DIR__ . '/includes/page-hero.php'; ?><?php require __DIR__ . '/includes/service-form.php'; ?></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
