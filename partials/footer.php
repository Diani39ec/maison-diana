<?php // AURELIA · Pie · © Diana Trujillo ?>
<footer>
  <div class="foot-grid">
    <div><h4>AURELIA</h4><p>Elegance · Urban · Artesanal.<br>Envíos a todo Ecuador y el mundo.</p></div>
    <div><h4>Club Diana</h4><p>15% OFF en tu primera compra al suscribirte.</p></div>
    <div><h4>Contacto</h4><p>WhatsApp · Instagram · TikTok<br>Quito · Guayaquil · Cuenca</p></div>
  </div>
  <p class="fotos">Fotos: Unsplash (licencia de uso libre).</p>
  <p>© 2026 AURELIA · Casa de Moda · Creado por <strong>Diana Trujillo</strong> ✨</p>
</footer>

<aside id="drawer" aria-label="Carrito de compras">
  <div class="drawer-head"><h3>👜 Tu carrito</h3><button id="btn-close" aria-label="Cerrar carrito">✕</button></div>
  <div id="drawer-items"></div>
  <div class="drawer-foot">
    <p>Total: <strong id="drawer-total">$0.00</strong></p>
    <button id="btn-checkout" class="btn gold big">Finalizar compra ✨</button>
  </div>
</aside>

<div id="modal" class="modal-bg" role="dialog" aria-label="Finalizar pedido">
  <form id="form-pedido" class="modal-card" action="pedido.php" method="POST">
    <h3>✨ Casi tuyo…</h3>
    <label>Nombre:<input id="p-nombre" name="nombre" required placeholder="Tu nombre" autocomplete="name"></label>
    <label>WhatsApp:<input id="p-tel" name="tel" required placeholder="+593 ..." autocomplete="tel"></label>
    <input type="hidden" id="p-items" name="items">
    <input type="hidden" id="p-total" name="total">
    <button class="btn gold big" type="submit">Confirmar pedido 💎</button>
    <button type="button" id="btn-cancel" class="btn ghost">Seguir viendo</button>
    <p id="ped-ok" role="status"></p>
  </form>
</div>

<div id="toast" role="status"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>
</body>
</html>
