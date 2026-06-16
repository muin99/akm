<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('survey');
$pageTitle = t('survey');
$hero = [
    'eyebrow' => t('survey'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/constituency-parbatipur.jpg',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('complaint.php?service=survey'), 'label' => lang() === 'bn' ? 'মতামত দিন' : 'Share opinion', 'icon' => 'clipboard-pen-line', 'class' => 'button'],
        ['url' => page_url('dinajpur.php#tracks'), 'label' => lang() === 'bn' ? 'উন্নয়ন মানচিত্র' : 'Development map', 'icon' => 'map', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'যে বিষয়ে মতামত নেওয়া হবে' : 'Topics for citizen feedback' ?></h2><p><?= lang() === 'bn' ? 'জরিপের উত্তরগুলো উন্নয়ন অগ্রাধিকার, সফর পরিকল্পনা এবং সমস্যা সমাধানের তালিকা সাজাতে সহায়তা করবে।' : 'Survey responses help arrange development priorities, field visits, and problem-solving lists.' ?></p></div>
        <div class="tag-cloud track-cloud">
            <?php foreach (collection('development_tracks')[lang()] as $track): ?><a href="<?= h(page_url('complaint.php?service=survey')) ?>"><?= h($track) ?></a><?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
