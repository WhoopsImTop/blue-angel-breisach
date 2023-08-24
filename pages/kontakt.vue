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
  layout: "main",
  async asyncData({ $content, app }) {
    const pageData = await $content(
      'seiten/kontakt.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },

  head() {
    return {
      title: this.pageData.metaTitle ?? "Kontakt | Blue Angel Breisach",
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.pageData.metaDescription ?? "Hier finden Sie unsere Kontakt",
        },
      ],
    }
  },

  data() {
    return {
    };
  },
};
</script>
  
  <style>
</style>
  