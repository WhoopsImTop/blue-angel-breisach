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

  head() {
    return {
      title: this.pageData.metaTitle ?? 'Kontakt | Blue Angel Breisach',
      lang: this.$i18n.locale || 'de',
      meta: [
        {
          hid: 'description',
          name: 'description',
          content:
            this.pageData.metaDescription ?? 'Hier finden Sie unsere Kontakt',
        },
        {
          property: 'og:site_name',
          content:
            this.pageData.metaTitle ?? 'Kontakt | Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content:
            this.pageData.metaTitle ?? 'Kontakt | Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            this.pageData.metaDescription ?? 'Kontaktieren Sie uns',
        },
      ],
      link: [
        {
          rel: 'canonical',
          href: window.location.href,
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
  