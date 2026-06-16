<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$config = require __DIR__ . '/../config.php';
$content = require __DIR__ . '/content.php';

function app_config(?string $key = null)
{
    global $config;

    if ($key === null) {
        return $config;
    }

    return $config[$key] ?? null;
}

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function lang(): string
{
    $requested = $_GET['lang'] ?? $_POST['lang'] ?? $_COOKIE['km_lang'] ?? 'bn';
    return $requested === 'en' ? 'en' : 'bn';
}

function t(string $key): string
{
    global $content;
    $copy = $content['ui'][lang()] ?? [];

    return $copy[$key] ?? $content['ui']['en'][$key] ?? $key;
}

function collection(string $key): array
{
    global $content;
    return $content[$key] ?? [];
}

function page_copy(string $page): array
{
    global $content;
    return $content['pages'][$page][lang()] ?? $content['pages'][$page]['en'] ?? [];
}

function language_url(string $target): string
{
    $params = $_GET;
    $params['lang'] = $target;
    $path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/';

    return $path . '?' . http_build_query($params);
}

function page_url(string $path): string
{
    $separator = str_contains($path, '?') ? '&' : '?';
    return $path . $separator . 'lang=' . rawurlencode(lang());
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
    }

    return $_SESSION['csrf_token'];
}

function csrf_valid(?string $token): bool
{
    return isset($_SESSION['csrf_token']) && is_string($token) && hash_equals($_SESSION['csrf_token'], $token);
}

function db(): ?PDO
{
    static $pdo = null;
    static $attempted = false;

    if ($pdo instanceof PDO || $attempted) {
        return $pdo;
    }

    $attempted = true;
    $db = app_config('db');

    try {
        $pdo = new PDO(
            sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $db['host'], $db['port'], $db['name']),
            $db['user'],
            $db['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    } catch (PDOException $exception) {
        $pdo = null;
    }

    return $pdo;
}

function db_ready(): bool
{
    return db() instanceof PDO;
}

function flash(string $key, ?array $value = null): ?array
{
    if ($value !== null) {
        $_SESSION['flash'][$key] = $value;
        return null;
    }

    $stored = $_SESSION['flash'][$key] ?? null;
    unset($_SESSION['flash'][$key]);

    return is_array($stored) ? $stored : null;
}

function status_label(string $status): string
{
    $labels = collection('status_labels');
    return $labels[lang()][$status] ?? ucfirst(str_replace('_', ' ', $status));
}

function active_page(string $page): string
{
    $current = basename($_SERVER['PHP_SELF'] ?? '');
    return $current === $page ? 'is-active' : '';
}

function external_attrs(): string
{
    return ' target="_blank" rel="noopener noreferrer"';
}
