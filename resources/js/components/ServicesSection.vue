<template>
  <section id="angebot" class="py-24 bg-[#252540]">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-16">
        <span class="font-mono text-orange-500 text-sm tracking-widest uppercase">// Leistungen</span>
        <h2 class="text-3xl md:text-4xl font-bold text-white mt-2">Unser Angebot</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-px w-12 bg-orange-500"></div>
          <p class="text-gray-400">Alles rund um Ihren Online-Auftritt</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
          v-for="service in services"
          :key="service.title"
          class="group p-6 bg-[#1e1e2e] border border-white/5 rounded-xl hover:border-orange-500/30 transition-all duration-300 hover:-translate-y-1"
        >
          <div class="text-3xl mb-4">{{ service.icon }}</div>
          <h3 class="font-semibold text-white mb-2 group-hover:text-orange-400 transition">
            {{ service.title }}
          </h3>
          <p class="text-gray-500 text-sm leading-relaxed">{{ service.text }}</p>
        </div>
      </div>

    </div>
  </section>
</template>

<script setup>
const services = [
  {
    title: 'Webdesign',
    icon: '🎨',
    text: 'Von der One-Page bis zur umfangreichen Business-Lösung. Responsive Design für alle Bildschirmgrößen inklusive.',
  },
  {
    title: 'Webentwicklung',
    icon: '⚙️',
    text: 'Individuelle Web- und Intranetlösungen mit Laravel, PHP und MySQL. Prozessautomatisierung und API-Anbindung.',
  },
  {
    title: 'Shop-Systeme',
    icon: '🛒',
    text: 'E-Commerce Lösungen und individuelle Shopify-Apps mit GraphQL API nach Ihren Anforderungen.',
  },
  {
    title: 'Re-Design',
    icon: '✨',
    text: 'Ihre Webseite in die Jahre gekommen? Wir modernisieren Design und Technik, optimiert für alle Geräte.',
  },
  {
    title: 'App-Entwicklung',
    icon: '📱',
    text: 'Mobile Anwendungen mit React und Vue.js. Anbindung an bestehende Datenbanken und APIs.',
  },
  {
    title: 'Shopify Apps',
    icon: '🔧',
    text: 'Individuelle Shopify Admin-Apps und Erweiterungen. Entwicklung mit Polaris, React Router und GraphQL.',
  },
  {
    title: 'Layout & Design',
    icon: '🖊️',
    text: 'Corporate Design vom Logo bis zur Druckvorlage. Briefpapier, Flyer und visuelle Kommunikation.',
  },
  {
    title: 'Beratung',
    icon: '💡',
    text: 'Technologie-Beratung und Projekt-Begleitung. Wir helfen Ihnen, die richtige Lösung zu finden.',
  },
];
</script>
