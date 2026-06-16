<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/submissions.php';
$type = 'complaint';
$labels = service_labels($type);
$pageTitle = $labels['title'];
$hero = [
    'eyebrow' => t('public_service'),
    'title' => $labels['title'],
    'intro' => lang() === 'bn' ? 'অভিযোগের বিষয় পরিষ্কারভাবে লিখুন এবং প্রয়োজন হলে একটি সহায়ক ফাইল দিন।' : 'Describe the complaint clearly and add one supporting file only when needed.',
    'image' => 'assets/images/4658bea2-edcb-499c-8bc5-31f80545e9af.jpeg',
    'image_alt' => lang() === 'bn' ? 'মাঠপর্যায়ের অভিযোগ শোনা' : 'Listening to field complaints',
    'actions' => [
        ['url' => page_url('tracking.php'), 'label' => t('tracking'), 'icon' => 'search-check', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main"><?php require __DIR__ . '/includes/page-hero.php'; ?><?php require __DIR__ . '/includes/service-form.php'; ?></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
