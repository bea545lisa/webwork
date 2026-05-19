<template>
  <footer class="bg-[#161625] border-t border-white/5 pt-16 pb-8">
    <div class="max-w-6xl mx-auto px-6">

      <div class="grid md:grid-cols-3 gap-10 mb-12">

        <!-- Logo -->
        <div>
          <p class="font-mono font-bold text-white text-xl mb-1">
            <span class="text-orange-500">[</span>web<span class="text-orange-500">]</span>work oberland
          </p>
          <p class="text-gray-500 text-sm mb-4">Webideen für das Oberland</p>
          <p class="text-gray-600 text-sm leading-relaxed">
            Individuelle Webentwicklung für Unternehmen und Selbständige im Raum München / Oberland.
          </p>
        </div>

        <!-- Kontakt -->
        <div>
          <h4 class="font-mono text-orange-500 text-xs uppercase tracking-widest mb-4">// Kontakt</h4>
          <ul class="space-y-3 text-sm text-gray-400">
            <li><a href="tel:+4980244688225" class="hover:text-orange-400 transition">📞 08024 4688225</a></li>
            <li><a href="mailto:mail@webwork-oberland.de" class="hover:text-orange-400 transition">✉️ mail@webwork-oberland.de</a></li>
            <li>📍 Dekan-Imminger-Str. 15<br><span class="ml-6">83607 Holzkirchen</span></li>
          </ul>
        </div>

        <!-- Impressum -->
        <div id="impressum">
          <h4 class="font-mono text-orange-500 text-xs uppercase tracking-widest mb-4">// Impressum</h4>
          <ul class="space-y-1 text-sm text-gray-500">
            <li class="text-gray-400 font-medium">[web]work oberland</li>
            <li>Beate Rohrmoser</li>
            <li>Dekan-Imminger-Str. 15</li>
            <li>DE-83607 Holzkirchen</li>
            <li class="pt-2">
              <a href="mailto:mail@webwork-oberland.de" class="hover:text-orange-400 transition">
                mail@webwork-oberland.de
              </a>
            </li>
          </ul>
        </div>

      </div>

      <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-gray-600 text-xs font-mono">
          © {{ year }} [web]work oberland · Beate Rohrmoser
        </p>
        <p class="text-gray-700 text-xs font-mono">
          Built with Laravel · Vue.js · Tailwind
        </p>
      </div>

    </div>
  </footer>
</template>

<script setup>
const year = new Date().getFullYear();
</script>
