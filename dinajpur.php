<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('dinajpur');
$pageTitle = t('dinajpur');
$hero = [
    'eyebrow' => 'Dinajpur-5',
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/30546136-a743-41af-b1c4-b48db7372f2b.jpeg',
    'image_alt' => lang() === 'bn' ? 'দিনাজপুর-৫ গণসংযোগ' : 'Dinajpur-5 outreach',
    'actions' => [
        ['url' => page_url('complaint.php'), 'label' => lang() === 'bn' ? 'সমস্যা জানান' : 'Report an issue', 'icon' => 'send', 'class' => 'button'],
        ['url' => page_url('services.php'), 'label' => t('services'), 'icon' => 'clipboard-list', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0 constituency-overview"><div class="page-shell twin-stories">
        <article class="place-story" data-reveal><img src="assets/images/constituency-fulbari.jpg" alt="Phulbari"><div><span class="eyebrow">Phulbari</span><h2><?= lang() === 'bn' ? 'ফুলবাড়ীর অগ্রাধিকার' : 'Phulbari focus' ?></h2><p><?= lang() === 'bn' ? 'নাগরিক নিরাপত্তা, বাসযোগ্য পৌর পরিবেশ, স্থানীয় অর্থনীতি ও শিল্পসম্পর্কিত জনস্বার্থ।' : 'Public safety, livable town planning, local economy, and industry-linked public interest.' ?></p></div></article>
        <article class="place-story" data-reveal><img src="assets/images/constituency-parbatipur.jpg" alt="Parbatipur"><div><span class="eyebrow">Parbatipur</span><h2><?= lang() === 'bn' ? 'পার্বতীপুরের অগ্রাধিকার' : 'Parbatipur focus' ?></h2><p><?= lang() === 'bn' ? 'রেল জংশন, লোকোমোটিভ সক্ষমতা, কর্মসংস্থান ও পরিচ্ছন্ন পরিকল্পিত শহর ভাবনা।' : 'Rail junction capacity, locomotive infrastructure, employment, and a cleaner planned town.' ?></p></div></article>
    </div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'আসনের দ্রুত তথ্য' : 'Constituency at a glance' ?></h2><p><?= lang() === 'bn' ? 'প্রকাশ্য নির্বাচনী প্রতিবেদনে পাওয়া স্থানীয় কাঠামো ও ভোটার তথ্য।' : 'Local structure and voter information from public election reporting.' ?></p></div>
        <div class="grid-4">
            <?php foreach (collection('constituency_facts')[lang()] as $fact): ?>
                <article class="premium-card stat-card" data-reveal><span><?= h($fact['label']) ?></span><h3><?= h($fact['value']) ?></h3><p><?= h($fact['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'ইউনিয়নভিত্তিক উন্নয়ন মানচিত্র' : 'Union-level development map' ?></h2><p><?= lang() === 'bn' ? 'ডেমো সাইটের কাঠামো ধরে ফুলবাড়ী ও পার্বতীপুরের ইউনিয়নগুলোকে উন্নয়ন তদারকি, সফর, প্রস্তাব ও সমাধানকৃত কাজের জন্য সাজানো হয়েছে।' : 'Using the demo structure, the unions of Phulbari and Parbatipur are organized for monitoring, field visits, proposals, and solved issues.' ?></p></div>
        <div class="grid-2">
            <?php foreach (collection('development_areas')[lang()] as $area => $units): ?>
                <article class="map-panel" data-reveal><h3><?= h($area) ?></h3><div class="tag-cloud"><?php foreach ($units as $unit): ?><span><?= h($unit) ?></span><?php endforeach; ?></div></article>
            <?php endforeach; ?>
        </div>
        <div class="tag-cloud track-cloud">
            <?php foreach (collection('development_tracks')[lang()] as $track): ?><span><?= h($track) ?></span><?php endforeach; ?>
        </div>
    </div></section>
    <section class="section section-dark"><div class="page-shell"><div class="section-head"><h2><?= lang() === 'bn' ? 'দিনাজপুর-৫ উন্নয়ন রূপরেখা' : 'Dinajpur-5 development outline' ?></h2><p><?= lang() === 'bn' ? 'মানুষের নিরাপত্তা, শহরের সৌন্দর্য, কর্মসংস্থান ও শিল্প-অবকাঠামোর সম্ভাবনাকে একসঙ্গে দেখার প্রস্তাব।' : 'A proposal to connect public safety, urban dignity, employment, and industrial-infrastructure potential.' ?></p></div><div class="grid-4"><?php foreach (collection('priorities')[lang()] as $i => $priority): ?><article class="priority agenda-card dark-panel"><span><?= sprintf('%02d', $i + 1) ?></span><b><?= h($priority['title']) ?></b><p><?= h($priority['text']) ?></p></article><?php endforeach; ?></div></div></section>
    <section class="section"><div class="page-shell split"><div class="copy" data-reveal><span class="eyebrow"><?= lang() === 'bn' ? 'নাগরিক প্রস্তাব' : 'Citizen proposals' ?></span><h2><?= lang() === 'bn' ? 'মাঠের সমস্যা সেবায় পাঠান' : 'Route field issues into service' ?></h2><p><?= lang() === 'bn' ? 'অভিযোগ ও সহায়তার ফর্মে এলাকা নির্বাচন করলে ফুলবাড়ী, পার্বতীপুর ও অন্যান্য এলাকার অনুরোধ আলাদা করে দেখা যায়।' : 'Area selection on the forms helps separate Phulbari, Parbatipur, and other requests.' ?></p><a class="button fit-button" href="<?= h(page_url('services.php')) ?>"><?= h(t('services')) ?></a></div><figure class="story-image" data-reveal><img src="assets/images/candidate-crowd.webp" alt="<?= lang() === 'bn' ? 'জনসংযোগ' : 'Public outreach' ?>"></figure></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
