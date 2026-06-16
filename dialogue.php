<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('dialogue');
$pageTitle = t('dialogue');
$hero = [
    'eyebrow' => t('dialogue'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/candidate-studio.png',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('question.php?service=live'), 'label' => lang() === 'bn' ? 'প্রশ্ন জমা দিন' : 'Submit a question', 'icon' => 'message-square-text', 'class' => 'button'],
        ['url' => page_url('media.php#video'), 'label' => lang() === 'bn' ? 'রেকর্ডিং দেখুন' : 'View recordings', 'icon' => 'play-circle', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'লাইভ, রেকর্ডিং ও প্রশ্ন' : 'Live, recordings, and questions' ?></h2><p><?= lang() === 'bn' ? 'ডিজিটাল সংলাপকে শুধু প্রচার নয়, নাগরিক মতামত শোনার একটি নিয়মিত প্রক্রিয়া হিসেবে রাখা হয়েছে।' : 'Digital dialogue is set up as a regular listening process, not only a broadcast channel.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('dialogue_items')[lang()] as $item): ?>
                <article class="premium-card" data-reveal><span><?= h(t('dialogue')) ?></span><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'আসন্ন লাইভ সেশন' : 'Upcoming live sessions' ?></h2><p><?= lang() === 'bn' ? 'সেশনের আগে প্রশ্ন জমা দিলে আলোচনায় অন্তর্ভুক্ত করা সহজ হয়।' : 'Submitting questions before a session makes it easier to include them in the discussion.' ?></p></div>
        <div class="grid-2">
            <?php foreach (collection('live_sessions')[lang()] as $session): ?>
                <article class="live-card" data-reveal><div class="live-date"><strong><?= h($session['date']) ?></strong><span><?= h($session['time']) ?></span></div><div><span class="eyebrow"><?= h($session['host']) ?></span><h3><?= h($session['title']) ?></h3><p><?= h($session['text']) ?></p></div></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
