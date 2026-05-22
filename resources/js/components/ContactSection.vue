<template>
  <section id="contact" class="py-24 bg-[#424a4d]">
    <div class="max-w-6xl mx-auto px-6">

      <div class="grid md:grid-cols-2 gap-12 items-start">

        <!-- Linke Spalte: Überschrift + Kontaktinfos -->
        <div class="space-y-6">
          <div>
            <h2 class="text-3xl md:text-4xl font-bold text-white">Schreiben Sie uns</h2>
            <div class="flex items-center gap-4 mt-3 mb-12">
              <div class="h-[3px] w-12 bg-[#fb923c]"></div>
              <p class="text-white">Wir freuen uns auf Ihre Anfrage</p>
            </div>
          </div>

          <!-- Telefon -->
          <div class="flex items-center gap-4 group">
            <svg class="w-7 h-7 text-white shrink-0" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/>
            </svg>
            <div>
              <p class="text-white/60 text-xs font-mono uppercase tracking-wider mb-1">Telefon</p>
              <a href="tel:+4980244688225" class="text-white hover:text-[#fb923c] transition">08024 4688225</a>
            </div>
          </div>

          <!-- E-Mail -->
          <div class="flex items-center gap-4 group">
            <svg class="w-7 h-7 text-white shrink-0" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            <div>
              <p class="text-white/60 text-xs font-mono uppercase tracking-wider mb-1">E-Mail</p>
              <a :href="'mai'+'lto:'+email" class="text-white hover:text-[#fb923c] transition">{{ email }}</a>
            </div>
          </div>

        </div><!-- Ende linke Spalte -->

        <!-- Formular -->
        <form @submit.prevent="submitForm" class="space-y-4 mt-[10px]">
          <!-- Honeypot (unsichtbar für Menschen, Bots füllen es aus) -->
          <div style="display:none">
            <input v-model="form.honeypot" type="text" tabindex="-1" autocomplete="off" />
          </div>
          <div>
            <label class="block text-xs font-mono text-white uppercase tracking-wider mb-1">Name</label>
            <input v-model="form.name" type="text" required
              class="w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-[#fb923c]/50 transition placeholder-white/40 text-sm"
              placeholder="Ihr Name" />
          </div>
          <div>
            <label class="block text-xs font-mono text-white uppercase tracking-wider mb-1">E-Mail</label>
            <input v-model="form.email" type="email" required
              class="w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-[#fb923c]/50 transition placeholder-white/40 text-sm"
              placeholder="ihre@email.de" />
          </div>
          <div>
            <label class="block text-xs font-mono text-white uppercase tracking-wider mb-1">Nachricht</label>
            <textarea v-model="form.message" rows="4" required
              class="w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-[#fb923c]/50 transition placeholder-white/40 resize-none text-sm"
              placeholder="Ihre Nachricht..."></textarea>
          </div>
          <button type="submit"
            class="w-full bg-[#fb923c] hover:bg-[#ea7c1e] text-white py-3 rounded-lg font-medium transition flex items-center justify-center gap-2">
            Nachricht senden →
          </button>
          <p v-if="success" class="text-green-600 text-sm text-center font-mono">
            ✓ Vielen Dank! Wir melden uns bald.
          </p>
        </form>

      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const email = ['mail', 'webwork-oberland.de'].join('@');
const form = ref({ name: '', email: '', message: '', honeypot: '' });
const success = ref(false);


async function submitForm() {
  if (form.value.honeypot) return; // Bot erkannt
  success.value = true;
  form.value = { name: '', email: '', message: '', honeypot: '' };
}
</script>
