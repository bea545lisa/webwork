<!DOCTYPE html>
<html lang="de" class="no-transitions">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="alternate icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <title>webwork Oberland – Webentwicklung & Design</title>
    <meta name="description" content="Webseiten, Onlineshops und individuelle Webanwendungen für kleine Unternehmen im Oberland. Schnell, modern und auf Ihre Bedürfnisse zugeschnitten.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://webwork-oberland.de">
    <meta property="og:title" content="webwork Oberland – Webentwicklung & Design">
    <meta property="og:description" content="Webseiten, Onlineshops und individuelle Webanwendungen für kleine Unternehmen im Oberland. Schnell, modern und auf Ihre Bedürfnisse zugeschnitten.">
    <meta property="og:image" content="https://webwork-oberland.de/og-image.jpg">
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "[web]work Oberland",
      "image": "https://webwork-oberland.de/og-image.jpg",
      "logo": "https://webwork-oberland.de/logo.png",
      "url": "https://webwork-oberland.de/",
      "telephone": "+49 8024 4688225",
      "email": "mail@webwork-oberland.de",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Dekan-Imminger-Str. 15",
        "addressLocality": "Holzkirchen",
        "addressRegion": "BY",
        "postalCode": "83607",
        "addressCountry": "DE"
      },
      "areaServed": [
        "München", "München-Thalkirchen", "München-Obersendling", "München-Forstenried",
        "München-Fürstenried", "München-Solln", "Sauerlach", "Oberhaching", "Ottobrunn",
        "Unterhaching", "Taufkirchen", "Neubiberg", "Aying", "Grünwald",
        "Kreuth", "Oberland", "Otterfing", "Tegernsee", "Bad Wiessee", "Valley",
        "Warngau", "Hausham", "Miesbach", "Bad Tölz", "Lenggries", "Waakirchen",
        "Schliersee", "Holzkirchen", "Fischbachau", "Irschenberg", "Gmund am Tegernsee",
        "Feldkirchen-Westerham"
      ],
      "priceRange": "€€",
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Dienstleistungen",
        "itemListElement": [
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Webseiten-Pflege & Support" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Onlineshops & Shopify" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Webdesign & Re-Design" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Individuelle Webentwicklung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Layout & Corporate Design" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Beratung & Projektbegleitung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Anwendungsentwicklung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Softwareentwicklung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Webseitenerstellung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Website für Handwerker" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Handwerker-Website zum Festpreis" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Ladezeiten-Optimierung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "DSGVO-Webseitenpflege" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Onlineshop-Erstellung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Webseiten-Modernisierung" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Suchmaschinenoptimierung" } }
        ]
      }
    }
    </script>
    <meta name="theme-color" content="#585e60" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#585e60" media="(prefers-color-scheme: dark)">
    <meta name="msapplication-navbutton-color" content="#585e60">
    <meta name="msapplication-TileColor" content="#585e60">
    <meta name="color-scheme" content="light dark">
    <script>
      // Vor dem ersten Rendern gesetzt (nicht in einem Vue-onMounted), damit
      // beim Laden kein heller Flackerer im Dark Mode auftritt.
      (function () {
        try {
          var stored = localStorage.getItem('theme');
          var dark = stored ? stored === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
          document.documentElement.classList.toggle('dark', dark);
        } catch (e) {}
      })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app"></div>
</body>
</html>
