<template>
  <div class="bg-gray-50 min-h-screen flex flex-col">
    <div class="max-w-6xl mx-auto px-6 pt-28 pb-16 flex-1 w-full">

      <!-- Zurück -->
      <div class="mb-12">
        <button @click="goBack"
          class="text-[#475569] hover:text-[#fb923c] transition font-bold text-3xl cursor-pointer">
          ←
        </button>
      </div>

      <!-- Titel -->
      <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">
        <div>
          <p class="text-[#fb923c] font-mono text-lg tracking-wider mb-1">Branchen-Spezial</p>
          <h1 class="text-4xl font-bold text-[#475569] mb-1">Paket „Digitale Werkstatt“</h1>
          <div class="h-[3px] w-12 bg-[#fb923c] mt-4"></div>
        </div>
        <div class="text-left sm:text-right">
          <p class="text-2xl font-bold text-[#475569]">950 €*</p>
        </div>
      </div>

      <!-- Intro -->
      <div class="space-y-5 text-[#475569] leading-relaxed text-base md:text-lg mb-12">
        <p>
          Die „Digitale Werkstatt“ ist eine moderne Onepage-Website speziell für Handwerksbetriebe – schnell online,
          mobil optimiert und ohne den Ballast eines klassischen Baukastensystems.
        </p>
        <p>
          Eine Live-Demo mit fiktivem Beispielbetrieb zeigt, wie Ihre eigene Seite aussehen könnte:
          <a href="https://handwerk-basic.webwork-oberland.de" target="_blank" rel="noopener"
            class="text-[#fb923c] hover:text-[#ea7c1e] transition font-medium">
            handwerk-basic.webwork-oberland.de →
          </a>
        </p>
      </div>

      <!-- Enthalten -->
      <div class="mb-12">
        <h2 class="text-xl font-bold text-[#475569] mb-4">Das ist enthalten</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
          <p v-for="item in included" :key="item" class="text-[#475569] text-sm flex items-start gap-2">
            <span class="text-[#fb923c] font-bold">✓</span> {{ item }}
          </p>
        </div>
      </div>

      <!-- Erweiterungen -->
      <div class="mb-12">
        <h2 class="text-xl font-bold text-[#475569] mb-1">Optionale Pro-Erweiterungen</h2>
        <p class="text-gray-500 text-sm mb-8">
          Manche Pro-Erweiterungen lassen sich auf der Muster-Webseite per Umschalter live zwischen Basic und Pro vergleichen.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div v-for="addon in addons" :key="addon.title"
            class="bg-white rounded-lg p-4 shadow-sm">
            <div class="flex items-center justify-between mb-1">
              <span class="text-[#475569] font-bold text-sm">{{ addon.icon }} {{ addon.title }}</span>
              <span class="font-bold text-[#475569] text-sm shrink-0 ml-3">{{ addon.price }}</span>
            </div>
            <p class="text-gray-500 text-sm">{{ addon.text }}</p>
          </div>
        </div>
      </div>

      <!-- CTA -->
      <div class="flex flex-col sm:flex-row gap-4">
        <a href="https://handwerk-basic.webwork-oberland.de" target="_blank" rel="noopener"
          class="text-center bg-[#fb923c] hover:bg-[#ea7c1e] text-white px-8 py-3 rounded-lg font-medium transition">
          Muster-Website ansehen →
        </a>
        <RouterLink to="/#contact"
          class="text-center border border-[#475569]/30 text-[#475569] hover:border-[#fb923c]/40 hover:text-[#fb923c] px-8 py-3 rounded-lg font-medium transition">
          Unverbindlich anfragen
        </RouterLink>
      </div>

      <p class="text-gray-400 text-xs mt-4">
        * zzgl. 19% MwSt. Festpreis gilt für den gezeigten Leistungsumfang der Basic-Version – individuelle Anpassungen auf Anfrage.
      </p>

    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function goBack() {
  router.back();
}

const included = [
  'Individual-Design in Ihren Farben',
  'Onepage-Webseite mit mehreren Abschnitten',
  'Schnelle Ladezeiten auf allen Geräten',
  'SEO-optimiert für Suchmaschinen',
  'Bild- und Textmaterial wird vom Kunden geliefert',
  'Rechtssicher (DSGVO & Impressum)',
  'Bis zu 9 Referenzprojekte & 6 Kundenstimmen',
];

const addons = [
  {
    icon: '📍',
    title: 'Google Maps Pro',
    text: 'Interaktive Karte für die Anfahrt zur Werkstatt – damit Kunden Sie leicht finden.',
    price: '+100 €',
  },
  {
    icon: '📸',
    title: 'Fullsize-Banner Pro',
    text: 'Großer Eyecatcher ganz oben auf der Startseite – mit wechselnden Hintergrundbildern.',
    price: '+150 €',
  },
  {
    icon: '🖼️',
    title: 'Galerie Pro',
    text: 'Ihre besten Projekte in einer filterbaren Bildergalerie – zum Stöbern für Ihre Kunden.',
    price: '+300 €',
  },
  {
    icon: '👥',
    title: 'Team Pro',
    text: 'Eigener Abschnitt mit Foto, Name und Rolle je Mitarbeiter – schafft Vertrauen und persönliche Nähe.',
    price: '+150 €',
  },
  {
    icon: '🎙️',
    title: 'Sorglos-Content',
    text: 'Kurzes Interview mit Ihnen – ich generiere professionelle Texte und Bilder.',
    price: '+250 €',
  },
  {
    icon: '📋',
    title: 'Bewerbung Pro',
    text: 'Selbst definierte offene Stellen, zusätzliche Fragen und Datei-Upload für Lebenslauf & Zeugnisse.',
    price: '+200 €',
  },
  {
    icon: '💼',
    title: 'Digitales Kundenportal',
    text: 'Inhalte selbst pflegen und Anfragen an einem Ort verwalten – ganz ohne Programmierkenntnisse.',
    price: 'Auf Anfrage',
  },
  {
    icon: '✏️',
    title: 'Text- & Bildänderungen',
    text: 'Spätere Anpassungen an Texten oder Bildern nach dem Launch – einmalig abgerechnet, wenn sie anfallen.',
    price: 'Auf Anfrage',
  },
];
</script>
