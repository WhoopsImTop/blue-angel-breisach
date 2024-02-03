export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: true,

  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Tabledance, Stripclub and Nightclub. Best Striptease!',
    titleTemplate: '%s - Blue Angel Breisach',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        name: 'keywords',
        content:
          'nightclub, cabaret, striptease, junggesellenabschied, erotik, girls, nachtleben, unterhaltung, weihnachtsfeier, sexy girls, sexy, sexy frauen, nightlife, geburtstagsfeier, blue night club, blueangel night club, blue angel night club, blue angel, Breisach am Rhein, Breisach, stripclub Freiburg, stripclub Breisach, jungesellenabschied Breisach',
      },
      {
        hid: 'description',
        name: 'description',
        content:
          'Auf der Suche nach einem Stripclub, Tabledance oder Nightclub in Breisach? Dann bist du im Blue Angel genau richtig! Wir bieten dir die beste Unterhaltung in der Region.',
      },
    ],
    link: [
      { rel: 'stylesheet', href: 'https://use.typekit.net/wik8vol.css' },
      {
        rel: 'icon',
        type: 'image/png',
        sizes: '32x32',
        href: '/favicon-32x32.png',
      },
      {
        rel: 'icon',
        type: 'image/png',
        sizes: '16x16',
        href: '/favicon-16x16.png',
      },
      {
        rel: 'apple-touch-icon',
        sizes: '180x180',
        href: '/apple-touch-icon.png',
      },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ['@/assets/variables.css', '@/assets/fonts.css'],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
  ],

  i18n: {
    locales: ['de', 'en', 'fr'],
    defaultLocale: 'de',
    strategy: 'prefix',
  },

  'nuxt-compress': {
    gzip: {
      threshold: 8192,
    },
    brotli: {
      threshold: 8192,
    },
  },

  markdownit: {
    runtime: true, // Support `$md()`
    preset: 'default',
    linkify: true,
    breaks: true,
    html: true,
  },

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    'bootstrap-vue/nuxt',
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/content
    '@nuxt/content',
    '@nuxtjs/markdownit',
    '@nuxtjs/i18n',
    [
      'nuxt-gmaps',
      {
        key: 'AIzaSyBw_QNEvvoRbs-czfH2GbPPkupqDdJTxhg',
      },
    ],
    '@nuxtjs/sitemap',
  ],

  plugins: [
    { src: '~/plugins/jsonld', ssr: false },
    { src: '~/plugins/vue-pannellum.client.js', mode: 'client' }, // Nur auf der Client-Seite laden
    { src: '~/plugins/macy.client.js', mode: 'client' }, // Oder 'ssr: false'
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: '/',
  },

  // Content module configuration: https://go.nuxtjs.dev/config-content
  content: {
    path: 'content',
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},

  generate: {},

  sitemap: {
    hostname: 'https://blue-angel.de',
    gzip: true,
    exclude: ['/admin/**'],
    routes: ['/de', '/en', '/fr'],
  },
}
