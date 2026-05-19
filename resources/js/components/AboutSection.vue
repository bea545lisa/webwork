<template>
  <section id="about" class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-gray-800 mb-8">Über mich</h2>
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
          <p class="text-gray-600 leading-relaxed mb-4">
            Ich bin Webentwicklerin mit langjähriger Erfahrung in der Entwicklung
            von Webanwendungen – von klassischem PHP/MySQL bis hin zu modernen
            Stacks wie Laravel und Vue.js.
          </p>
          <p class="text-gray-600 leading-relaxed">
            Meine Stärke liegt in der Verbindung von solidem Handwerk und
            modernen Technologien. Ich entwickle zuverlässige, wartbare
            Lösungen – ob Firmenseiten, Webanwendungen oder Shopify-Erweiterungen.
          </p>
        </div>
        <div>
          <h3 class="font-semibold text-gray-800 mb-4">Tech Stack</h3>
          <div class="space-y-2">
            <div v-for="skill in skills" :key="skill.name" class="flex items-center gap-3">
              <span class="text-sm text-gray-500 w-24">{{ skill.category }}</span>
              <span class="text-sm font-medium text-gray-700">{{ skill.name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const skills = [
  { category: 'Erfahren', name: 'PHP OOP · MySQL · jQuery · AJAX · SASS' },
  { category: 'Aktuell', name: 'Laravel · Vue.js · React · TypeScript' },
  { category: 'Tools', name: 'Git · Shopify API · Vite · Tailwind CSS' },
]
</script>
