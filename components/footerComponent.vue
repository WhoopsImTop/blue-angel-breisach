<template>
  <div>
    <div class="content-container footer-container">
      <img
        src="/blue-angel-stripclub-wortbildmarke.svg"
        alt="blue-angle-logo"
        title="blue-angle-logo"
        width="170"
        style="margin-top: 10px"
      />
      <div class="link-container">
        <NuxtLink key="imprint" :to="LocalizePath('/impressum')">{{
          translations[locale].impressum
        }}</NuxtLink>
        <NuxtLink key="privacyPolicy" :to="LocalizePath('/datenschutzerklaerung')">{{
          translations[locale].datenschutzerklären
        }}</NuxtLink>
      </div>
      <div class="social-actions">
        <a href="https://www.facebook.com/blue.angel.breisach" target="_blank">
          <img src="/images/facebook.svg" alt="facebook" width="30" height="30"
        /></a>
        <a href="https://www.instagram.com/blue.angel.nightclub/" target="_blank"
          ><img
            src="/images/instagram.svg"
            alt="instagram"
            width="30"
            height="30"
        /></a>
      </div>
    </div>
    <div class="highlighted">
      <div class="content-container footer-credencials">
        <img
          src="/payments.png"
          alt="zahlungsmöglichleiten"
          title="zahlungsmöglichekiten"
          height="30"
          style="margin: 10px 0"
        />
        <p style="text-transform: uppercase; margin: 0">
          © 2023 Blue Angel Breisach
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      translations: {
        de: {
          impressum: 'Impressum',
          datenschutzerklären: 'Datenschutzerklärung',
        },
        en: {
          impressum: 'Imprint',
          datenschutzerklären: 'Privacy Policy',
        },
        fr: {
          impressum: 'Mentions légales',
          datenschutzerklären: 'Politique de confidentialité',
        },
      },
    }
  },
  computed: {
    locale() {
      return this.$i18n.locale
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
.footer-container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
}

.link-container {
  display: flex;
  flex-direction: column;
  width: 100%;
  margin: 30px 0 20px;
}

.link-container a {
  margin: 5px 0;
  color: var(--red);
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;
}

.social-actions {
  display: flex;
  justify-content: space-between;
  width: 100px;
  margin: 10px 0;
}

.footer-credencials {
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  padding: 20px 20px;
}

@media (min-width: 995px) {
  .footer-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: auto;
    padding: 20px;
  }

  .link-container {
    width: max-content;
    justify-self: center;
    flex-direction: row;
  }

  .link-container a {
    margin: 0 10px;
  }

  .social-actions {
    justify-self: end;
  }

  .footer-credencials {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 8px 20px;
  }
}
</style>