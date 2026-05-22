<template>
  <section
    class="py-[150px] relative overflow-hidden"
    :style="`background-image: url('${bg || '/images/slides/holz-blumen-orange-hell.jpg'}'); background-attachment: fixed; background-size: cover; background-position: center;`"
  >
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/15"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
      <p class="text-3xl md:text-5xl text-white font-light italic leading-tight drop-shadow-lg">
        » {{ text }} «
      </p>
      <p v-if="author" class="text-[#fca44a] font-mono text-sm mt-6 tracking-wider drop-shadow-[0_2px_6px_rgba(0,0,0,1)] drop-shadow-[0_0_12px_rgba(0,0,0,0.8)]">
        — {{ author }}
      </p>
    </div>
  </section>
</template>

<script setup>
defineProps({ text: String, author: String, bg: String });
</script>
