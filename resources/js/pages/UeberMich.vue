<template>
  <div class="bg-gray-50 min-h-screen flex flex-col">
    <div class="max-w-3xl mx-auto px-6 py-16 flex-1 w-full">

      <!-- Zurück -->
      <div class="mb-12">
        <button @click="goBack"
          class="text-[#475569] hover:text-[#fb923c] transition font-bold text-3xl cursor-pointer">
          ←
        </button>
      </div>

      <!-- Foto + Name -->
      <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8 mb-10">
        <img :src="'/images/foto.jpg'" alt="Beate Rohrmoser"
          class="w-40 h-40 rounded-full object-cover shrink-0 border-4 border-white" />
        <div class="text-center sm:text-left">
          <p class="text-[#fb923c] font-mono text-lg tracking-wider mb-1">Hallo, ich bin</p>
          <h1 class="text-4xl font-bold text-[#475569] mb-1">Beate Rohrmoser</h1>
          <div class="h-[3px] w-12 bg-[#fb923c] mt-4 mx-auto sm:mx-0"></div>
        </div>
      </div>

      <!-- Bio -->
      <div class="space-y-5 text-[#475569] leading-relaxed">
        <p>
          Ich bin freiberufliche Webentwicklerin im Raum München und Oberland – mit einem klaren Fokus auf
          individuelle, moderne Weblösungen für Unternehmen und Selbständige.
        </p>
        <p>
          Mit meiner Familie und meinem Hund lebe ich in Holzkirchen – direkt vor der Haustür beginnt das Oberland.
        </p>
        <p>
          Meine Leidenschaft für das Web hat mich zum Studium der Web- und Medieninformatik geführt – seitdem begleite ich Kunden von der ersten Idee bis zur fertigen Website.
        </p>
        <p>
          Mir liegt es am Herzen, dass meine Kunden sich entspannt zurücklehnen können – ich kümmere mich
          darum, dass ihre Online-Präsenz professionell, schnell und zuverlässig funktioniert.
        </p>
      </div>

    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function goBack() {
  router.back();
}
</script>
