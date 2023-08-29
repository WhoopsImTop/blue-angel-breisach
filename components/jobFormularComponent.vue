<template>
  <div class="content-container text-container text-block">
    <div class="language-switcher-formular">
      <div
        v-for="(language, index) in languages"
        :key="index"
        @click="currentLocale = language.code"
        :class="currentLocale === language.code ? 'active' : ''"
        class="language-switcher-item"
      >
        <img
          :src="`/languages/${language.code}.svg`"
          width="30"
          :alt="language.name"
        />
      </div>
    </div>

    <div class="informational">
      <div class="informational-text">
        <p>{{ translations[currentLocale].text.welcome }}</p>
      </div>
      <div class="informational-text">
        <p>{{ translations[currentLocale].text.atmosphere }}</p>
      </div>
      <div class="informational-text">
        <p v-html="translations[currentLocale].text.contact"></p>
      </div>
    </div>

    <div class="formular-container">
      <form>
        <div class="formular-row">
          <input type="hidden" name="image_form" value="1">
          <input
            type="text"
            id="fname"
            name="firstname"
            :placeholder="translations[currentLocale].formFields.firstName"
            v-model="formFields.firstName"
          />
          <input
            type="text"
            id="lname"
            name="lastname"
            :placeholder="translations[currentLocale].formFields.lastName"
            v-model="formFields.lastName"
          />
        </div>
        <div class="formular-row">
          <input type="email" id="email" name="email" placeholder="E-Mail" v-model="formFields.email"/>
          <input
            type="text"
            id="phone"
            name="phone"
            :placeholder="translations[currentLocale].formFields.phoneNumber"
            v-model="formFields.phoneNumber"
          />
        </div>
        <input type="file" accept="image/*" id="files" name="files" multiple  @change="handleFileChange" />
        <textarea
          id="subject"
          name="subject"
          :placeholder="translations[currentLocale].formFields.message"
          v-model="formFields.message"
          style="height: 200px"
        ></textarea>

        <div style="display: flex; flex-direction: row; align-items: center">
          <input
            style="width: max-content; margin: 0 20px 0 0"
            type="checkbox"
            v-model="privacyPolicy"
          />
          <label
            >{{ translations[currentLocale].formFields.privacyPolicy }}
          </label>
        </div>
        <div class="button" @click="sendMail()">
          {{ translations[currentLocale].formFields.apply }}
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentLocale: this.$i18n.locale,
      languages: [
        { name: 'Deutsch', code: 'de' },
        { name: 'Englisch', code: 'en' },
        { name: 'Französisch', code: 'fr' },
        { name: 'Rumänisch', code: 'ro' },
        { name: 'Polnisch', code: 'pl' },
        { name: 'Russisch', code: 'ru' },
        { name: 'Ungarisch', code: 'hu' },
        { name: 'Bulgarisch', code: 'bg' },
        { name: 'Tschechisch', code: 'cs' },
        { name: 'Slowakisch', code: 'sk' },
      ],
      formFields: {
        subject: 'Bewerbung -' + this.currentLocale,
        firstName: '',
        lastName: '',
        email: '',
        phoneNumber: '',
        message: '',
        images: [],
      },
      translations: {
        de: {
          text: {
            welcome:
              'Der Blue Angel Stripclub sucht immer nach aufgeschlossenen, charmanten und talentierten Tänzerinnen (+18 Jahre). Werde Teil unserer verführerischen Welt und entfache deine Leidenschaft auf der Bühne.',
            atmosphere:
              'Wir bieten eine angenehme Atmosphäre in unserem exklusiven Cabaret. Zusätzlich bieten wir Wohnmöglichkeiten inklusive Internetzugang direkt im Haus. Gegenüber befindet ein professionelles Fitness Studio mit Sauna, Pool und Solarium.',
            contact:
              'Du erreichst uns unter +49 172 63 20 40 4 (Auch per SMS oder WhatsApp) oder du nutzt einfach dieses Formular. Sende uns gerne ein paar Fotos von dir. Wir garantieren diskreten Umgang mit all deinen Informationen. <br> <br>Bewirb dich noch heute.',
          },
          formFields: {
            firstName: 'Vorname',
            lastName: 'Nachname',
            email: 'E-Mail',
            phoneNumber: 'Telefonnummer',
            message: 'Nachricht',
            privacyPolicy:
              'Ich bin mit der Verarbeitung meiner Daten einverstanden.',
            apply: 'Bewerben',
          },
        },
        ro: {
          text: {
            welcome:
              'Suntem în căutarea constantă a doamnelor/fetițelor (+18 ani) deschise și fermecătoare pentru cabaretul/clubul nostru de noapte.',
            atmosphere:
              'Oferim o atmosferă plăcută într-un cabaret exclusiv. Opțiunile de cazare cu acces la internet sunt disponibile pe proprietate. Peste drum se află un studio de fitness cu saună, piscină și solar.',
            contact:
              'Ne puteți contacta la Mobil 0049/172-6320404 (de asemenea, prin SMS sau WhatsApp) sau prin secțiunea de Contact.',
          },
          formFields: {
            firstName: 'Prenume',
            lastName: 'Nume de familie',
            email: 'E-mail',
            phoneNumber: 'Număr de telefon',
            message: 'Mesaj',
            privacyPolicy: 'Sunt de acord cu prelucrarea datelor mele.',
            apply: 'Aplica',
          },
        },
        pl: {
          text: {
            welcome:
              'Cały czas szukamy otwartych i uroczych pań/dziewcząt (+18 lat) do naszego kabaretu/klubu nocnego.',
            atmosphere:
              'Oferujemy przyjemną atmosferę w ekskluzywnym kabarecie. Opcje zakwaterowania z dostępem do Internetu są dostępne na miejscu. Po drugiej stronie ulicy znajduje się studio fitness z sauną, basenem i solarium.',
            contact:
              'Możesz się z nami skontaktować pod numerem komórkowym 0049/172-6320404 (również za pomocą SMS lub WhatsApp) lub za pośrednictwem sekcji Kontakt.',
          },
          formFields: {
            firstName: 'Imię',
            lastName: 'Nazwisko',
            email: 'E-mail',
            phoneNumber: 'Numer telefonu',
            message: 'Wiadomość',
            privacyPolicy: 'Zgadzam się na przetwarzanie moich danych.',
            apply: 'Zastosować',
          },
        },
        ru: {
          text: {
            welcome:
              'Мы постоянно ищем открытых и очаровательных дам/девушек (+18 лет) для нашего кабаре/ночного клуба.',
            atmosphere:
              'Мы предлагаем приятную атмосферу в эксклюзивном кабаре. Варианты размещения с доступом в интернете доступны на территории. Через дорогу находится фитнес-студия с сауной, бассейном и солярием.',
            contact:
              'Вы можете связаться с нами по мобильному номеру 0049/172-6320404 (также через SMS или WhatsApp) или через раздел Контакты.',
          },
          formFields: {
            firstName: 'Имя',
            lastName: 'Фамилия',
            email: 'Электронная почта',
            phoneNumber: 'Номер телефона',
            message: 'Сообщение',
            privacyPolicy: 'Я согласен на обработку моих данных.',
            apply: 'Применять',
          },
        },
        hu: {
          text: {
            welcome:
              'Folyamatosan keresünk nyitott gondolkodású és bájos hölgyeket/lányokat (+18 év) kabarénk/éjszakai klubunk számára.',
            atmosphere:
              'Kellemes hangulatot kínálunk egy exkluzív kabaréban. Szálláslehetőségek internet-hozzáféréssel rendelkeznek a helyszínen. Az utcán túl található egy fitnesz stúdió szaunával, medencével és szoláriummel.',
            contact:
              'Elérhet minket a 0049/172-6320404 mobiltelefonszámon (szintén SMS vagy WhatsApp útján), vagy a Kapcsolatok részen keresztül.',
          },
          formFields: {
            firstName: 'Keresztnév',
            lastName: 'Vezetéknév',
            email: 'E-mail',
            phoneNumber: 'Telefonszám',
            message: 'Üzenet',
            privacyPolicy: 'Elfogadom az adatkezelési szabályzatot.',
            apply: 'Alkalmaz',
          },
        },
        bg: {
          text: {
            welcome:
              'Непрекъснато търсим отворени и очарователни дами/момичета (+18 години) за нашия кабаре/нощен клуб.',
            atmosphere:
              'Предлагаме приятна атмосфера в един ексклузивен кабаре. Възможностите за настаняване с интернет достъп са налични на място. Напротив има фитнес студио със сауна, басейн и солариум.',
            contact:
              'Можете да ни намерите на мобилния номер 0049/172-6320404 (също и чрез SMS или WhatsApp) или чрез раздела за контакти.',
          },
          formFields: {
            firstName: 'Име',
            lastName: 'Фамилия',
            email: 'Имейл',
            phoneNumber: 'Телефонен номер',
            message: 'Съобщение',
            privacyPolicy: 'Съгласен съм с обработката на данните ми.',
            apply: 'Приложи',
          },
        },
        cs: {
          text: {
            welcome:
              'Nepřetržitě hledáme otevřené a okouzlující dámy/dívky (+18 let) do našeho kabaretu/nočního klubu.',
            atmosphere:
              'Nabízíme příjemnou atmosféru v exkluzivním kabaretu. Možnosti ubytování s přístupem k internetu jsou k dispozici na místě. Naproti je fitness studio se saunou, bazénem a soláriem.',
            contact:
              'Můžete nás kontaktovat na mobilním čísle 0049/172-6320404 (také prostřednictvím SMS nebo WhatsApp) nebo prostřednictvím sekce Kontakt.',
          },
          formFields: {
            firstName: 'Křestní jméno',
            lastName: 'Příjmení',
            email: 'E-mail',
            phoneNumber: 'Telefonní číslo',
            message: 'Zpráva',
            privacyPolicy: 'Souhlasím se zpracováním mých údajů.',
            apply: 'Použít',
          },
        },
        sk: {
          text: {
            welcome:
              'Neustále hľadáme otvorené a okúzľujúce dámy/ dievčatá (+18 rokov) pre náš kabarét/ nočný klub.',
            atmosphere:
              'Ponúkame príjemnú atmosféru v exkluzívnom kabarete. Možnosti ubytovania s prístupom na internet sú k dispozícii na mieste. Naproti je fitness štúdio so saunou, bazénom a soláriom.',
            contact:
              'Môžete nás kontaktovať na mobilnom čísle 0049/172-6320404 (aj cez SMS alebo WhatsApp) alebo cez sekciu Kontakt.',
          },
          formFields: {
            firstName: 'Krstné meno',
            lastName: 'Priezvisko',
            email: 'E-mail',
            phoneNumber: 'Telefónne číslo',
            message: 'Správa',
            privacyPolicy: 'Súhlasím s spracovaním mojich údajov.',
            apply: 'Použiť',
          },
        },
        en: {
          text: {
            welcome:
              'We are constantly looking for open-minded and charming ladies/girls (+18 years) for our Cabaret/Nightclub.',
            atmosphere:
              'We offer a pleasant atmosphere in an exclusive Cabaret. Accommodation options with internet access are available on-site. Across the street, there is a fitness studio with sauna, pool, and solarium.',
            contact:
              'You can reach us at Mobile 0049/172-6320404 (also via SMS or WhatsApp) or through the Contact section.',
          },
          formFields: {
            firstName: 'First Name',
            lastName: 'Last Name',
            email: 'Email',
            phoneNumber: 'Phone Number',
            message: 'Message',
            privacyPolicy: 'I agree to the processing of my data.',
            apply: 'Apply',
          },
        },
        fr: {
          text: {
            welcome:
              "Nous recherchons en permanence des dames/filles (+18 ans) ouvertes d'esprit et charmantes pour notre Cabaret/Nightclub.",
            atmosphere:
              "Nous offrons une ambiance agréable dans un Cabaret exclusif. Des options d'hébergement avec accès à Internet sont disponibles sur place. De l'autre côté de la rue, il y a un studio de fitness avec sauna, piscine et solarium.",
            contact:
              'Vous pouvez nous joindre au Mobile 0049/172-6320404 (également par SMS ou WhatsApp) ou via la section Contact.',
          },
          formFields: {
            firstName: 'Prénom',
            lastName: 'Nom',
            email: 'E-mail',
            phoneNumber: 'Numéro de téléphone',
            message: 'Message',
            privacyPolicy: 'J’accepte le traitement de mes données.',
            apply: 'Appliquer',
          },
        },
      },
      privacyPolicy: false,
    }
  },
  watch: {
    '$i18n.locale': function (newLocale) {
      this.currentLocale = newLocale
      this.$forceUpdate()
    },
  },
  methods: {
    handleFileChange(event) {
      this.formFields.images = event.target.files;
    },
    sendMail() {
      if (!this.privacyPolicy) {
        alert('Please accept the privacy policy')
        return
      }

      const fromData = new FormData()
      fromData.append('subject', this.formFields.subject)
      let message = '';
      message += 'Vorname: ' + this.formFields.firstName + '\n';
      message += 'Nachname: ' + this.formFields.lastName + '\n';
      message += 'Email: ' + this.formFields.email + '\n';
      message += 'Telefonnummer: ' + this.formFields.phoneNumber + '\n';
      message += 'Nachricht: ' + this.formFields.message + '\n';
      fromData.append('message', message)

      for(const file of this.formFields.images) {
        fromData.append('images[]', file)
      }

      fetch('http://blue-angel-breisach.de/mail.php', {
        method: 'POST',
        body: fromData,
      })
        .then((response) => {
          console.log(response)
        })
        .then((data) => {
          if (data.success) {
            alert('Mail sent successfully')
          } else {
            alert('Something went wrong')
          }
        })
        .catch((error) => {
          console.error('Error:', error)
        })
    },
  },
}
</script>

<style>
.formular-container input,
.formular-container textarea {
  width: 100%;
  box-sizing: border-box;
  padding: 12px 20px;
  margin: 3px 0;
  border-radius: 20px;
  border: 1px solid var(--red);
  color: var(--red);
  font-family: var(--secondary-font);
  font-size: 18px;
  background-color: var(--background-red);
}

.language-switcher-formular {
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin-bottom: 20px;
  flex-wrap: wrap;
}

.language-switcher-formular .language-switcher-item {
  margin-left: 20px;
  margin-bottom: 10px;
  cursor: pointer;
  font-family: var(--secondary-font);
  font-size: 18px;
  color: var(--red);
}

.language-switcher-item.active img {
  outline: 2px solid var(--red);
  outline-offset: 2px;
}

@media (min-width: 995px) {
  .formular-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 8px;
  }
}
</style>