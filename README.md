# 👑 AURELIA · Casa de Moda · Por Diana Trujillo

Boutique de ropa de lujo muy interactiva: hero con imagen en movimiento (Ken Burns), lookbook infinito, **carrito de compras** lateral con checkout real y Club Diana con 15% OFF.

## Demo
```
http://localhost/maison-diana/
```
- 👜 Carrito → Finalizar compra → pedido guardado en MySQL (`pedido.php`)
- 💌 Club Diana → `newsletter.php`
- 🔑 Admin: `http://localhost/maison-diana/admin/?key=diana2026`

## Teoría del color aplicada (sin dorados)
| Rol | Color | Por qué |
|---|---|---|
| Base | Marfil `#faf7f0` + cacao suave `#4a3a28` | Contraste alto, calidez artesanal, luminoso |
| Primario | Esmeralda `#1e5b44` | Confianza y lujo natural; botones, títulos y navegación |
| Acento | Terracota `#c25e3c` | Complementario del verde: precios, categorías y detalles que vibran sin gritar |

Regla **60-30-10**: 60% marfil, 30% esmeralda, 10% terracota.

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
