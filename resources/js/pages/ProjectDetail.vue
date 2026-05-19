<template>
  <div v-if="project">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/90 backdrop-blur-sm shadow-sm z-50">
      <div class="max-w-6xl mx-auto px-6 py-4 flex items-center gap-4">
        <RouterLink to="/#portfolio" class="text-gray-500 hover:text-gray-900 transition flex items-center gap-2 text-sm">
          ← Zurück zum Portfolio
        </RouterLink>
        <span class="text-gray-300">|</span>
        <span class="text-gray-800 font-medium">{{ project.title }}</span>
      </div>
    </nav>

    <!-- Hero Bild -->
    <div class="pt-16">
      <img
        :src="project.images[0]"
        :alt="project.title"
        class="w-full max-h-96 object-cover"
      />
    </div>

    <!-- Inhalt -->
    <div class="max-w-4xl mx-auto px-6 py-16">

      <!-- Titel + Meta -->
      <div class="mb-10">
        <span class="text-sm text-gray-400 uppercase tracking-wider">{{ project.subtitle }}</span>
        <h1 class="text-4xl font-bold text-gray-900 mt-1 mb-4">{{ project.title }}</h1>
        <div class="flex flex-wrap gap-6 text-sm text-gray-500">
          <span v-if="project.zeitraum">📅 {{ project.zeitraum }}</span>
          <a v-if="project.url" :href="project.url" target="_blank"
            class="text-blue-600 hover:underline">🔗 Website ansehen</a>
        </div>
      </div>

      <!-- 2-Spalten Layout: Beschreibung + Infos -->
      <div class="grid md:grid-cols-3 gap-10 mb-16">

        <!-- Beschreibung -->
        <div class="md:col-span-2">
          <h2 class="text-lg font-semibold text-gray-800 mb-3">Über das Projekt</h2>
          <p class="text-gray-600 leading-relaxed">{{ project.beschreibung }}</p>

          <!-- Features -->
          <div v-if="project.features?.length" class="mt-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Features</h2>
            <ul class="space-y-2">
              <li v-for="f in project.features" :key="f"
                class="flex items-start gap-2 text-gray-600">
                <span class="text-gray-400 mt-1">✓</span>
                {{ f }}
              </li>
            </ul>
          </div>
        </div>

        <!-- Tech Stack -->
        <div>
          <h2 class="text-lg font-semibold text-gray-800 mb-3">Tech Stack</h2>
          <div class="flex flex-wrap gap-2">
            <span v-for="tech in project.techs" :key="tech"
              class="bg-gray-100 text-gray-700 text-sm px-3 py-1 rounded-full">
              {{ tech }}
            </span>
          </div>
        </div>
      </div>

      <!-- Bildergalerie -->
      <div v-if="project.images.length > 1">
        <h2 class="text-lg font-semibold text-gray-800 mb-6">Screenshots</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div
            v-for="(img, index) in project.images"
            :key="index"
            @click="lightboxIndex = index"
            class="overflow-hidden rounded-lg cursor-pointer group"
          >
            <img
              :src="img"
              :alt="`${project.title} Screenshot ${index + 1}`"
              class="w-full object-cover group-hover:scale-105 transition duration-300"
            />
          </div>
        </div>
      </div>

      <!-- Navigation zwischen Projekten -->
      <div class="flex justify-between mt-16 pt-8 border-t border-gray-200">
        <RouterLink v-if="prevProject" :to="`/portfolio/${prevProject.slug}`"
          class="flex items-center gap-2 text-gray-500 hover:text-gray-900 transition">
          ← {{ prevProject.title }}
        </RouterLink>
        <span v-else></span>
        <RouterLink v-if="nextProject" :to="`/portfolio/${nextProject.slug}`"
          class="flex items-center gap-2 text-gray-500 hover:text-gray-900 transition">
          {{ nextProject.title }} →
        </RouterLink>
      </div>
    </div>

    <!-- Lightbox -->
    <Transition name="fade">
      <div v-if="lightboxIndex !== null"
        @click.self="lightboxIndex = null"
        class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4">
        <button @click="lightboxIndex = null"
          class="absolute top-4 right-6 text-white text-3xl hover:text-gray-300">&times;</button>
        <button v-if="lightboxIndex > 0" @click="lightboxIndex--"
          class="absolute left-4 text-white text-3xl hover:text-gray-300">&#8249;</button>
        <img :src="project.images[lightboxIndex]" class="max-w-full max-h-screen rounded-lg" />
        <button v-if="lightboxIndex < project.images.length - 1" @click="lightboxIndex++"
          class="absolute right-4 text-white text-3xl hover:text-gray-300">&#8250;</button>
      </div>
    </Transition>

    <FooterSection />
  </div>

  <!-- 404 -->
  <div v-else class="min-h-screen flex items-center justify-center">
    <div class="text-center">
      <p class="text-gray-400 mb-4">Projekt nicht gefunden.</p>
      <RouterLink to="/" class="text-gray-800 underline">← Zurück zur Startseite</RouterLink>
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
