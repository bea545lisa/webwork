<template>
  <div class="bg-gray-50 dark:bg-[#2e2e2e] min-h-screen flex flex-col">
    <div class="max-w-6xl mx-auto px-6 pt-28 pb-16 flex-1 w-full">

      <!-- Zurück -->
      <div class="mb-10">
        <button @click="goBack"
          class="text-[#475569] dark:text-gray-100 hover:text-[#fb923c] transition font-bold text-3xl cursor-pointer">
          ←
        </button>
      </div>

      <!-- Titel -->
      <div class="mb-12">
        <h1 class="text-4xl font-bold text-[#475569] dark:text-gray-100 mb-4">Leistungen</h1>
        <div class="h-[3px] w-12 bg-[#fb923c] mb-6"></div>
        <p class="text-[#475569] dark:text-gray-300 text-lg leading-relaxed max-w-3xl">
          Von der Website-Pflege bis zur individuellen Webanwendung – hier finden Sie alle meine Leistungen im
          Überblick. Ich betreue Kunden im gesamten Oberland, im Raum München sowie am Tegernsee.
        </p>
      </div>

      <!-- Leistungen -->
      <div class="space-y-12 mb-16">
        <div v-for="service in services" :key="service.title">
          <h2 class="text-2xl font-bold text-[#475569] dark:text-gray-100 mb-3 flex items-center gap-3">
            <span class="text-3xl grayscale opacity-70">{{ service.icon }}</span>
            {{ service.title }}
          </h2>
          <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl">{{ service.text }}</p>
        </div>
      </div>

      <!-- Einzugsgebiet -->
      <div class="mb-16">
        <h2 class="text-2xl font-bold text-[#475569] dark:text-gray-100 mb-3">Einzugsgebiet</h2>
        <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl mb-4">
          Ich betreue Kunden im gesamten Oberland und Umgebung, unter anderem in:
        </p>
        <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl">
          {{ areas.join(' · ') }}
        </p>
      </div>

      <!-- CTA -->
      <div>
        <RouterLink to="/#contact"
          class="inline-flex items-center gap-2 bg-[#fb923c] hover:bg-[#a84e2e] text-white px-8 py-3 rounded-full font-medium transition">
          Unverbindlich anfragen →
        </RouterLink>
      </div>

    </div>
    <FooterSection />
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import FooterSection from '../components/FooterSection.vue';

const router = useRouter();

function goBack() {
  if (window.history.length <= 1) {
    window.close();
  } else {
    router.back();
  }
}

const services = [
  {
    title: 'Webseiten-Pflege & Support',
    icon: '🛡️',
    text: 'Sie nutzen WordPress, Jimdo oder einen Baukasten, aber die Technik nervt oder kostet zu viel Zeit? Ob regelmäßige Wartung, sichere Backups, neue Inhalte oder schnelle Soforthilfe: Ich halte Ihnen im Hintergrund den Rücken frei, damit Sie sich auf Ihr Kerngeschäft konzentrieren können.',
  },
  {
    title: 'Onlineshops & Shopify',
    icon: '🛒',
    text: 'Vom ersten Setup bis zur laufenden Optimierung – ich realisiere Ihren E-Commerce-Auftritt mit Shopify oder dem passenden System, begleite Sie beim Wechsel von einer bestehenden Plattform und entwickle maßgeschneiderte Erweiterungen für Ihre individuellen Anforderungen.',
  },
  {
    title: 'Webdesign & Re-Design',
    icon: '🎨',
    text: 'Ist Ihre Webseite in die Jahre gekommen? Ich modernisiere Design sowie Technik, optimiere die Ladezeiten und mache Ihren Auftritt fit für alle Endgeräte – vom Smartphone bis zum großen Monitor. Moderne Suchmaschinenoptimierung (SEO) sorgt von Anfang an für ein starkes Google-Ranking.',
  },
  {
    title: 'Individuelle Webentwicklung',
    icon: '⚙️',
    text: 'Maßgeschneiderte Web- und Mobile-Anwendungen mit PHP, Laravel, MySQL, React und Vue.js. Von der Prozessautomatisierung über API-Anbindungen bis zur individuellen Schnittstellenentwicklung – ich setze Ihre digitale Idee technisch sauber um.',
  },
  {
    title: 'Layout & Corporate Design',
    icon: '🖊️',
    text: 'Visuelle Kommunikation vom Logo bis zur Druckvorlage. Ich gestalte Ihr Briefpapier, Flyer, Visitenkarten und Broschüren, damit Ihr Auftritt online wie offline durchgängig professionell wirkt.',
  },
  {
    title: 'Beratung & Projektbegleitung',
    icon: '💡',
    text: 'Unabhängige Technologie-Beratung auf Augenhöhe. Ich helfe Ihnen, die passenden Systeme auszuwählen, bestehende Infrastrukturen zu analysieren und Ihre digitale Vision sicher und nachvollziehbar umzusetzen.',
  },
];

const areas = [
  'München', 'Kreuth', 'Oberland', 'Otterfing', 'Tegernsee', 'Bad Wiessee',
  'Valley', 'Warngau', 'Hausham', 'Miesbach', 'Bad Tölz', 'Lenggries',
  'Waakirchen', 'Schliersee', 'Holzkirchen', 'Fischbachau', 'Irschenberg',
  'Gmund am Tegernsee', 'Feldkirchen-Westerham',
];
</script>
