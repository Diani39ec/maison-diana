<?php
// MAISON DIANA · API JSON de productos · © Diana Trujillo
declare(strict_types=1);
require __DIR__ . '/../config.php';
header('Content-Type: application/json; charset=utf-8');
try {
  $rows = db()->query('SELECT id, nombre, categoria, precio, foto_url, foto_alt FROM productos ORDER BY destacado DESC, id ASC')->fetchAll();
  echo json_encode(['ok' => true, 'productos' => $rows], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'msg' => 'BD no disponible'], JSON_UNESCAPED_UNICODE);
}
