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
          <div class="button" @click="goToSite">{{
            translations[$i18n.locale].enter
          }}</div>
          <div class="button" @click="goBackInHistory">{{
            translations[$i18n.locale].leave
          }}</div>
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
export default {
  data() {
    return {
      lenis: null,
      sessionCookie: true,
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

  beforeMount() {
    const botPattern =
      '(googlebot/|bot|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|bingbot|slurp|java|wget|curl|Commons-HttpClient|Python-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail.RU_Bot|discobot|heritrix|findthatfile|europarchive.org|NerdByNature.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web-archive-net.com.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks-robot|it2media-domain-crawler|ip-web-crawler.com|siteexplorer.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e.net|GrapeshotCrawler|urlappendbot|brainobot|fr-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf.fr_bot|A6-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j-asr|Domain Re-Animator Bot|AddThis)'
    const re = new RegExp(botPattern, 'i')
    const userAgent = navigator.userAgent
    if (re.test(userAgent)) {
      this.sessionCookie = true
    }
  },

  methods: {
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
  background-color: #000000;
  border-radius: 5px;
  padding:40px;
}

.permission-popup {
  background: #00000099;
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
