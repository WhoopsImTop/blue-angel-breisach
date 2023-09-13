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
    const pageData = await $content('seiten/galerie.' + app.i18n.locale).fetch()
    return { pageData }
  },

  async head({ $content, app }) {
    const pageData = await $content('seiten/galerie.' + app.i18n.locale).fetch()
    return {
      title: pageData.metaTitle ?? 'Galerie | Blue Angel Breisach',
      htmlAttrs: {
        lang: app.i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content:
            pageData.metaDescription ?? 'Hier finden Sie unsere Galerie',
        },
        {
          property: 'og:site_name',
          content: pageData.metaTitle ?? 'Galerie | Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content: pageData.metaTitle ?? 'Galerie | Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            pageData.metaDescription ?? 'Hier finden Sie unsere Galerie',
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
