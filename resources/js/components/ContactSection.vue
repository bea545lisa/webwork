<template>
  <section id="contact" class="py-24 bg-[#252540]">
    <div class="max-w-4xl mx-auto px-6">

      <div class="mb-12">
        <span class="font-mono text-orange-500 text-sm tracking-widest uppercase">// Kontakt</span>
        <h2 class="text-3xl md:text-4xl font-bold text-white mt-2">Schreiben Sie uns</h2>
        <div class="flex items-center gap-4 mt-3">
          <div class="h-px w-12 bg-orange-500"></div>
          <p class="text-gray-400">Wir freuen uns auf Ihre Anfrage</p>
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-12">

        <!-- Kontaktinfos -->
        <div class="space-y-6">
          <div v-for="item in contactInfo" :key="item.label"
            class="flex items-start gap-4 group">
            <div class="w-10 h-10 rounded-lg bg-orange-500/10 border border-orange-500/20 flex items-center justify-center text-orange-500 shrink-0 group-hover:bg-orange-500/20 transition">
              {{ item.icon }}
            </div>
            <div>
              <p class="text-gray-500 text-xs font-mono uppercase tracking-wider mb-1">{{ item.label }}</p>
              <a v-if="item.href" :href="item.href" class="text-gray-300 hover:text-orange-400 transition">
                {{ item.value }}
              </a>
              <p v-else class="text-gray-300">{{ item.value }}</p>
            </div>
          </div>
        </div>

        <!-- Formular -->
        <form @submit.prevent="submitForm" class="space-y-4">
          <div>
            <label class="block text-xs font-mono text-gray-500 uppercase tracking-wider mb-1">Name</label>
            <input v-model="form.name" type="text" required
              class="w-full bg-[#1e1e2e] border border-white/10 rounded-lg px-4 py-3 text-gray-300 focus:outline-none focus:border-orange-500/50 transition placeholder-gray-600"
              placeholder="Ihr Name" />
          </div>
          <div>
            <label class="block text-xs font-mono text-gray-500 uppercase tracking-wider mb-1">E-Mail</label>
            <input v-model="form.email" type="email" required
              class="w-full bg-[#1e1e2e] border border-white/10 rounded-lg px-4 py-3 text-gray-300 focus:outline-none focus:border-orange-500/50 transition placeholder-gray-600"
              placeholder="ihre@email.de" />
          </div>
          <div>
            <label class="block text-xs font-mono text-gray-500 uppercase tracking-wider mb-1">Nachricht</label>
            <textarea v-model="form.message" rows="5" required
              class="w-full bg-[#1e1e2e] border border-white/10 rounded-lg px-4 py-3 text-gray-300 focus:outline-none focus:border-orange-500/50 transition placeholder-gray-600 resize-none"
              placeholder="Ihre Nachricht..."></textarea>
          </div>
          <button type="submit"
            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg font-medium transition flex items-center justify-center gap-2">
            Nachricht senden →
          </button>
          <p v-if="success" class="text-green-400 text-sm text-center font-mono">
            ✓ Vielen Dank! Wir melden uns bald.
          </p>
        </form>

      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({ name: '', email: '', message: '' });
const success = ref(false);

const contactInfo = [
  { icon: '📞', label: 'Telefon',  value: '08024 4688225',          href: 'tel:+4980244688225' },
  { icon: '✉️', label: 'E-Mail',   value: 'mail@webwork-oberland.de', href: 'mailto:mail@webwork-oberland.de' },
  { icon: '📍', label: 'Adresse',  value: 'Dekan-Imminger-Str. 15, 83607 Holzkirchen', href: null },
];

async function submitForm() {
  success.value = true;
  form.value = { name: '', email: '', message: '' };
}
</script>
