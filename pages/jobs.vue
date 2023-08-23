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
      'seiten/jobs.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },

  data() {
    return {
    }
  },
}
</script>

<style>
</style>
