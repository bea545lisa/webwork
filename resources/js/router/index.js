import { createRouter, createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import ProjectDetail from '../pages/ProjectDetail.vue';

const routes = [
  { path: '/', component: Home },
  { path: '/portfolio/:slug', component: ProjectDetail },
];

export default createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to) {
    if (to.hash) {
      return { el: to.hash, behavior: 'smooth' };
    }
    return { top: 0 };
  },
});
