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
      'seiten/getraenkekarte.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },

  head() {
    return {
      title: this.pageData.metaTitle ?? 'Getränkekarte | Blue Angel Breisach',
      htmlAttrs: {
        lang: this.$i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content:
            this.pageData.metaDescription ?? 'Hier finden Sie unsere Getränke',
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
  
<style scoped>
.row-2 {
  align-items: flex-start !important;
}
</style>
  