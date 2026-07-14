<template>
  <footer class="bg-[#424a4d] dark:bg-[#2e2e2e] border-t border-white/5 pt-8" style="padding-bottom: max(1.5rem, env(safe-area-inset-bottom))">
    <div class="max-w-6xl mx-auto px-6">

      <div class="mb-6 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
          <p class="font-mono text-white text-xl mb-1">
            <span class="font-extrabold"><span class="text-[#fb923c]">[</span>web<span class="text-[#fb923c]">]</span></span><span class="font-normal">work</span>
          </p>
          <p class="text-white/70 text-sm">Webideen für das Oberland</p>
        </div>
        <p class="text-white/60 text-sm leading-relaxed md:text-right">
          Individuelle Webentwicklung für Unternehmen und Selbständige im Raum München / Oberland.
        </p>
      </div>

      <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-white/60 text-xs font-mono">
          © {{ year }} [web]work
        </p>
        <div class="flex items-center gap-4 text-xs font-mono">
          <RouterLink to="/ueber-mich" class="text-white/60 hover:text-[#fb923c] transition">Über mich</RouterLink>
          <RouterLink to="/impressum" class="text-white/60 hover:text-[#fb923c] transition">Impressum</RouterLink>
          <RouterLink to="/datenschutz" class="text-white/60 hover:text-[#fb923c] transition">Datenschutz</RouterLink>
          <button
            @click="toggleTheme"
            type="button"
            :aria-label="isDark ? 'Helles Farbschema aktivieren' : 'Dunkles Farbschema aktivieren'"
            class="flex items-center justify-center w-7 h-7 rounded-full border border-white/20 text-white/60 hover:text-[#fb923c] hover:border-[#fb923c]/50 transition"
          >
            <svg v-if="isDark" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 3a1 1 0 011 1v1a1 1 0 11-2 0V4a1 1 0 011-1zm0 5a4 4 0 100 8 4 4 0 000-8zm9 4a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM4 12a1 1 0 01-1 1H2a1 1 0 110-2h1a1 1 0 011 1zm14.36-6.36a1 1 0 010 1.41l-.7.7a1 1 0 11-1.42-1.41l.71-.71a1 1 0 011.41 0zM6.34 17.66a1 1 0 010 1.41l-.71.71a1 1 0 11-1.41-1.42l.7-.7a1 1 0 011.42 0zM12 19a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm6.36 1.66a1 1 0 01-1.41 0l-.71-.7a1 1 0 111.42-1.42l.7.71a1 1 0 010 1.41zM5.64 6.34a1 1 0 01-1.41 0l-.7-.71a1 1 0 011.41-1.41l.7.7a1 1 0 010 1.42z"/>
            </svg>
            <svg v-else class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z"/>
            </svg>
          </button>
        </div>
      </div>

    </div>
  </footer>
</template>

<script setup>
import { useTheme } from '../theme.js';

const year = new Date().getFullYear();
const { isDark, toggleTheme } = useTheme();
</script>
