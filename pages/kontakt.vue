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
    const pageData = await $content('seiten/kontakt.' + app.i18n.locale).fetch()
    return { pageData }
  },

  async head({$content, app}) {
    const pageData = await $content('seiten/kontakt.' + app.i18n.locale).fetch()
    return {
      title: pageData.metaTitle ?? 'Kontakt | Blue Angel Breisach',
      htmlAttrs: {
        lang: app.i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content:
            pageData.metaDescription ?? 'Hier finden Sie unsere Kontakt',
        },
        {
          property: 'og:site_name',
          content:
            pageData.metaTitle ?? 'Kontakt | Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content:
            pageData.metaTitle ?? 'Kontakt | Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            pageData.metaDescription ?? 'Kontaktieren Sie uns',
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
  