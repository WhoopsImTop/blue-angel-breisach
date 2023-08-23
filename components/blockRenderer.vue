<template>
    <div>
        <text-component v-if="component.type === 'contentblock'" :component="component" :index="index"></text-component>
        <faq-component v-else-if="component.type === 'faq'" :component="component"></faq-component>
        <block-component v-else-if="component.type === 'blocks'" :component="component"></block-component>
    </div>
</template>

<script>
export default {
  props: ["component", "index"],
};
</script>

<style>
</style>