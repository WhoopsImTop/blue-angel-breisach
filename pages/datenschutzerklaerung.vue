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
      title: 'Datenschutzerklärung',
      lang: this.$i18n.locale || 'de',
      link: [
        {
          rel: 'canonical',
          href: window.location.href,
        },
        {
          property: 'og:site_name',
          content:
            this.pageData.metaTitle ?? 'Getränkekarte | Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content:
            this.pageData.metaTitle ?? 'Getränkekarte | Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            this.pageData.metaDescription ?? 'Hier finden Sie unsere Getränke',
        },
      ],
    }
  },
}
</script>

<style>
</style>