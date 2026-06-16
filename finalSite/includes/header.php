<?php
$pageTitle = $pageTitle ?? app_config('site_name');
$metaDescription = $metaDescription ?? 'Bangla-first public website for Barrister AKM Kamruzzaman.';
?>
<!doctype html>
<html lang="<?= h(lang()) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= h($metaDescription) ?>">
    <title><?= h($pageTitle) ?> | <?= h(app_config('site_name')) ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        surface: '#f7faf6',
                        'surface-off-white': '#F9FBF9',
                        'surface-container': '#ebefea',
                        'surface-container-low': '#f1f5f0',
                        'surface-container-lowest': '#ffffff',
                        primary: '#00503a',
                        'primary-container': '#006a4e',
                        'primary-fixed': '#9ef4d0',
                        'primary-fixed-dim': '#83d7b4',
                        'paddy-gold': '#D4AF37',
                        tertiary: '#74302a',
                        outline: '#6f7a73',
                        'outline-variant': '#bec9c2',
                        'neutral-charcoal': '#2D2D2D',
                        'on-surface': '#181d1a',
                        'on-surface-variant': '#3f4944'
                    },
                    fontFamily: {
                        headline: ['Source Serif 4', 'Hind Siliguri', 'serif'],
                        body: ['Manrope', 'Hind Siliguri', 'system-ui', 'sans-serif'],
                        label: ['JetBrains Mono', 'monospace']
                    }
                }
            }
        };
    </script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=JetBrains+Mono:wght@500;700&family=Manrope:wght@400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700;8..60,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= h(($assetPrefix ?? '') . 'assets/css/site.css') ?>">
</head>
<body class="bg-surface text-on-surface antialiased">
<a class="skip-link focus:rounded-md" href="#main"><?= h(t('skip')) ?></a>
<header class="site-header" data-header>
    <a class="brand group" href="<?= h(page_url(($pathPrefix ?? '') . 'index.php')) ?>" aria-label="<?= h(app_config('site_name')) ?>">
        <span class="brand-mark transition-transform duration-300 group-hover:scale-105">AKM</span>
        <span>
            <strong><?= lang() === 'bn' ? 'ব্যারিস্টার কামরুজ্জামান' : 'Barrister Kamruzzaman' ?></strong>
            <small><?= lang() === 'bn' ? 'জনসেবা ও গণসংযোগ' : 'Public service & outreach' ?></small>
        </span>
    </a>
    <button class="menu-toggle hover:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/40" type="button" data-menu-toggle aria-expanded="false" aria-controls="site-menu">
        <i></i><i></i><i></i>
        <b>Menu</b>
    </button>
    <nav class="site-nav" id="site-menu" data-menu>
        <a class="<?= active_page('index.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'index.php')) ?>"><?= h(t('home')) ?></a>
        <a class="<?= active_page('about.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'about.php')) ?>"><?= h(t('about')) ?></a>
        <a class="<?= active_page('dinajpur.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'dinajpur.php')) ?>"><?= h(t('dinajpur')) ?></a>
        <a class="<?= active_page('reform.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'reform.php')) ?>"><?= h(t('reform')) ?></a>
        <a class="<?= active_page('media.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'media.php')) ?>"><?= h(t('media')) ?></a>
        <a class="<?= active_page('legal-advice.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'legal-advice.php')) ?>"><?= h(t('legal_advice')) ?></a>
        <a class="service-link <?= active_page('services.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'services.php')) ?>"><span class="material-symbols-outlined" aria-hidden="true">support_agent</span><?= h(t('services')) ?></a>
        <a class="lang-link" data-lang href="<?= h(language_url(lang() === 'bn' ? 'en' : 'bn')) ?>"><span class="material-symbols-outlined" aria-hidden="true">language</span><?= h(t('language')) ?></a>
    </nav>
</header>
