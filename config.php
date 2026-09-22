<?php
// AURELIA · © Diana Trujillo — Configuración central
declare(strict_types=1);

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'maison_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('ADMIN_KEY', 'diana2026');
define('SITE_NAME', 'AURELIA');

function db(): PDO {
  static $pdo = null;
  if ($pdo === null) {
    $pdo = new PDO(
      'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',
      DB_USER, DB_PASS,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
  }
  return $pdo;
}

function clean(string $v, int $max = 120): string {
  return mb_substr(trim(strip_tags($v)), 0, $max);
}
