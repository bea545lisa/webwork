<template>
  <div class="bg-[#e8e4e0] min-h-screen flex flex-col">
    <div class="max-w-3xl mx-auto px-6 py-16 flex-1 w-full">

      <div class="mb-10">
        <RouterLink to="/" class="text-[#5e5854] hover:text-[#fb923c] transition font-mono text-sm">
          ← Zurück
        </RouterLink>
      </div>

      <h1 class="text-3xl font-bold text-[#5e5854] mb-8">Impressum</h1>

      <div class="space-y-6 text-[#5e5854]">

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">Angaben gemäß § 5 TMG</h2>
          <p>[web]work oberland<br>
          Beate Rohrmoser<br>
          <!-- Adresse hier eintragen --><br>
          83607 Holzkirchen</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">Kontakt</h2>
          <p>Telefon: 08024 4688225<br>
          E-Mail: <a href="mailto:mail@webwork-oberland.de" class="hover:text-[#fb923c] transition">mail@webwork-oberland.de</a></p>
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
import FooterSection from '../components/FooterSection.vue';
</script>
