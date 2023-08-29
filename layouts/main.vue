<template>
  <div>
    <div v-if="!sessionCookie" class="permission-popup">
      <div class="content-container text-container text-block permission">
        <img
          src="/blue-angel-stripclub-wortbildmarke.svg"
          alt="blue-angle-logo"
          title="blue-angle-logo"
          height="60"
        />
        <p>{{ translations[$i18n.locale].message }}</p>
        <div class="button-row">
          <a class="button" @click="goToSite">{{
            translations[$i18n.locale].enter
          }}</a>
          <a class="button" @click="goBackInHistory">{{
            translations[$i18n.locale].leave
          }}</a>
        </div>
        <language-switch-component style="margin-top: 30px" />
      </div>
    </div>
    <headerComponent />
    <nuxt></nuxt>
    <back-to-top-component />
    <footerComponent />
  </div>
</template>

<script>
import Lenis from '@studio-freight/lenis'
export default {
  data() {
    return {
      lenis: null,
      sessionCookie: sessionStorage.getItem('session') ?? false,
      translations: {
        de: {
          message:
            'Die nachfolgenden Seiten beinhalten eindeutige erotische Inhalte und sind für Minderjährige nicht geeignet. Ich bin mindestens 18 Jahre alt und habe den Hinweis zur Kenntnis genommen',
          enter: 'Betreten',
          leave: 'Verlassen',
        },
        en: {
          message:
            'The following pages contain explicit erotic content and are not suitable for minors. I am at least 18 years old and have taken note of the notice',
          enter: 'Enter',
          leave: 'Leave',
        },
        fr: {
          message:
            "Les pages suivantes contiennent un contenu érotique explicite et ne conviennent pas aux mineurs. J'ai au moins 18 ans et j'ai pris note de l'avis",
          enter: 'Entrer',
          leave: 'Quitter',
        },
      },
    }
  },
  watch: {
    $route(to, from) {
      this.sessionCookie = sessionStorage.getItem('session')
    },
  },
  mounted() {
    this.lenis = new Lenis()

    requestAnimationFrame(this.raf)
  },
  methods: {
    raf(time) {
      this.lenis.raf(time)
      requestAnimationFrame(this.raf)
    },
    goToSite() {
      sessionStorage.setItem('session', true)
      this.sessionCookie = sessionStorage.getItem('session')
    },
    goBackInHistory() {
      this.$router.go(-1)
    },
  },
}
</script>

<style>
.permission {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  max-width: 500px;
}

.permission-popup {
  background: var(--background-dark);
  position: fixed;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  z-index: 999;
}

.button-row {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.button-row .button {
  margin-bottom: 10px;
}

@media (min-width: 995px) {
  .button-row {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 10px;
  }

  .button-row .button {
    margin: 0px;
  }

  .button-row .button:first-child {
    margin-right: 10px;
  }
}
</style>