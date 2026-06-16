<?php
$pageTitle = $pageTitle ?? app_config('site_name');
$metaDescription = $metaDescription ?? 'Bangla-first public website for Barrister AKM Kamruzzaman.';
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$currentSlug = (string) ($_GET['slug'] ?? '');
$navGroups = [
    [
        'label' => t('about'),
        'icon' => 'user-round',
        'pages' => ['about.php'],
        'slugs' => ['education', 'experience', 'legal-success', 'social-work', 'political-philosophy', 'vision'],
        'items' => [
            ['topic.php?slug=education', lang() === 'bn' ? 'শিক্ষাগত যোগ্যতা' : 'Education'],
            ['topic.php?slug=experience', lang() === 'bn' ? 'পেশাগত অভিজ্ঞতা' : 'Experience'],
            ['topic.php?slug=legal-success', lang() === 'bn' ? 'আইনি সাফল্য ও বিশেষায়ন' : 'Legal success'],
            ['topic.php?slug=social-work', lang() === 'bn' ? 'সামাজিক ও মানবিক কার্যক্রম' : 'Social work'],
            ['topic.php?slug=political-philosophy', lang() === 'bn' ? 'রাজনৈতিক দর্শন' : 'Political philosophy'],
            ['topic.php?slug=vision', lang() === 'bn' ? 'ভিশন ও প্রতিশ্রুতি' : 'Vision'],
        ],
    ],
    [
        'label' => t('services'),
        'icon' => 'heart-handshake',
        'pages' => ['services.php', 'complaint.php', 'help.php', 'tracking.php'],
        'slugs' => ['land-help', 'education-help', 'medical-help', 'confidential-advice'],
        'items' => [
            ['complaint.php', lang() === 'bn' ? 'নাগরিক অভিযোগ জমা' : 'Submit complaint'],
            ['topic.php?slug=land-help', lang() === 'bn' ? 'ভূমি ও আইনি সহায়তা' : 'Land/legal help'],
            ['topic.php?slug=education-help', lang() === 'bn' ? 'শিক্ষা সহায়তা আবেদন' : 'Education help'],
            ['topic.php?slug=medical-help', lang() === 'bn' ? 'চিকিৎসা সহায়তা আবেদন' : 'Medical help'],
            ['topic.php?slug=confidential-advice', lang() === 'bn' ? 'গোপনীয় পরামর্শ ফর্ম' : 'Confidential advice'],
            ['tracking.php', lang() === 'bn' ? 'অগ্রগতি ট্র্যাকিং' : 'Progress tracking'],
        ],
    ],
    [
        'label' => t('dinajpur'),
        'icon' => 'map',
        'pages' => ['dinajpur.php', 'oversight.php', 'area.php'],
        'items' => [
            ['area.php?area=parbatipur', lang() === 'bn' ? 'পার্বতীপুর' : 'Parbatipur'],
            ['area.php?area=fulbari', lang() === 'bn' ? 'ফুলবাড়ী' : 'Phulbari'],
            ['dinajpur.php#tracks', lang() === 'bn' ? 'উন্নয়ন পর্যবেক্ষণ' : 'Development tracks'],
            ['oversight.php', t('oversight')],
            ['complaint.php?service=development', lang() === 'bn' ? 'উন্নয়ন প্রস্তাব জমা' : 'Submit proposal'],
        ],
    ],
    [
        'label' => lang() === 'bn' ? 'নীতি ও আইন' : 'Policy & Law',
        'icon' => 'scale',
        'pages' => ['reform.php', 'legal-advice.php', 'faq.php'],
        'slugs' => ['political-philosophy', 'citizen-rights', 'land-law', 'family-law', 'criminal-law'],
        'items' => [
            ['reform.php', lang() === 'bn' ? 'তারেক রহমানের ৩১ দফা' : 'Tarique Rahman’s 31 points'],
            ['topic.php?slug=citizen-rights', lang() === 'bn' ? 'নাগরিক অধিকার' : 'Citizen rights'],
            ['topic.php?slug=land-law', lang() === 'bn' ? 'জমি/ভূমি সংক্রান্ত' : 'Land issues'],
            ['topic.php?slug=family-law', lang() === 'bn' ? 'পারিবারিক আইন' : 'Family law'],
            ['topic.php?slug=criminal-law', lang() === 'bn' ? 'ফৌজদারি আইন' : 'Criminal law'],
            ['faq.php', lang() === 'bn' ? 'প্রশ্নোত্তর পর্ব' : 'Q&A'],
        ],
    ],
    [
        'label' => lang() === 'bn' ? 'মিডিয়া ও সংলাপ' : 'Media & Dialogue',
        'icon' => 'radio',
        'pages' => ['media.php', 'dialogue.php'],
        'slugs' => ['press-release', 'tv-interviews', 'columns-articles', 'video-gallery'],
        'items' => [
            ['topic.php?slug=press-release', lang() === 'bn' ? 'সংবাদ বিজ্ঞপ্তি' : 'Press releases'],
            ['topic.php?slug=tv-interviews', lang() === 'bn' ? 'টিভি সাক্ষাৎকার' : 'TV interviews'],
            ['topic.php?slug=columns-articles', lang() === 'bn' ? 'কলাম ও প্রবন্ধ' : 'Columns/articles'],
            ['topic.php?slug=video-gallery', lang() === 'bn' ? 'ভিডিও গ্যালারি' : 'Video gallery'],
            ['dialogue.php', t('dialogue')],
        ],
    ],
    [
        'label' => lang() === 'bn' ? 'প্ল্যাটফর্ম' : 'Platforms',
        'icon' => 'users-round',
        'pages' => ['youth.php', 'social-support.php', 'survey.php', 'contact.php'],
        'items' => [
            ['youth.php', t('youth')],
            ['social-support.php', t('social_support')],
            ['survey.php', t('survey')],
            ['contact.php', t('contact')],
        ],
    ],
];
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
        <?php foreach ($navGroups as $group): $active = in_array($currentPage, $group['pages'], true) || ($currentPage === 'topic.php' && in_array($currentSlug, $group['slugs'] ?? [], true)); ?>
            <div class="nav-item <?= $active ? 'is-active' : '' ?>">
                <button class="nav-trigger" type="button" data-submenu-toggle aria-expanded="false">
                    <i data-lucide="<?= h($group['icon']) ?>" aria-hidden="true"></i><?= h($group['label']) ?>
                    <i data-lucide="chevron-down" aria-hidden="true"></i>
                </button>
                <div class="submenu">
                    <?php foreach ($group['items'] as [$url, $label]): ?>
                        <a href="<?= h(page_url(($pathPrefix ?? '') . $url)) ?>"><?= h($label) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <a class="lang-link" data-lang href="<?= h(language_url(lang() === 'bn' ? 'en' : 'bn')) ?>"><i data-lucide="globe-2" aria-hidden="true"></i><?= h(t('language')) ?></a>
    </nav>
</header>
