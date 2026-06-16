<?php
require __DIR__ . '/includes/bootstrap.php';

$slug = preg_replace('/[^a-z0-9-]/', '', (string) ($_GET['slug'] ?? ''));
$topics = collection('topic_pages');
$topic = $topics[$slug] ?? null;

if (!$topic) {
    http_response_code(404);
    $pageTitle = lang() === 'bn' ? 'কনটেন্ট পাওয়া যায়নি' : 'Content not found';
    require __DIR__ . '/includes/header.php';
    ?>
    <main id="main">
        <section class="page-hero"><span class="eyebrow">404</span><h1><?= h($pageTitle) ?></h1><p><?= lang() === 'bn' ? 'এই পেজের কনটেন্ট এখনো যুক্ত করা হয়নি।' : 'This page content has not been added yet.' ?></p></section>
    </main>
    <?php require __DIR__ . '/includes/footer.php'; exit;
}

$copy = $topic[lang()] ?? $topic['en'];
$pageTitle = $copy['title'];
$metaDescription = $copy['intro'];
$hero = [
    'eyebrow' => $copy['eyebrow'],
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => $topic['image'] ?? 'assets/images/candidate-news.jpg',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url($topic['cta'] ?? 'services.php'), 'label' => lang() === 'bn' ? 'পরবর্তী ধাপ' : 'Next step', 'icon' => 'arrow-right', 'class' => 'button'],
        ['url' => page_url('services.php'), 'label' => t('services'), 'icon' => 'heart-handshake', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>

    <section class="section pt-0"><div class="page-shell topic-layout">
        <aside class="topic-aside" data-reveal>
            <span class="eyebrow"><?= h($copy['eyebrow']) ?></span>
            <h2><?= lang() === 'bn' ? 'এই পেজে যা পাবেন' : 'What this page covers' ?></h2>
            <p><?= h($copy['intro']) ?></p>
            <a class="button fit-button" href="<?= h(page_url($topic['cta'] ?? 'services.php')) ?>"><?= lang() === 'bn' ? 'কার্যকর পদক্ষেপ নিন' : 'Take action' ?></a>
        </aside>
        <div class="topic-content">
            <?php foreach ($copy['sections'] as $index => $section): ?>
                <article class="premium-card topic-card" data-reveal>
                    <span><?= sprintf('%02d', $index + 1) ?></span>
                    <h3><?= h($section['title']) ?></h3>
                    <p><?= h($section['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div></section>

    <section class="section paper-band"><div class="page-shell split inner-feature">
        <div class="copy feature-panel" data-reveal>
            <span class="eyebrow"><?= h(t('source')) ?></span>
            <h2><?= lang() === 'bn' ? 'তথ্যের প্রেক্ষাপট' : 'Information context' ?></h2>
            <p><?= h($copy['source']) ?></p>
        </div>
        <div class="stack-list" data-reveal>
            <article><span><?= lang() === 'bn' ? 'জনসেবা' : 'Service' ?></span><h3><?= lang() === 'bn' ? 'ফর্ম, ট্র্যাকিং ও গোপনীয়তা একই কাঠামোয় রাখা হয়েছে।' : 'Forms, tracking, and privacy share one structure.' ?></h3></article>
            <article><span><?= lang() === 'bn' ? 'কনটেন্ট' : 'Content' ?></span><h3><?= lang() === 'bn' ? 'নতুন যাচাইকৃত তথ্য পাওয়া গেলে এই পেজে আরও ব্লক যুক্ত করা যাবে।' : 'More verified blocks can be added here as new information becomes available.' ?></h3></article>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
