<template>
  <div>
    <div
      class="menu-container"
      v-for="(menu, index) in getraenkekarte"
      :key="index"
      :class="menu.open ? 'active' : ''"
      @click="toggleGetraenkekarte(index)"
    >
      <div class="menu__header">
        <h5>{{ menu.category }}</h5>
        <img src="/plus.svg" width="20" height="20" alt="open" />
      </div>
      <div class="menu__body">
        <table style="width: 100%">
          <tbody>
            <tr v-for="(item, index) in menu.getraenke" :key="index">
              <td>{{ item.name }}</td>
              <td>{{ priceFormat(item.first_price) }}</td>
              <td>{{ priceFormat(item.second_price) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['getraenkekarteProp'],
  data() {
    return {
      getraenkekarte: this.getraenkekarteProp,
    }
  },
  methods: {
    toggleGetraenkekarte(index) {
      this.getraenkekarte[index].open = !this.getraenkekarte[index].open
    },
    priceFormat(price) {
      return new Intl.NumberFormat('de-DE', {
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
}

.menu__header {
  padding: 10px;
  border-top: 1px solid var(--red-light);
  border-bottom: 1px solid var(--red-light);
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
  background-color: var(--red-light) !important;
}

.menu-container.active > .menu__header img {
  filter: invert(1);
}

.menu-container.active > .menu__header h5 {
  color: var(--background-red) !important;
}

.menu-container.active > .menu__body {
  display: block;
  border-bottom: 1px solid var(--red-light);
  border: 2px solid var(--red-light);
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
</style>