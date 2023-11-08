<template>
  <div>
    <blockRenderer
      v-for="(component, index) in pageData.components"
      :key="component.id"
      :component="component"
      :index="index"
    ></blockRenderer>
  </div>
</template>

<script>
export default {
  layout: 'main',

  async asyncData({ $content, app }) {
    const pageData = await $content(
      'seiten/startseite.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },

  head() {
    return {
      title: this.pageData.metaTitle,
      htmlAttrs: {
        lang: this.$i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.pageData.metaDescription,
        },
        {
          property: 'og:site_name',
          content: this.pageData.metaTitle ?? 'Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content: this.pageData.metaTitle ?? 'Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            this.pageData.metaDescription ??
            'Tauche ein in die faszinierende Atmosphäre des Blue Angel – dem verführerischsten Stripclub in Breisach am Rhein und Umgebung.',
        },
      ],
      link: [
        {
          rel: 'icon',
          type: 'image/x-icon',
          href: './favicon.png',
        },
        {
          rel: 'icon',
          href: './favicon.png',
        },
        {
          rel: 'icon',
          type: 'image/vnd.microsoft.icon',
          href: './favicon.png',
        },
        {
          rel: 'shortcut icon',
          href: './favicon.png',
        },
      ],
    }
  },

  data() {
    return {}
  },
}
</script>

<style></style>
