<template>
  <div class="error-layout">
    <headerComponent />
    <div class="error">
      <h2>{{ error.message }}</h2>
      <nuxt-link to="/">Home</nuxt-link>
    </div>
    <footerComponent />
  </div>
</template>

<script>
export default {
  layout: 'error',
  props: ['error'],
  head() {
    return {
      title: this.error.title,
    }
  },
}
</script>

<style>
.error-layout {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 100vh;
}

.error {
  max-width: 600px;
  margin: 0 auto;
}

.error h2 {
  margin-bottom: 50px;
}
</style>
