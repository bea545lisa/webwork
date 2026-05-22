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

      <!-- Detailseite als Overlay -->
      <Transition name="drawer">
        <div v-if="isDetailPage" class="fixed inset-0 z-40 overflow-y-auto detail-overlay">
          <ProjectDetail />
        </div>
      </Transition>
    </template>
  </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue';
import { useRoute } from 'vue-router';
import Home from './pages/Home.vue';
import ProjectDetail from './pages/ProjectDetail.vue';

const route = useRoute();
const isDetailPage = computed(() => route.name === 'project-detail');
const isStaticPage = computed(() => ['impressum', 'datenschutz'].includes(route.name));
const showOverlay = ref(false);
let savedScrollY = 0;

watch(isDetailPage, (val) => {
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

<style>
.drawer-enter-active,
.drawer-leave-active {
  transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: transform;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
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

.drawer-enter-active,
.drawer-leave-active {
  overflow: hidden !important;
  border-left: 3px solid #f1f5f9;
}
</style>
