<template>
  <section class="py-20 bg-[#1e1e2e] relative overflow-hidden">
    <div class="absolute inset-0 flex items-center justify-center opacity-5">
      <span class="font-mono text-[20rem] font-bold text-white select-none">"</span>
    </div>
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
      <div class="h-px w-16 bg-orange-500 mx-auto mb-8"></div>
      <p class="text-xl md:text-2xl text-gray-300 font-light italic leading-relaxed">
        » {{ text }} «
      </p>
      <p v-if="author" class="text-orange-500 font-mono text-sm mt-6 tracking-wider">
        — {{ author }}
      </p>
      <div class="h-px w-16 bg-orange-500 mx-auto mt-8"></div>
    </div>
  </section>
</template>

<script setup>
defineProps({ text: String, author: String });
</script>
