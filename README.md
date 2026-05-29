# [web]work oberland

> Portfolio- und Unternehmenswebsite für **[web]work oberland** – Beate Rohrmoser.  
> Live: [webwork-oberland.de](https://webwork-oberland.de)

## Tech Stack

| Layer | Technologie |
|-------|-------------|
| Backend | Laravel 12, PHP 8.4 |
| Frontend | Vue.js 3 (Composition API, SPA) |
| Styling | Tailwind CSS v4 |
| Build | Vite |
| Deploy | GitHub Actions → allinkl (SSH/SCP) |

## Features

- Animierter Fullscreen-Slider mit Parallax-Effekt
- Portfolio-Galerie mit Isotope-ähnlichem Filter + Slide-In Detailseiten
- Draggable Tech-Marquee (JS mit requestAnimationFrame)
- Parallax-Sections mit JS-Scroll-Listener
- Kontaktformular (Laravel Mailable, Honeypot-Schutz)
- Über-mich-Seite als Drawer-Overlay
- Vollständig responsive, iOS Safe-Area-aware

## Setup lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev
```

## Deployment

Automatisch via GitHub Actions bei Push auf `main`:  
`npm run build` → SCP auf allinkl-Server → `composer install` + `artisan cache:clear`
