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
    <script>
        window.tailwind = window.tailwind || {};
        tailwind.config = {
            corePlugins: { preflight: false },
            theme: {
                extend: {
                    colors: {
                        campaign: {
                            navy: '#07162f',
                            blue: '#1d4f91',
                            red: '#c91f32',
                            gold: '#c79a3c',
                            paper: '#f7f8fb'
                        }
                    },
                    fontFamily: {
                        display: ['Inter', 'Hind Siliguri', 'system-ui', 'sans-serif'],
                        bangla: ['Hind Siliguri', 'Inter', 'system-ui', 'sans-serif']
                    },
                    boxShadow: {
                        campaign: '0 24px 70px rgba(7, 22, 47, .16)'
                    }
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= h(($assetPrefix ?? '') . 'assets/css/site.css') ?>">
</head>
<body class="bg-campaign-paper text-slate-950 antialiased">
<a class="skip-link focus:rounded-md" href="#main"><?= h(t('skip')) ?></a>
<header class="site-header shadow-2xl shadow-slate-950/20" data-header>
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
        <a class="service-link <?= active_page('services.php') ?>" href="<?= h(page_url(($pathPrefix ?? '') . 'services.php')) ?>"><i data-lucide="heart-handshake" aria-hidden="true"></i><?= h(t('services')) ?></a>
        <a class="lang-link" data-lang href="<?= h(language_url(lang() === 'bn' ? 'en' : 'bn')) ?>"><i data-lucide="globe-2" aria-hidden="true"></i><?= h(t('language')) ?></a>
    </nav>
</header>
