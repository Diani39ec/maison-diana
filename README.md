# 👑 AURELIA · Casa de Moda · Por Diana Trujillo

Boutique de ropa de lujo muy interactiva: hero con imagen en movimiento (Ken Burns), lookbook infinito, **carrito de compras** lateral con checkout real y Club Diana con 15% OFF.

## Demo local
```
http://localhost/maison-diana/
```
- 👜 Carrito → Finalizar compra → pedido guardado en MySQL (`pedido.php`)
- 💌 Club Diana → `newsletter.php`
- 🔑 Admin: `http://localhost/maison-diana/admin/?key=diana2026` (pedidos, estados, WhatsApp, suscriptoras)

## Estructura del proyecto
```
maison-diana/                 (repo GitHub: maison-diana)
├── index.php           · Portada: hero, colección, lookbook, boutique, opiniones, club
├── partials/
│   ├── header.php      · <head>, topbar con carrito, botón menú
│   └── footer.php      · Pie + drawer del carrito + modal de pedido + toast
├── app.js              · Productos desde la API (con respaldo local), filtros,
│                         carrito en localStorage, checkout y newsletter por fetch,
│                         contadores, sliders
├── styles.css          · Paleta marfil + esmeralda + terracota (teoría 60-30-10),
│                         Ken Burns, shine, lookbook infinito, responsive
├── logo.svg            · Monograma "A" en degradado esmeralda→terracota
├── config.php          · Conexión PDO + clean()
├── api/productos.php   · JSON de productos desde MySQL
├── pedido.php          · Guarda pedido (POST → JSON)
├── newsletter.php      · Guarda suscripción (POST → JSON, anti-duplicados)
├── admin/index.php     · Panel: totales, estados de pedido, WhatsApp 1-clic
├── db/maison_db.sql    · Esquema + 6 productos
└── README.md
```

## Base de datos `maison_db`
| Tabla | Guarda |
|---|---|
| `productos` | nombre, categoría (elegance/urban/artesanal), precio, foto, destacado |
| `pedidos` | clienta, WhatsApp, items, total, estado (nuevo/confirmado/enviado) |
| `newsletter` | email único de suscriptoras |

## Teoría del color aplicada (sin dorados ni negros)
| Rol | Color |
|---|---|
| Base | Marfil `#faf7f0` + cacao suave `#4a3a28` |
| Primario | Esmeralda `#1e5b44` (botones, títulos, navegación) |
| Acento | Terracota `#c25e3c` (precios, categorías, detalles) |

## Instalación
```powershell
Get-Content db/maison_db.sql -Raw | mysql -u root
```

## Stack
PHP 8 + MySQL + JavaScript (fetch/JSON) + Bootstrap 5 (CDN) + CSS3.

Fotos: Unsplash (licencia de uso libre), verificadas una por una.

© 2026 AURELIA · Casa de Moda · Creado por **Diana Trujillo** ✨
