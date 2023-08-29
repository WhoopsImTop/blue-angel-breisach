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
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.pageData.metaDescription,
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
