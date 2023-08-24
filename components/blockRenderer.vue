<template>
  <div>
    <text-component
      v-if="component.type === 'contentblock'"
      :component="component"
      :index="index"
    ></text-component>
    <faq-component
      v-if="component.type === 'faq'"
      :component="component"
    ></faq-component>
    <block-component
      v-if="component.type === 'blocks'"
      :component="component"
    ></block-component>
    <job-formular-component
      v-if="component.type === 'jobForm'"
      :component="component"
    ></job-formular-component>
    <getraenkekarte-component
      v-if="component.type === 'getraenkekarte'"
      :component="component"
    ></getraenkekarte-component>
  </div>
</template>

<script>
export default {
  props: ['component', 'index'],
}
</script>

<style>
</style>