<template>
  <section id="contact" class="py-24 bg-white">
    <div class="max-w-2xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Kontakt</h2>
      <p class="text-gray-600 mb-8">Interesse an einer Zusammenarbeit? Ich freue mich auf Ihre Nachricht.</p>

      <form @submit.prevent="submitForm" class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
          <input v-model="form.name" type="text" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">E-Mail</label>
          <input v-model="form.email" type="email" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nachricht</label>
          <textarea v-model="form.message" rows="5" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400"></textarea>
        </div>
        <button type="submit"
          class="bg-gray-900 text-white px-8 py-3 rounded-full font-medium hover:bg-gray-700 transition">
          Nachricht senden
        </button>
        <p v-if="success" class="text-green-600 text-sm mt-2">Vielen Dank! Ihre Nachricht wurde gesendet.</p>
      </form>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({ name: '', email: '', message: '' });
const success = ref(false);

async function submitForm() {
  // Laravel API-Route kommt später
  success.value = true;
  form.value = { name: '', email: '', message: '' };
}
</script>
