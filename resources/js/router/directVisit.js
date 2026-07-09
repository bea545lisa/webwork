import { ref } from 'vue';

// Wird true, wenn /handwerk-basic die allererste Navigation der App ist
// (Direktaufruf per URL/Google) – nicht bei Navigation von innerhalb der Seite.
// Eigenes Modul, damit kein zirkulärer Import zwischen router und NavBar entsteht.
export const isDirectHandwerkVisit = ref(false);
