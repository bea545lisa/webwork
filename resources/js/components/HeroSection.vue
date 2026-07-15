<template>
  <section id="hero" class="relative min-h-screen overflow-hidden bg-[#2e2e2e]">

    <!-- Slides -->
    <div class="relative w-full h-screen">
      <div
        v-for="(slide, index) in slides"
        :key="index"
        class="absolute inset-0 transition-opacity duration-1000"
        :class="currentSlide === index ? 'opacity-100 z-10' : 'opacity-0 z-0'"
      >
        <!-- Hintergrundbild: äußeres Div für Scale-Animation, echtes <img> für Parallax + SEO (alt, Priorität) -->
        <div class="absolute inset-0 transition-transform duration-8000"
          :class="currentSlide === index ? 'scale-100' : 'scale-105'">
          <img
            :src="slide.bg"
            :alt="slide.alt"
            :loading="index === 0 ? 'eager' : 'lazy'"
            :fetchpriority="index === 0 ? 'high' : 'auto'"
            decoding="async"
            class="absolute inset-0 w-full h-full object-cover"
            :style="{ transform: `translateY(${scrollY * 0.4}px)` }"
          />
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-linear-to-r from-[#00000080] via-[#00000040] to-[#0000001a]"></div>
        <div class="absolute inset-0 bg-linear-to-t from-[#00000066] via-transparent to-transparent"></div>

        <!-- Text Content -->
        <div class="relative z-10 flex flex-col justify-start pt-[210px] md:justify-center md:pt-0 h-full px-6 md:px-24 max-w-5xl">

          <!-- Label: trägt jetzt die H1-Semantik -->
          <div
            class="transition-all duration-700 delay-200"
            :class="currentSlide === index ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-16'"
          >
            <h1 class="inline-block border border-[#fb923c80] bg-black/10 [backdrop-filter:blur(1.5px)] text-[#fb923c] text-xs font-mono px-3 py-1 rounded-full tracking-widest uppercase mb-6">
              {{ slide.label }}
            </h1>
          </div>

          <!-- Headline: Spruch/Blickfang -->
          <div
            class="transition-all duration-700 delay-350"
            :class="currentSlide === index ? 'opacity-100 translate-x-0' : slide.direction === 'left' ? 'opacity-0 -translate-x-24' : 'opacity-0 translate-x-24'"
          >
            <h3 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-4" v-html="slide.title"></h3>
          </div>

          <!-- Subtitle: trägt jetzt die H2-Semantik -->
          <div
            class="transition-all duration-700 delay-500"
            :class="currentSlide === index ? 'opacity-100 translate-x-0' : slide.direction === 'left' ? 'opacity-0 -translate-x-16' : 'opacity-0 translate-x-16'"
          >
            <h2 class="text-xl md:text-2xl text-gray-300 font-light mb-8">{{ slide.subtitle }}</h2>
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
            : 'w-2 h-2 bg-[#ffffff4d] hover:bg-[#ffffff99]'
        ]"
      />
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 right-10 md:right-24 flex flex-col items-center gap-2 z-20">
      <div class="w-px h-12 bg-linear-to-b from-[#fb923c80] to-transparent"></div>
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
    alt: 'Entspannte Liege am Meer – Sinnbild für Full-Service Webentwicklung in Holzkirchen ohne eigenen Aufwand',
    label: 'Full-Service Webentwicklung · Holzkirchen',
    title: 'Bleiben Sie ganz<br><span style="color:#fb923c">entspannt ...</span>',
    subtitle: 'Ich kümmere mich drum',
    direction: 'left',
    cta: { label: 'Meine Leistungen', href: '#leistungen' },
  },
  {
    bg: '/images/slides/birne-sw-farbe1.jpg',
    alt: 'Glühbirne in Schwarz-Weiß mit Farbakzent – Symbol für frisches Webdesign von der Webagentur im Oberland bei München',
    label: 'Webagentur · Raum München · Oberland',
    title: 'Ich bringe Ihre Website<br>ins <span style="color:#fb923c">richtige Licht</span>',
    subtitle: 'Modernes Design, saubere Technik',
    direction: 'right',
    cta: { label: 'Referenzen ansehen', href: '#portfolio' },
  },
  {
    bg: '/images/slides/berge-sw-large.jpg',
    alt: 'Bergpanorama im Oberland – individuelle Webentwicklung mit Laravel, Vue.js, React und Shopify',
    label: 'Laravel · Vue.js · React · Shopify',
    title: 'Moderne Lösungen<br>für Ihr <span style="color:#fb923c">Business</span>',
    subtitle: 'Individuelle Webentwicklung mit langjähriger Erfahrung',
    direction: 'left',
    cta: { label: 'Kontakt aufnehmen', href: '#contact' },
  },
  {
    bg: '/images/slides/handwerker.jpg',
    alt: 'Handwerker bei der Arbeit – Webseiten-Spezial für Handwerksbetriebe zum Festpreis inklusive Schnellbewerbung',
    label: 'Branchen-Spezial · Handwerksbetriebe',
    title: 'Ihr Handwerk verdient<br>einen <span style="color:#fb923c">starken Auftritt</span>',
    subtitle: 'Webseite für Handwerker zum Festpreis',
    direction: 'right',
    cta: { label: 'Paket „Digitale Werkstatt“ ansehen', href: '#handwerk-spezial' },
  },
];

const durations = [6000, 6000, 10000, 8000]; // letzter Standard-Slide länger
const currentSlide = ref(0);
const scrollY = ref(0);
let timer = null;

function onScroll() { scrollY.value = window.scrollY; }

function scheduleNext() {
  clearTimeout(timer);
  timer = setTimeout(() => {
    currentSlide.value = (currentSlide.value + 1) % slides.length;
    scheduleNext();
  }, durations[currentSlide.value]);
}

function goTo(i) {
  currentSlide.value = i;
  scheduleNext();
}

onMounted(() => {
  scheduleNext();
  window.addEventListener('scroll', onScroll, { passive: true });
});
onUnmounted(() => {
  clearTimeout(timer);
  window.removeEventListener('scroll', onScroll);
});

watch(() => route.name, (name) => {
  if (name === 'project-detail') {
    clearTimeout(timer);
    timer = null;
  } else if (!timer) {
    scheduleNext();
  }
});
</script>
