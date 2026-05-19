<template>
  <div>
    <NavBar />
    <HeroSection />
    <ServicesSection />
    <SloganSection
      text="Es führen viele Wege zum Gipfel des Berges, doch die Aussicht bleibt die gleiche."
      author="Chinesisches Sprichwort"
      bg="/images/slides/berge-1.jpg"
    />
    <TechMarquee />
    <PortfolioSection />
    <SloganSection
      text="Wir können den Wind nicht bestimmen, aber wir können die Segel richtig setzen."
      bg="/images/slides/berge-wide.jpg"
    />
    <ContactSection />
    <FooterSection />
  </div>
</template>

<script setup>
import NavBar from '../components/NavBar.vue';
import HeroSection from '../components/HeroSection.vue';
import ServicesSection from '../components/ServicesSection.vue';
import SloganSection from '../components/SloganSection.vue';
import TechMarquee from '../components/TechMarquee.vue';
import PortfolioSection from '../components/PortfolioSection.vue';
import ContactSection from '../components/ContactSection.vue';
import FooterSection from '../components/FooterSection.vue';
</script>
