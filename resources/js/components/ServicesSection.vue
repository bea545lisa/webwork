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

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
        <div
          v-for="service in services"
          :key="service.title"
          class="group p-6 bg-[#424a4d] rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.35)] hover:shadow-[0_12px_40px_rgba(0,0,0,0.5)] transition-all duration-300 hover:-translate-y-1 flex flex-col h-[300px]"
        >
          <div class="text-3xl mb-4 grayscale opacity-70">{{ service.icon }}</div>
          <h3 class="font-bold text-white text-xl mb-2 group-hover:text-[#fb923c] transition">
            {{ service.title }}
          </h3>
          <p class="text-slate-200 text-base leading-snug">{{ service.text }}</p>
        </div>
      </div>

    </div>
  </section>
</template>

<script setup>
const services = [
  {
    title: 'Webseiten-Pflege & Support',
    icon: '🛡️',
    text: 'Sie nutzen WordPress, Jimdo oder einen Baukasten, aber die Technik nervt oder kostet zu viel Zeit? Ob regelmäßige Wartung, sichere Backups, neue Inhalte oder schnelle Soforthilfe: Ich halte Ihnen im Hintergrund den Rücken frei.',
  },
  {
    title: 'Onlineshops & Shopify',
    icon: '🛒',
    text: 'Vom ersten Setup bis zur laufenden Optimierung – ich realisiere Ihren E-Commerce-Auftritt mit Shopify oder dem passenden System, begleite Sie beim Wechsel und entwickle maßgeschneiderte Erweiterungen.',
  },
  {
    title: 'Webdesign & Re-Design',
    icon: '🎨',
    text: 'Ist Ihre Webseite in die Jahre gekommen? Ich modernisiere Design sowie Technik, optimiere die Ladezeiten und mache Ihren Auftritt fit für alle Endgeräte. Moderne Suchmaschinenoptimierung (SEO) sorgt für ein starkes Google-Ranking.',
  },
  {
    title: 'Individuelle Webentwicklung',
    icon: '⚙️',
    text: 'Maßgeschneiderte Web- und Mobile-Anwendungen mit PHP, Laravel, MySQL, React und Vue.js. Prozessautomatisierung, API-Anbindungen und individuelle Schnittstellenentwicklung.',
  },
  {
    title: 'Layout & Corporate Design',
    icon: '🖊️',
    text: 'Visuelle Kommunikation vom Logo bis zur Druckvorlage. Ich gestalte Ihr Briefpapier, Flyer, Visitenkarten und Broschüren für einen rundum professionellen Auftritt.',
  },
  {
    title: 'Beratung & Projektbegleitung',
    icon: '💡',
    text: 'Unabhängige Technologie-Beratung auf Augenhöhe. Ich helfe Ihnen, die passenden Systeme auszuwählen, bestehende Infrastrukturen zu analysieren und Ihre digitale Vision sicher umzusetzen.',
  },
];
</script>
