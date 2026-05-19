<template>
  <nav
    class="fixed top-0 w-full z-50 transition-all duration-300"
    :class="scrolled ? 'bg-[#1e1e2e]/95 backdrop-blur-sm border-b border-white/5' : 'bg-transparent'"
  >
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

      <RouterLink to="/" class="flex flex-col leading-tight group">
        <span class="font-mono font-bold text-white tracking-wider">
          <span class="text-orange-500">[</span>web<span class="text-orange-500">]</span>work
        </span>
        <span class="text-xs text-gray-500 group-hover:text-gray-400 transition">Webideen für das Oberland</span>
      </RouterLink>

      <ul class="hidden md:flex gap-8 text-sm font-medium text-gray-400">
        <li v-for="item in navItems" :key="item.href">
          <a :href="item.href"
            class="hover:text-orange-400 transition relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-px after:bg-orange-500 after:transition-all hover:after:w-full">
            {{ item.label }}
          </a>
        </li>
      </ul>

    </div>
  </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const scrolled = ref(false);

const navItems = [
  { href: '#angebot',   label: 'Angebot' },
  { href: '#portfolio', label: 'Referenzen' },
  { href: '#contact',   label: 'Kontakt' },
  { href: '#impressum', label: 'Impressum' },
];

function onScroll() { scrolled.value = window.scrollY > 50; }
onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>
