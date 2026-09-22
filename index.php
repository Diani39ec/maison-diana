<?php // AURELIA · Portada · © Diana Trujillo ?>
<?php require __DIR__ . '/partials/header.php'; ?>

<main id="top">
  <!-- HERO con imagen en movimiento -->
  <section class="hero">
    <div class="hero-bg"><img id="hero-img" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1600&auto=format&fit=crop" alt="Modelo con abrigo y bolsas de compra" fetchpriority="high"
      onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1600&auto=format&fit=crop'"></div>
    <div class="hero-veil"></div>
    <div class="hero-txt">
      <p class="eyebrow">✨ Nueva colección 2026</p>
      <h1>VÍSTETE<br><span class="luxe-t">COMO REINA</span></h1>
      <p class="lead">Elegance, Urban y Artesanal. Prendas que no se compran: <strong>se heredan</strong>.</p>
      <div class="cta-row">
        <a href="#coleccion" class="btn solid big">Ver colección 👑</a>
        <a href="#lookbook" class="btn ghost big">Lookbook</a>
      </div>
      <div class="stats">
        <div><strong><span class="count" data-n="2500">0</span>+</strong><small>clientas felices</small></div>
        <div><strong><span class="count" data-n="120">0</span>+</strong><small>diseños exclusivos</small></div>
        <div><strong>4.9★</strong><small>calificación</small></div>
      </div>
    </div>
    <a class="scroll" href="#coleccion" aria-label="Bajar a la colección">⌄</a>
  </section>

  <!-- COLECCIÓN (desde api/productos.php) -->
  <section id="coleccion" class="sec">
    <p class="eyebrow">La colección</p>
    <h2>Piezas que <span class="luxe-t">enamoran</span></h2>
    <div class="filters" role="group" aria-label="Filtrar por estilo">
      <button class="chip active" data-f="all">Todo</button>
      <button class="chip" data-f="elegance">👑 Elegance</button>
      <button class="chip" data-f="urban">🌆 Urban</button>
      <button class="chip" data-f="artesanal">🧶 Artesanal</button>
    </div>
    <div class="grid" id="grid"><p>Cargando piezas… ✨</p></div>
  </section>

  <!-- LOOKBOOK en movimiento -->
  <section id="lookbook" class="sec alt">
    <p class="eyebrow">Lookbook en movimiento</p>
    <h2>Así se lleva <span class="luxe-t">este año</span></h2>
    <div class="look"><div class="look-track" id="look-track">
      <figure><img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop" alt="Editorial con pared amarilla" loading="lazy"><figcaption>Riviera Pop 💛</figcaption></figure>
      <figure><img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?q=80&w=800&auto=format&fit=crop" alt="Look urbano con gafas" loading="lazy"><figcaption>Street Chic 🕶️</figcaption></figure>
      <figure><img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=800&auto=format&fit=crop" alt="Conjunto amarillo" loading="lazy"><figcaption>Urban Sol 💛</figcaption></figure>
      <figure><img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=800&auto=format&fit=crop" alt="Abrigo elegante en Milán" loading="lazy"><figcaption>Milano Blue 💙</figcaption></figure>
      <figure><img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop" alt="Editorial con pared amarilla" loading="lazy"><figcaption>Riviera Pop 💛</figcaption></figure>
      <figure><img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?q=80&w=800&auto=format&fit=crop" alt="Look urbano con gafas" loading="lazy"><figcaption>Street Chic 🕶️</figcaption></figure>
    </div></div>
  </section>

  <!-- BOUTIQUE -->
  <section id="boutique" class="sec">
    <div class="bout-grid">
      <div class="bout-img"><img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1000&auto=format&fit=crop" alt="Interior de la boutique" loading="lazy"><span class="shine"></span></div>
      <div>
        <p class="eyebrow">Nuestra boutique</p>
        <h2>Lujo con <span class="luxe-t">alma ecuatoriana</span> 🇪🇨</h2>
        <ul class="lujo">
          <li>🧵 <strong>Hecho a mano:</strong> artesanas de Otavalo y Cuenca en cada pieza artesanal.</li>
          <li>📦 <strong>Envío gratis</strong> desde $100 a todo el país y el mundo.</li>
          <li>💎 <strong>Garantía total:</strong> cambio de talla gratis por 30 días.</li>
        </ul>
        <a href="#coleccion" class="btn solid">Quiero ver más 💫</a>
      </div>
    </div>
  </section>

  <!-- OPINIONES -->
  <section id="opiniones" class="sec alt">
    <p class="eyebrow">Opiniones</p>
    <h2>Lo que dicen <span class="luxe-t">ellas</span></h2>
    <div class="slider">
      <blockquote class="slide active">“El abrigo Milano es de otro nivel. Me preguntan en cada evento dónde lo compré.”<cite>— Carolina V., Quito</cite></blockquote>
      <blockquote class="slide">“Pedí el lunes y el miércoles ya lo lucía. El empaque es un regalo en sí.”<cite>— Daniela R., Guayaquil</cite></blockquote>
      <blockquote class="slide">“El poncho artesanal es arte que se viste. Se nota la mano ecuatoriana.”<cite>— Sofía M., Cuenca</cite></blockquote>
      <div class="dots"><button class="dot active" aria-label="Opinión 1"></button><button class="dot" aria-label="Opinión 2"></button><button class="dot" aria-label="Opinión 3"></button></div>
    </div>
  </section>

  <!-- CLUB -->
  <section id="club" class="sec club">
    <h2>Únete al <span class="luxe-t">Club Diana</span> 💌</h2>
    <p>15% OFF en tu primera compra + preventas privadas.</p>
    <form id="form-news" class="news" action="newsletter.php" method="POST" novalidate>
      <input id="news-email" name="email" type="email" required placeholder="tu@correo.com" autocomplete="email">
      <button class="btn solid" type="submit">Quiero mi 15% ✨</button>
    </form>
    <p id="news-ok" role="status"></p>
  </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
