<?php
// Define protocol and domain
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'];
$folderPath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Define global variables
define('BASE_URL', $protocol . "://" . $domain . $folderPath);


define('_VALID_PHP', true);

// Конфигурация за връзка с базата данни
define('DB_HOST', 'localhost');
define('DB_NAME', 'speedy');
define('DB_USER', 'root'); // Променете, ако използвате друг потребител
define('DB_PASS', ''); // Използвайте силна парола


// Опит за връзка с базата данни
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}