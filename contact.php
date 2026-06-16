<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('contact');
$pageTitle = t('contact');
$hero = [
    'eyebrow' => t('contact'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/fdfca665-0d3d-4e9f-9c74-947b11452d51.jpeg',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('complaint.php?service=message'), 'label' => lang() === 'bn' ? 'মেসেজ পাঠান' : 'Send message', 'icon' => 'send', 'class' => 'button'],
        ['url' => page_url('tracking.php'), 'label' => t('tracking'), 'icon' => 'search-check', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell split inner-feature">
        <div class="copy feature-panel" data-reveal><span class="eyebrow"><?= h(t('contact')) ?></span><h2><?= lang() === 'bn' ? 'দ্রুত যোগাযোগের তথ্য' : 'Quick contact details' ?></h2><p><?= lang() === 'bn' ? 'ঠিকানা, ফোন, ইমেইল ও সোশ্যাল লিংক প্রকাশের জন্য এই অংশ প্রস্তুত রাখা হয়েছে। বাস্তব নম্বর যুক্ত হলে এখানেই আপডেট করা যাবে।' : 'This section is ready for address, phone, email, and social links. It can be updated when official details are finalized.' ?></p></div>
        <div class="stack-list" data-reveal>
            <?php foreach (collection('contact_items')[lang()] as $item): ?>
                <article><span><?= h($item['label']) ?></span><h3><?= h($item['value']) ?></h3></article>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section paper-band"><div class="page-shell question-cta"><div class="section-head"><h2><?= lang() === 'bn' ? 'সরাসরি মেসেজ ফর্ম' : 'Direct message form' ?></h2><p><?= lang() === 'bn' ? 'গুরুত্বপূর্ণ বার্তা, আমন্ত্রণ, পরামর্শ বা গণসংযোগ অনুরোধ ট্র্যাকিংসহ জমা দিন।' : 'Submit important messages, invitations, advice, or outreach requests with tracking.' ?></p></div><a class="button fit-button" href="<?= h(page_url('complaint.php?service=message')) ?>"><?= lang() === 'bn' ? 'মেসেজ পাঠান' : 'Send message' ?></a></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
