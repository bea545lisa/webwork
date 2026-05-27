<template>
  <section class="py-32 bg-gray-50 overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 mb-10">
      <h2 class="text-3xl md:text-4xl font-bold text-[#475569]">Technologien</h2>
      <div class="h-[3px] w-12 bg-[#fb923c] mt-2"></div>
    </div>

    <div class="relative">
      <div class="absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none"></div>
      <div class="absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none"></div>

      <div
        ref="trackRef"
        class="flex select-none"
        :style="{ transform: `translateX(-${position}px)`, cursor: isDragging ? 'grabbing' : 'grab' }"
        @mousedown="onDragStart"
        @mousemove="onDragMove"
        @mouseup="onDragEnd"
        @mouseleave="onDragEnd"
        @touchstart.passive="onTouchStart"
        @touchmove.passive="onTouchMove"
        @touchend="onDragEnd"
      >
        <div v-for="n in 3" :key="n" class="flex gap-10 items-center px-5 shrink-0">
          <div
            v-for="tech in techs"
            :key="`${n}-${tech.name}`"
            class="flex flex-col items-center gap-2 group"
          >
            <div class="w-16 h-16 flex items-center justify-center">
              <img
                :src="`https://cdn.simpleicons.org/${tech.slug}/${tech.color}`"
                :alt="tech.name"
                class="w-16 h-16 opacity-90 group-hover:opacity-100 transition duration-300 pointer-events-none"
              />
            </div>
            <span class="text-xs text-[#475569] group-hover:text-[#fb923c] transition font-mono whitespace-nowrap">
              {{ tech.name }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';

const techs = [
  { name: 'PHP',        slug: 'php',           color: '2d2d2d' },
  { name: 'Laravel',    slug: 'laravel',        color: '2d2d2d' },
  { name: 'Vue.js',     slug: 'vuedotjs',       color: '2d2d2d' },
  { name: 'React',      slug: 'react',          color: '2d2d2d' },
  { name: 'JavaScript', slug: 'javascript',     color: '2d2d2d' },
  { name: 'MySQL',      slug: 'mysql',          color: '2d2d2d' },
  { name: 'HTML5',      slug: 'html5',          color: '2d2d2d' },
  { name: 'SASS',       slug: 'sass',           color: '2d2d2d' },
  { name: 'jQuery',     slug: 'jquery',         color: '2d2d2d' },
  { name: 'Git',        slug: 'git',            color: '2d2d2d' },
  { name: 'Shopify',    slug: 'shopify',        color: '2d2d2d' },
  { name: 'Node.js',    slug: 'nodedotjs',      color: '2d2d2d' },
];

const trackRef = ref(null);
const position = ref(0);
const isDragging = ref(false);

let setWidth = 0;       // Breite eines Drittels (ein Satz Icons)
let animFrame = null;
let dragStartX = 0;
let dragStartPos = 0;
let lastX = 0;
let velocity = 0;

const AUTO_SPEED = 0.6; // px pro Frame (Auto-Scroll)

function animate() {
  if (!isDragging.value) {
    // Sanft zur Auto-Speed überblenden via velocity
    velocity += (AUTO_SPEED - velocity) * 0.05;
    position.value += velocity;
  }

  // Loop: nach einem Drittel zurückspringen
  if (setWidth > 0) {
    if (position.value >= setWidth) position.value -= setWidth;
    if (position.value < 0) position.value += setWidth;
  }

  animFrame = requestAnimationFrame(animate);
}

function onDragStart(e) {
  isDragging.value = true;
  dragStartX = e.clientX;
  dragStartPos = position.value;
  lastX = e.clientX;
  velocity = 0;
}

function onDragMove(e) {
  if (!isDragging.value) return;
  velocity = lastX - e.clientX; // für Momentum nach Loslassen
  lastX = e.clientX;
  position.value = dragStartPos + (dragStartX - e.clientX);
}

function onDragEnd() {
  if (!isDragging.value) return;
  isDragging.value = false;
  // velocity bleibt, damit die Animation sanft weiterläuft
}

function onTouchStart(e) {
  isDragging.value = true;
  dragStartX = e.touches[0].clientX;
  dragStartPos = position.value;
  lastX = e.touches[0].clientX;
  velocity = 0;
}

function onTouchMove(e) {
  if (!isDragging.value) return;
  velocity = lastX - e.touches[0].clientX;
  lastX = e.touches[0].clientX;
  position.value = dragStartPos + (dragStartX - e.touches[0].clientX);
}

onMounted(async () => {
  await nextTick();
  if (trackRef.value) {
    setWidth = trackRef.value.scrollWidth / 3;
  }
  animFrame = requestAnimationFrame(animate);
});

onUnmounted(() => {
  if (animFrame) cancelAnimationFrame(animFrame);
});
</script>
