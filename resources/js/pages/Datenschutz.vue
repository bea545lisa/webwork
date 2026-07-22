<template>
  <div class="bg-gray-50 dark:bg-[#2e2e2e] min-h-screen flex flex-col">
    <div class="max-w-6xl mx-auto px-6 py-16 flex-1 w-full">

      <div class="mb-10">
        <button @click="goBack"
          class="text-[#475569] dark:text-gray-100 hover:text-[#fb923c] transition font-bold text-3xl cursor-pointer">
          ←
        </button>
      </div>

      <h1 class="text-3xl font-bold text-[#475569] dark:text-gray-100 mb-8">Datenschutzerklärung</h1>

      <div class="space-y-6 text-[#475569] dark:text-gray-300 text-sm leading-relaxed">

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">1. Verantwortlicher</h2>
          <p>Verantwortlich für die Datenverarbeitung auf dieser Website ist:<br>
          Beate Rohrmoser, [web]work<br>
          {{ email }}</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">2. Erhobene Daten</h2>
          <p>Beim Besuch dieser Website werden automatisch technische Daten (IP-Adresse, Browsertyp, Uhrzeit) im Server-Log gespeichert. Diese Daten werden nicht mit anderen Daten zusammengeführt und nach spätestens 7 Tagen gelöscht.</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">3. Kontaktformular</h2>
          <p>Wenn Sie das Kontaktformular nutzen, werden Ihre Angaben (Name, E-Mail, Nachricht) zur Bearbeitung Ihrer Anfrage verarbeitet und nicht an Dritte weitergegeben. Rechtsgrundlage: Art. 6 Abs. 1 lit. b DSGVO.</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">4. Google Fonts</h2>
          <p>Diese Website verwendet Google Fonts, die lokal eingebunden sind. Es findet keine Verbindung zu Google-Servern statt.</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">5. Ihre Rechte</h2>
          <p>Sie haben das Recht auf Auskunft, Berichtigung, Löschung und Einschränkung der Verarbeitung Ihrer Daten sowie das Recht auf Datenübertragbarkeit. Wenden Sie sich dazu an: {{ email }}</p>
        </div>

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">6. Bildnachweise</h2>
          <p>Die auf dieser Website verwendeten Fotos und Grafiken wurden selbst erstellt oder mithilfe von KI-Tools selbst generiert. Sie unterliegen keinem fremden Urheberrecht Dritter.</p>
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

// In eigenem Tab geöffnet (z.B. via target="_blank" aus dem Kontaktformular)
// => keine Vorgeschichte in diesem Tab, dann Tab schließen statt zur Startseite zu navigieren.
function goBack() {
  if (window.history.length <= 1) {
    window.close();
  } else {
    router.back();
  }
}
</script>
