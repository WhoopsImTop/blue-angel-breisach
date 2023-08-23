<template>
  <div>
    <div
      v-if="!sessionCookie"
      class="content-container text-container text-block permission"
    >
      <img
        src="/blue-angel-stripclub-wortbildmarke.svg"
        alt="blue-angle-logo"
        title="blue-angle-logo"
        height="60"
      />
      <p>
        Die nachfolgenden Seiten beinhalten eindeutige erotische Inhalte und
        sind für Minderjährige nicht geeignet. Ich bin mindestens 18 Jahre alt
        und habe den Hinweis zur Kenntnis genommen:
      </p>
      <a class="button" style="margin-bottom: 15px" @click="goToSite">Betreten</a>
      <a class="button" @click="goBackInHistory">Verlassen</a>
    </div>
    <div v-else>
      <headerComponent />
      <nuxt></nuxt>
      <back-to-top-component />
      <footerComponent />
    </div>
  </div>
</template>

<script>
import Lenis from '@studio-freight/lenis'
export default {
  data() {
    return {
      lenis: null,
      sessionCookie: sessionStorage.getItem('session'),
    }
  },
  watch: {
    $route(to, from) {
      this.sessionCookie = sessionStorage.getItem('session')
    },
  },
  mounted() {
    this.lenis = new Lenis()

    requestAnimationFrame(this.raf)
  },
  methods: {
    raf(time) {
      this.lenis.raf(time)
      requestAnimationFrame(this.raf)
    },
    goToSite() {
      sessionStorage.setItem('session', true)
      this.$router.push('/')
    },
    goBackInHistory() {
      this.$router.go(-1)
    },
  },
}
</script>

<style>
.permission {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
</style>