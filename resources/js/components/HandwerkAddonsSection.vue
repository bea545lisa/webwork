<template>
  <section id="handwerk-erweiterungen" :class="['py-24', bg || 'bg-gray-50']">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-[#475569]">Erweitern Sie Ihre Seite nach Bedarf</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-[3px] w-12 bg-[#fb923c]"></div>
          <p class="text-gray-500">Optionale Premium-Zusatzbausteine für Ihre Handwerker-Website</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div
          v-for="addon in addons"
          :key="addon.title"
          class="bg-white rounded-2xl shadow-md p-6 flex flex-col"
        >
          <div class="text-3xl mb-4">{{ addon.icon }}</div>
          <h3 class="font-bold text-[#475569] text-lg mb-2">{{ addon.title }}</h3>
          <p class="text-gray-500 text-sm leading-snug flex-1">{{ addon.text }}</p>
          <div class="h-px bg-gray-200 my-4"></div>
          <div class="flex items-center justify-between text-sm">
            <span class="text-gray-400 font-mono uppercase tracking-wider text-xs">Option</span>
            <span class="font-bold text-[#475569]">{{ addon.price }}</span>
          </div>
        </div>
      </div>

      <div class="text-center mb-8">
        <RouterLink to="/handwerk-basic" class="text-[#fb923c] font-medium hover:text-[#ea7c1e] transition">
          Mehr Erweiterungen →
        </RouterLink>
      </div>

      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a
          href="https://handwerk-basic.webwork-oberland.de/"
          target="_blank"
          rel="noopener"
          class="text-center bg-[#fb923c] hover:bg-[#ea7c1e] text-white px-8 py-3 rounded-lg font-medium transition"
        >
          Muster-Website ansehen →
        </a>
        <RouterLink
          to="/#contact"
          class="text-center border border-[#475569]/30 text-[#475569] hover:border-[#fb923c]/40 hover:text-[#fb923c] px-8 py-3 rounded-lg font-medium transition"
        >
          Unverbindlich anfragen
        </RouterLink>
      </div>

    </div>
  </section>
</template>

<script setup>
defineProps({ bg: String });

const addons = [
  {
    icon: '📍',
    title: 'Google Maps',
    text: 'Interaktive Karte für die Anfahrt zur Werkstatt – damit Kunden Sie leicht finden.',
    price: '+100 €',
  },
  {
    icon: '📸',
    title: 'Fullsize-Banner',
    text: 'Großer Eyecatcher ganz oben auf der Startseite – mit wechselnden Hintergrundbildern.',
    price: '+150 €',
  },
  {
    icon: '🎙️',
    title: 'Sorglos-Content',
    text: 'Kurzes Interview mit Ihnen – ich generiere professionelle Texte und Bilder.',
    price: '+250 €',
  },
];
</script>
