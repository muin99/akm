<?php
require __DIR__ . '/../includes/bootstrap.php';
require __DIR__ . '/../includes/submissions.php';
require_admin();

$statement = db()?->prepare('SELECT original_name, stored_name, mime_type FROM submission_files WHERE id = :id LIMIT 1');
$statement?->execute(['id' => (int) ($_GET['id'] ?? 0)]);
$file = $statement?->fetch();
$path = $file ? app_config('uploads')['dir'] . '/' . $file['stored_name'] : '';
if (!$file || !is_file($path)) {
    http_response_code(404);
    exit('File not found.');
}
header('Content-Type: ' . $file['mime_type']);
header('Content-Disposition: inline; filename="' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file['original_name']) . '"');
header('X-Content-Type-Options: nosniff');
readfile($path);
