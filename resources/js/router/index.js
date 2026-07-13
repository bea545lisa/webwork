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
  setMeta('meta[name="robots"]', 'name', 'robots', content);
  applyPageMeta(to);
});

// Setzt/erstellt ein <meta>- oder <link>-Tag über einen CSS-Selektor.
function setMeta(selector, attrName, attrValue, content, contentAttr = 'content') {
  let tag = document.querySelector(selector);
  if (!tag) {
    tag = document.createElement(selector.startsWith('link') ? 'link' : 'meta');
    tag.setAttribute(attrName, attrValue);
    document.head.appendChild(tag);
  }
  tag.setAttribute(contentAttr, content);
}

// Titel/Description/Canonical je Route: ohne das ist der HTML-<head> für jede
// URL identisch (SPA liefert überall dieselbe welcome.blade.php) – Google
// wertet das als Duplicate Content und indiziert Unterseiten dann oft nicht.
const pageMeta = {
  home: {
    title: 'webwork Oberland – Webentwicklung & Design',
    description:
      'Webseiten, Onlineshops und individuelle Webanwendungen für kleine Unternehmen im Oberland. Schnell, modern und auf Ihre Bedürfnisse zugeschnitten.',
  },
  'handwerk-basic': {
    title: 'Handwerk Spezial „Digitale Werkstatt“ – Webseite für Handwerksbetriebe zum Festpreis | webwork Oberland',
    description:
      'Moderne Onepage-Website für Handwerksbetriebe zum Festpreis: schnell online, mobil optimiert, inklusive Schnellbewerbung. Live-Demo und optionale Pro-Erweiterungen ansehen.',
  },
};

function applyPageMeta(to) {
  const meta = pageMeta[to.name] || pageMeta.home;
  document.title = meta.title;
  setMeta('meta[name="description"]', 'name', 'description', meta.description);
  setMeta('meta[property="og:title"]', 'property', 'og:title', meta.title);
  setMeta('meta[property="og:description"]', 'property', 'og:description', meta.description);
  const canonicalUrl = 'https://webwork-oberland.de' + (to.path === '/' ? '' : to.path);
  setMeta('meta[property="og:url"]', 'property', 'og:url', canonicalUrl);
  setMeta('link[rel="canonical"]', 'rel', 'canonical', canonicalUrl, 'href');
}

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
