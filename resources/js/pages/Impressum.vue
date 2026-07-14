<template>
  <div class="bg-gray-50 dark:bg-[#2e2e2e] min-h-screen flex flex-col">
    <div class="max-w-6xl mx-auto px-6 py-16 flex-1 w-full">

      <div class="mb-10">
        <button @click="goBack"
          class="text-[#475569] dark:text-gray-100 hover:text-[#fb923c] transition font-bold text-3xl cursor-pointer">
          ←
        </button>
      </div>

      <h1 class="text-3xl font-bold text-[#475569] dark:text-gray-100 mb-8">Impressum</h1>

      <div class="space-y-6 text-[#475569] dark:text-gray-300">

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">Angaben gemäß § 5 TMG</h2>
          <p>[web]work<br>
          Beate Rohrmoser<br>
          <!-- Adresse hier eintragen --><br>
          Dekan-Imminger-Str. 15<br>
          83607 Holzkirchen</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">Kontakt</h2>
          <p>08024 4688225<br>
          <a :href="'mai'+'lto:'+email" class="hover:text-[#fb923c] transition">{{ email }}</a></p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">Umsatzsteuer</h2>
          <p>Gemäß § 19 UStG (Kleinunternehmerregelung) wird keine Umsatzsteuer erhoben und ausgewiesen.</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">Verantwortlich für den Inhalt</h2>
          <p>Beate Rohrmoser (Anschrift wie oben)</p>
        </div>

      </div>
    </div>
    <FooterSection />
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import FooterSection from '../components/FooterSection.vue';
const router = useRouter();
const email = ['mail', 'webwork-oberland.de'].join('@');

// In eigenem Tab geöffnet => keine Vorgeschichte in diesem Tab, dann Tab schließen statt zur Startseite zu navigieren.
function goBack() {
  if (window.history.length <= 1) {
    window.close();
  } else {
    router.back();
  }
}
</script>
