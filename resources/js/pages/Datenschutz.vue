<template>
  <div class="bg-gray-50 min-h-screen flex flex-col">
    <div class="max-w-3xl mx-auto px-6 py-16 flex-1 w-full">

      <div class="mb-10">
        <RouterLink to="/" class="text-[#475569] hover:text-[#fb923c] transition font-mono text-sm">
          ← Zurück
        </RouterLink>
      </div>

      <h1 class="text-3xl font-bold text-[#475569] mb-8">Datenschutzerklärung</h1>

      <div class="space-y-6 text-[#475569] text-sm leading-relaxed">

        <div>
          <h2 class="font-mono text-[#fb923c] text-xs uppercase tracking-widest mb-2">1. Verantwortlicher</h2>
          <p>Verantwortlich für die Datenverarbeitung auf dieser Website ist:<br>
          Beate Rohrmoser, [web]work oberland<br>
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

      </div>
    </div>
    <FooterSection />
  </div>
</template>

<script setup>
import FooterSection from '../components/FooterSection.vue';
const email = ['mail', 'webwork-oberland.de'].join('@');
</script>
