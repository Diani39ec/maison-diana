<?php
// AURELIA · Suscripción newsletter (POST → JSON) · © Diana Trujillo
declare(strict_types=1);
require __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
  exit;
}

$email = clean($_POST['email'] ?? '', 150);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(422);
  echo json_encode(['ok' => false, 'msg' => 'Escribe un correo válido.']);
  exit;
}

try {
  $st = db()->prepare('INSERT IGNORE INTO newsletter (email) VALUES (?)');
  $st->execute([$email]);
  echo json_encode(['ok' => true, 'msg' => '✨ Bienvenida al club: 15% OFF en tu primera compra. Revisa tu correo.']);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'msg' => 'No se pudo registrar.']);
}
