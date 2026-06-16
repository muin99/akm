<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('reform');
$pageTitle = t('reform');
$hero = ['eyebrow' => t('reform'), 'title' => $copy['title'], 'intro' => $copy['intro']];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell split">
        <div class="copy feature-panel" data-reveal>
            <span class="eyebrow"><?= lang() === 'bn' ? 'অফিসিয়াল উৎস' : 'Official source' ?></span>
            <h2><?= lang() === 'bn' ? 'রাষ্ট্র সংস্কারের আলোকে স্থানীয় সুশাসনের দাবি' : 'Local good governance through the lens of state reform' ?></h2>
            <p><?= lang() === 'bn' ? 'বিএনপির ৩১ দফা রাষ্ট্র, অধিকার, জবাবদিহি ও গণতান্ত্রিক প্রতিষ্ঠানের সংস্কারকে সামনে আনে। এই পেজ সেই আলোচনাকে দিনাজপুর-৫ এর স্থানীয় বাস্তবতার সঙ্গে যুক্ত করে।' : 'BNP’s 31 points bring state reform, rights, accountability, and democratic institutions into focus. This page connects that discussion with local realities in Dinajpur-5.' ?></p>
            <a class="button fit-button" href="https://www.bnpbd.org/31-points/"<?= external_attrs() ?>><?= lang() === 'bn' ? 'অফিসিয়াল ৩১ দফা' : 'Official 31 points' ?></a>
        </div>
        <figure class="story-image" data-reveal><img src="assets/images/candidate-legal.png" alt="<?= lang() === 'bn' ? 'নীতি ও আইন' : 'Policy and law' ?>"></figure>
    </div></section>
    <section class="section paper-band"><div class="page-shell"><div class="section-head"><h2><?= lang() === 'bn' ? 'পাঠের বিষয়বস্তু' : 'Reading themes' ?></h2><p><?= lang() === 'bn' ? 'অফিসিয়াল নথির সারাংশ-ভিত্তিক পথনির্দেশ, দাবি নয়।' : 'A reading guide to the official material, not a substitute for it.' ?></p></div><div class="grid-4">
        <?php
        $themes = lang() === 'bn'
            ? ['রাষ্ট্র কাঠামো', 'জবাবদিহি', 'বিচার বিভাগ', 'স্থানীয় সরকার ও অধিকার']
            : ['State structure', 'Accountability', 'Judiciary', 'Local government & rights'];
        foreach ($themes as $theme): ?><article class="priority" data-reveal><b><?= h($theme) ?></b><p><?= lang() === 'bn' ? 'অফিসিয়াল পাঠে গিয়ে বিস্তারিত দেখুন।' : 'Open the official text for detail.' ?></p></article><?php endforeach; ?>
    </div></div></section>
    <section class="section"><div class="page-shell split reverse"><figure class="story-image" data-reveal><img src="assets/images/campaign.jpg" alt="<?= lang() === 'bn' ? 'রাজনৈতিক সংযোগ' : 'Political outreach' ?>"></figure><div class="copy" data-reveal><span class="eyebrow">BNP</span><h2><?= lang() === 'bn' ? 'প্রার্থী সাইটে দলীয় কনটেক্সট' : 'Party context on a candidate site' ?></h2><p><?= lang() === 'bn' ? 'দলীয় সংস্কার আলোচনাকে স্থানীয় জনসেবা, আইন এবং নাগরিক প্রস্তাবের সঙ্গে সংযোগ করার জন্য এই বিভাগ রাখা হয়েছে।' : 'This section connects party reform reading with local service, law, and citizen proposals.' ?></p></div></div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'রাজনৈতিক দর্শন ও নীতিগত অবস্থান' : 'Political philosophy and policy position' ?></h2><p><?= lang() === 'bn' ? 'ডেমো সাইটের রাজনৈতিক দর্শন অংশকে গণতন্ত্র, ন্যায়বিচার, আইনের শাসন ও স্বচ্ছ প্রশাসনের ভাষায় সাজানো হয়েছে।' : 'The demo’s political philosophy section is shaped around democracy, justice, rule of law, and transparent administration.' ?></p></div>
        <div class="grid-4">
            <?php foreach ((lang() === 'bn' ? ['গণতন্ত্র', 'ন্যায়বিচার', 'আইনের শাসন', 'স্বচ্ছ প্রশাসন'] : ['Democracy', 'Justice', 'Rule of law', 'Transparent administration']) as $i => $item): ?>
                <article class="premium-card stat-card"><span><?= sprintf('%02d', $i + 1) ?></span><h3><?= h($item) ?></h3><p><?= lang() === 'bn' ? 'জনগণের অধিকার ও জবাবদিহিমূলক রাজনীতির ভিত্তি।' : 'A foundation for people’s rights and accountable politics.' ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'ব্যক্তিগত ভিশন ও প্রতিশ্রুতি' : 'Personal vision and commitment' ?></h2><p><?= lang() === 'bn' ? 'ন্যায়ভিত্তিক সমাজ, কর্মসংস্থান, উন্নয়ন এবং মাদক-সন্ত্রাসমুক্ত জনপদের অঙ্গীকার।' : 'Commitment to justice, employment, development, and communities free from drugs and terror.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('personal_commitments')[lang()] as $item): ?>
                <article class="premium-card" data-reveal><span><?= lang() === 'bn' ? 'অঙ্গীকার' : 'Commitment' ?></span><h3><?= h($item['title']) ?></h3><p><?= h($item['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
