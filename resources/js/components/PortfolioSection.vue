<template>
  <section id="portfolio" class="py-24 bg-[#1e1e2e]">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-12">
        <span class="font-mono text-orange-500 text-sm tracking-widest uppercase">// Projekte</span>
        <h2 class="text-3xl md:text-4xl font-bold text-white mt-2">Referenzen</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-px w-12 bg-orange-500"></div>
          <p class="text-gray-400">Ausgewählte Projekte</p>
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
              ? 'bg-orange-500 text-white border-orange-500'
              : 'border-white/10 text-gray-400 hover:border-orange-500/40 hover:text-orange-400'
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
          class="group relative overflow-hidden rounded-xl border border-white/5 hover:border-orange-500/30 transition-all duration-300"
        >
          <img
            :src="project.thumb"
            :alt="project.title"
            class="w-full aspect-square object-cover group-hover:scale-105 transition duration-500 opacity-80 group-hover:opacity-100"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-4">
            <div>
              <p class="text-white font-semibold text-sm">{{ project.title }}</p>
              <p class="text-orange-400 text-xs font-mono">{{ project.subtitle }}</p>
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
  { label: 'Alle',  value: 'all' },
  { label: 'Web',   value: 'web' },
  { label: 'App',   value: 'app' },
  { label: 'Shop',  value: 'shop' },
];

const filteredProjects = computed(() =>
  activeFilter.value === 'all'
    ? projects
    : projects.filter(p => p.category === activeFilter.value)
);
</script>
