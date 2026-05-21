<template>
  <section id="portfolio" class="py-24 bg-[#e4e4e4]">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-[#5e5854]">Referenzen</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-[3px] w-12 bg-[#fb923c]"></div>
          <p class="text-[#5e5854]">Ausgewählte Projekte</p>
        </div>
      </div>

      <!-- Filter -->
      <div class="flex flex-wrap gap-3 mb-10">
        <button
          v-for="filter in filters"
          :key="filter.value"
          @click="activeFilter = filter.value"
          :class="[
            'px-4 py-2 rounded-full text-sm font-mono transition border',
            activeFilter === filter.value
              ? 'bg-[#fb923c] text-white border-[#fb923c]'
              : 'border-[#5e5854]/30 text-[#5e5854] hover:border-[#fb923c]/40 hover:text-[#fb923c]'
          ]"
        >
          {{ filter.label }}
        </button>
      </div>

      <!-- Grid -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <RouterLink
          v-for="project in filteredProjects"
          :key="project.id"
          :to="`/portfolio/${project.slug}`"
          class="group relative overflow-hidden rounded-xl border border-white/5 hover:border-[#fb923c]/30 transition-all duration-300"
        >
          <img
            :src="project.thumb"
            :alt="project.title"
            class="w-full aspect-[4/3] object-cover group-hover:scale-105 transition duration-500 opacity-80 group-hover:opacity-100"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-4">
            <div>
              <p class="text-white font-semibold text-sm">{{ project.title }}</p>
              <p class="text-[#fb923c] text-xs font-mono">{{ project.subtitle }}</p>
            </div>
          </div>
        </RouterLink>
      </div>

    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import { projects } from '../data/projects.js';

const activeFilter = ref('all');

const filters = [
  { label: 'Alle',    value: 'all',    type: 'category' },
  { label: 'Web',     value: 'web',    type: 'category' },
  { label: 'App',     value: 'app',    type: 'category' },
  { label: 'Shop',    value: 'shop',   type: 'category' },
  { label: 'Admin',   value: 'admin',  type: 'category' },
  { label: 'jQuery',  value: 'jQuery', type: 'tech' },
];

const filteredProjects = computed(() => {
  if (activeFilter.value === 'all') return projects;
  const f = filters.find(f => f.value === activeFilter.value);
  if (f?.type === 'tech') return projects.filter(p => p.techs.includes(f.value));
  return projects.filter(p => p.category === activeFilter.value);
});
</script>
