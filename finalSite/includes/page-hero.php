<?php $hero = $hero ?? []; ?>
<section class="page-hero">
    <span class="eyebrow"><?= h($hero['eyebrow'] ?? 'Barrister AKM Kamruzzaman') ?></span>
    <h1><?= h($hero['title'] ?? '') ?></h1>
    <?php if (!empty($hero['intro'])): ?>
        <p><?= h($hero['intro']) ?></p>
    <?php endif; ?>
</section>
