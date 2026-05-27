<template>
  <section id="angebot" class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-[#475569]">Angebot</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-[3px] w-12 bg-[#fb923c]"></div>
          <p class="text-gray-500">Alles rund um Ihren Online-Auftritt</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
        <div
          v-for="service in services"
          :key="service.title"
          class="group p-6 bg-[#424a4d] rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.35)] hover:shadow-[0_12px_40px_rgba(0,0,0,0.5)] transition-all duration-300 hover:-translate-y-1 flex flex-col h-[240px]"
        >
          <div class="text-3xl mb-4 grayscale opacity-70">{{ service.icon }}</div>
          <h3 class="font-bold text-white text-xl mb-2 group-hover:text-[#fb923c] transition">
            {{ service.title }}
          </h3>
          <p class="text-slate-200 text-sm leading-snug">{{ service.text }}</p>
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
    text: 'Individuelle Weblösungen mit PHP, Laravel, MySQL, React, vue.js. Prozessautomatisierung und API-Anbindung.',
  },
  {
    title: 'Shop-Systeme',
    icon: '🛒',
    text: 'E-Commerce Lösungen und individuelle Shopify-Apps mit GraphQL API nach Ihren Anforderungen.',
  },
  {
    title: 'Re-Design',
    icon: '✨',
    text: 'Ihre Webseite in die Jahre gekommen? Ich modernisiere Design und Technik, optimiert für alle Geräte.',
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
    text: 'Technologie-Beratung und Projekt-Begleitung. Ich helfe Ihnen, die richtige Lösung zu finden.',
  },
];
</script>
