<template>
  <div class="bg-gray-50 min-h-screen flex flex-col">
    <div class="max-w-3xl mx-auto px-6 py-16 flex-1 w-full">

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
          <p class="text-gray-400 text-sm">Festpreis</p>
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
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <p v-for="item in included" :key="item" class="text-[#475569] text-sm flex items-start gap-2">
            <span class="text-[#fb923c] font-bold">✓</span> {{ item }}
          </p>
        </div>
      </div>

      <!-- Erweiterungen -->
      <div class="mb-12">
        <h2 class="text-xl font-bold text-[#475569] mb-4">Optionale Erweiterungen</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div v-for="addon in addons" :key="addon.title"
            class="flex items-center justify-between bg-white rounded-lg px-4 py-3 shadow-sm">
            <span class="text-[#475569] text-sm">{{ addon.icon }} {{ addon.title }}</span>
            <span class="font-bold text-[#475569] text-sm shrink-0 ml-3">{{ addon.price }}</span>
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
        * zzgl. 19% MwSt.
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
  'Startseite mit Leistungen & Galerie',
  'Extrem schnelle mobile Ladezeiten',
  'Rechtssicher (DSGVO & Impressum)',
];

const addons = [
  { icon: '📍', title: 'Google Maps Anbindung', price: '+90 €' },
  { icon: '📸', title: 'Premium-Banner', price: '+150 €' },
  { icon: '💼', title: 'Digitales Kundenportal', price: 'Auf Anfrage' },
];
</script>
