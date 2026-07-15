<template>
  <div class="relative">
    <!-- Homepage immer im Hintergrund -->
    <Home />

    <!-- Weicher Überblend-Overlay beim Zurücknavigieren -->
    <Transition name="fade-overlay">
      <div v-if="showOverlay" class="fixed inset-0 z-30 bg-gray-50 pointer-events-none" />
    </Transition>

    <!-- Detailseite / Über mich / Impressum / Datenschutz als Overlay -->
    <Transition name="drawer" :duration="1000">
      <div v-if="isOverlayPage" class="fixed inset-0 z-40 overflow-y-auto detail-overlay">
        <RouterView />
      </div>
    </Transition>
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue';
import { useRoute } from 'vue-router';
import Home from './pages/Home.vue';

const route = useRoute();
const isOverlayPage = computed(() => ['project-detail', 'ueber-mich', 'handwerk-basic', 'leistungen', 'impressum', 'datenschutz'].includes(route.name));
const showOverlay = ref(false);
let savedScrollY = 0;

watch(isOverlayPage, (val) => {
  if (val) {
    // Detailseite öffnet: Scroll-Position merken, Body einfrieren
    savedScrollY = window.scrollY;
    document.body.style.overflow = 'hidden';
    document.body.style.top = `-${savedScrollY}px`;
    document.body.style.position = 'fixed';
    document.body.style.width = '100%';
  } else {
    // Detailseite schließt: Body wieder freigeben, Position wiederherstellen
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.overflow = '';
    document.body.style.width = '';
    // Bei Ziel-Anchor (#hash, z.B. von handwerk-basic zu /#contact) direkt dorthin scrollen
    // (der Router-eigene scrollBehavior ist unzuverlässig, weil Home immer schon gemountet ist).
    // Sonst zur alten Position vor dem Öffnen zurückspringen.
    if (route.hash) {
      setTimeout(() => {
        document.querySelector(route.hash)?.scrollIntoView({ behavior: 'smooth' });
      }, 50);
    } else {
      window.scrollTo({ top: savedScrollY, behavior: 'instant' });
    }
    // Overlay kurz einblenden für weichen Übergang
    showOverlay.value = true;
    setTimeout(() => { showOverlay.value = false; }, 50);
  }
});
</script>

<style>
/* Eigene Scrollbar des Overlays ausblenden, damit die max-w-Zentrierung
   nicht durch deren Breite von der Nav (viewport-fix, ohne Scrollbar) abweicht. */
.detail-overlay {
  scrollbar-width: none;
}
.detail-overlay::-webkit-scrollbar {
  display: none;
}

.drawer-enter-active,
.drawer-leave-active {
  transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: transform;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  overflow: hidden !important;
  border-left: 3px solid #f1f5f9;
}
html.dark .drawer-enter-active,
html.dark .drawer-leave-active {
  border-left-color: #2e2e2e;
}
.drawer-enter-from {
  transform: translateX(100%);
}
.drawer-leave-to {
  transform: translateX(-100%);
}
.drawer-enter-to,
.drawer-leave-from {
  transform: translateX(0%);
}

.fade-overlay-leave-active {
  transition: opacity 0.5s ease;
}
.fade-overlay-leave-from { opacity: 1; }
.fade-overlay-leave-to   { opacity: 0; }
</style>

