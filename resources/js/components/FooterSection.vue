<template>
  <footer class="bg-[#4e4840] border-t border-white/5 pt-8 pb-6">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-6 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
          <p class="font-mono font-bold text-white text-xl mb-1">
            <span class="text-[#fb923c]">[</span>web<span class="text-[#fb923c]">]</span>work oberland
          </p>
          <p class="text-white/70 text-sm">Webideen für das Oberland</p>
        </div>
        <p class="text-white/60 text-sm leading-relaxed md:text-right">
          Individuelle Webentwicklung für Unternehmen und Selbständige im Raum München / Oberland.
        </p>
      </div>

      <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-white/60 text-xs font-mono">
          © {{ year }} [web]work oberland · Beate Rohrmoser
        </p>
        <div class="flex gap-4 text-xs font-mono">
          <RouterLink to="/impressum" class="text-white/60 hover:text-[#fb923c] transition">Impressum</RouterLink>
          <RouterLink to="/datenschutz" class="text-white/60 hover:text-[#fb923c] transition">Datenschutz</RouterLink>
        </div>
      </div>

    </div>
  </footer>
</template>

<script setup>
const year = new Date().getFullYear();
</script>
