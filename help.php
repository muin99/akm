<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/submissions.php';
$type = 'help';
$labels = service_labels($type);
$pageTitle = $labels['title'];
$hero = [
    'eyebrow' => t('public_service'),
    'title' => $labels['title'],
    'intro' => lang() === 'bn' ? 'সহায়তার প্রয়োজন, এলাকা ও যোগাযোগের উপায় দিন।' : 'Share the need, area, and a way to contact you.',
    'image' => 'assets/images/110fc2c4-0e86-445a-a7c3-e10c59d997ba.jpeg',
    'image_alt' => lang() === 'bn' ? 'মানুষের পাশে সহায়তা' : 'Community assistance',
    'actions' => [
        ['url' => page_url('tracking.php'), 'label' => t('tracking'), 'icon' => 'search-check', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main"><?php require __DIR__ . '/includes/page-hero.php'; ?><?php require __DIR__ . '/includes/service-form.php'; ?></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
