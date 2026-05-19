<template>
  <section class="py-16 bg-[#e4e4e4] overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 mb-10">
      <h2 class="text-3xl md:text-4xl font-bold text-[#5e5854]">Technologien</h2>
      <div class="h-[3px] w-12 bg-[#fb923c] mt-2"></div>
    </div>

    <div class="relative">
      <div class="absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-[#e4e4e4] to-transparent z-10"></div>
      <div class="absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-[#e4e4e4] to-transparent z-10"></div>

      <div class="flex marquee-track">
        <div v-for="n in 3" :key="n" class="flex gap-10 items-center px-5 shrink-0">
          <div
            v-for="tech in techs"
            :key="`${n}-${tech.name}`"
            class="flex flex-col items-center gap-2 group cursor-default"
          >
            <div class="w-16 h-16 flex items-center justify-center">
              <img
                :src="`https://cdn.simpleicons.org/${tech.slug}/${tech.color}`"
                :alt="tech.name"
                class="w-16 h-16 opacity-90 group-hover:opacity-100 transition duration-300"
              />
            </div>
            <span class="text-xs text-[#5e5854] group-hover:text-[#fb923c] transition font-mono whitespace-nowrap">
              {{ tech.name }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
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
</script>

<style scoped>
.marquee-track {
  animation: marquee 40s linear infinite;
  width: max-content;
}
.marquee-track:hover {
  animation-play-state: paused;
}
@keyframes marquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-33.333%); }
}
</style>
