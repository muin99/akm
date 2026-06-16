<?php
declare(strict_types=1);

const SUBMISSION_TYPES = ['complaint', 'help', 'question'];
const SUBMISSION_STATUSES = ['received', 'reviewing', 'in_progress', 'resolved', 'closed'];

function service_labels(string $type): array
{
    $copy = [
        'bn' => [
            'complaint' => ['title' => 'অভিযোগ জমা দিন', 'subject' => 'অভিযোগের বিষয়', 'details' => 'অভিযোগের বিবরণ'],
            'help' => ['title' => 'সহায়তা আবেদন', 'subject' => 'কী সহায়তা প্রয়োজন', 'details' => 'প্রয়োজন ও প্রেক্ষাপট'],
            'question' => ['title' => 'আইনি বা জনস্বার্থ প্রশ্ন', 'subject' => 'প্রশ্নের বিষয়', 'details' => 'প্রশ্নটি লিখুন'],
        ],
        'en' => [
            'complaint' => ['title' => 'Submit a complaint', 'subject' => 'Complaint subject', 'details' => 'Complaint details'],
            'help' => ['title' => 'Request help', 'subject' => 'Help needed', 'details' => 'Need and context'],
            'question' => ['title' => 'Legal or public question', 'subject' => 'Question subject', 'details' => 'Write your question'],
        ],
    ];

    return $copy[lang()][$type] ?? $copy['en']['complaint'];
}

function tracking_code(): string
{
    return 'AKM-' . date('ym') . '-' . strtoupper(bin2hex(random_bytes(3)));
}

function clean_post(string $key): string
{
    return trim((string) ($_POST[$key] ?? ''));
}

function submission_errors(string $type): array
{
    $errors = [];
    $name = clean_post('name');
    $phone = clean_post('phone');
    $upazila = clean_post('upazila');
    $subject = clean_post('subject');
    $message = clean_post('message');
    $category = clean_post('category');

    if (!in_array($type, SUBMISSION_TYPES, true)) {
        $errors[] = lang() === 'bn' ? 'সেবার ধরনটি সঠিক নয়।' : 'The request type is invalid.';
    }
    if (!csrf_valid($_POST['csrf'] ?? null)) {
        $errors[] = lang() === 'bn' ? 'ফর্ম সেশন শেষ হয়েছে। আবার চেষ্টা করুন।' : 'The form session expired. Please try again.';
    }
    if (mb_strlen($name) < 2 || mb_strlen($name) > 140) {
        $errors[] = lang() === 'bn' ? 'নাম ২ থেকে ১৪০ অক্ষরের মধ্যে দিন।' : 'Enter a name between 2 and 140 characters.';
    }
    if (!preg_match('/^[+0-9 ()-]{7,24}$/', $phone)) {
        $errors[] = lang() === 'bn' ? 'একটি কার্যকর ফোন নম্বর দিন।' : 'Enter a usable phone number.';
    }
    if (!in_array($upazila, ['Phulbari', 'Parbatipur', 'Other'], true)) {
        $errors[] = lang() === 'bn' ? 'এলাকা নির্বাচন করুন।' : 'Choose an area.';
    }
    if (mb_strlen($subject) < 4 || mb_strlen($subject) > 180) {
        $errors[] = lang() === 'bn' ? 'বিষয় ৪ থেকে ১৮০ অক্ষরের মধ্যে দিন।' : 'Enter a subject between 4 and 180 characters.';
    }
    if (mb_strlen($category) < 2 || mb_strlen($category) > 120) {
        $errors[] = lang() === 'bn' ? 'সেবার ধরন নির্বাচন করুন।' : 'Choose a service category.';
    }
    if (mb_strlen($message) < 20 || mb_strlen($message) > 5000) {
        $errors[] = lang() === 'bn' ? 'বিবরণ ২০ থেকে ৫০০০ অক্ষরের মধ্যে দিন।' : 'Enter details between 20 and 5000 characters.';
    }
    if (($email = clean_post('email')) !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = lang() === 'bn' ? 'ইমেইল ঠিকানাটি সঠিক নয়।' : 'The email address is invalid.';
    }

    return $errors;
}

