<template>
  <div class="bg-gray-50 dark:bg-[#2e2e2e] min-h-screen flex flex-col">
    <div class="max-w-6xl mx-auto px-6 pt-20 pb-16 flex-1 w-full">

      <!-- Zurück -->
      <div class="mb-8">
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
      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10 mb-16">
        <div v-for="service in services" :key="service.title">
          <h2 class="text-2xl font-bold text-[#475569] dark:text-gray-100 mb-3 flex items-center gap-3">
            <span class="text-3xl grayscale opacity-70">{{ service.icon }}</span>
            {{ service.title }}
          </h2>
          <p class="text-[#475569] dark:text-gray-300 leading-relaxed">{{ service.text }}</p>
        </div>
      </div>

      <!-- Branchen-Spezial -->
      <div class="mb-16">
        <h2 class="text-2xl font-bold text-[#475569] dark:text-gray-100 mb-3 flex items-center gap-3">
          <span class="text-3xl grayscale opacity-70">🔨</span>
          Website für Handwerker
        </h2>
        <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl">
          Für Handwerksbetriebe gibt es zusätzlich ein eigenes Festpreis-Paket: eine moderne, mobil optimierte
          Onepage-Website inklusive Schnellbewerbungs-Funktion.
          <RouterLink to="/handwerk-basic" class="text-[#fb923c] hover:text-[#ea7c1e] underline transition">
            Details zum Handwerk-Paket ansehen →
          </RouterLink>
        </p>
      </div>

      <!-- Einzugsgebiet -->
      <div class="mb-16">
        <h2 class="text-2xl font-bold text-[#475569] dark:text-gray-100 mb-3">Einzugsgebiet</h2>
        <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl mb-4">
          Ich betreue Kunden im Münchner Süden und dem gesamten Oberland, unter anderem in:
        </p>
        <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl mb-4">
          {{ areas.join(' · ') }}
        </p>
        <p class="text-[#475569] dark:text-gray-300 leading-relaxed max-w-3xl">
          Für ortsunabhängige Leistungen wie individuelle Webentwicklung oder Beratung arbeite ich auch mit
          Kunden im gesamten deutschsprachigen Raum zusammen.
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
    <FooterSection v-if="isDirectVisit" />
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import FooterSection from '../components/FooterSection.vue';
import { isDirectVisit } from '../router/directVisit.js';

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
    text: 'Läuft Ihre bestehende Seite auf WordPress, Jimdo oder einem Webbaukasten und die Technik dahinter kostet Sie mehr Nerven als Ihnen lieb ist? Ich übernehme laufende Updates, richte automatische Backups ein, pflege neue Texte und Bilder ein und bin bei akuten Problemen erreichbar – meist ohne dass Sie selbst etwas davon merken. Dazu gehört auch eine DSGVO-konforme Webseitenpflege (Rechtstexte, Cookie-Einstellungen, Serverstandort), damit Ihre Website sicher, aktuell und rechtlich sauber bleibt, ohne dass Sie sich selbst darum kümmern müssen.',
  },
  {
    title: 'Onlineshops & Shopify',
    icon: '🛒',
    text: 'Für kleine und mittlere Händler übernehme ich die komplette Onlineshop-Erstellung oder migriere bestehende Shops zu Shopify – inklusive Produktkatalog, Zahlungsanbindung und Versandeinstellungen. Darüber hinaus programmiere ich individuelle Shopify-Apps und Design-Anpassungen, die es "von der Stange" nicht gibt, und begleite Sie auch nach dem Launch bei der laufenden Weiterentwicklung.',
  },
  {
    title: 'Webdesign & Re-Design',
    icon: '🎨',
    text: 'Eine in die Jahre gekommene Website kostet Sie Kunden, ohne dass Sie es merken – lange Ladezeiten, unübersichtliches Design oder fehlende mobile Darstellung schrecken Besucher ab. Ob komplette Webseitenerstellung von Grund auf oder Webseiten-Modernisierung einer bestehenden Seite: Ich sorge für zeitgemäßes Webdesign mit Fokus auf Ladezeiten-Optimierung, klare Struktur und eine Darstellung, die auf jedem Gerät funktioniert. Suchmaschinenoptimierung (SEO) ist dabei von Anfang an mit eingebaut, nicht nachträglich draufgesetzt.',
  },
  {
    title: 'Individuelle Webentwicklung',
    icon: '⚙️',
    text: 'Wenn eine Standardlösung nicht mehr ausreicht, übernehme ich als Webagentur die Anwendungsentwicklung und Softwareentwicklung passgenauer Web- und Mobile-Anwendungen mit PHP, Laravel, React und Vue.js – zum Beispiel für interne Verwaltungstools, Buchungssysteme oder Kundenportale. Dazu gehört auch die Anbindung an bestehende Software über Schnittstellen (APIs) und die Automatisierung von Abläufen, die aktuell noch manuell erledigt werden.',
  },
  {
    title: 'Layout & Corporate Design',
    icon: '🖊️',
    text: 'Ein Logo allein macht noch keinen einheitlichen Auftritt. Ich entwerfe Ihr komplettes Erscheinungsbild für Print und Digital – von Visitenkarten über Briefpapier bis zu Flyern und Broschüren –, damit Kunden Sie auf den ersten Blick wiedererkennen, egal ob online oder auf Papier.',
  },
  {
    title: 'Beratung & Projektbegleitung',
    icon: '💡',
    text: 'Nicht jedes Projekt braucht von Anfang an eine fertige Lösung. Manchmal hilft zuerst ein unabhängiger Blick von außen: Welches System passt zu Ihrem Vorhaben, was lässt sich an der bestehenden Infrastruktur verbessern, und wie gehen Sie ein größeres Projekt am sinnvollsten an? Ich begleite Sie durch diese Entscheidungen, ohne Ihnen ein bestimmtes Produkt aufzudrängen.',
  },
];

const areas = [
  'München', 'München-Thalkirchen', 'München-Obersendling', 'München-Forstenried',
  'München-Fürstenried', 'München-Solln', 'Sauerlach', 'Oberhaching', 'Ottobrunn',
  'Unterhaching', 'Taufkirchen', 'Neubiberg', 'Aying', 'Grünwald',
  'Kreuth', 'Oberland', 'Otterfing', 'Tegernsee', 'Bad Wiessee', 'Valley',
  'Warngau', 'Hausham', 'Miesbach', 'Bad Tölz', 'Lenggries', 'Waakirchen',
  'Schliersee', 'Holzkirchen', 'Fischbachau', 'Irschenberg', 'Gmund am Tegernsee',
  'Feldkirchen-Westerham',
];
</script>
