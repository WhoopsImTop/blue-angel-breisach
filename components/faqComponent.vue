<template>
  <div class="content-container text-block">
    <h2>{{ pageComponent.mainHeadline }}</h2>
    <h3
      v-if="pageComponent.subHeadline"
      :style="index == 0 ? 'margin-top: 5px' : ''"
    >
      {{ pageComponent.subHeadline }}
    </h3>
    <p
      v-if="pageComponent.contentText"
      v-html="$md.render(pageComponent.contentText)"
    ></p>
    <NuxtLink
      v-if="
        pageComponent.button &&
        pageComponent.button.buttonText &&
        pageComponent.button.buttonLink
      "
      :to="LocalizePath(pageComponent.button.buttonLink)"
      :class="pageComponent.button.buttonIcon ? 'append-icon' : ''"
      class="button"
      >{{ pageComponent.button.buttonText }}</NuxtLink
    >
    <div
      class="faq-container"
      v-for="(faq, index) in pageComponent.faq"
      :key="index"
      :class="faq.open ? 'active' : ''"
      @click="toggleFaq(index)"
    >
      <div class="faq__header">
        <h5>{{ faq.question }}</h5>
        <img src="/plus.svg" width="20" height="20" alt="open" />
      </div>
      <div class="faq__body">
        <p v-html="$md.render(faq.answer)"></p>
      </div>
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
  data() {
    return {
      pageComponent: this.component,
    }
  },
  mounted() {
    console.log(this.pageComponent)
  },
  methods: {
    toggleFaq(index) {
      this.pageComponent.faq[index].open = !this.pageComponent.faq[index].open
    },
    LocalizePath(path) {
      const locale = this.$i18n.locale
      return `/${locale}${path}`
    },
  },
}
</script>

<style>
.faq-container {
  margin: 10px 0;
}

.faq__header {
  padding: 10px;
  border-top: 1px solid var(--red-light);
  border-bottom: 1px solid var(--red-light);
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
}

.faq__header img {
  transform: rotate(0deg);
  transition: transform 0.3s ease;
  margin-left: 10px;
  width: auto !important;
}

.faq-container.active > .faq__header img {
  transform: rotate(135deg);
}

.faq-container.active > .faq__header {
  border-bottom: none;
}

.faq__header h5 {
  margin: 5px 0;
  text-align: left;
  color: var(--red-light) !important;
}

.faq-container.active > .faq__body {
  display: block;
  border-bottom: 1px solid var(--red-light);
}

.faq__body {
  display: none;
  text-align: left;
  padding: 0 10px 10px;
}
</style>