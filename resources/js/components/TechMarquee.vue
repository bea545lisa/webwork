<template>
  <section class="py-16 bg-[#111827] overflow-hidden border-y border-white/5">
    <div class="max-w-6xl mx-auto px-6 mb-10">
      <span class="font-mono text-orange-500 text-sm tracking-widest uppercase">// Stack</span>
      <h2 class="text-2xl font-bold text-white mt-1">Technologien</h2>
      <div class="h-px w-12 bg-orange-500 mt-2"></div>
    </div>

    <div class="relative">
      <div class="absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-[#111827] to-transparent z-10"></div>
      <div class="absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-[#111827] to-transparent z-10"></div>

      <div class="flex marquee-track">
        <div v-for="n in 2" :key="n" class="flex gap-10 items-center px-5 shrink-0">
          <div
            v-for="tech in techs"
            :key="`${n}-${tech.name}`"
            class="flex flex-col items-center gap-2 group cursor-default"
          >
            <div class="w-12 h-12 flex items-center justify-center p-2 rounded-lg bg-white/5 group-hover:bg-orange-500/10 border border-white/5 group-hover:border-orange-500/30 transition-all duration-300">
              <img
                :src="`https://cdn.simpleicons.org/${tech.slug}/${tech.color}`"
                :alt="tech.name"
                class="w-7 h-7 opacity-60 group-hover:opacity-100 transition duration-300"
              />
            </div>
            <span class="text-xs text-gray-600 group-hover:text-orange-400 transition font-mono whitespace-nowrap">
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
  { name: 'PHP',        slug: 'php',           color: 'ffffff' },
  { name: 'Laravel',    slug: 'laravel',        color: 'FF2D20' },
  { name: 'Vue.js',     slug: 'vuedotjs',       color: '42b883' },
  { name: 'React',      slug: 'react',          color: '61DAFB' },
  { name: 'TypeScript', slug: 'typescript',     color: '3178C6' },
  { name: 'JavaScript', slug: 'javascript',     color: 'F7DF1E' },
  { name: 'Tailwind',   slug: 'tailwindcss',    color: '06B6D4' },
  { name: 'Vite',       slug: 'vite',           color: '646CFF' },
  { name: 'MySQL',      slug: 'mysql',          color: 'ffffff' },
  { name: 'HTML5',      slug: 'html5',          color: 'E34F26' },
  { name: 'CSS3',       slug: 'css3',           color: '1572B6' },
  { name: 'SASS',       slug: 'sass',           color: 'CC6699' },
  { name: 'jQuery',     slug: 'jquery',         color: '0769AD' },
  { name: 'Git',        slug: 'git',            color: 'F05032' },
  { name: 'GitHub',     slug: 'github',         color: 'ffffff' },
  { name: 'Shopify',    slug: 'shopify',        color: '96BF48' },
  { name: 'Node.js',    slug: 'nodedotjs',      color: '339933' },
  { name: 'Adobe',      slug: 'adobe',          color: 'FF0000' },
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
  100% { transform: translateX(-50%); }
}
</style>
