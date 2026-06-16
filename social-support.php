<?php
require __DIR__ . '/includes/bootstrap.php';
$copy = page_copy('social_support');
$pageTitle = t('social_support');
$hero = [
    'eyebrow' => t('social_support'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => 'assets/images/110fc2c4-0e86-445a-a7c3-e10c59d997ba.jpeg',
    'image_alt' => $copy['title'],
    'actions' => [
        ['url' => page_url('help.php?service=medical'), 'label' => lang() === 'bn' ? 'সহায়তা আবেদন' : 'Request support', 'icon' => 'hand-heart', 'class' => 'button'],
        ['url' => page_url('tracking.php'), 'label' => t('tracking'), 'icon' => 'search-check', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>
    <section class="section pt-0"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'সহায়তার প্রধান কর্মসূচি' : 'Main support programs' ?></h2><p><?= lang() === 'bn' ? 'সব আবেদন একই ট্র্যাকিং পদ্ধতিতে যাবে, যাতে আবেদনকারী পরে অবস্থা দেখতে পারেন।' : 'All requests go through the same tracking flow so applicants can follow status later.' ?></p></div>
        <div class="grid-3">
            <?php foreach (collection('support_programs')[lang()] as $index => $program): $links = ['medical', 'scholarship', 'maternity']; ?>
                <article class="premium-card" data-reveal><span><?= sprintf('%02d', $index + 1) ?></span><h3><?= h($program['title']) ?></h3><p><?= h($program['text']) ?></p><a class="text-link" href="<?= h(page_url('help.php?service=' . $links[$index])) ?>"><?= h(t('submit')) ?></a></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
