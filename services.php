<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('services');
$pageTitle = t('services');
$hero = [
    'eyebrow' => t('public_service'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/110fc2c4-0e86-445a-a7c3-e10c59d997ba.jpeg',
    'image_alt' => lang() === 'bn' ? 'মানুষের সঙ্গে সরাসরি যোগাযোগ' : 'Direct community contact',
    'actions' => [
        ['url' => page_url('complaint.php'), 'label' => t('complaint'), 'icon' => 'send', 'class' => 'button'],
        ['url' => page_url('tracking.php'), 'label' => t('tracking'), 'icon' => 'search-check', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell service-command">
        <div class="section-head campaign-section-head">
            <div>
                <span class="eyebrow"><?= lang() === 'bn' ? 'কীভাবে কাজ করে' : 'How it works' ?></span>
                <h2><?= lang() === 'bn' ? 'এক জায়গায় অভিযোগ, সহায়তা ও প্রশ্ন' : 'Complaints, help, and questions in one place' ?></h2>
            </div>
            <p><?= lang() === 'bn' ? 'ফর্ম জমা দিন, ট্র্যাকিং কোড রাখুন, আর অনুরোধের ধরন অনুযায়ী সেটি সেবা ডেস্কে সংগঠিত হবে।' : 'Submit the form, keep the tracking code, and the request is organized by type inside the service desk.' ?></p>
        </div>
        <div class="service-command__grid">
            <a class="service-tile strong-tile" href="<?= h(page_url('complaint.php')) ?>"><em>01</em><h2><?= h(t('complaint')) ?></h2><p><?= lang() === 'bn' ? 'সমস্যা, অভিযোগ বা স্থানীয় উদ্বেগ পাঠান।' : 'Submit a problem, complaint, or local concern.' ?></p></a>
            <a class="service-tile" href="<?= h(page_url('help.php')) ?>"><em>02</em><h2><?= h(t('help')) ?></h2><p><?= lang() === 'bn' ? 'সহায়তা দরকার হলে প্রেক্ষাপটসহ জানান।' : 'Describe an assistance need with context.' ?></p></a>
            <a class="service-tile" href="<?= h(page_url('question.php')) ?>"><em>03</em><h2><?= h(t('question')) ?></h2><p><?= lang() === 'bn' ? 'আইনি বা জনস্বার্থ প্রশ্ন পাঠান।' : 'Send a legal or public-interest question.' ?></p></a>
            <a class="service-tile" href="<?= h(page_url('tracking.php')) ?>"><em>04</em><h2><?= h(t('tracking')) ?></h2><p><?= lang() === 'bn' ? 'শুধু কোড দিয়ে বর্তমান অবস্থা দেখুন।' : 'Use only the code to see the current status.' ?></p></a>
        </div>
    </div></section>
    <section class="section paper-band"><div class="page-shell split inner-feature"><div class="copy"><span class="eyebrow"><?= h(t('tracking')) ?></span><h2><?= lang() === 'bn' ? 'গোপনীয়তা-সচেতন ট্র্যাকিং' : 'Privacy-conscious tracking' ?></h2><p><?= lang() === 'bn' ? 'পাবলিক ট্র্যাকিং পেজে আবেদনপত্রের লেখা, এনআইডি, আপলোড করা ফাইল বা অ্যাডমিন নোট দেখা যায় না।' : 'The public tracking page never shows request text, NID, uploaded files, or internal notes.' ?></p><a class="button fit-button" href="<?= h(page_url('tracking.php')) ?>"><?= h(t('tracking')) ?></a></div><figure class="story-image"><img src="assets/images/constituency-fulbari.jpg" alt=""></figure></div></section>
    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'ডেমো সাইটের সব সেবা বিভাগ একত্রে' : 'All demo service categories consolidated' ?></h2><p><?= lang() === 'bn' ? 'ভূমি, শিক্ষা, চিকিৎসা, গোপনীয় পরামর্শ, প্রসূতি সহায়তা ও মতামত জরিপকে একই সেবা ডেস্কে সংগঠিত করা হয়েছে।' : 'Land, education, medical, confidential advice, maternity support, and citizen surveys are organized into one service desk.' ?></p></div>
        <div class="tag-cloud service-cloud">
            <?php foreach (collection('service_types')[lang()] as $service): ?><a href="<?= h(page_url('help.php')) ?>"><?= h($service) ?></a><?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
