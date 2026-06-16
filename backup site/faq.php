<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('faq');
$pageTitle = t('faq');
$hero = ['eyebrow' => t('faq'), 'title' => $copy['title'], 'intro' => $copy['intro']];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell narrow faq-list">
        <?php foreach (collection('faq_items')[lang()] as $item): ?>
            <details class="faq-item" data-reveal>
                <summary><?= h($item['q']) ?></summary>
                <p><?= h($item['a']) ?></p>
            </details>
        <?php endforeach; ?>
    </div></section>
    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'প্রশ্ন জমা দিন' : 'Submit a question' ?></h2><p><?= lang() === 'bn' ? 'আইন, নাগরিক অধিকার, জনসেবা বা এলাকার উন্নয়ন নিয়ে প্রশ্ন থাকলে সেবা ডেস্কে পাঠান।' : 'Send questions about law, citizen rights, public service, or local development to the service desk.' ?></p></div>
        <a class="button fit-button" href="<?= h(page_url('question.php')) ?>"><?= h(t('question')) ?></a>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
