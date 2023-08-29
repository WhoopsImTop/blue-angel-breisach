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

  head() {
    return {
      title: "Datenschutzerklärung",
      link: [
        {
          rel: 'canonical',
          href: window.location.href,
        },
      ],
    }
  },
}
</script>

<style>
</style>