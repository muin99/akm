<?php
require __DIR__ . '/includes/bootstrap.php';

$areaKey = preg_replace('/[^a-z0-9-]/', '', (string) ($_GET['area'] ?? ''));
$area = collection('area_profiles')[$areaKey] ?? null;

if (!$area) {
    http_response_code(404);
    $pageTitle = lang() === 'bn' ? 'এলাকা পাওয়া যায়নি' : 'Area not found';
    require __DIR__ . '/includes/header.php';
    ?>
    <main id="main"><section class="page-hero"><span class="eyebrow">404</span><h1><?= h($pageTitle) ?></h1></section></main>
    <?php require __DIR__ . '/includes/footer.php'; exit;
}

$copy = $area[lang()] ?? $area['en'];
$pageTitle = $copy['name'];
$metaDescription = $copy['intro'];
$hero = [
    'eyebrow' => t('dinajpur'),
    'title' => $copy['title'],
    'intro' => $copy['intro'],
    'image' => $area['image'],
    'image_alt' => $copy['name'],
    'actions' => [
        ['url' => page_url('complaint.php?service=development'), 'label' => lang() === 'bn' ? 'উন্নয়ন প্রস্তাব দিন' : 'Submit proposal', 'icon' => 'clipboard-plus', 'class' => 'button'],
        ['url' => page_url('dinajpur.php#tracks'), 'label' => lang() === 'bn' ? 'সব উন্নয়ন ট্র্যাক' : 'All development tracks', 'icon' => 'map', 'class' => 'ghost-button'],
    ],
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/includes/page-hero.php'; ?>

    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'দ্রুত স্থানীয় তথ্য' : 'Local facts at a glance' ?></h2><p><?= h($copy['source']) ?></p></div>
        <div class="grid-3">
            <?php foreach ($copy['facts'] as $fact): ?>
                <article class="premium-card stat-card" data-reveal><span><?= h($fact['label']) ?></span><h3><?= h($fact['value']) ?></h3><p><?= h($fact['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>

    <section class="section paper-band"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'পৌরসভা ও ইউনিয়ন' : 'Municipality and unions' ?></h2><p><?= lang() === 'bn' ? 'প্রতিটি ইউনিটের জন্য রাস্তা, শিক্ষা, স্বাস্থ্য, প্রকল্প, খেলাধুলা, নারীর উন্নয়ন এবং নাগরিক প্রস্তাব আলাদাভাবে সংগ্রহ করা যাবে।' : 'Each unit can collect roads, education, health, project, sports, women development, and citizen proposal updates separately.' ?></p></div>
        <div class="tag-cloud track-cloud">
            <?php foreach ($copy['units'] as $unit): ?><a href="<?= h(page_url('complaint.php?service=development')) ?>"><?= h($unit) ?></a><?php endforeach; ?>
        </div>
    </div></section>

    <section class="section"><div class="page-shell">
        <div class="section-head"><h2><?= lang() === 'bn' ? 'প্রধান উন্নয়ন অগ্রাধিকার' : 'Main development priorities' ?></h2><p><?= lang() === 'bn' ? 'এই অগ্রাধিকারগুলো মাঠপর্যায়ের সফর, বৈঠক, সমাধানকৃত সমস্যা এবং আগাম কর্মসূচির সঙ্গে যুক্ত করা যাবে।' : 'These priorities can connect to field visits, meetings, solved issues, and upcoming programs.' ?></p></div>
        <div class="grid-3">
            <?php foreach ($copy['priorities'] as $index => $priority): ?>
                <article class="priority agenda-card" data-reveal><span><?= sprintf('%02d', $index + 1) ?></span><b><?= h($priority['title']) ?></b><p><?= h($priority['text']) ?></p></article>
            <?php endforeach; ?>
        </div>
    </div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
