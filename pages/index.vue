<template>
  <div>
    <blockRenderer
      v-for="(component, index) in pageData.components"
      :key="component.id"
      :component="component"
      :index="index"
    ></blockRenderer>
  </div>
</template>

<script>
export default {
  layout: 'main',

  async asyncData({ $content, app }) {
    const pageData = await $content(
      'seiten/startseite.' + app.i18n.locale
    ).fetch()
    return { pageData }
  },

  data() {
    return {
      ldJsonOrganization: `{
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Blue Angel - nightclub, stripclub & cabaret in Breisach",
        "alternateName": "Blue Angel Breisach",
        "url": "https://www.blue-angel.de/",
        "logo": "https://www.blue-angel.de/blue-angel-stripclub-wortbildmarke.svg",
        "sameAs": [
          "https://www.instagram.com/blue.angel.nightclub/",
          "https://www.facebook.com/blue.angel.breisach"
        ]
      }`,
      ldJsonBreadcrumbList: `{
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Galerie",
            "item": "https://www.blue-angel.de/de/galerie"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Getränkekarte",
            "item": "https://www.blue-angel.de/de/getraenkekarte"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "FAQ's",
            "item": "https://www.blue-angel.de/de/#faqs"
          },
          {
            "@type": "ListItem",
            "position": 4,
            "name": "Jobs",
            "item": "https://www.blue-angel.de/de/jobs"
          },
          {
            "@type": "ListItem",
            "position": 5,
            "name": "Kontakt",
            "item": "https://www.blue-angel.de/de/kontakt"
          }
        ]
      }`,
      ldJsonFAQPage: `{
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Was ist der Blue Angel Stripclub in Breisach?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Der Blue Angel Stripclub ist eine etablierte Unterhaltungsdestination in Breisach am Rhein nahe der Grenze zur Schweiz und Frankreich, die seit über 30 Jahren eine einladende Atmosphäre für anspruchsvolle Unterhaltung bietet. Das Cabaret wurde im Oktober 1993 eröffnet und 2009 wurde der gesamte Nachtclub komplett neu gestaltet. Alle Räume sind klimatisiert und 2021 wurde eine moderne Luftreinigung integriert. Parkplätze befinden sich in ausreichender Anzahl direkt neben dem Blue Angel."
            }
          },
          {
            "@type": "Question",
            "name": "Welche Art von Unterhaltung wird im Blue Angel Stripclub angeboten?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Im Blue Angel Stripclub können Sie atemberaubende Shows, verlockende Lapdances, private Dances und vieles mehr mit unseren talentierten Girls erleben. Ein Großbild-LED-TV zeigt zudem erotische Filme für zusätzliche Unterhaltung."
            }
          },
          {
            "@type": "Question",
            "name": "Wann hat der Blue Angel Stripclub geöffnet?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Die Öffnungszeiten des Blue Angel Stripclubs sind von Montag bis Samstag, 21:00 - 05:00 Uhr. Der Eintritt ist kostenfrei. Am 24.12. (Heiligabend) haben wir geschlossen. Am 31.12. (Silvester) haben wir geöffnet."
            }
          },
          {
            "@type": "Question",
            "name": "Können private/geschäftliche Anlässe im Blue Angel Stripclub gefeiert werden?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Ja, unsere exklusive Location steht für private Anlässe wie Junggesellenabschiede, Geburtstagsfeiern bis hin zu Videodrehs und mehr zur Verfügung."
            }
          },
          {
            "@type": "Question",
            "name": "Was sind die Preise?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Der Eintritt ist kostenfrei. Unsere Table Dollars, die ihr den Tänzerinnen zustecken könnt, kosten 1 $ = 2 €. Die aktuellen Getränkepreise entnehmt ihr bitte unsere Getränkekarte."
            }
          },
          {
            "@type": "Question",
            "name": "Wie sind die Preise für Getränke?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Das erste Getränk kostet mindestens 12 €, jedes weitere Getränk ab 7 €. Die Getränkekarte bietet eine grosse Auswahl an alkoholischen, nicht-alkoholischen (warm, kalt) Getränken und Flaschengetränken."
            }
          },
          {
            "@type": "Question",
            "name": "Welche Mix-Getränke sind enthalten, wenn man eine Flasche bestellt?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Zu den 0,35 l / 0,5 l Flaschen gibt es jeweils 2 kostenlose Getränke wie Coca Cola, Red Bull, Schweppes Bitter Lemon, Schweppes Tonic Water, Orangensaft oder Apfelsaft. Jede weitere 0,5l Flasche kostet 15,00 €."
            }
          },
          {
            "@type": "Question",
            "name": "Welche Zahlungsmethoden werden akzeptiert?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Neben Barzahlung akzeptieren wir selbstverständlich gängige Kreditkarten wie EC, CB, Maestro, Mastercard und Visa."
            }
          },
          {
            "@type": "Question",
            "name": "Gibt es einen virtuellen Rundgang durch die Räumlichkeiten?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Ja, wir bieten eine 360° Tour durch unsere Räumlichkeiten, die es Ihnen ermöglicht, sich interaktiv umzusehen. Die Tour kann sowohl am PC als auch mit dem Handy durch Bewegung oder mit einem VR Headset betrachtet werden. So kann man sich frei bewegen."
            }
          },
          {
            "@type": "Question",
            "name": "Wie kann man den Blue Angel Stripclub kontaktieren?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Adresse: Gerberstr. 6, D-79206 Breisach am Rhein E-Mail: info@blue-angel.de Telefon: +49/7667 107 0"
            }
          }
        ]
      }`,
    }
  },

  head() {
    return {
      title: this.pageData.metaTitle,
      htmlAttrs: {
        lang: this.$i18n.locale,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.pageData.metaDescription,
        },
        {
          property: 'og:site_name',
          content: this.pageData.metaTitle ?? 'Blue Angel Breisach',
        },
        {
          property: 'og:title',
          content: this.pageData.metaTitle ?? 'Blue Angel Breisach',
        },
        {
          property: 'og:description',
          content:
            this.pageData.metaDescription ??
            'Tauche ein in die faszinierende Atmosphäre des Blue Angel – dem verführerischsten Stripclub in Breisach am Rhein und Umgebung.',
        },
      ],
      script: [
        {
          type: 'application/ld+json',
          innerHTML: this.ldJsonOrganization,
        },
        {
          type: 'application/ld+json',
          innerHTML: this.ldJsonBreadcrumbList,
        },
        {
          type: 'application/ld+json',
          innerHTML: this.ldJsonFAQPage,
        },
      ],
    }
  },
}
</script>

<style></style>
