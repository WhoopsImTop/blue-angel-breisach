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
      const pageData = await $content('seiten/junggesellenabschied-breisach-am-rhein.' + app.i18n.locale).fetch()
      return { pageData }
    },
  
    data() {
      return {
        translations: {},
      }
    },
  
    head() {
      return {
        title: this.pageData.metaTitle ?? 'Jungesellenabschied Breisach am Rhein | Blue Angel Breisach',
        htmlAttrs: {
          lang: this.$i18n.locale,
        },
        meta: [
          {
            hid: 'description',
            name: 'description',
            content: this.pageData.metaDescription ?? 'Hier finden Sie unsere Jobs',
          },
          {
            property: 'og:site_name',
            content: this.pageData.metaTitle ?? 'Jobs | Blue Angel Breisach',
          },
          {
            property: 'og:title',
            content: this.pageData.metaTitle ?? 'Jobs | Blue Angel Breisach',
          },
          {
            property: 'og:description',
            content:
              this.pageData.metaDescription ??
              'Wir sind immer auf der Suche nach neuen Tänzerinnen.',
          },
        ],
      }
    },
  }
  </script>
  
  <style>
  </style>
  