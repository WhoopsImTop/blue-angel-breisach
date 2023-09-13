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

  async head({ $content, app }) {
    const pageData = await $content('seiten/startseite.' + app.i18n.locale).fetch()
    return {
      title: pageData.metaTitle,
      htmlAttrs: {
        lang: app.i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: pageData.metaDescription,
        },
        {
          property: 'og:site_name',
          content: pageData.metaTitle ?? 'Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content: pageData.metaTitle ?? 'Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            pageData.metaDescription ??
            'Tauche ein in die faszinierende Atmosphäre des Blue Angel – dem verführerischsten Stripclub in Breisach am Rhein und Umgebung.',
        },
      ],
    }
  },

  data() {
    return {}
  },
}
</script>

<style>
</style>
