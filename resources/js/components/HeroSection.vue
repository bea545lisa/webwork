<template>
  <section id="hero" class="relative min-h-screen overflow-hidden">

    <!-- Slides -->
    <div class="relative w-full h-screen">
      <div
        v-for="(slide, index) in slides"
        :key="index"
        class="absolute inset-0 transition-opacity duration-1000"
        :class="currentSlide === index ? 'opacity-100 z-10' : 'opacity-0 z-0'"
      >
        <!-- Hintergrundbild -->
        <div
          class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-[8000ms]"
          :class="currentSlide === index ? 'scale-100' : 'scale-105'"
          :style="{ backgroundImage: `url(${slide.bg})` }"
        ></div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 via-black/25 to-black/10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

        <!-- Text Content -->
        <div class="relative z-10 flex flex-col justify-center h-full px-10 md:px-24 max-w-5xl">

          <!-- Label -->
          <div
            class="transition-all duration-700 delay-200"
            :class="currentSlide === index ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-16'"
          >
            <span class="inline-block border border-[#fb923c]/50 text-[#fb923c] text-xs font-mono px-3 py-1 rounded-full tracking-widest uppercase mb-6">
              {{ slide.label }}
            </span>
          </div>

          <!-- Headline -->
          <div
            class="transition-all duration-700 delay-[350ms]"
            :class="currentSlide === index ? 'opacity-100 translate-x-0' : slide.direction === 'left' ? 'opacity-0 -translate-x-24' : 'opacity-0 translate-x-24'"
          >
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-4"
              v-html="slide.title">
            </h1>
          </div>

          <!-- Subtitle -->
          <div
            class="transition-all duration-700 delay-500"
            :class="currentSlide === index ? 'opacity-100 translate-x-0' : slide.direction === 'left' ? 'opacity-0 -translate-x-16' : 'opacity-0 translate-x-16'"
          >
            <p class="text-xl md:text-2xl text-gray-300 font-light mb-8">{{ slide.subtitle }}</p>
          </div>

          <!-- CTA -->
          <div
            class="transition-all duration-700 delay-700"
            :class="currentSlide === index ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
          >
            <a :href="slide.cta.href"
              class="inline-flex items-center gap-2 bg-[#fb923c] hover:bg-[#a84e2e] text-white px-8 py-3 rounded-full font-medium transition">
              {{ slide.cta.label }} →
            </a>
          </div>

        </div>
      </div>
    </div>

    <!-- Dots -->
    <div class="absolute bottom-10 left-10 md:left-24 flex gap-3 z-20">
      <button
        v-for="(slide, index) in slides"
        :key="index"
        @click="goTo(index)"
        :class="[
          'transition-all duration-300 rounded-full',
          currentSlide === index
            ? 'w-8 h-2 bg-[#fb923c]'
            : 'w-2 h-2 bg-white/30 hover:bg-white/60'
        ]"
      />
    </div>

    <!-- Pfeile -->
    <button @click="prev"
      class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 flex items-center justify-center border border-white/20 hover:border-[#fb923c]/50 text-white/60 hover:text-[#fb923c] text-2xl transition rounded-full">
      &#8249;
    </button>
    <button @click="next"
      class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 flex items-center justify-center border border-white/20 hover:border-[#fb923c]/50 text-white/60 hover:text-[#fb923c] text-2xl transition rounded-full">
      &#8250;
    </button>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 right-10 md:right-24 flex flex-col items-center gap-2 z-20">
      <div class="w-px h-12 bg-gradient-to-b from-[#fb923c]/50 to-transparent"></div>
      <span class="text-gray-500 text-xs font-mono tracking-widest -rotate-90 mt-2">SCROLL</span>
    </div>

  </section>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const slides = [
  {
    bg: '/images/slides/meer-strand-liege-large.jpg',
    label: '[web]work oberland',
    title: 'Bleiben Sie ganz<br><span style="color:#fb923c">entspannt ...</span>',
    subtitle: 'Wir kümmern uns drum',
    direction: 'left',
    cta: { label: 'Unser Angebot', href: '#angebot' },
  },
  {
    bg: '/images/slides/birne-sw-farbe1.jpg',
    label: 'Webentwicklung · Raum München / Oberland',
    title: 'Wir bringen Ihre Website<br>ins <span style="color:#fb923c">richtige Licht</span>',
    subtitle: 'Laravel · Vue.js · React · Shopify',
    direction: 'right',
    cta: { label: 'Referenzen ansehen', href: '#portfolio' },
  },
  {
    bg: '/images/slides/berge-sw-large.jpg',
    label: 'Laravel · Vue.js · React · Shopify',
    title: 'Moderne Lösungen<br>für Ihr <span style="color:#fb923c">Business</span>',
    subtitle: 'Individuelle Webentwicklung mit langjähriger Erfahrung',
    direction: 'left',
    cta: { label: 'Kontakt aufnehmen', href: '#contact' },
  },
];

const durations = [6000, 6000, 10000]; // letzter Slide länger
const currentSlide = ref(0);
let timer = null;

function scheduleNext() {
  clearTimeout(timer);
  timer = setTimeout(() => {
    currentSlide.value = (currentSlide.value + 1) % slides.length;
    scheduleNext();
  }, durations[currentSlide.value]);
}

function next() {
  currentSlide.value = (currentSlide.value + 1) % slides.length;
  scheduleNext();
}
function prev() {
  currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length;
  scheduleNext();
}
function goTo(i) {
  currentSlide.value = i;
  scheduleNext();
}

onMounted(() => scheduleNext());
onUnmounted(() => clearTimeout(timer));

watch(() => route.name, (name) => {
  if (name === 'project-detail') {
    clearTimeout(timer);
    timer = null;
  } else if (!timer) {
    scheduleNext();
  }
});
</script>
