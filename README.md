# 👑 MAISON DIANA — Boutique de lujo · Por Diana Trujillo

Tienda de ropa de lujo muy interactiva: hero con imagen en movimiento (Ken Burns), lookbook infinito, carrito lateral, checkout real y club con 15% OFF.

## Demo
```
http://localhost/maison-diana/
```
- Carrito → Finalizar compra → se guarda en MySQL (`pedido.php`)
- Club Diana → `newsletter.php`
- Admin: `http://localhost/maison-diana/admin/?key=diana2026`

## Stack (5 lenguajes + framework)
| Capa | Tecnología |
|---|---|
| Estructura + backend | **PHP 8** (`index.php`, `partials/`, `api/`, `admin/`) |
| Datos | **MySQL** (`productos`, `pedidos`, `newsletter`) |
| Interactividad | **JavaScript** (fetch API, carrito localStorage, sliders) |
| Framework CSS | **Bootstrap 5** (vía CDN) + CSS3 propio |
| Animación | **CSS3** (Ken Burns, shine, marquee, lookbook) |
| Datos API | **JSON** |

## Importar BD
```powershell
Get-Content db/maison_db.sql -Raw | mysql -u root
```

## Fotos
Unsplash (licencia de uso libre), verificadas una por una: hero, boutique, 6 productos y lookbook editorial.

© 2026 MAISON DIANA · Creado por **Diana Trujillo** ✨
