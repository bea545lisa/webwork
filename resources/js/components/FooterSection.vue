<template>
  <footer class="bg-gray-900 text-gray-400 py-8 text-center text-sm">
    <p>© {{ year }} Beate Elisabeth Rohrmoser · Webentwicklerin · Raum München / Oberland</p>
    <p class="mt-1">
      <a href="mailto:bea.rohrmoser@gmail.com" class="hover:text-white transition">bea.rohrmoser@gmail.com</a>
    </p>
  </footer>
</template>

<script setup>
const year = new Date().getFullYear();
</script>
