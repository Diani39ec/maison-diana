<?php
// MAISON DIANA · Guarda pedido del carrito (POST → JSON) · © Diana Trujillo
declare(strict_types=1);
require __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
  exit;
}

$nombre = clean($_POST['nombre'] ?? '');
$tel    = clean($_POST['tel'] ?? '', 40);
$items  = clean($_POST['items'] ?? '', 2000);
$total  = (float)($_POST['total'] ?? 0);

if (mb_strlen($nombre) < 2 || mb_strlen($tel) < 6 || $total <= 0 || $items === '') {
  http_response_code(422);
  echo json_encode(['ok' => false, 'msg' => 'Datos incompletos del pedido.']);
  exit;
}

try {
  $st = db()->prepare('INSERT INTO pedidos (nombre, telefono, items, total) VALUES (?,?,?,?)');
  $st->execute([$nombre, $tel, $items, $total]);
  $id = (int)db()->lastInsertId();
  echo json_encode(['ok' => true, 'msg' => "¡Gracias $nombre! Tu pedido #$id por $$total quedó registrado. Te escribiremos al $tel. ✨"], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'msg' => 'No se pudo guardar. Inténtalo de nuevo.']);
}
