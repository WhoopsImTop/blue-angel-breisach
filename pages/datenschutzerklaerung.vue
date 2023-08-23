<template>
  <nuxt-content class="content-container text-container" :document="pageData" />
</template>

<script>
export default {
  name: 'Impressum',
  layout: 'main',
  async asyncData({ $content, app }) {
    const pageData = await $content(
      'seiten/datenschutz.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },
}
</script>

<style>
</style>