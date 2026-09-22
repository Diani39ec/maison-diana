<?php
// AURELIA · Panel admin · © Diana Trujillo. Uso: admin/?key=diana2026
declare(strict_types=1);
require __DIR__ . '/../config.php';

if (($_GET['key'] ?? '') !== ADMIN_KEY) {
  http_response_code(403);
  exit('⛔ Acceso denegado.');
}
if (isset($_POST['id'], $_POST['estado']) && in_array($_POST['estado'], ['nuevo', 'confirmado', 'enviado'], true)) {
  db()->prepare('UPDATE pedidos SET estado = ? WHERE id = ?')->execute([$_POST['estado'], (int)$_POST['id']]);
}
$ped = db()->query('SELECT * FROM pedidos ORDER BY id DESC')->fetchAll();
$sub = db()->query('SELECT * FROM newsletter ORDER BY id DESC LIMIT 50')->fetchAll();
$total = array_sum(array_column($ped, 'total'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin · <?= SITE_NAME ?> · Diana Trujillo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{background:#faf7f0;color:#4a3a28}.table{--bs-table-bg:#fffdf7;--bs-table-color:#4a3a28}.card{background:#fffdf7;border:1px solid #ddd0b6;color:#4a3a28}a{color:#1e5b44}</style>
</head>
<body>
<div class="container py-4">
  <h1>👑 Admin · AURELIA</h1>
  <p>Por Diana Trujillo</p>
  <div class="d-flex gap-3 mb-4">
    <div class="card p-3">🧾 Pedidos: <strong><?= count($ped) ?></strong></div>
    <div class="card p-3">💰 Vendido: <strong>$<?= number_format($total, 2) ?></strong></div>
    <div class="card p-3">💌 Suscriptoras: <strong><?= count($sub) ?></strong></div>
  </div>
  <h2>Pedidos</h2>
  <div class="table-responsive"><table class="table">
    <thead><tr><th>#</th><th>Clienta</th><th>WhatsApp</th><th>Items</th><th>Total</th><th>Fecha</th><th>Estado</th><th></th></tr></thead>
    <tbody>
    <?php foreach ($ped as $r): ?>
      <tr>
        <td><?= (int)$r['id'] ?></td>
        <td><?= htmlspecialchars($r['nombre']) ?></td>
        <td><a target="_blank" href="https://wa.me/?text=<?= urlencode('Hola '.$r['nombre'].', te escribe AURELIA ✨') ?>"><?= htmlspecialchars($r['telefono']) ?></a></td>
        <td><small><?= htmlspecialchars(mb_substr($r['items'], 0, 120)) ?></small></td>
        <td><strong>$<?= number_format((float)$r['total'], 2) ?></strong></td>
        <td><?= htmlspecialchars($r['created_at']) ?></td>
        <td><?= htmlspecialchars($r['estado']) ?></td>
        <td><form method="POST" class="d-flex gap-1">
          <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
          <select name="estado" class="form-select form-select-sm"><?php foreach (['nuevo','confirmado','enviado'] as $e): ?><option <?= $e===$r['estado']?'selected':'' ?>><?= $e ?></option><?php endforeach; ?></select>
          <button class="btn btn-sm btn-success">💾</button>
        </form></td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$ped) echo '<tr><td colspan="8">Sin pedidos todavía.</td></tr>'; ?>
    </tbody>
  </table></div>
  <h2 class="mt-4">Newsletter</h2>
  <p><?= implode(' · ', array_map(fn($s) => htmlspecialchars($s['email']), $sub)) ?: 'Sin suscriptoras.' ?></p>
  <p><a href="../">← Volver a la tienda</a></p>
</div>
</body>
</html>
