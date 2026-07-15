import { ref } from 'vue';

// Wird true, wenn die aktuelle Route (handwerk-basic, leistungen) die
// allererste Navigation der App ist (Direktaufruf per URL/Google) - nicht bei
// Navigation von innerhalb der Seite. Diese Routen zeigen Menü/Footer nur bei
// Direktaufruf, weil sie sonst als Overlay über der immer sichtbaren
// Startseite laufen (die schon ihr eigenes Menü/Footer hat).
// Eigenes Modul, damit kein zirkulärer Import zwischen router und NavBar entsteht.
export const isDirectVisit = ref(false);

// Routen, für die dieses Verhalten gilt.
export const directVisitRoutes = ['handwerk-basic', 'leistungen'];
