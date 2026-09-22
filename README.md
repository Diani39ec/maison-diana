# 👑 AURELIA · Casa de Moda · Por Diana Trujillo

Boutique de ropa de lujo muy interactiva: hero con imagen en movimiento (Ken Burns), lookbook infinito, **carrito de compras** lateral con checkout real y Club Diana con 15% OFF.

## Demo
```
http://localhost/maison-diana/
```
- 👜 Carrito → Finalizar compra → pedido guardado en MySQL (`pedido.php`)
- 💌 Club Diana → `newsletter.php`
- 🔑 Admin: `http://localhost/maison-diana/admin/?key=diana2026`

## Teoría del color aplicada
| Rol | Color | Por qué |
|---|---|---|
| Base | Verde-negro `#10140f` + marfil `#f7f2e4` | Contraste alto (legibilidad AA), fondo sobrio de lujo |
| Armonía análoga | Esmeralda `#1d5c44` → dorado `#c9a227` | Colores vecinos en el círculo cromático: elegancia serena, sin choques |
| Acento complementario dividido | Terracota `#c9744c` | El opuesto del verde, suavizado: vibra en precios, categorías y CTAs sin gritar |
| Luz | Dorado claro `#f0d47a` | Brillos, hover y detalles premium |

Regla usada: **60-30-10** (60% verde-negro/marfil, 30% esmeralda, 10% dorado + terracota).

## Stack (5 lenguajes + framework)
| Capa | Tecnología |
|---|---|
| Estructura + backend | **PHP 8** (`index.php`, `partials/`, `api/`, `admin/`) |
| Datos | **MySQL** (`productos`, `pedidos`, `newsletter`) |
| Interactividad | **JavaScript** (fetch API, carrito localStorage, sliders) |
| Framework CSS | **Bootstrap 5** (vía CDN) + CSS3 propio |
| Animación | **CSS3** (Ken Burns, shine, lookbook) |
| Datos API | **JSON** |

## Importar BD
```powershell
Get-Content db/maison_db.sql -Raw | mysql -u root
```

## Fotos
Unsplash (licencia de uso libre), verificadas una por una: hero, boutique, 6 productos y lookbook editorial.

© 2026 AURELIA · Casa de Moda · Creado por **Diana Trujillo** ✨
