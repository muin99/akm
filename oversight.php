<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('oversight');
$pageTitle = t('oversight');
$items = lang() === 'bn'
    ? ['তারেক রহমানের ৩১ দফা', 'মাঠপর্যায়ের সফর', 'সমাধানকৃত সমস্যা', 'গুরুত্বপূর্ণ বৈঠক', 'আগাম কর্মসূচি']
    : ['Tarique Rahman’s 31 points', 'Field visits', 'Solved problems', 'Important meetings', 'Upcoming programs'];
$hero = [
    'eyebrow' => t('oversight'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/a60f0188-0303-4d11-ada2-c98b72b42d22.jpeg',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('reform.php'), 'label' => t('reform'), 'icon' => 'landmark', 'class' => 'button'],
        ['url' => page_url('complaint.php?service=development'), 'label' => lang() === 'bn' ? 'প্রস্তাব জমা' : 'Submit proposal', 'icon' => 'clipboard-plus', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'তদারকির পাঁচটি স্তম্ভ' : 'Five pillars of oversight' ?></h2><p><?= lang() === 'bn' ? 'নীতি, সফর, সমাধান, বৈঠক ও কর্মসূচিকে আলাদা করে রাখলে মানুষ সহজে অগ্রগতি বুঝতে পারে।' : 'Separating policy, visits, solved issues, meetings, and programs makes progress easier to follow.' ?></p></div>
        <div class="grid-3">
            <?php foreach ($items as $index => $item): ?>
                <article class="premium-card" data-reveal><span><?= sprintf('%02d', $index + 1) ?></span><h3><?= h($item) ?></h3><p><?= lang() === 'bn' ? 'তারিখ, এলাকা, দায়িত্বপ্রাপ্ত ব্যক্তি, বর্তমান অবস্থা ও পরবর্তী পদক্ষেপ যুক্ত করার জন্য প্রস্তুত কাঠামো।' : 'A ready structure for date, area, responsible person, current status, and next step.' ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
