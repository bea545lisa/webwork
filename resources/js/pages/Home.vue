<template>
  <div>
    <NavBar />
    <HeroSection />
    <ServicesSection />
    <SloganSection
      text="Nichts ist mächtiger als eine Idee, deren Zeit gekommen ist."
      author="Victor Hugo"
    />
    <TechMarquee />
    <SloganSection
      text="Man kann den Wind nicht ändern, aber die Segel richtig setzen."
      bg="/images/slides/block-kite-dark.jpg"
      bgPosition="center 90%"
      author="Aristoteles"
    />
    <PortfolioSection />
    <ContactSection />
    <FooterSection />
  </div>
</template>

<script setup>
import { onMounted, nextTick } from 'vue';
import { useRouter } from 'vue-router';
import NavBar from '../components/NavBar.vue';
import HeroSection from '../components/HeroSection.vue';
import ServicesSection from '../components/ServicesSection.vue';
import SloganSection from '../components/SloganSection.vue';
import TechMarquee from '../components/TechMarquee.vue';
import PortfolioSection from '../components/PortfolioSection.vue';
import ContactSection from '../components/ContactSection.vue';
import FooterSection from '../components/FooterSection.vue';

const router = useRouter();

onMounted(async () => {
  const savedY = router.currentRoute.value.meta?.['savedScrollY'];
  if (savedY) {
    await nextTick();
    setTimeout(() => {
      window.scrollTo({ top: savedY, behavior: 'instant' });
    }, 400);
  }
});
</script>