function store_submission(string $type): array
{
    $pdo = db();
    if (!$pdo instanceof PDO) {
        throw new RuntimeException('Database unavailable.');
    }

    $pdo->beginTransaction();
    try {
        $code = tracking_code();
        $statement = $pdo->prepare(
            'INSERT INTO submissions
            (tracking_code, type, status, name, phone, email, nid, upazila, address, subject, message)
            VALUES (:tracking_code, :type, :status, :name, :phone, :email, :nid, :upazila, :address, :subject, :message)'
        );
        $statement->execute([
            'tracking_code' => $code,
            'type' => $type,
            'status' => 'received',
            'name' => clean_post('name'),
            'phone' => clean_post('phone'),
            'email' => clean_post('email') ?: null,
            'nid' => clean_post('nid') ?: null,
            'upazila' => clean_post('upazila'),
            'address' => clean_post('address') ?: null,
            'subject' => mb_substr('[' . clean_post('category') . '] ' . clean_post('subject'), 0, 180),
            'message' => "Category: " . clean_post('category') . "\n\n" . clean_post('message'),
        ]);
        $submissionId = (int) $pdo->lastInsertId();
        store_upload($pdo, $submissionId);
        $history = $pdo->prepare(
            'INSERT INTO submission_status_history
            (submission_id, old_status, new_status, public_note, internal_note, changed_by)
            VALUES (:submission_id, NULL, :new_status, NULL, :internal_note, NULL)'
        );
        $history->execute([
            'submission_id' => $submissionId,
            'new_status' => 'received',
            'internal_note' => 'Initial citizen submission.',
        ]);
        $pdo->commit();

        return ['id' => $submissionId, 'tracking_code' => $code];
    } catch (Throwable $exception) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        throw $exception;
    }
}

function store_upload(PDO $pdo, int $submissionId): void
{
    $file = $_FILES['attachment'] ?? null;
    if (!is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return;
    }
    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK || ($file['size'] ?? 0) > app_config('uploads')['max_bytes']) {
        throw new RuntimeException(lang() === 'bn' ? 'ফাইল আপলোড করা যায়নি বা ফাইলটি বড়।' : 'The upload failed or the file is too large.');
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    $mimes = app_config('uploads')['mimes'];
    if (!is_string($mime) || !isset($mimes[$mime])) {
        throw new RuntimeException(lang() === 'bn' ? 'PDF, JPG, PNG অথবা WEBP ফাইল দিন।' : 'Upload a PDF, JPG, PNG, or WEBP file.');
    }
    $directory = app_config('uploads')['dir'];
    if (!is_dir($directory) && !mkdir($directory, 0750, true) && !is_dir($directory)) {
        throw new RuntimeException('Upload directory unavailable.');
    }
    $storedName = bin2hex(random_bytes(18)) . '.' . $mimes[$mime];
    if (!move_uploaded_file($file['tmp_name'], $directory . '/' . $storedName)) {
        throw new RuntimeException(lang() === 'bn' ? 'ফাইল সংরক্ষণ করা যায়নি।' : 'The file could not be stored.');
    }
    $statement = $pdo->prepare(
        'INSERT INTO submission_files (submission_id, original_name, stored_name, mime_type, file_size)
        VALUES (:submission_id, :original_name, :stored_name, :mime_type, :file_size)'
    );
    $statement->execute([
        'submission_id' => $submissionId,
        'original_name' => mb_substr((string) $file['name'], 0, 255),
        'stored_name' => $storedName,
        'mime_type' => $mime,
        'file_size' => (int) $file['size'],
    ]);
}

function admin_logged_in(): bool
{
    return !empty($_SESSION['admin_id']);
}

function require_admin(): void
{
    if (!admin_logged_in()) {
        header('Location: index.php?login=1&lang=' . rawurlencode(lang()));
        exit;
    }
}
