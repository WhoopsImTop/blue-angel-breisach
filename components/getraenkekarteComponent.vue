<template>
  <div class="content-container text-block">
    <div
      class="menu-container"
      v-for="(menu, index) in getraenkekarte"
      :key="index"
      :class="openCategories.includes(index) ? 'active' : ''"
      @click="toggleGetraenkekarte(index)"
    >
      <div class="menu__header">
        <h5>{{ menu.category }}</h5>
        <img src="/plus.svg" width="20" height="20" alt="open" />
      </div>
      <div class="menu__body">
        <table style="width: 100%">
          <thead>
            <tr>
              <th>{{ labels.drink }}</th>
              <th class="align-end" style="padding-right: 15px">
                {{ labels.firstPrice }}
              </th>
              <th class="align-end">{{ labels.secondPrice }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in menu.getraenke" :key="index">
              <td style="width: 70%" v-html="item.name"></td>
              <td style="width: 15%; padding-right: 15px" class="align-end">
                {{ item.first_price ? priceFormat(item.first_price) : '' }}
              </td>
              <td style="width: 15%" class="align-end">
                {{ item.second_price ? priceFormat(item.second_price) : '' }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <p style="margin: 30px 0">{{ labels.additives }}</p>
  </div>
</template>

<script>
export default {
  props: {
    component: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {
      openCategories: [],
      translations: {
        de: {
          drink: 'Getränk',
          firstPrice: 'Erstgetränk',
          secondPrice: 'jedes weitere',
          additives:
            '2) mit Farbstoffen 10) chininhaltig 11) koffeinhaltig 12) mit Taurin 14) Gerstenmalz 15) Weizenmalz',
        },
        en: {
          drink: 'Drink',
          firstPrice: 'First drink',
          secondPrice: 'Each additional',
          additives:
            '2) with colouring 10) contains quinine 11) contains caffeine 12) contains taurine 14) barley malt 15) wheat malt',
        },
        fr: {
          drink: 'Boisson',
          firstPrice: 'Première boisson',
          secondPrice: 'Chaque suivante',
          additives:
            '2) avec colorants 10) contient de la quinine 11) contient de la caféine 12) contient de la taurine 14) malt d’orge 15) malt de blé',
        },
      },
    }
  },
  computed: {
    getraenkekarte() {
      return this.component.speisekarte || []
    },
    labels() {
      return this.translations[this.$i18n.locale] || this.translations.de
    },
  },
  watch: {
    getraenkekarte() {
      this.openCategories = []
    },
  },
  methods: {
    toggleGetraenkekarte(index) {
      this.openCategories = this.openCategories.includes(index)
        ? this.openCategories.filter((i) => i !== index)
        : [...this.openCategories, index]
    },
    priceFormat(price) {
      const locales = { de: 'de-DE', en: 'en-GB', fr: 'fr-FR' }
      return new Intl.NumberFormat(locales[this.$i18n.locale] || 'de-DE', {
        style: 'currency',
        currency: 'EUR',
      }).format(price)
    },
  },
}
</script>

<style>
.menu-container {
  margin: -1px 0;
  width: 100%;
}

.menu__header {
  padding: 10px;
  border-top: 1px solid var(--red);
  border-bottom: 1px solid var(--red);
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
}

.menu__header img {
  transform: rotate(0deg);
  transition: transform 0.3s ease;
  margin-left: 10px;
  width: auto !important;
}

.menu-container.active > .menu__header img {
  transform: rotate(135deg);
}

.menu-container.active > .menu__header {
  border-bottom: none;
}

.menu__header h5 {
  margin: 10px 0;
  text-align: left;
  color: var(--red-light) !important;
}

.menu-container.active > .menu__header {
  background-color: var(--red) !important;
}

.menu-container.active > .menu__header img {
  /*   filter: invert(1); */
}

.menu-container.active > .menu__header h5 {
  color: var(--background-red) !important;
}

.menu-container.active > .menu__body {
  display: block;
  border-bottom: 1px solid var(--red);
  border: 2px solid var(--red);
}

.menu__body {
  display: none;
  text-align: left;
  padding: 0 10px 10px;
}

.menu__body tr {
  vertical-align: bottom;
}

.menu__body td {
  padding: 10px 0;
  border-top: 1px dashed var(--red-light);
}

.menu__body tr:first-child td {
  border-top: none;
}

.menu__body thead tr th {
  padding: 10px 0;
  border-bottom: 1px solid var(--red);
}

.align-end {
  text-align: right;
}
</style>
