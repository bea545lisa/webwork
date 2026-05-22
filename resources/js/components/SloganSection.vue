<template>
  <section
    class="py-[150px] relative overflow-hidden"
    :style="`background-image: url('${bg || '/images/slides/holz-blumen-orange-hell.jpg'}'); background-attachment: fixed; background-size: cover; background-position: center;`"
  >
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/10"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
      <p class="text-3xl md:text-5xl text-white font-light italic leading-tight drop-shadow-lg">
        » {{ text }} «
      </p>
      <p v-if="author" class="text-[#fb923c] font-mono text-sm mt-6 tracking-wider">
        — {{ author }}
      </p>
    </div>
  </section>
</template>

<script setup>
defineProps({ text: String, author: String, bg: String });
</script>
