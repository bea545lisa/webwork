<template>
  <div v-if="project" class="bg-[#e4e4e4] min-h-screen">

    <!-- Inhalt -->
    <div class="max-w-6xl mx-auto px-6 py-16">

      <!-- Titel + Zurück-Pfeil -->
      <div class="mb-12">
        <div class="flex items-center gap-6 mb-2">
          <button @click="goBack"
            class="text-[#5e5854] hover:text-[#fb923c] transition font-bold text-3xl shrink-0 cursor-pointer">
            ←
          </button>
          <h1 class="text-4xl md:text-5xl font-bold text-[#5e5854]">{{ project.title }}</h1>
        </div>
        <span class="font-mono text-[#fb923c] text-sm tracking-widest uppercase ml-10">{{ project.subtitle }}</span>
        <div class="flex flex-wrap gap-6 text-sm text-[#5e5854] font-mono mt-3 ml-10">
          <span v-if="project.zeitraum">📅 {{ project.zeitraum }}</span>
          <a v-if="project.url" :href="project.url" target="_blank"
            class="text-[#fb923c] hover:text-[#fb923c] transition">🔗 Website ansehen</a>
        </div>
        <div class="h-[3px] w-16 bg-[#fb923c] mt-6"></div>
      </div>

      <!-- 2-Spalten Layout -->
      <div class="grid md:grid-cols-3 gap-10 mb-16">

        <div class="md:col-span-2 space-y-8">
          <div>
            <h2 class="font-mono text-sm text-[#fb923c] uppercase tracking-widest mb-3">[ Über das Projekt ]</h2>
            <p class="text-[#5e5854] leading-relaxed">{{ project.beschreibung }}</p>
          </div>

          <div v-if="project.features?.length">
            <h2 class="font-mono text-sm text-[#fb923c] uppercase tracking-widest mb-3">[ Features ]</h2>
            <ul class="space-y-2">
              <li v-for="f in project.features" :key="f"
                class="flex items-start gap-3 text-[#5e5854] text-sm">
                <span class="text-[#fb923c] mt-0.5 font-mono">→</span>
                {{ f }}
              </li>
            </ul>
          </div>
        </div>

        <div>
          <h2 class="font-mono text-sm text-[#fb923c] uppercase tracking-widest mb-3">[ Tech Stack ]</h2>
          <div class="flex flex-wrap gap-2">
            <span v-for="tech in project.techs" :key="tech"
              class="bg-white border border-[#5e5854]/20 text-[#5e5854] text-xs px-3 py-1 rounded-full font-mono hover:border-[#fb923c]/50 hover:text-[#fb923c] transition">
              {{ tech }}
            </span>
          </div>
        </div>
      </div>

      <!-- Bildergalerie -->
      <div v-if="project.images.length > 0">
        <h2 class="font-mono text-sm text-[#fb923c] uppercase tracking-widest mb-6">[ Screenshots ]</h2>
        <div class="flex flex-wrap gap-4">
          <div v-for="(img, index) in project.images" :key="index"
            class="overflow-hidden rounded-xl border border-white/5">
            <img :src="img" :alt="`${project.title} ${index + 1}`"
              class="max-w-full h-auto opacity-90 block mix-blend-multiply" />
          </div>
        </div>
      </div>

      <!-- Prev / Next -->
      <div class="flex justify-between mt-16 pt-8 border-t border-[#5e5854]/20">
        <RouterLink v-if="prevProject" :to="`/portfolio/${prevProject.slug}`"
          class="flex items-center gap-2 text-[#5e5854] hover:text-[#fb923c] transition font-mono text-sm">
          ← {{ prevProject.title }}
        </RouterLink>
        <span v-else></span>
        <RouterLink v-if="nextProject" :to="`/portfolio/${nextProject.slug}`"
          class="flex items-center gap-2 text-[#5e5854] hover:text-[#fb923c] transition font-mono text-sm">
          {{ nextProject.title }} →
        </RouterLink>
      </div>
    </div>

    <FooterSection />
  </div>

  <div v-else class="min-h-screen bg-[#e8e4e0] flex items-center justify-center">
    <div class="text-center">
      <p class="text-gray-500 font-mono mb-4">// 404 — Projekt nicht gefunden</p>
      <RouterLink to="/" class="text-[#fb923c] hover:text-[#d4724a] transition font-mono text-sm">← Zurück</RouterLink>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { projects } from '../data/projects.js';
import FooterSection from '../components/FooterSection.vue';

const route = useRoute();
const router = useRouter();

const project = computed(() => projects.find(p => p.slug === route.params.slug));
const currentIndex = computed(() => projects.findIndex(p => p.slug === route.params.slug));
const prevProject = computed(() => currentIndex.value > 0 ? projects[currentIndex.value - 1] : null);
const nextProject = computed(() => currentIndex.value < projects.length - 1 ? projects[currentIndex.value + 1] : null);

function goBack() {
  router.back();
}
</script>
