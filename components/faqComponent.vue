<template>
  <div id="faqs" class="content-container text-block">
    <h2>{{ pageComponent.mainHeadline }}</h2>
    <h3
      v-if="pageComponent.subHeadline"
      :style="index == 0 ? 'margin-top: 5px' : ''"
    >
      {{ pageComponent.subHeadline }}
    </h3>
    <div
      v-if="pageComponent.contentText"
      v-html="$md.render(pageComponent.contentText)"
    ></div>
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
      v-for="(faq, index) in pageComponent.faq"
      :key="index"
      class="faq-container"
      :class="faq.open ? 'active' : ''"
      @click="toggleFaq(index)"
    >
      <div class="faq__header">
        <h5>{{ faq.question }}</h5>
        <img src="/plus.svg" width="20" height="20" alt="open" />
      </div>
      <div class="faq__body">
        <div v-html="$md.render(faq.answer)"></div>
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
  margin: -1px 0;
}

.faq__header {
  padding: 10px;
  border-top: 1px solid var(--red);
  border-bottom: 1px solid var(--red);
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
  border: none;
  border-bottom: none;
  background-color: var(--red);
}

.faq__header h5 {
  margin: 5px 0;
  text-align: left;
  color: var(--red-light) !important;
}

.faq-container.active > .faq__body {
  display: block;
  padding: 10px;
  border: 2px solid var(--red);
}

.faq__body {
  display: none;
  text-align: left;
  padding: 0 10px 10px;
}
</style>
