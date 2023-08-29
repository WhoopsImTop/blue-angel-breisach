<template>
  <nuxt-content class="content-container text-container" :document="pageData" />
</template>

<script>
export default {
  name: 'Impressum',
  layout: 'main',
  async asyncData({ $content, app }) {
    const pageData = await $content(
      'seiten/impressum.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },

  head() {
    return {
      title: "Impressum",
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