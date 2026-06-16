<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('faq');
$pageTitle = t('faq');
$hero = [
    'eyebrow' => t('faq'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/fdfca665-0d3d-4e9f-9c74-947b11452d51.jpeg',
    'image_alt' => lang() === 'bn' ? 'জনসভায় প্রশ্নোত্তর' : 'Public Q&A and outreach',
    'actions' => [
        ['url' => page_url('question.php'), 'label' => t('question'), 'icon' => 'message-square-text', 'class' => 'button'],
        ['url' => page_url('services.php'), 'label' => t('services'), 'icon' => 'heart-handshake', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell faq-desk">
        <div class="faq-desk__intro" data-reveal>
            <span class="eyebrow"><?= lang() === 'bn' ? 'জনপ্রশ্ন' : 'Public questions' ?></span>
            <h2><?= lang() === 'bn' ? 'দ্রুত উত্তর, পরিষ্কার পথ' : 'Quick answers, clear next steps' ?></h2>
            <p><?= lang() === 'bn' ? 'আইন, জনসেবা, রাজনৈতিক দর্শন এবং অনুরোধ ট্র্যাকিং নিয়ে সাধারণ প্রশ্নগুলো এখানে রাখা হয়েছে।' : 'Common questions about law, service, political philosophy, and request tracking are gathered here.' ?></p>
        </div>
        <div class="faq-list">
            <?php foreach (collection('faq_items')[lang()] as $item): ?>
                <details class="faq-item" data-reveal>
                    <summary><?= h($item['q']) ?></summary>
                    <p><?= h($item['a']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div></section>
    <section class="section paper-band"><div class="page-shell question-cta">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'প্রশ্ন জমা দিন' : 'Submit a question' ?></h2><p><?= lang() === 'bn' ? 'আইন, নাগরিক অধিকার, জনসেবা বা এলাকার উন্নয়ন নিয়ে প্রশ্ন থাকলে সেবা ডেস্কে পাঠান।' : 'Send questions about law, citizen rights, public service, or local development to the service desk.' ?></p></div>
        <a class="button fit-button" href="<?= h(page_url('question.php')) ?>"><?= h(t('question')) ?></a>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
