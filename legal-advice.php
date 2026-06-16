<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('legal');
$pageTitle = t('legal_advice');
$hero = [
    'eyebrow' => t('legal_advice'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/candidate-legal.png',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('question.php'), 'label' => t('question'), 'icon' => 'scale', 'class' => 'button'],
        ['url' => page_url('faq.php'), 'label' => t('faq'), 'icon' => 'circle-help', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell split inner-feature">
        <div class="copy feature-panel" data-reveal>
            <span class="eyebrow"><?= lang() === 'bn' ? 'নাগরিক অধিকার' : 'Citizen rights' ?></span>
            <h2><?= lang() === 'bn' ? 'আইনের চোখে সকল মানুষ সমান' : 'Everyone is equal before the law' ?></h2>
            <p><?= lang() === 'bn' ? 'নাগরিক অধিকার হলো সংবিধান-স্বীকৃত মৌলিক অধিকার: মত প্রকাশের স্বাধীনতা, আইনের দৃষ্টিতে সমতা, নিরাপত্তা এবং ন্যায়বিচারের অধিকার।' : 'Citizen rights include freedom of expression, equality before law, security, and the right to justice.' ?></p>
            <p><?= lang() === 'bn' ? 'এই বিভাগ মানুষকে সচেতন করা, প্রশ্ন গ্রহণ করা এবং প্রয়োজনীয় সহায়তার দিকে নির্দেশ করার জন্য তৈরি।' : 'This section is built to raise awareness, receive questions, and route people toward appropriate help.' ?></p>
            <a class="button fit-button" href="<?= h(page_url('question.php')) ?>"><?= h(t('question')) ?></a>
        </div>
        <figure class="story-image" data-reveal><img src="assets/images/candidate-legal.png" alt="<?= h($copy['title']) ?>"></figure>
    </div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'আইনি সহায়তার ক্ষেত্র' : 'Legal guidance areas' ?></h2><p><?= lang() === 'bn' ? 'ডেমো সাইটের আইনি পরামর্শ বিভাগগুলোকে পরিষ্কার ও ব্যবহারযোগ্যভাবে সাজানো হয়েছে।' : 'Legal-advice categories from the demo are arranged into a cleaner usable structure.' ?></p></div>
        <div class="grid-4">
            <?php foreach (collection('legal_topics')[lang()] as $topic): ?>
                <article class="premium-card" data-reveal><span><?= h(t('legal_advice')) ?></span><h3><?= h($topic['title']) ?></h3><p><?= h($topic['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section section-dark"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'গুরুত্বপূর্ণ নাগরিক অধিকার' : 'Important citizen rights' ?></h2><p><?= lang() === 'bn' ? 'এই অধিকারগুলো নাগরিকের ব্যক্তিগত স্বাধীনতা রক্ষা করে এবং রাষ্ট্রকে জবাবদিহির মধ্যে রাখে।' : 'These rights protect personal liberty and keep the state accountable.' ?></p></div>
        <div class="grid-4">
            <?php foreach (collection('citizen_rights')[lang()] as $index => $right): ?>
                <article class="priority agenda-card dark-panel" data-reveal><span><?= sprintf('%02d', $index + 1) ?></span><b><?= h($right['title']) ?></b><p><?= h($right['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section"><div class="page-shell split reverse">
        <figure class="story-image" data-reveal><img src="assets/images/constituency-fulbari.jpg" alt=""></figure>
        <div class="copy" data-reveal><h2><?= lang() === 'bn' ? 'সমস্যা সমাধানের ভিডিও ও প্রশ্নোত্তর' : 'Problem-solving videos and Q&A' ?></h2><p><?= lang() === 'bn' ? 'ডেমো সাইটে সমস্যা সমাধানের ভিডিও, নাগরিক অধিকার আলোচনা এবং ভূমি সমস্যা সমাধানকে আলাদা মিডিয়া বিভাগ হিসেবে রাখা হয়েছিল। এগুলো এখন মিডিয়া ও প্রশ্নোত্তর অংশের সঙ্গে সংযুক্ত।' : 'The demo separated problem-solving videos, citizen-rights discussions, and land-problem sessions. They are now connected to the media and FAQ sections.' ?></p><div class="inline-actions"><a class="text-link" href="<?= h(page_url('media.php')) ?>"><?= h(t('media')) ?></a><a class="text-link" href="<?= h(page_url('faq.php')) ?>"><?= h(t('faq')) ?></a></div></div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
