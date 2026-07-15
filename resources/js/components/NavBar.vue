<template>
  <Transition name="navfade" :duration="400">
    <nav v-if="!isDetailPage"
      class="fixed top-0 w-full z-50 transition-all duration-1000"
      :class="scrolled
        ? (isLightPage ? 'bg-[#ffffffe6] dark:bg-[#2e2e2ee6] backdrop-blur-md border-b border-gray-200 dark:border-white/10 py-2' : 'bg-[#00000066] backdrop-blur-md border-b border-[#ffffff4d] py-2')
        : 'bg-transparent border-b border-transparent py-4'"
    >
      <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">

        <RouterLink to="/" class="flex flex-col leading-tight group">
          <span class="font-mono tracking-wider transition-all duration-1000"
            :class="[scrolled ? 'text-base' : 'text-lg', isLightPage ? 'text-[#475569] dark:text-gray-100' : 'text-white']">
            <span class="font-extrabold"><span class="text-[#fb923c]">[</span>web<span class="text-[#fb923c]">]</span></span><span class="font-normal">work</span>
          </span>
          <span class="text-xs overflow-hidden transition-all duration-1000"
            :class="[scrolled ? 'max-h-0 opacity-0' : 'max-h-5 opacity-100', isLightPage ? 'text-gray-500 dark:text-gray-400' : 'text-gray-300']">Webideen für das Oberland</span>
        </RouterLink>

        <ul class="hidden md:flex gap-8 text-sm font-medium" :class="isLightPage ? 'text-[#475569] dark:text-gray-100' : 'text-white'">
          <li v-for="item in navItems" :key="item.href">
            <RouterLink v-if="isLightPage" :to="'/' + item.href" class="hover:text-[#fb923c] transition">
              {{ item.label }}
            </RouterLink>
            <a v-else href="#" @click.prevent="scrollTo(item.href)"
              class="hover:text-[#fb923c] transition">
              {{ item.label }}
            </a>
          </li>
        </ul>

        <!-- Hamburger-Button (nur mobil) -->
        <button
          type="button"
          class="md:hidden flex items-center justify-center w-9 h-9 -mr-2"
          :class="isLightPage ? 'text-[#475569] dark:text-gray-100' : 'text-white'"
          :aria-expanded="mobileMenuOpen"
          aria-label="Menü öffnen/schließen"
          @click="mobileMenuOpen = !mobileMenuOpen"
        >
          <svg v-if="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

      </div>

      <!-- Mobiles Dropdown-Menü -->
      <Transition name="navfade" :duration="200">
        <ul
          v-if="mobileMenuOpen"
          class="md:hidden flex flex-col gap-1 px-6 pt-2 pb-4 text-sm font-medium border-t"
          :class="isLightPage
            ? 'text-[#475569] dark:text-gray-100 bg-white/95 dark:bg-[#2e2e2e]/95 border-gray-200 dark:border-white/10'
            : 'text-white bg-black/70 backdrop-blur-md border-[#ffffff33]'"
        >
          <li v-for="item in navItems" :key="item.href">
            <RouterLink v-if="isLightPage" :to="'/' + item.href" class="block py-2 hover:text-[#fb923c] transition" @click="mobileMenuOpen = false">
              {{ item.label }}
            </RouterLink>
            <a v-else href="#" @click.prevent="scrollTo(item.href); mobileMenuOpen = false"
              class="block py-2 hover:text-[#fb923c] transition">
              {{ item.label }}
            </a>
          </li>
        </ul>
      </Transition>
    </nav>
  </Transition>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import { useRoute } from 'vue-router';
import { isDirectVisit, directVisitRoutes } from '../router/directVisit.js';

const scrolled = ref(false);
const mobileMenuOpen = ref(false);
const route = useRoute();
// /handwerk-basic und /leistungen verhalten sich wie project-detail/ueber-mich
// (Menü versteckt), AUSSER sie wurden direkt aufgerufen (z.B. via Google) –
// dann bleibt das Menü sichtbar.
const isOverlay = computed(() =>
  ['project-detail', 'ueber-mich', 'impressum', 'datenschutz'].includes(route.name) ||
  (directVisitRoutes.includes(route.name) && !isDirectVisit.value)
);
const isLightPage = computed(() => route.name !== 'home');
// Ein-/Ausblenden reagiert sofort auf die Route (kein künstliches Delay mehr,
// das sich z.B. nach Klick auf den Zurück-Button träge angefühlt hat).
// Der sanfte Übergang läuft stattdessen über die navfade-Transition unten.
const isDetailPage = computed(() => isOverlay.value);

const navItems = [
  { href: '#leistungen', label: 'Leistungen' },
  { href: '#portfolio', label: 'Referenzen' },
  { href: '#contact',   label: 'Kontakt' },
];

function scrollTo(hash) {
  const el = document.querySelector(hash);
  if (!el) return;
  const target = el.getBoundingClientRect().top + window.scrollY;
  const start = window.scrollY;
  const distance = target - start;
  const duration = 700;
  let startTime = null;

  function ease(t) { return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t; }

  function step(timestamp) {
    if (!startTime) startTime = timestamp;
    const progress = Math.min((timestamp - startTime) / duration, 1);
    window.scrollTo(0, start + distance * ease(progress));
    if (progress < 1) requestAnimationFrame(step);
  }

  requestAnimationFrame(step);
}

// Auf der Detailseite scrollt nicht das Fenster, sondern der Overlay-Container.
let scrollTarget = window;

function onScroll() {
  const y = scrollTarget === window ? window.scrollY : scrollTarget.scrollTop;
  scrolled.value = y > 50;
}

function attachScrollListener() {
  scrollTarget.removeEventListener('scroll', onScroll);
  scrollTarget = route.name === 'home' ? window : (document.querySelector('.detail-overlay') || window);
  scrollTarget.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

onMounted(attachScrollListener);
onUnmounted(() => scrollTarget.removeEventListener('scroll', onScroll));
watch(() => route.name, async () => {
  mobileMenuOpen.value = false;
  await nextTick();
  attachScrollListener();
});
</script>

<style scoped>
.navfade-enter-active,
.navfade-leave-active {
  transition: opacity 0.4s ease;
}
.navfade-enter-from,
.navfade-leave-to {
  opacity: 0;
}
</style>
