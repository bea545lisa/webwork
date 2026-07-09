import { createRouter, createWebHistory } from 'vue-router';
import { isDirectHandwerkVisit } from './directVisit.js';
import Home from '../pages/Home.vue';
import ProjectDetail from '../pages/ProjectDetail.vue';
import Impressum from '../pages/Impressum.vue';
import Datenschutz from '../pages/Datenschutz.vue';
import UeberMich from '../pages/UeberMich.vue';
import HandwerkBasicDetail from '../pages/HandwerkBasicDetail.vue';

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/portfolio/:slug', name: 'project-detail', component: ProjectDetail },
  { path: '/ueber-mich', name: 'ueber-mich', component: UeberMich },
  { path: '/handwerk-basic', name: 'handwerk-basic', component: HandwerkBasicDetail },
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

router.afterEach((to) => {
  const noindex = ['impressum', 'datenschutz', 'ueber-mich'];
  const content = noindex.includes(to.name) ? 'noindex, nofollow' : 'index, follow';
  let tag = document.querySelector('meta[name="robots"]');
  if (!tag) {
    tag = document.createElement('meta');
    tag.setAttribute('name', 'robots');
    document.head.appendChild(tag);
  }
  tag.setAttribute('content', content);
});

// Direktaufruf erkennen: die allererste Navigation hat noch keine "from"-Route.
router.beforeEach((to, from) => {
  if (from.matched.length === 0 && to.name === 'handwerk-basic') {
    isDirectHandwerkVisit.value = true;
  }
});

// Scroll-Position vor dem Verlassen der Seite speichern
router.beforeEach((to, from) => {
  if (from.name) {
    from.meta.savedScrollY = window.scrollY;
  }
});

export default router;
