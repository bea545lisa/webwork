<template>
  <div class="relative">
    <!-- Statische Seiten (Impressum, Datenschutz) -->
    <RouterView v-if="isStaticPage" />

    <!-- Homepage und Detailseiten -->
    <template v-else>
      <!-- Homepage immer im Hintergrund -->
      <Home />

      <!-- Weicher Überblend-Overlay beim Zurücknavigieren -->
      <Transition name="fade-overlay">
        <div v-if="showOverlay" class="fixed inset-0 z-30 bg-gray-50 pointer-events-none" />
      </Transition>

      <!-- Detailseite / Über mich als Overlay -->
      <Transition name="drawer">
        <div v-if="isOverlayPage" class="fixed inset-0 z-40 overflow-y-auto detail-overlay">
          <RouterView />
        </div>
      </Transition>
    </template>
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue';
import { useRoute } from 'vue-router';
import Home from './pages/Home.vue';

const route = useRoute();
const isOverlayPage = computed(() => ['project-detail', 'ueber-mich'].includes(route.name));
const isStaticPage = computed(() => ['impressum', 'datenschutz'].includes(route.name));
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
    window.scrollTo({ top: savedScrollY, behavior: 'instant' });
    // Overlay kurz einblenden für weichen Übergang
    showOverlay.value = true;
    setTimeout(() => { showOverlay.value = false; }, 50);
  }
});
</script>

