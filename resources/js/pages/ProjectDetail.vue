<template>
  <div v-if="project" class="bg-[#1e1e2e] min-h-screen">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-[#1e1e2e]/95 backdrop-blur-sm border-b border-white/5 z-50">
      <div class="max-w-6xl mx-auto px-6 py-4 flex items-center gap-4">
        <RouterLink to="/#portfolio"
          class="text-gray-500 hover:text-orange-400 transition flex items-center gap-2 text-sm font-mono">
          ← Referenzen
        </RouterLink>
        <span class="text-white/10">|</span>
        <span class="text-gray-300 text-sm">{{ project.title }}</span>
      </div>
    </nav>

    <!-- Hero Bild -->
    <div class="pt-16">
      <div class="relative overflow-hidden max-h-96">
        <img :src="project.images[0]" :alt="project.title"
          class="w-full max-h-96 object-cover opacity-70" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#1e1e2e] via-transparent to-transparent"></div>
      </div>
    </div>

    <!-- Inhalt -->
    <div class="max-w-4xl mx-auto px-6 py-16">

      <!-- Titel -->
      <div class="mb-12">
        <span class="font-mono text-orange-500 text-sm tracking-widest uppercase">{{ project.subtitle }}</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mt-2 mb-4">{{ project.title }}</h1>
        <div class="flex flex-wrap gap-6 text-sm text-gray-500 font-mono">
          <span v-if="project.zeitraum">📅 {{ project.zeitraum }}</span>
          <a v-if="project.url" :href="project.url" target="_blank"
            class="text-orange-400 hover:text-orange-300 transition">🔗 Website ansehen</a>
        </div>
        <div class="h-px w-16 bg-orange-500 mt-6"></div>
      </div>

      <!-- 2-Spalten Layout -->
      <div class="grid md:grid-cols-3 gap-10 mb-16">

        <div class="md:col-span-2 space-y-8">
          <div>
            <h2 class="font-mono text-orange-500 text-xs uppercase tracking-widest mb-3">// Über das Projekt</h2>
            <p class="text-gray-400 leading-relaxed">{{ project.beschreibung }}</p>
          </div>

          <div v-if="project.features?.length">
            <h2 class="font-mono text-orange-500 text-xs uppercase tracking-widest mb-3">// Features</h2>
            <ul class="space-y-2">
              <li v-for="f in project.features" :key="f"
                class="flex items-start gap-3 text-gray-400 text-sm">
                <span class="text-orange-500 mt-0.5 font-mono">→</span>
                {{ f }}
              </li>
            </ul>
          </div>
        </div>

        <div>
          <h2 class="font-mono text-orange-500 text-xs uppercase tracking-widest mb-3">// Tech Stack</h2>
          <div class="flex flex-wrap gap-2">
            <span v-for="tech in project.techs" :key="tech"
              class="bg-white/5 border border-white/10 text-gray-400 text-xs px-3 py-1 rounded-full font-mono hover:border-orange-500/30 hover:text-orange-400 transition">
              {{ tech }}
            </span>
          </div>
        </div>
      </div>

      <!-- Bildergalerie -->
      <div v-if="project.images.length > 1">
        <h2 class="font-mono text-orange-500 text-xs uppercase tracking-widest mb-6">// Screenshots</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div v-for="(img, index) in project.images" :key="index"
            @click="lightboxIndex = index"
            class="overflow-hidden rounded-xl border border-white/5 hover:border-orange-500/30 cursor-pointer group transition">
            <img :src="img" :alt="`${project.title} ${index + 1}`"
              class="w-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition duration-500" />
          </div>
        </div>
      </div>

      <!-- Prev / Next -->
      <div class="flex justify-between mt-16 pt-8 border-t border-white/5">
        <RouterLink v-if="prevProject" :to="`/portfolio/${prevProject.slug}`"
          class="flex items-center gap-2 text-gray-500 hover:text-orange-400 transition font-mono text-sm">
          ← {{ prevProject.title }}
        </RouterLink>
        <span v-else></span>
        <RouterLink v-if="nextProject" :to="`/portfolio/${nextProject.slug}`"
          class="flex items-center gap-2 text-gray-500 hover:text-orange-400 transition font-mono text-sm">
          {{ nextProject.title }} →
        </RouterLink>
      </div>
    </div>

    <!-- Lightbox -->
    <Transition name="fade">
      <div v-if="lightboxIndex !== null" @click.self="lightboxIndex = null"
        class="fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4">
        <button @click="lightboxIndex = null"
          class="absolute top-4 right-6 text-gray-400 hover:text-white text-3xl font-mono">&times;</button>
        <button v-if="lightboxIndex > 0" @click="lightboxIndex--"
          class="absolute left-4 text-gray-400 hover:text-orange-400 text-5xl font-mono">&#8249;</button>
        <img :src="project.images[lightboxIndex]" class="max-w-full max-h-screen rounded-xl" />
        <button v-if="lightboxIndex < project.images.length - 1" @click="lightboxIndex++"
          class="absolute right-4 text-gray-400 hover:text-orange-400 text-5xl font-mono">&#8250;</button>
      </div>
    </Transition>

    <FooterSection />
  </div>

  <div v-else class="min-h-screen bg-[#1e1e2e] flex items-center justify-center">
    <div class="text-center">
      <p class="text-gray-500 font-mono mb-4">// 404 — Projekt nicht gefunden</p>
      <RouterLink to="/" class="text-orange-400 hover:text-orange-300 transition font-mono text-sm">← Zurück</RouterLink>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from 'vue';
import { useRoute } from 'vue-router';
import { projects } from '../data/projects.js';
import FooterSection from '../components/FooterSection.vue';

const route = useRoute();
const lightboxIndex = ref(null);

const project = computed(() => projects.find(p => p.slug === route.params.slug));
const currentIndex = computed(() => projects.findIndex(p => p.slug === route.params.slug));
const prevProject = computed(() => currentIndex.value > 0 ? projects[currentIndex.value - 1] : null);
const nextProject = computed(() => currentIndex.value < projects.length - 1 ? projects[currentIndex.value + 1] : null);
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity 0.2s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
