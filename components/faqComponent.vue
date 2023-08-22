<template>
  <div>
    <div
      class="faq-container"
      v-for="(faq, index) in faqs"
      :key="index"
      :class="faq.open ? 'active' : ''"
      @click="toggleFaq(index)"
    >
      <div class="faq__header">
        <h5>{{ faq.question }}</h5>
        <img src="/plus.svg" width="20" height="20" alt="open" />
      </div>
      <div class="faq__body">
        <p>{{ faq.answer }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    faqProp: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      faqs: this.faqProp,
    }
  },
  mounted() {
    console.log(this.faqs)
  },
  methods: {
    toggleFaq(index) {
      this.faqs[index].open = !this.faqs[index].open
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