<template>
  <section id="handwerk-erweiterungen" :class="['py-24', bg || 'bg-gray-50 dark:bg-[#454545]']">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-[#475569] dark:text-gray-100">Erweitern Sie Ihre Seite nach Bedarf</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-[3px] w-12 bg-[#fb923c]"></div>
          <p class="text-gray-500 dark:text-gray-400">Optionale Pro-Zusatzbausteine für Ihre Handwerker-Website</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div
          v-for="addon in addons"
          :key="addon.title"
          class="bg-white dark:bg-[#3d3d3d] rounded-2xl shadow-md p-6 flex flex-col"
        >
          <div class="text-3xl mb-4">{{ addon.icon }}</div>
          <h3 class="font-bold text-[#475569] dark:text-gray-100 text-lg mb-2">{{ addon.title }}</h3>
          <p class="text-gray-500 dark:text-gray-400 text-sm leading-snug flex-1">{{ addon.text }}</p>
          <div class="h-px bg-gray-200 dark:bg-white/10 my-4"></div>
          <div class="flex items-center justify-between text-sm">
            <span class="text-gray-500 dark:text-gray-400 font-mono uppercase tracking-wider text-xs">Option</span>
            <span class="font-bold text-[#475569] dark:text-gray-100">{{ addon.price }}</span>
          </div>
        </div>
      </div>

      <div class="text-center">
        <RouterLink to="/handwerk-basic" class="text-[#fb923c] font-medium hover:text-[#ea7c1e] transition">
          Mehr Erweiterungen →
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
    icon: '🎙️',
    title: 'Sorglos-Content',
    text: 'Kurzes Interview mit Ihnen – ich generiere professionelle Texte und Bilder.',
    price: '+250 €',
  },
];
</script>
