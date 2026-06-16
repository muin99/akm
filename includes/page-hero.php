<?php $hero = $hero ?? []; ?>
<section class="page-hero">
    <div class="page-hero__copy">
        <span class="eyebrow"><?= h($hero['eyebrow'] ?? 'Barrister AKM Kamruzzaman') ?></span>
        <h1><?= h($hero['title'] ?? '') ?></h1>
        <?php if (!empty($hero['intro'])): ?>
            <p><?= h($hero['intro']) ?></p>
        <?php endif; ?>
        <?php if (!empty($hero['actions']) && is_array($hero['actions'])): ?>
            <div class="hero-actions">
                <?php foreach ($hero['actions'] as $action): ?>
                    <a class="<?= h($action['class'] ?? 'button') ?>" href="<?= h($action['url'] ?? '#') ?>">
                        <?php if (!empty($action['icon'])): ?><i data-lucide="<?= h($action['icon']) ?>" aria-hidden="true"></i><?php endif; ?><?= h($action['label'] ?? '') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!empty($hero['image'])): ?>
        <figure class="page-hero__media">
            <img src="<?= h($hero['image']) ?>" alt="<?= h($hero['image_alt'] ?? ($hero['title'] ?? '')) ?>">
        </figure>
    <?php endif; ?>
</section>
