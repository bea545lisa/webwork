<template>
  <section id="handwerk-spezial" class="py-24 bg-[#E4EBEB]">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-[#475569]">Branchen-Spezial</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-[3px] w-12 bg-[#fb923c]"></div>
          <p class="text-gray-500">Moderne Internetseiten für Handwerksbetriebe</p>
        </div>
      </div>

      <!-- Feature-Kacheln -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
        <div
          v-for="feature in features"
          :key="feature.title"
          class="bg-white rounded-2xl p-6 shadow-md"
        >
          <div class="text-3xl mb-4">{{ feature.icon }}</div>
          <h3 class="font-bold text-[#475569] text-lg mb-2">{{ feature.title }}</h3>
          <p class="text-gray-500 text-sm leading-snug">{{ feature.text }}</p>
        </div>
      </div>

      <!-- Preis-Box -->
      <div class="bg-white rounded-2xl shadow-md border-l-4 border-[#fb923c] p-8">
        <p class="font-mono text-xs uppercase tracking-widest text-[#fb923c] mb-4">
          Ehrliches Handwerk, fairer Preis
        </p>

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-2 mb-6">
          <div>
            <p class="text-gray-500 text-sm">Das Fundament</p>
            <h3 class="text-2xl font-bold text-[#475569]">Paket „Digitale Werkstatt“</h3>
          </div>
          <div class="sm:text-right">
            <p class="text-gray-500 text-sm">Festpreis</p>
            <p class="text-2xl font-bold text-[#475569]">950 €*</p>
          </div>
        </div>

        <div class="h-px bg-gray-200 mb-6"></div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
          <p v-for="item in included" :key="item" class="text-[#475569] text-sm flex items-start gap-2">
            <span class="text-[#fb923c] font-bold">✓</span> {{ item }}
          </p>
        </div>

        <div class="text-right">
          <RouterLink
            to="/handwerk-basic"
            class="text-[#fb923c] font-medium hover:text-[#ea7c1e] transition"
          >
            Was genau ist enthalten? Details ansehen →
          </RouterLink>
        </div>

        <p class="text-gray-400 text-xs mt-4">
          * zzgl. 19% MwSt.
        </p>
      </div>

    </div>
  </section>
</template>

<script setup>
const features = [
  {
    icon: '⚡',
    title: 'Schnelle Ladezeiten',
    text: 'Kein träger Baukasten, der ewig lädt: Die Seite baut sich in Sekundenschnelle auf – auch auf dem Smartphone.',
  },
  {
    icon: '🚀',
    title: 'Schnellbewerbung',
    text: 'Interessenten bewerben sich in unter einer Minute direkt vom Handy aus – ganz ohne Umweg über E-Mail.',
  },
  {
    icon: '🛡️',
    title: 'Keine monatliche Gebühr',
    text: 'Die Webseite ist wartungsarm – einmal bezahlt, läuft sie dauerhaft stabil und ohne laufende Kosten.',
  },
];

const included = [
  'Individual-Design in Ihren Farben',
  'Startseite mit Leistungen & Galerie',
  'Extrem schnelle mobile Ladezeiten',
  'Rechtssicher (DSGVO & Impressum)',
];
</script>
