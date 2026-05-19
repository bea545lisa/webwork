<template>
  <section id="portfolio" class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Portfolio</h2>

      <!-- Filter Buttons -->
      <div class="flex flex-wrap gap-3 mb-10">
        <button
          v-for="filter in filters"
          :key="filter.value"
          @click="activeFilter = filter.value"
          :class="[
            'px-4 py-2 rounded-full text-sm font-medium transition',
            activeFilter === filter.value
              ? 'bg-gray-900 text-white'
              : 'bg-white text-gray-600 hover:bg-gray-100'
          ]"
        >
          {{ filter.label }}
        </button>
      </div>

      <!-- Portfolio Grid -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <RouterLink
          v-for="project in filteredProjects"
          :key="project.id"
          :to="`/portfolio/${project.slug}`"
          class="group relative overflow-hidden rounded-lg bg-white shadow-sm hover:shadow-md transition"
        >
          <img
            :src="project.thumb"
            :alt="project.title"
            class="w-full aspect-square object-cover group-hover:scale-105 transition duration-300"
          />
          <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-end p-4">
            <div>
              <p class="text-white font-semibold text-sm">{{ project.title }}</p>
              <p class="text-gray-300 text-xs">{{ project.subtitle }}</p>
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
  { label: 'Alle', value: 'all' },
  { label: 'Web', value: 'web' },
  { label: 'App', value: 'app' },
  { label: 'Shop', value: 'shop' },
];

const filteredProjects = computed(() =>
  activeFilter.value === 'all'
    ? projects
    : projects.filter(p => p.category === activeFilter.value)
);
</script>
