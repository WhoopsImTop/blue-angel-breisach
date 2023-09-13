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
    const pageData = await $content('seiten/jobs.' + app.i18n.locale).fetch()
    return { pageData }
  },

  data() {
    return {
      translations: {},
    }
  },

  async head({ $content, app }) {
    const pageData = await $content('seiten/jobs.' + app.i18n.locale).fetch()
    return {
      title: pageData.metaTitle ?? 'Jobs | Blue Angel Breisach',
      htmlAttrs: {
        lang: app.i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: pageData.metaDescription ?? 'Hier finden Sie unsere Jobs',
        },
        {
          property: 'og:site_name',
          content: pageData.metaTitle ?? 'Jobs | Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content: pageData.metaTitle ?? 'Jobs | Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            pageData.metaDescription ??
            'Wir sind immer auf der Suche nach neuen Tänzerinnen.',
        },
      ],
    }
  },
}
</script>

<style>
</style>
