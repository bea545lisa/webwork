# [web]work oberland

Portfolio- und Unternehmenswebsite für **[web]work oberland** – Beate Rohrmoser.  
Individuelle Webentwicklung im Raum München / Oberland.

## Tech Stack

| Layer | Technologie |
|-------|-------------|
| Backend | Laravel 12, PHP 8.2 |
| Frontend | Vue.js 3 (Composition API) |
| Styling | Tailwind CSS v4 |
| Build | Vite |

## Features

- Animierter Fullscreen-Slider mit Ken Burns Effekt
- Portfolio-Galerie mit Slide-In Detailseiten (Overlay-Animation)
- Parallax-Sections mit KI-generierten Bildern (Adobe Firefly)
- Tech-Marquee mit SVG-Logos
- Kontaktformular mit Honeypot-Spam-Schutz
- Impressum & Datenschutz
- Smooth-Scroll Navigation
- Vollständig responsive

## Setup lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev
```

## Deployment

```bash
npm run build
php artisan config:cache
php artisan route:cache
```

## Projektstruktur

```
resources/js/
├── components/       # Vue-Komponenten (Hero, Services, Portfolio, ...)
├── pages/            # Seiten (Home, ProjectDetail, Impressum, Datenschutz)
├── data/             # Projektdaten (projects.js)
└── router/           # Vue Router Konfiguration
public/images/        # Bilder (Slider, Portfolio-Thumbnails, Screenshots)
```

---

© 2026 [web]work oberland · Beate Rohrmoser
