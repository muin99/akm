<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/submissions.php';
$type = 'question';
$labels = service_labels($type);
$pageTitle = $labels['title'];
$hero = ['eyebrow' => t('public_service'), 'title' => $labels['title'], 'intro' => lang() === 'bn' ? 'আইনি বা জনস্বার্থ প্রশ্ন পাঠান; জরুরি আইনি সহায়তার বিকল্প হিসেবে এই ফর্ম ব্যবহার করবেন না।' : 'Send a legal or public-interest question; this form is not emergency legal help.'];
require __DIR__ . '/includes/header.php';
?>
<main id="main"><?php require __DIR__ . '/includes/page-hero.php'; ?><?php require __DIR__ . '/includes/service-form.php'; ?></main>
<?php require __DIR__ . '/includes/footer.php'; ?>
