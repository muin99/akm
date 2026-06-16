<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('about');
$pageTitle = t('about');
$hero = [
    'eyebrow' => t('about'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/candidate-news.jpg',
    'image_alt' => lang() === 'bn' ? 'ব্যারিস্টার কামরুজ্জামান' : 'Barrister Kamruzzaman',
    'actions' => [
        ['url' => page_url('services.php'), 'label' => t('services'), 'icon' => 'heart-handshake', 'class' => 'button'],
        ['url' => page_url('media.php'), 'label' => t('media'), 'icon' => 'newspaper', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell split inner-feature">
        <figure class="story-image tall" data-reveal><img src="assets/images/candidate-news.jpg" alt="<?= lang() === 'bn' ? 'ব্যারিস্টার কামরুজ্জামান' : 'Barrister Kamruzzaman' ?>"></figure>
        <div class="copy feature-panel" data-reveal>
            <span class="eyebrow"><?= lang() === 'bn' ? 'পরিচিতি' : 'Profile' ?></span>
            <h2><?= lang() === 'bn' ? 'আইনজীবীর দৃঢ়তা, সংগঠকের ধৈর্য, মানুষের সঙ্গে সরাসরি সম্পর্ক' : 'A lawyer’s discipline, an organizer’s patience, a direct bond with people' ?></h2>
            <p><?= lang() === 'bn' ? 'ব্যারিস্টার কামরুজ্জামানের রাজনৈতিক অবস্থান দিনাজপুর-৫ এর মানুষের জীবনমান, নিরাপত্তা, কর্মসংস্থান এবং মর্যাদাপূর্ণ জনসেবার প্রশ্নকে কেন্দ্র করে গড়ে উঠেছে।' : 'Barrister Kamruzzaman’s public position is shaped around living standards, safety, employment, and dignified public service for Dinajpur-5.' ?></p>
            <p><?= lang() === 'bn' ? 'প্রকাশ্য সংবাদসূত্রে তার দলীয় ভূমিকা, আইন পেশার পরিচয় এবং ফুলবাড়ী-পার্বতীপুর কেন্দ্রিক উন্নয়ন ভাবনার উল্লেখ পাওয়া যায়।' : 'Public reporting references his party role, legal identity, and development focus around Phulbari-Parbatipur.' ?></p>
            <a class="text-link" href="https://www.bssnews.net/interview/354832"<?= external_attrs() ?>><?= lang() === 'bn' ? 'বাসস সাক্ষাৎকার দেখুন' : 'Read BSS interview' ?></a>
        </div>
    </div></section>
    <section class="section" id="education"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'শিক্ষাগত যোগ্যতা' : 'Educational qualifications' ?></h2><p><?= lang() === 'bn' ? 'আইন পেশা, জনসেবা ও নেতৃত্বের প্রস্তুতিকে একটি সুসংগঠিত শিক্ষাগত ভিত্তি শক্তিশালী করেছে।' : 'A structured educational base supports his path in law, public service, and leadership.' ?></p></div>
        <div class="credential-grid">
            <?php foreach (collection('education_items')[lang()] as $index => $item): ?>
                <article class="credential-card <?= $index === 0 ? 'credential-main' : '' ?>" data-reveal>
                    <time><?= h($item['date']) ?></time>
                    <h3><?= h($item['title']) ?></h3>
                    <p><?= h($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'নেতৃত্বের তিনটি স্তম্ভ' : 'Three pillars of leadership' ?></h2><p><?= lang() === 'bn' ? 'আইন, রাজনীতি ও জনসেবা এখানে আলাদা পরিচয় নয়; এগুলো একই অঙ্গীকারের তিনটি দিক।' : 'Law, politics, and public service are not separate labels here; they are three sides of one commitment.' ?></p></div>
        <div class="grid-3">
            <article class="premium-card" data-reveal><span><?= lang() === 'bn' ? 'আইন' : 'Law' ?></span><h3><?= lang() === 'bn' ? 'ন্যায়বিচারের ভাষা' : 'The language of justice' ?></h3><p><?= lang() === 'bn' ? 'মানুষের সমস্যা শুধু আবেগ নয়, নথি, যুক্তি ও আইনি দায়িত্বের জায়গা থেকেও দেখা।' : 'Treating people’s problems through records, reasoning, and legal responsibility.' ?></p></article>
            <article class="premium-card" data-reveal><span><?= lang() === 'bn' ? 'রাজনীতি' : 'Politics' ?></span><h3><?= lang() === 'bn' ? 'গণতান্ত্রিক সংগঠন' : 'Democratic organization' ?></h3><p><?= lang() === 'bn' ? 'দলীয় অঙ্গীকারকে স্থানীয় বাস্তবতার সঙ্গে যুক্ত করার প্রয়াস।' : 'Connecting party commitment with local realities.' ?></p></article>
            <article class="premium-card" data-reveal><span><?= lang() === 'bn' ? 'জনসেবা' : 'Service' ?></span><h3><?= lang() === 'bn' ? 'সরাসরি নাগরিক ডেস্ক' : 'Direct citizen desk' ?></h3><p><?= lang() === 'bn' ? 'অভিযোগ, সহায়তা ও প্রশ্নের জন্য ডিজিটাল intake ব্যবস্থা।' : 'Digital intake for complaints, assistance, and questions.' ?></p></article>
        </div>
    </div></section>
    <section class="section"><div class="page-shell"><div class="section-head"><h2><?= lang() === 'bn' ? 'জনসমক্ষে পথচলার কিছু মুহূর্ত' : 'Moments in the public journey' ?></h2></div><div class="timeline elegant-timeline">
        <article><time>2025-12-06</time><h3><?= lang() === 'bn' ? 'দিনাজপুর-৫ এ ধানের শীষের মনোনয়ন সংবাদ' : 'Sheaf of Paddy nomination coverage in Dinajpur-5' ?></h3><p><?= lang() === 'bn' ? 'জাতীয় গণমাধ্যমে ফুলবাড়ী-পার্বতীপুর আসনকে ঘিরে রাজনৈতিক আলোচনা সামনে আসে।' : 'National media brought the Phulbari-Parbatipur seat into political focus.' ?></p></article>
        <article><time>2026-01-26</time><h3><?= lang() === 'bn' ? 'জীবনমান, নিরাপত্তা ও কর্মসংস্থান নিয়ে সাক্ষাৎকার' : 'Interview on living standards, safety, and jobs' ?></h3><p><?= lang() === 'bn' ? 'স্থানীয় উন্নয়ন, রেলওয়ে সক্ষমতা এবং শহর পরিকল্পনা নিয়ে তার বক্তব্য প্রকাশিত হয়।' : 'His remarks on local development, railway capacity, and town planning were published.' ?></p></article>
        <article><time>2026-02-03</time><h3><?= lang() === 'bn' ? 'ফুলবাড়ী-পার্বতীপুরে গণসংযোগ' : 'Outreach across Phulbari-Parbatipur' ?></h3><p><?= lang() === 'bn' ? 'মাঠপর্যায়ের গণসংযোগ ও ভোটারদের সঙ্গে সরাসরি কথোপকথন সংবাদে উঠে আসে।' : 'Field outreach and direct voter conversations were covered in the press.' ?></p></article>
    </div></div></section>
    <section class="section section-dark" id="experience"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'পেশাগত অভিজ্ঞতা' : 'Professional experience' ?></h2><p><?= lang() === 'bn' ? 'আদালত, গবেষণা, নথি, ক্লায়েন্ট যোগাযোগ এবং উচ্চ আদালতের আবেদনের অভিজ্ঞতা একত্রে একটি পরিণত আইনি প্রোফাইল তৈরি করে।' : 'Court work, research, documentation, client communication, and High Court applications together shape a mature legal profile.' ?></p></div>
        <div class="timeline elegant-timeline dark-timeline experience-timeline">
            <?php foreach (collection('profile_timeline')[lang()] as $item): ?>
                <article data-reveal><time><?= h($item['period']) ?></time><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section" id="legal-success"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'আইনি সাফল্য ও বিশেষায়ন' : 'Legal success and specialization' ?></h2><p><?= lang() === 'bn' ? 'সংবিধান, মানবাধিকার, জনস্বার্থ ও আইনের শাসনকে কেন্দ্র করে তার আইনি কাজের পরিসর তুলে ধরা হয়েছে।' : 'His legal work is framed around constitution, human rights, public interest, and rule of law.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('legal_highlights')[lang()] as $item): ?>
                <article class="premium-card legal-highlight-card" data-reveal><span><?= lang() === 'bn' ? 'আইন' : 'Law' ?></span><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section paper-band" id="social-work"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'সামাজিক ও মানবিক কাজের অগ্রাধিকার' : 'Social and humanitarian priorities' ?></h2><p><?= lang() === 'bn' ? 'রাজনীতি শুধু বক্তব্য নয়; মানুষের পাশে দাঁড়ানো, শিক্ষা-স্বাস্থ্য সহায়তা এবং সমাজের দুর্বল মানুষের জন্য কাজ করার প্রতিশ্রুতি।' : 'Politics is not only speech; it is also support, education, healthcare, and standing beside vulnerable people.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('social_work')[lang()] as $item): ?>
                <article class="premium-card" data-reveal><span><?= lang() === 'bn' ? 'সামাজিক উদ্যোগ' : 'Social work' ?></span><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section section-dark" id="vision"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'ব্যক্তিগত ভিশন ও প্রতিশ্রুতি' : 'Personal vision and commitment' ?></h2><p><?= lang() === 'bn' ? 'ন্যায়সঙ্গত সমাজ, কর্মসংস্থান, উন্নয়ন, আইনের সমতা এবং শান্ত-সম্প্রীতিময় ফুলবাড়ী-পার্বতীপুর গড়ার আহ্বান।' : 'A call for justice, employment, development, equality before law, and peaceful Phulbari-Parbatipur.' ?></p></div>
        <div class="vision-layout">
            <?php foreach (collection('personal_commitments')[lang()] as $index => $item): ?>
                <article class="premium-card <?= $index === 0 ? 'lead-card' : 'dark-panel' ?>" data-reveal><span><?= sprintf('%02d', $index + 1) ?></span><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
