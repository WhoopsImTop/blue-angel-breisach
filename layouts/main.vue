<template>
  <div>
    <headerComponent />
    <nuxt></nuxt>
    <back-to-top-component />
    <footerComponent />
  </div>
</template>

<script>
import Lenis from '@studio-freight/lenis'
export default {
  data() {
    return {
      lenis: null,
    }
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
  },
}
</script>

<style>
</style>