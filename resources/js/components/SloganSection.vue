<template>
  <section ref="sectionRef" class="py-48 relative overflow-hidden">
    <!-- Parallax Hintergrundbild -->
    <div class="absolute left-0 right-0 bg-cover"
      :style="{
        backgroundImage: `url('${bg || '/images/slides/holz-blumen-orange-hell.jpg'}')`,
        backgroundPosition: bgPosition || 'center center',
        top: '-120px',
        bottom: '-120px',
        transform: `translateY(${parallaxOffset}px)`
      }">
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/15"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
      <p class="text-3xl md:text-5xl text-white font-light italic leading-relaxed drop-shadow-lg">
        » {{ text }} «
      </p>
      <p v-if="author" class="text-[#fca44a] font-mono text-sm mt-6 tracking-wider drop-shadow-[0_2px_6px_rgba(0,0,0,1)] drop-shadow-[0_0_12px_rgba(0,0,0,0.8)]">
        — {{ author }}
      </p>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

defineProps({ text: String, author: String, bg: String, bgPosition: String });

const sectionRef = ref(null);
const parallaxOffset = ref(0);

function onScroll() {
  if (!sectionRef.value) return;
  const rect = sectionRef.value.getBoundingClientRect();
  if (rect.bottom < 0 || rect.top > window.innerHeight) {
    parallaxOffset.value = 0;
    return;
  }
  const centerOffset = rect.top + rect.height / 2 - window.innerHeight / 2;
  parallaxOffset.value = centerOffset * 0.15;
}

onMounted(() => {
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
});
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>
