<?php
declare(strict_types=1);

return [
    'site_name' => 'Barrister AKM Kamruzzaman',
    'base_path' => '',
    'db' => [
        'host' => getenv('KM_DB_HOST') ?: '127.0.0.1',
        'port' => getenv('KM_DB_PORT') ?: '3306',
        'name' => getenv('KM_DB_NAME') ?: 'kamruzzaman_site',
        'user' => getenv('KM_DB_USER') ?: 'root',
        'pass' => getenv('KM_DB_PASS') ?: '',
    ],
    'uploads' => [
        'dir' => __DIR__ . '/storage/uploads',
        'max_bytes' => 5 * 1024 * 1024,
        'mimes' => [
            'application/pdf' => 'pdf',
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ],
    ],
];
