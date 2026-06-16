<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('media');
$pageTitle = t('media');
$hero = [
    'eyebrow' => t('media'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/campaign.jpg',
    'image_alt' => lang() === 'bn' ? 'গণসংযোগ ও মিডিয়া' : 'Outreach and media',
    'actions' => [
        ['url' => page_url('services.php'), 'label' => t('services'), 'icon' => 'heart-handshake', 'class' => 'button'],
        ['url' => page_url('dinajpur.php'), 'label' => t('dinajpur'), 'icon' => 'map', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell newsroom-lead">
        <?php $leadItem = collection('news')[0]; $leadNews = $leadItem[lang()]; ?>
        <article class="press-lead" data-reveal>
            <img src="<?= h($leadItem['image']) ?>" alt="">
            <div>
                <div class="meta"><time><?= h($leadItem['date']) ?></time><span><?= h($leadItem['source']) ?></span><span><?= h($leadItem['type']) ?></span></div>
                <h2><?= h($leadNews['title']) ?></h2>
                <p><?= h($leadNews['summary']) ?></p>
                <a class="button fit-button" href="<?= h($leadItem['url']) ?>"<?= external_attrs() ?>><?= h(t('source')) ?></a>
            </div>
        </article>
        <div class="chip-row filters" aria-label="<?= lang() === 'bn' ? 'মিডিয়া ফিল্টার' : 'Media filters' ?>">
            <?php foreach (['all' => lang() === 'bn' ? 'সব' : 'All', 'interview' => lang() === 'bn' ? 'সাক্ষাৎকার' : 'Interview', 'campaign' => lang() === 'bn' ? 'গণসংযোগ' : 'Campaign', 'nomination' => lang() === 'bn' ? 'মনোনয়ন' : 'Nomination', 'result' => lang() === 'bn' ? 'ফলাফল' : 'Result'] as $filter => $label): ?>
                <button type="button" class="<?= $filter === 'all' ? 'is-selected' : '' ?>" data-filter="<?= h($filter) ?>"><?= h($label) ?></button>
            <?php endforeach; ?>
        </div>
        <div class="media-grid media-space">
            <?php foreach (collection('news') as $item): $news = $item[lang()]; ?>
                <article class="media-card" data-media-type="<?= h($item['type']) ?>" data-reveal>
                    <img src="<?= h($item['image']) ?>" alt="">
                    <div class="media-body"><div class="meta"><time><?= h($item['date']) ?></time><span><?= h($item['source']) ?></span><span><?= h($item['type']) ?></span></div><h3><?= h($news['title']) ?></h3><p><?= h($news['summary']) ?></p><a class="text-link" href="<?= h($item['url']) ?>"<?= external_attrs() ?>><?= h(t('source')) ?></a></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section section-dark"><div class="page-shell"><div class="section-head"><h2><?= lang() === 'bn' ? 'মিডিয়া লাইব্রেরি আরও বড় হবে' : 'The media library is built to grow' ?></h2><p><?= lang() === 'bn' ? 'টিভি সাক্ষাৎকার, বক্তব্য, গণসংযোগ, কলাম ও লাইভ সেশনকে আলাদা করে সাজানোর জন্য কাঠামো প্রস্তুত।' : 'The structure is ready for TV interviews, speeches, outreach, columns, and live sessions.' ?></p></div><div class="grid-3">
        <?php foreach ((lang() === 'bn' ? ['টিভি সাক্ষাৎকার', 'প্রেস কনফারেন্স ও কলাম', 'ভিডিও, লাইভ ও গ্যালারি'] : ['TV interviews', 'Press and columns', 'Video, live, and gallery']) as $i => $category): ?><article class="priority agenda-card dark-panel"><span><?= sprintf('%02d', $i + 1) ?></span><b><?= h($category) ?></b><p><?= lang() === 'bn' ? 'প্রতিটি আইটেমে তারিখ, উৎস ও প্রেক্ষাপটসহ প্রকাশের জায়গা রাখা হয়েছে।' : 'Each item has room for date, source, and context.' ?></p></article><?php endforeach; ?>
    </div></div></section>
    <section class="section"><div class="page-shell split">
        <div class="copy feature-panel" data-reveal>
            <span class="eyebrow"><?= lang() === 'bn' ? 'টিভি সাক্ষাৎকার' : 'TV interviews' ?></span>
            <h2><?= lang() === 'bn' ? 'বক্তব্য, অবস্থান ও গণসংযোগের মিডিয়া আর্কাইভ' : 'A media archive of speeches, positions, and outreach' ?></h2>
            <p><?= lang() === 'bn' ? 'দিনাজপুর-৫, বিএনপি, সার্বভৌমত্ব, গণতন্ত্র এবং মাঠপর্যায়ের রাজনীতি নিয়ে আলোচিত শিরোনামগুলো এখানে সাজানো হয়েছে।' : 'Headlines around Dinajpur-5, BNP, sovereignty, democracy, and field politics are organized here.' ?></p>
        </div>
        <div class="stack-list" data-reveal>
            <?php foreach (collection('tv_interviews')[lang()] as $index => $title): ?>
                <article><span><?= sprintf('%02d', $index + 1) ?></span><h3><?= h($title) ?></h3></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'লাইভ সেশন সূচি' : 'Live session schedule' ?></h2><p><?= lang() === 'bn' ? 'নাগরিক অধিকার ও ভূমি সমস্যা নিয়ে সরাসরি আলোচনার জন্য পরিকল্পিত সেশন।' : 'Planned live sessions on citizen rights and land problem solutions.' ?></p></div>
        <div class="grid-2">
            <?php foreach (collection('live_sessions')[lang()] as $session): ?>
                <article class="live-card" data-reveal>
                    <div class="live-date"><strong><?= h($session['date']) ?></strong><span><?= h($session['time']) ?></span></div>
                    <div><span class="eyebrow"><?= h($session['host']) ?></span><h3><?= h($session['title']) ?></h3><p><?= h($session['text']) ?></p></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'কলাম ও প্রবন্ধ' : 'Columns and articles' ?></h2><p><?= lang() === 'bn' ? 'গল্প, সংস্কৃতি, স্মৃতি ও মানবিক বোধকে রাজনৈতিক ওয়েবসাইটের গভীরতর পাঠ্যভাগ হিসেবে রাখা হয়েছে।' : 'Stories, culture, memory, and human sensibility are kept as a deeper reading layer of the site.' ?></p></div>
        <div class="grid-2">
            <?php foreach (collection('article_items')[lang()] as $article): ?>
                <article class="article-card" data-reveal><span><?= lang() === 'bn' ? 'প্রবন্ধ' : 'Article' ?></span><h3><?= h($article['title']) ?></h3><p><?= h($article['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section section-dark"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'প্রেস কনফারেন্স আপডেট' : 'Press conference updates' ?></h2><p><?= lang() === 'bn' ? 'আইন অঙ্গনের অভিজ্ঞতা ও রাজনৈতিক পরিমণ্ডলে সক্রিয় উপস্থিতি নিয়ে আলোচিত আপডেট।' : 'Updates around legal experience and active political presence.' ?></p></div>
        <div class="press-grid">
            <?php foreach (collection('press_items')[lang()] as $item): ?>
                <article class="press-card" data-reveal>
                    <div class="press-date"><strong><?= h($item['day']) ?></strong><span><?= h($item['month']) ?></span><em><?= h($item['time']) ?></em></div>
                    <div><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'ভিডিও গ্যালারি' : 'Video gallery' ?></h2><p><?= lang() === 'bn' ? 'গণসংযোগ, সমস্যা সমাধান এবং আইন-রাজনীতি বিষয়ক ভিডিও আইটেমের জায়গা।' : 'A place for outreach, problem-solving, law, and politics video items.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('video_gallery')[lang()] as $index => $item): ?>
                <article class="video-tile" data-reveal><span></span><strong><?= sprintf('%02d', $index + 1) ?></strong><h3><?= h($item) ?></h3></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'ডেমো সাইট থেকে আনা মিডিয়া বিভাগ' : 'Media sections brought from the demo' ?></h2><p><?= lang() === 'bn' ? 'সংবাদ, ভিডিও, লাইভ, কলাম ও প্রেস আপডেটকে আলাদা সংগ্রহ হিসেবে সাজানো হয়েছে।' : 'News, video, live, columns, and press updates are separated into usable collections.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('demo_media_sections')[lang()] as $section): ?>
                <article class="premium-card media-taxonomy" data-media-type="<?= h($section['type']) ?>" data-reveal><span><?= h($section['title']) ?></span><h3><?= h($section['items'][0]) ?></h3><ul><?php foreach ($section['items'] as $item): ?><li><?= h($item) ?></li><?php endforeach; ?></ul></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
