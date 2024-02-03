<template>
  <div class="content-container block-container block-padding">
    <div
      v-for="(block, index) in component.block"
      :id="block.block_id"
      :key="index"
      class="block"
    >
      <img v-if="block.icon" :src="block.icon" alt="Blue Angel" />
      <h2 v-if="block.blockTitle">{{ block.blockTitle }}</h2>
      <div v-if="block.body" v-html="$md.render(block.body)"></div>
      <NuxtLink
        v-if="block.link && block.link.linkText && block.link.link"
        :to="LocalizePath(block.link.link)"
        class="button"
        >{{ block.link.linkText }}</NuxtLink
      >
    </div>
  </div>
</template>

<script>
export default {
  props: {
    component: {
      type: Object,
      default: () => {},
    },
  },

  methods: {
    LocalizePath(path) {
      return `/${this.$i18n.locale}${path}`
    },
  },
}
</script>

<style>
.block {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-color: var(--background-red);
  margin: 20px 0;
  text-align: center;
}

.block h2 {
  text-transform: uppercase;
}

.block-padding {
  padding-top: 50px;
  padding-bottom: 50px;
}

@media (min-width: 995px) {
  .block-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: auto;
    grid-gap: 20px;
  }
}
</style>
