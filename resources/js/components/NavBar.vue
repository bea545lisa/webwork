<template>
  <nav v-if="!isDetailPage"
    class="fixed top-0 w-full z-50 transition-all duration-300"
    :class="scrolled ? 'bg-black/40 backdrop-blur-md border-b border-white/30 py-2' : 'bg-transparent border-b border-transparent py-4'"
  >
    <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">

      <RouterLink to="/" class="flex flex-col leading-tight group">
        <span class="font-mono font-bold tracking-wider transition-all duration-300" :class="scrolled ? 'text-base text-white' : 'text-lg text-white'">
          <span class="text-[#fb923c]">[</span>web<span class="text-[#fb923c]">]</span>work
        </span>
        <span class="text-xs transition" :class="scrolled ? 'hidden' : 'text-gray-300'">Webideen für das Oberland</span>
      </RouterLink>

      <ul class="hidden md:flex gap-8 text-sm font-medium" :class="scrolled ? 'text-white' : 'text-white'">
        <li v-for="item in navItems" :key="item.href">
          <a href="#" @click.prevent="scrollTo(item.href)"
            class="hover:text-[#fb923c] transition">
            {{ item.label }}
          </a>
        </li>
      </ul>

    </div>
  </nav>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { useRoute } from 'vue-router';

const scrolled = ref(false);
const route = useRoute();
const isDetailPage = computed(() => ['project-detail', 'ueber-mich'].includes(route.name));

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

function onScroll() { scrolled.value = window.scrollY > 50; }
onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>
