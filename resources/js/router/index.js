import { createRouter, createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import ProjectDetail from '../pages/ProjectDetail.vue';
import Impressum from '../pages/Impressum.vue';
import Datenschutz from '../pages/Datenschutz.vue';

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/portfolio/:slug', name: 'project-detail', component: ProjectDetail },
  { path: '/impressum', name: 'impressum', component: Impressum },
  { path: '/datenschutz', name: 'datenschutz', component: Datenschutz },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return new Promise(resolve => {
        setTimeout(() => resolve({ ...savedPosition, behavior: 'instant' }), 1050);
      });
    }
    if (to.hash) {
      return { el: to.hash, behavior: 'smooth' };
    }
    return new Promise(resolve => {
      setTimeout(() => resolve({ top: 0, behavior: 'instant' }), 350);
    });
  },
});

// Scroll-Position vor dem Verlassen der Seite speichern
router.beforeEach((to, from) => {
  if (from.name) {
    from.meta.savedScrollY = window.scrollY;
  }
});

export default router;
