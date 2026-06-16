<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('home');
$pageTitle = $copy['title'];
$metaDescription = $copy['lead'];
$isBn = lang() === 'bn';
$heroImage = 'assets/images/414fe559-8bbc-406d-93f3-73bf7ffbb94b.jpeg';
$fieldImage = 'assets/images/30546136-a743-41af-b1c4-b48db7372f2b.jpeg';
$outreachImage = 'assets/images/4658bea2-edcb-499c-8bc5-31f80545e9af.jpeg';
$priorityIcons = ['shield-check', 'briefcase-business', 'factory', 'building-2'];
$actionTiles = [
    ['complaint.php', 'send', t('complaint'), $isBn ? 'রাস্তা, আলো, নিরাপত্তা বা স্থানীয় সমস্যার কথা সরাসরি জানান।' : 'Report roads, lighting, safety, or local problems directly.'],
    ['help.php', 'hand-heart', t('help'), $isBn ? 'ব্যক্তিগত বা সামাজিক সহায়তার প্রয়োজন সম্মানের সঙ্গে জমা দিন।' : 'Submit personal or community assistance needs with dignity.'],
    ['question.php', 'scale', t('question'), $isBn ? 'আইন, নাগরিক অধিকার বা জনস্বার্থ বিষয়ে প্রশ্ন পাঠান।' : 'Ask about law, citizen rights, or public-interest issues.'],
    ['tracking.php', 'search-check', t('tracking'), $isBn ? 'জমা দেওয়া আবেদনের অগ্রগতি ট্র্যাকিং কোড দিয়ে দেখুন।' : 'Follow submitted requests with your tracking code.'],
];
$closingActions = [
    ['complaint.php', 'send', $isBn ? 'সমস্যা জানান' : 'Report an issue'],
    ['help.php', 'hand-heart', $isBn ? 'সহায়তা চান' : 'Request help'],
    ['services.php', 'clipboard-list', $isBn ? 'সেবা ডেস্ক দেখুন' : 'Visit service desk'],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <section class="campaign-hero">
        <div class="campaign-hero__content">
            <span class="eyebrow"><?= h($copy['eyebrow']) ?></span>
            <h1><?= h($copy['title']) ?></h1>
            <p><?= h($copy['lead']) ?></p>
            <div class="hero-actions">
                <a class="button" href="<?= h(page_url('complaint.php')) ?>"><i data-lucide="send" aria-hidden="true"></i><?= $isBn ? 'অভিযোগ করুন' : 'Submit complaint' ?></a>
                <a class="button button-light" href="<?= h(page_url('help.php')) ?>"><i data-lucide="hand-heart" aria-hidden="true"></i><?= $isBn ? 'সহায়তা চান' : 'Request help' ?></a>
                <a class="ghost-button" href="<?= h(page_url('dinajpur.php')) ?>"><i data-lucide="map" aria-hidden="true"></i><?= $isBn ? 'দিনাজপুর-৫ ভিশন' : 'Dinajpur-5 vision' ?></a>
            </div>
            <div class="campaign-hero__facts" aria-label="<?= $isBn ? 'দ্রুত তথ্য' : 'Quick facts' ?>">
                <?php foreach (collection('quick_facts')[lang()] as $fact): ?>
                    <div>
                        <span><?= h($fact['label']) ?></span>
                        <strong><?= h($fact['value']) ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="campaign-hero__media" aria-hidden="true">
            <img src="<?= h($heroImage) ?>" alt="">
            <div class="campaign-badge">
                <span><?= $isBn ? 'জনগণের পাশে' : 'For the people' ?></span>
                <strong><?= $isBn ? 'আইন, সেবা, উন্নয়ন' : 'Law. Service. Development.' ?></strong>
            </div>
        </div>
    </section>

    <section class="action-strip" aria-label="<?= $isBn ? 'সেবা ডেস্ক' : 'Service desk' ?>">
        <div class="page-shell action-grid">
            <?php foreach ($actionTiles as [$url, $icon, $title, $text]): ?>
                <a class="action-card" href="<?= h(page_url($url)) ?>" data-reveal>
                    <i data-lucide="<?= h($icon) ?>" aria-hidden="true"></i>
                    <span><?= h($title) ?></span>
                    <p><?= h($text) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section campaign-profile">
        <div class="page-shell campaign-profile__grid">
            <figure class="campaign-portrait" data-reveal>
                <img src="assets/images/candidate-portrait.png" alt="<?= h($copy['title']) ?>">
            </figure>
            <div class="campaign-profile__copy" data-reveal>
                <span class="eyebrow"><?= $isBn ? 'জননেতৃত্ব' : 'Public leadership' ?></span>
                <h2><?= $isBn ? 'দিনাজপুর-৫ এর জন্য আইনভিত্তিক, সাহসী ও আধুনিক রাজনীতি' : 'Law-minded, courageous, modern politics for Dinajpur-5' ?></h2>
                <p><?= h($copy['profile']) ?></p>
                <blockquote><?= h($copy['note']) ?></blockquote>
                <a class="text-link" href="<?= h(page_url('about.php')) ?>"><?= h(t('read_more')) ?></a>
            </div>
            <div class="campaign-profile__image" data-reveal>
                <img src="<?= h($fieldImage) ?>" alt="<?= $isBn ? 'মাঠপর্যায়ের গণসংযোগ' : 'Field outreach' ?>">
            </div>
        </div>
    </section>

    <section class="section issues-section">
        <div class="page-shell">
            <div class="section-head campaign-section-head">
                <div>
                    <span class="eyebrow"><?= $isBn ? 'অগ্রাধিকার' : 'Campaign priorities' ?></span>
                    <h2><?= $isBn ? 'যে বিষয়গুলো নিয়ে মাঠে কথা বলা হচ্ছে' : 'The issues driving the campaign' ?></h2>
                </div>
                <p><?= $isBn ? 'নিরাপত্তা, কাজের সুযোগ, স্থানীয় সম্পদ এবং পরিকল্পিত শহরকে কেন্দ্র করে ফুলবাড়ী-পার্বতীপুরের জন্য কার্যকর রাজনৈতিক রূপরেখা।' : 'A practical political outline for Phulbari-Parbatipur centered on safety, jobs, local resources, and planned towns.' ?></p>
            </div>
            <div class="issue-grid">
                <?php foreach (collection('priorities')[lang()] as $i => $priority): ?>
                    <article class="issue-card" data-reveal>
                        <i data-lucide="<?= h($priorityIcons[$i] ?? 'check-circle-2') ?>" aria-hidden="true"></i>
                        <span><?= sprintf('%02d', $i + 1) ?></span>
                        <h3><?= h($priority['title']) ?></h3>
                        <p><?= h($priority['text']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section agenda-feature">
        <div class="muin page-shell agenda-feature__grid">
            <div class="agenda-feature__copy" data-reveal>
                <span class="eyebrow"><?= $isBn ? 'স্থানীয় এজেন্ডা' : 'Local agenda' ?></span>
                <h2><?= $isBn ? 'ফুলবাড়ী-পার্বতীপুরের জন্য বাস্তব উন্নয়ন এজেন্ডা' : 'A practical development agenda for Phulbari-Parbatipur' ?></h2>
                <p><?= $isBn ? 'বাসযোগ্য শহর, নিরাপদ সমাজ, কর্মসংস্থান এবং স্থানীয় সম্পদভিত্তিক অর্থনীতিকে একসঙ্গে এগিয়ে নেওয়ার জন্য এই রূপরেখা।' : 'A focused plan for livable towns, safer communities, jobs, and a resource-led local economy.' ?></p>
                <a class="agenda-feature__link" href="<?= h(page_url('dinajpur.php')) ?>"><?= $isBn ? 'দিনাজপুর-৫ ভিশন দেখুন' : 'View Dinajpur-5 vision' ?></a>
            </div>
            <figure class="agenda-feature__image" data-reveal>
                <img src="<?= h($outreachImage) ?>" alt="<?= $isBn ? 'গণসংযোগ ও বক্তব্য' : 'Outreach and public address' ?>">
                <figcaption>
                    <span><?= $isBn ? 'মাঠের কথা' : 'From the field' ?></span>
                    <strong><?= $isBn ? 'নীতি, সেবা ও উন্নয়নকে একসঙ্গে রাখা' : 'Keeping policy, service, and development together' ?></strong>
                </figcaption>
            </figure>
            <div class="agenda-feature__list" data-reveal>
                <?php foreach (collection('vision_cards')[lang()] as $i => $card): ?>
                    <article>
                        <span><?= sprintf('%02d', $i + 1) ?></span>
                        <div>
                            <em><?= h($card['kicker']) ?></em>
                            <strong><?= h($card['title']) ?></strong>
                            <p><?= h($card['text']) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="muin section service-funnel">
        <div class="page-shell service-funnel__grid">
            <div class="service-funnel__intro" data-reveal>
                <span class="eyebrow"><?= h(t('public_service')) ?></span>
                <h2><?= $isBn ? 'আপনার এলাকার প্রয়োজন সরাসরি সেবা ডেস্কে' : 'Bring your area’s needs directly to the service desk' ?></h2>
                <p><?= $isBn ? 'অভিযোগ, সহায়তা আবেদন ও জনস্বার্থ প্রশ্নকে ট্র্যাকিং কোডসহ সংগঠিত করার জন্য এই ডিজিটাল ডেস্ক।' : 'A digital desk to organize complaints, assistance requests, and public-interest questions with tracking codes.' ?></p>
            </div>
            <div class="service-funnel__cards">
                <?php foreach (array_slice($actionTiles, 0, 3) as $i => [$url, $icon, $title, $text]): ?>
                    <a class="service-step" href="<?= h(page_url($url)) ?>" data-reveal>
                        <em><?= sprintf('%02d', $i + 1) ?></em>
                        <i data-lucide="<?= h($icon) ?>" aria-hidden="true"></i>
                        <h3><?= h($title) ?></h3>
                        <p><?= h($text) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section newsroom-section campaign-news">
        <div class="page-shell">
            <div class="section-head campaign-section-head">
                <div>
                    <span class="eyebrow"><?= $isBn ? 'সংবাদ ও গণসংযোগ' : 'News and outreach' ?></span>
                    <h2><?= $isBn ? 'মাঠের কাজ, সাক্ষাৎকার ও সংবাদ কভারেজ' : 'Field work, interviews, and news coverage' ?></h2>
                </div>
                <a class="text-link" href="<?= h(page_url('media.php')) ?>"><?= $isBn ? 'মিডিয়া আর্কাইভ' : 'Media archive' ?></a>
            </div>
            <div class="campaign-news__grid">
                <?php foreach (array_slice(collection('news'), 0, 3) as $index => $item): $news = $item[lang()]; ?>
                    <article class="campaign-news-card <?= $index === 0 ? 'campaign-news-card--lead' : '' ?>" data-reveal>
                        <img src="<?= h($item['image']) ?>" alt="">
                        <div>
                            <div class="meta"><time><?= h($item['date']) ?></time><span><?= h($item['source']) ?></span></div>
                            <h3><?= h($news['title']) ?></h3>
                            <p><?= h($news['summary']) ?></p>
                            <a class="text-link" href="<?= h($item['url']) ?>"<?= external_attrs() ?>><?= h(t('source')) ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="closing-cta">
        <div class="page-shell closing-cta__grid">
            <div>
                <span class="eyebrow"><?= $isBn ? 'এখন আপনার পালা' : 'Now it is your turn' ?></span>
                <h2><?= $isBn ? 'আপনার এলাকা কী চায়, আমাদের জানান' : 'Tell us what your area needs next' ?></h2>
                <p><?= $isBn ? 'স্থানীয় সমস্যা, সহায়তার প্রয়োজন, নাগরিক অধিকার বা উন্নয়ন প্রস্তাব এক জায়গায় জমা দিন।' : 'Submit local problems, assistance needs, citizen-rights questions, or development proposals in one place.' ?></p>
            </div>
            <div class="closing-cta__actions">
                <?php foreach ($closingActions as [$url, $icon, $label]): ?>
                    <a class="button <?= $url === 'services.php' ? 'button-light' : '' ?>" href="<?= h(page_url($url)) ?>"><i data-lucide="<?= h($icon) ?>" aria-hidden="true"></i><?= h($label) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
