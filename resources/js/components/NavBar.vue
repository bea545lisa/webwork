<template>
  <nav v-if="!isDetailPage"
    class="fixed top-0 w-full z-50 transition-all duration-1000"
    :class="scrolled
      ? (isLightPage ? 'bg-[#ffffffe6] backdrop-blur-md border-b border-gray-200 py-2' : 'bg-[#00000066] backdrop-blur-md border-b border-[#ffffff4d] py-2')
      : 'bg-transparent border-b border-transparent py-4'"
  >
    <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">

      <RouterLink to="/" class="flex flex-col leading-tight group">
        <span class="font-mono font-bold tracking-wider transition-all duration-1000"
          :class="[scrolled ? 'text-base' : 'text-lg', isLightPage ? 'text-[#475569]' : 'text-white']">
          <span class="text-[#fb923c]">[</span>web<span class="text-[#fb923c]">]</span>work
        </span>
        <span class="text-xs transition" :class="scrolled ? 'hidden' : (isLightPage ? 'text-gray-500' : 'text-gray-300')">Webideen für das Oberland</span>
      </RouterLink>

      <ul class="hidden md:flex gap-8 text-sm font-medium" :class="isLightPage ? 'text-[#475569]' : 'text-white'">
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

    </div>
  </nav>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted, nextTick } from 'vue';
import { useRoute } from 'vue-router';

const scrolled = ref(false);
const route = useRoute();
const isOverlay = computed(() => ['project-detail', 'ueber-mich'].includes(route.name));
const isLightPage = computed(() => route.name !== 'home');
// Ausblenden passiert sofort mit der Route (kein Tick Verzögerung, sonst
// überlagert das Menü kurz den einfahrenden Drawer). Das Wieder-Einblenden
// beim Schließen bleibt verzögert, damit es nicht vor der Schließ-Animation aufblitzt.
const isClosing = ref(false);
const isDetailPage = computed(() => isOverlay.value || isClosing.value);

watch(isOverlay, (val) => {
  if (!val) {
    isClosing.value = true;
    setTimeout(() => { isClosing.value = false; }, 850);
  }
});

const navItems = [
  { href: '#angebot',   label: 'Angebot' },
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
  await nextTick();
  attachScrollListener();
});
</script>
