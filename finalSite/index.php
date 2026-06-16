<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('home');
$pageTitle = $copy['title'];
$metaDescription = $copy['lead'];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="hero">
        <div class="shell hero-stage">
            <img class="hero-media" src="assets/images/candidate-studio.png" alt="<?= h($copy['title']) ?>">
            <div class="hero-copy">
                <span class="eyebrow"><?= h($copy['eyebrow']) ?></span>
                <h1><?= h($copy['title']) ?></h1>
                <p><?= h($copy['lead']) ?></p>
                <div class="hero-actions">
                    <a class="button" href="<?= h(page_url('complaint.php')) ?>"><span class="material-symbols-outlined" aria-hidden="true">send</span><?= lang() === 'bn' ? 'অভিযোগ করুন' : 'Submit complaint' ?></a>
                    <a class="ghost-button" href="<?= h(page_url('help.php')) ?>"><span class="material-symbols-outlined" aria-hidden="true">volunteer_activism</span><?= lang() === 'bn' ? 'সহায়তা চান' : 'Request help' ?></a>
                    <a class="ghost-button" href="<?= h(page_url('dinajpur.php')) ?>"><span class="material-symbols-outlined" aria-hidden="true">map</span><?= lang() === 'bn' ? 'ভিশন দেখুন' : 'View vision' ?></a>
                </div>
                <div class="hero-facts">
                    <div><span><?= lang() === 'bn' ? 'জনপদ' : 'Constituency' ?></span><strong><?= lang() === 'bn' ? 'ফুলবাড়ী ও পার্বতীপুর' : 'Phulbari & Parbatipur' ?></strong></div>
                    <div><span><?= lang() === 'bn' ? 'অঙ্গীকার' : 'Commitment' ?></span><strong><?= lang() === 'bn' ? 'আইন, নিরাপত্তা ও উন্নয়ন' : 'Law, safety, and development' ?></strong></div>
                </div>
            </div>
        </div>
    </section>
    <section class="metric-strip-wrap">
        <div class="page-shell metric-strip">
            <?php foreach (collection('quick_facts')[lang()] as $fact): ?>
                <div><span><?= h($fact['label']) ?></span><strong><?= h($fact['value']) ?></strong></div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="section">
        <div class="page-shell split">
            <figure class="portrait-frame" data-reveal><img src="assets/images/candidate-portrait.png" alt="<?= h($copy['title']) ?>"></figure>
            <div class="copy feature-panel" data-reveal>
                <span class="eyebrow"><?= lang() === 'bn' ? 'জননেতৃত্ব' : 'Public leadership' ?></span>
                <h2><?= lang() === 'bn' ? 'দিনাজপুর-৫ এর মানুষের জন্য আইনভিত্তিক, সাহসী ও আধুনিক রাজনীতি' : 'Law-minded, courageous, modern politics for Dinajpur-5' ?></h2>
                <p><?= h($copy['profile']) ?></p>
                <blockquote><?= h($copy['note']) ?></blockquote>
                <a class="text-link" href="<?= h(page_url('about.php')) ?>"><?= h(t('read_more')) ?></a>
            </div>
        </div>
    </section>
    <section class="section paper-band">
        <div class="page-shell">
            <div class="section-head">
                <h2><?= lang() === 'bn' ? 'একটি পরিষ্কার রাজনৈতিক ভিশন' : 'A clear political vision' ?></h2>
                <p><?= lang() === 'bn' ? 'শুধু স্লোগান নয়; মানুষের অভিযোগ, এলাকার সম্পদ এবং উন্নয়ন অগ্রাধিকারকে একসঙ্গে ধরে একটি কাজের রূপরেখা।' : 'Not only slogans; a working outline that connects citizen complaints, local resources, and development priorities.' ?></p>
            </div>
            <div class="vision-layout">
                <?php foreach (collection('vision_cards')[lang()] as $index => $card): ?>
                    <article class="premium-card <?= $index === 0 ? 'lead-card' : '' ?>" data-reveal>
                        <span><?= h($card['kicker']) ?></span>
                        <h3><?= h($card['title']) ?></h3>
                        <p><?= h($card['text']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section-dark">
        <div class="page-shell">
            <div class="section-head">
                <h2><?= lang() === 'bn' ? 'ফুলবাড়ী-পার্বতীপুরের উন্নয়ন এজেন্ডা' : 'Development agenda for Phulbari-Parbatipur' ?></h2>
                <p><?= lang() === 'bn' ? 'বাসযোগ্য শহর, নিরাপদ সমাজ, কর্মসংস্থান এবং স্থানীয় সম্পদভিত্তিক অর্থনীতির জন্য ধারাবাহিক জনমত তৈরি।' : 'Building public momentum for livable towns, safer communities, jobs, and a resource-led local economy.' ?></p>
            </div>
            <div class="grid-4">
                <?php foreach (collection('priorities')[lang()] as $i => $priority): ?>
                    <article class="priority agenda-card dark-panel" data-reveal><span><?= sprintf('%02d', $i + 1) ?></span><b><?= h($priority['title']) ?></b><p><?= h($priority['text']) ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="page-shell">
            <div class="section-head">
                <h2><?= lang() === 'bn' ? 'আপনার কথা সরাসরি সেবা ডেস্কে' : 'Your voice, directly into the service desk' ?></h2>
                <p><?= lang() === 'bn' ? 'অভিযোগ, সহায়তা আবেদন ও জনস্বার্থ প্রশ্নকে ট্র্যাকিং কোডসহ সংগঠিত করার জন্য এই ডিজিটাল ডেস্ক।' : 'A digital desk to organize complaints, assistance requests, and public-interest questions with tracking codes.' ?></p>
            </div>
            <div class="grid-3">
                <?php
                $services = [
                    ['complaint.php', t('complaint'), lang() === 'bn' ? 'রাস্তা, আলো, নিরাপত্তা, সেবা বা স্থানীয় সমস্যার কথা জানান।' : 'Report roads, lights, safety, services, or local problems.'],
                    ['help.php', t('help'), lang() === 'bn' ? 'ব্যক্তিগত বা সামাজিক সহায়তার প্রয়োজন সম্মানের সঙ্গে জানান।' : 'Share personal or community assistance needs with dignity.'],
                    ['question.php', t('question'), lang() === 'bn' ? 'আইন, নাগরিক অধিকার বা জনস্বার্থ বিষয়ে প্রশ্ন পাঠান।' : 'Ask about law, citizen rights, or public-interest issues.'],
                ];
                foreach ($services as $i => [$url, $title, $text]): ?>
                    <a class="service-tile service-card" href="<?= h(page_url($url)) ?>" data-reveal><em><?= sprintf('%02d', $i + 1) ?></em><h3><?= h($title) ?></h3><p><?= h($text) ?></p><span class="text-link"><?= h(t('submit')) ?></span></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section newsroom-section">
        <div class="page-shell">
            <div class="section-head">
                <h2><?= lang() === 'bn' ? 'সংবাদ, সাক্ষাৎকার ও জনসংযোগ' : 'News, interviews, and outreach' ?></h2>
                <a class="text-link" href="<?= h(page_url('media.php')) ?>"><?= lang() === 'bn' ? 'মিডিয়া আর্কাইভ' : 'Media archive' ?></a>
            </div>
            <div class="media-grid">
                <?php foreach (array_slice(collection('news'), 0, 3) as $item): $news = $item[lang()]; ?>
                    <article class="media-card" data-reveal>
                        <img src="<?= h($item['image']) ?>" alt="">
                        <div class="media-body"><div class="meta"><time><?= h($item['date']) ?></time><span><?= h($item['source']) ?></span></div><h3><?= h($news['title']) ?></h3><p><?= h($news['summary']) ?></p><a class="text-link" href="<?= h($item['url']) ?>"<?= external_attrs() ?>><?= h(t('source')) ?></a></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="page-shell split reverse">
            <div class="copy" data-reveal>
                <span class="eyebrow"><?= lang() === 'bn' ? 'সংস্কার পাঠ' : 'Reform reading' ?></span>
                <h2><?= lang() === 'bn' ? 'রাষ্ট্র সংস্কার থেকে স্থানীয় সুশাসন' : 'From state reform to local governance' ?></h2>
                <p><?= page_copy('reform')['intro'] ?></p>
                <a class="button fit-button" href="<?= h(page_url('reform.php')) ?>"><?= h(t('read_more')) ?></a>
            </div>
            <figure class="story-image" data-reveal><img src="assets/images/campaign.jpg" alt="<?= lang() === 'bn' ? 'গণসংযোগের দৃশ্য' : 'Campaign outreach' ?>"></figure>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
