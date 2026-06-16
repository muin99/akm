<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('youth');
$pageTitle = t('youth');
$hero = [
    'eyebrow' => t('youth'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/candidate-crowd.webp',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('help.php?service=volunteer'), 'label' => lang() === 'bn' ? 'স্বেচ্ছাসেবক হতে চাই' : 'Join as volunteer', 'icon' => 'users-round', 'class' => 'button'],
        ['url' => page_url('dialogue.php'), 'label' => t('dialogue'), 'icon' => 'radio', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'তরুণদের জন্য চারটি কাজের পথ' : 'Four practical paths for young people' ?></h2><p><?= lang() === 'bn' ? 'ফোরাম, প্রশিক্ষণ, স্বেচ্ছাসেবা ও নেতৃত্ব চর্চাকে সংগঠিত করে এলাকার উন্নয়নে তরুণদের ভূমিকা দৃশ্যমান করা।' : 'Forums, training, volunteering, and leadership practice make youth roles visible in local development.' ?></p></div>
        <div class="grid-4">
            <?php foreach (collection('youth_items')[lang()] as $index => $item): ?>
                <article class="priority agenda-card" data-reveal><span><?= sprintf('%02d', $index + 1) ?></span><b><?= h($item['title']) ?></b><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section section-dark"><div class="page-shell split"><div class="copy" data-reveal><span class="eyebrow"><?= lang() === 'bn' ? 'নেতৃত্ব চর্চা' : 'Leadership practice' ?></span><h2><?= lang() === 'bn' ? 'শেখা, দায়িত্ব নেওয়া, মানুষের কাজে নামা' : 'Learn, take responsibility, serve people' ?></h2><p><?= lang() === 'bn' ? 'প্রতিটি কর্মসূচিতে উপস্থিতি, দক্ষতা, আচরণ ও মাঠপর্যায়ের দায়িত্বের ভিত্তিতে তরুণদের পরবর্তী কাজ নির্ধারণ করা যাবে।' : 'Each program can map young people into next roles based on attendance, skills, conduct, and field responsibility.' ?></p><a class="button fit-button" href="<?= h(page_url('help.php?service=volunteer')) ?>"><?= lang() === 'bn' ? 'নিবন্ধন করুন' : 'Register interest' ?></a></div><figure class="story-image" data-reveal><img src="assets/images/30546136-a743-41af-b1c4-b48db7372f2b.jpeg" alt=""></figure></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
