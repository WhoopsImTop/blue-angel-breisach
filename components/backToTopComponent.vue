<template>
  <img
    src="/images/backToTop.svg"
    alt="Back to top"
    class="back-to-top hidden"
    width="40"
    height="40"
    @click="backToTop()"
  />
</template>

<script>
export default {
  mounted() {
    window.addEventListener('scroll', () => {
      const backToTop = document.querySelector('.back-to-top')
      if (window.scrollY > 500) {
        backToTop.classList.remove('hidden')
      } else {
        backToTop.classList.add('hidden')
      }
    })
  },
  methods: {
    backToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      })
    },
  },
}
</script>

<style>
.back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  cursor: pointer;
}

.hidden {
  display: none;
}
</style>