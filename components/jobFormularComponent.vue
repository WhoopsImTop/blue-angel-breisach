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
          <input type="hidden" name="image_form" value="1" />
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
          <input
            type="email"
            id="email"
            name="email"
            placeholder="E-Mail"
            v-model="formFields.email"
          />
          <input
            type="text"
            id="phone"
            name="phone"
            :placeholder="translations[currentLocale].formFields.phoneNumber"
            v-model="formFields.phoneNumber"
          />
        </div>
        <input
          type="file"
          accept="image/*"
          id="files"
          name="files"
          multiple
          @change="handleFileChange"
        />
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
          <label style="margin: 0"
            >{{ translations[currentLocale].formFields.privacyPolicy }}
          </label>
        </div>
        <input type="checkbox" v-model="validate" style="display: none" />
        <div class="button" @click="sendMail()">
          {{ translations[currentLocale].formFields.apply }}
        </div>
        <div v-if="success" class="successMessage">
          {{ successmessage[currentLocale].message }}
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
        subject: 'Bewerbung über Blue Angel Website',
        firstName: '',
        lastName: '',
        email: '',
        phoneNumber: '',
        message: '',
        images: [],
      },
      errorMessages: {
        de: {
          firstName: 'Bitte geben Sie Ihren Vornamen ein',
          lastName: 'Bitte geben Sie Ihren Nachnamen ein',
          email: 'Bitte geben Sie Ihre E-Mail Adresse ein',
          phoneNumber: 'Bitte geben Sie Ihre Telefonnummer ein',
          message: 'Bitte geben Sie eine Nachricht ein',
        },
        en: {
          firstName: 'Please enter your first name',
          lastName: 'Please enter your last name',
          email: 'Please enter your email address',
          phoneNumber: 'Please enter your phone number',
          message: 'Please enter a message',
        },
        fr: {
          firstName: 'Veuillez entrer votre prénom',
          lastName: 'Veuillez entrer votre nom de famille',
          email: 'Veuillez entrer votre adresse e-mail',
          phoneNumber: 'Veuillez entrer votre numéro de téléphone',
          message: 'Veuillez entrer un message',
        },
        ro: {
          firstName: 'Vă rugăm să introduceți prenumele dvs.',
          lastName: 'Vă rugăm să introduceți numele dvs.',
          email: 'Vă rugăm să introduceți adresa dvs. de e-mail',
          phoneNumber: 'Vă rugăm să introduceți numărul dvs. de telefon',
          message: 'Vă rugăm să introduceți un mesaj',
        },
        pl: {
          firstName: 'Proszę podać swoje imię',
          lastName: 'Proszę podać swoje nazwisko',
          email: 'Proszę podać swój adres e-mail',
          phoneNumber: 'Proszę podać swój numer telefonu',
          message: 'Proszę podać wiadomość',
        },
        ru: {
          firstName: 'Пожалуйста, введите свое имя',
          lastName: 'Пожалуйста, введите свою фамилию',
          email: 'Пожалуйста, введите свой адрес электронной почты',
          phoneNumber: 'Пожалуйста, введите свой номер телефона',
          message: 'Пожалуйста, введите сообщение',
        },
        hu: {
          firstName: 'Kérjük, adja meg a keresztnevét',
          lastName: 'Kérjük, adja meg vezetéknevét',
          email: 'Kérjük, adja meg e-mail címét',
          phoneNumber: 'Kérjük, adja meg telefonszámát',
          message: 'Kérjük, adja meg az üzenetet',
        },
        bg: {
          firstName: 'Моля, въведете името си',
          lastName: 'Моля, въведете фамилията си',
          email: 'Моля, въведете имейл адреса си',
          phoneNumber: 'Моля, въведете телефонния си номер',
          message: 'Моля, въведете съобщение',
        },
        cs: {
          firstName: 'Prosím, zadejte své jméno',
          lastName: 'Prosím, zadejte své příjmení',
          email: 'Prosím, zadejte svou e-mailovou adresu',
          phoneNumber: 'Prosím, zadejte své telefonní číslo',
          message: 'Prosím, zadejte zprávu',
        },
        sk: {
          firstName: 'Prosím, zadajte svoje krstné meno',
          lastName: 'Prosím, zadajte svoje priezvisko',
          email: 'Prosím, zadajte svoju e-mailovú adresu',
          phoneNumber: 'Prosím, zadajte svoje telefónne číslo',
          message: 'Prosím, zadajte správu',
        },
      },
      successmessage: {
        de: {
          message: 'Vielen Dank für Ihre Nachricht!',
        },
        en: {
          message: 'Thank you for your message!',
        },
        fr: {
          message: 'Merci pour votre message!',
        },
        ro: {
          message: 'Vă mulțumim pentru mesaj!',
        },
        pl: {
          message: 'Dziękujemy za wiadomość!',
        },
        ru: {
          message: 'Спасибо за ваше сообщение!',
        },
        hu: {
          message: 'Köszönjük az üzenetét!',
        },
        bg: {
          message: 'Благодаря ви за съобщението!',
        },
        cs: {
          message: 'Děkujeme za vaši zprávu!',
        },
        sk: {
          message: 'Ďakujeme za vašu správu!',
        },
      },
      translations: {
        de: {
          text: {
            welcome:
              'Der Blue Angel Stripclub sucht immer nach aufgeschlossenen, charmanten und talentierten Tänzerinnen & Tischdamen (+18 Jahre). Werde Teil unserer verführerischen Welt und entfache deine Leidenschaft auf der Bühne.',
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
              'Clubul de striptease Blue Angel este mereu în căutarea de dansatoare și ospătarițe deschise, fermecătoare și talentate (+18 ani). Fă parte din lumea noastră seducătoare și aprinde-ți pasiunea pe scenă.',
            atmosphere:
              'Oferim o atmosferă plăcută în cabaretul nostru exclusivist. În plus, oferim cazare cu acces la internet direct în clădire. În față se află un studio profesional de fitness cu saună, piscină și solar.',
            contact:
              'Ne poți contacta la numărul +49 172 63 20 40 4 (și prin SMS sau WhatsApp) sau poți folosi acest formular simplu. Trimite-ne câteva fotografii cu tine. Îți garantăm confidențialitate absolută în privința informațiilor tale. <br> <br> Aplică astăzi încă.',
          },
          formFields: {
            firstName: 'Prenume',
            lastName: 'Nume',
            email: 'Email',
            phoneNumber: 'Număr de telefon',
            message: 'Mesaj',
            privacyPolicy: 'Sunt de acord cu prelucrarea datelor mele.',
            apply: 'Aplică',
          },
        },
        pl: {
          text: {
            welcome:
              'Klub Blue Angel Stripclub zawsze poszukuje otwartych, uroczych i utalentowanych tancerek i kelnerkach (+18 lat). Dołącz do naszego uwodzicielskiego świata i rozpal swoją pasję na scenie.',
            atmosphere:
              'Oferujemy przyjemną atmosferę w naszym ekskluzywnym kabarecie. Dodatkowo zapewniamy zakwaterowanie z dostępem do internetu bezpośrednio w budynku. Naprzeciwko znajduje się profesjonalne studio fitness z sauną, basenem i solarium.',
            contact:
              'Możesz się z nami skontaktować pod numerem +49 172 63 20 40 4 (również przez SMS lub WhatsApp) lub po prostu skorzystać z tego formularza. Śmiało prześlij nam kilka zdjęć. Gwarantujemy dyskrecję wobec Twoich informacji. <br> <br> Aplikuj jeszcze dziś.',
          },
          formFields: {
            firstName: 'Imię',
            lastName: 'Nazwisko',
            email: 'Email',
            phoneNumber: 'Numer telefonu',
            message: 'Wiadomość',
            privacyPolicy: 'Zgadzam się na przetwarzanie moich danych.',
            apply: 'Zastosuj',
          },
        },
        ru: {
          text: {
            welcome:
              'Стрип-клуб Blue Angel всегда ищет открытых, очаровательных и талантливых танцовщиц и официанток (+18 лет). Присоединяйтесь к нашему соблазнительному миру и разожгите свою страсть на сцене.',
            atmosphere:
              'Мы предлагаем приятную атмосферу в нашем эксклюзивном кабаре. Кроме того, мы предоставляем жилье с доступом в Интернет прямо в здании. Напротив находится профессиональный фитнес-клуб с сауной, бассейном и солярием.',
            contact:
              'Вы можете связаться с нами по номеру +49 172 63 20 40 4 (также через SMS или WhatsApp) или просто воспользоваться этой формой. Пожалуйста, пришлите нам несколько фотографий. Мы гарантируем конфиденциальность в отношении всех ваших данных. <br> <br> Подайте заявку уже сегодня.',
          },
          formFields: {
            firstName: 'Имя',
            lastName: 'Фамилия',
            email: 'Email',
            phoneNumber: 'Номер телефона',
            message: 'Сообщение',
            privacyPolicy: 'Я согласен(сна) на обработку моих данных.',
            apply: 'Подать заявку',
          },
        },
        hu: {
          text: {
            welcome:
              'A Blue Angel Stripclub mindig keres nyitott, bájos és tehetséges táncos lányokat és asztalos hölgyeket (+18 éves). Legyél része a kísértő világunknak, és szólaltasd meg a szenvedélyed a színpadon.',
            atmosphere:
              'Kellemes hangulatot kínálunk exkluzív kabaréinkban. Emellett szállást is biztosítunk internet-hozzáféréssel közvetlenül a házban. Szemben található egy profi fitness stúdió szaunával, medencével és szoláriummal.',
            contact:
              'Elérhet minket a +49 172 63 20 40 4 számon (SMS vagy WhatsApp is elérhető) vagy egyszerűen használhatod ezt az űrlapot. Küldj el nekünk néhány képet magadról. Garantáljuk, hogy diszkréten kezeljük az összes információt. <br> <br> Jelentkezz még ma.',
          },
          formFields: {
            firstName: 'Keresztnév',
            lastName: 'Vezetéknév',
            email: 'E-mail',
            phoneNumber: 'Telefonszám',
            message: 'Üzenet',
            privacyPolicy: 'Elfogadom az adataim kezelését.',
            apply: 'Jelentkezés',
          },
        },
        bg: {
          text: {
            welcome:
              'Стриптийз клубът Blue Angel винаги търси отворени, очарователни и талантливи танцьорки и сервитьорки (+18 години). Станете част от нашия съблазнителен свят и разпалете страстта си на сцената.',
            atmosphere:
              'Предлагаме приятна атмосфера в нашия ексклузивен кабаре. Освен това осигуряваме настаняване с интернет достъп директно в сградата. Насреща се професионален фитнес студио със сауна, басейн и солариум.',
            contact:
              'Можете да се свържете с нас на номер +49 172 63 20 40 4 (също и чрез SMS или WhatsApp) или просто да използвате тази форма. Изпратете ни няколко снимки с вас. Гарантираме дискретност при обработката на вашата информация. <br> <br> Кандидатствайте още днес.',
          },
          formFields: {
            firstName: 'Име',
            lastName: 'Фамилия',
            email: 'Имейл',
            phoneNumber: 'Телефонен номер',
            message: 'Съобщение',
            privacyPolicy: 'Съгласен(сна) съм с обработката на данните ми.',
            apply: 'Кандидатствай',
          },
        },
        cs: {
          text: {
            welcome:
              'Blue Angel Stripclub stále hledá otevřené, okouzlující a talentované tanečnice a servírky (+18 let). Staňte se součástí našeho svůdného světa a rozhořte svou vášeň na jevišti.',
            atmosphere:
              'Nabízíme příjemnou atmosféru v našem exkluzivním kabaretu. Navíc poskytujeme ubytování s přístupem na internet přímo v budově. Naproti je profesionální fitness studio se saunou, bazénem a soláriem.',
            contact:
              'Můžete nás kontaktovat na čísle +49 172 63 20 40 4 (také prostřednictvím SMS nebo WhatsApp) nebo jednoduše použijte tento formulář. Klidně nám pošlete několik fotografií. Zaručujeme diskrétní zacházení se všemi vašimi informacemi. <br> <br> Přihlaste se ještě dnes.',
          },
          formFields: {
            firstName: 'Jméno',
            lastName: 'Příjmení',
            email: 'E-mail',
            phoneNumber: 'Telefonní číslo',
            message: 'Zpráva',
            privacyPolicy: 'Souhlasím s zpracováním svých údajů.',
            apply: 'Přihlásit se',
          },
        },
        sk: {
          text: {
            welcome:
              'Blue Angel Stripclub stále hľadá otvorené, očarujúce a talentované tanečnice a servírky (+18 rokov). Staňte sa súčasťou nášho svádzneho sveta a rozhojníte svoju vášeň na pódiu.',
            atmosphere:
              'Ponúkame príjemnú atmosféru v našom exkluzívnom kabarete. Okrem toho poskytujeme ubytovanie s prístupom na internet priamo v budove. Naproti sa nachádza profesionálne fitness štúdio so saunou, bazénom a soláriom.',
            contact:
              'Môžete nás kontaktovať na čísle +49 172 63 20 40 4 (tiež cez SMS alebo WhatsApp) alebo jednoducho použite tento formulár. S odvahou nám pošlite niekoľko fotografií. Zaručujeme diskrétny prístup ku všetkým vašim informáciám. <br> <br> Prihláste sa ešte dnes.',
          },
          formFields: {
            firstName: 'Meno',
            lastName: 'Priezvisko',
            email: 'E-mail',
            phoneNumber: 'Telefónne číslo',
            message: 'Správa',
            privacyPolicy: 'Súhlasím s spracovaním mojich údajov.',
            apply: 'Prihlásiť sa',
          },
        },
        en: {
          text: {
            welcome:
              'The Blue Angel Stripclub is always looking for open-minded, charming, and talented dancers & hostesses (+18 years old). Become a part of our seductive world and ignite your passion on stage.',
            atmosphere:
              'We offer a pleasant atmosphere in our exclusive cabaret. Additionally, we provide accommodation with internet access directly in the building. Across the street, there is a professional fitness studio with a sauna, pool, and solarium.',
            contact:
              'You can reach us at +49 172 63 20 40 4 (Also via SMS or WhatsApp) or simply use this form. Feel free to send us a few photos of yourself. We guarantee discreet handling of all your information. <br> <br> Apply today.',
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
              "Le Blue Angel Stripclub est toujours à la recherche de danseuses et hôtesses ouvertes d'esprit, charmantes et talentueuses (+18 ans). Rejoignez notre monde séduisant et enflammez votre passion sur scène.",
            atmosphere:
              'Nous offrons une atmosphère agréable dans notre cabaret exclusif. De plus, nous proposons un hébergement avec accès à Internet directement dans le bâtiment. En face, se trouve un studio de fitness professionnel avec sauna, piscine et solarium.',
            contact:
              "Vous pouvez nous joindre au +49 172 63 20 40 4 (également par SMS ou WhatsApp) ou simplement utiliser ce formulaire. N'hésitez pas à nous envoyer quelques photos de vous. Nous garantissons un traitement discret de toutes vos informations. <br> <br> Postulez dès aujourd'hui.",
          },
          formFields: {
            firstName: 'Prénom',
            lastName: 'Nom',
            email: 'Email',
            phoneNumber: 'Numéro de téléphone',
            message: 'Message',
            privacyPolicy: "J'accepte le traitement de mes données.",
            apply: 'Postuler',
          },
        },
      },
      privacyPolicy: false,
      validate: false,
      success: false,
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
      this.formFields.images = event.target.files
    },
    formVaidation() {
      if (!this.formFields.firstName) {
        alert(this.errorMessages[this.currentLocale].firstName)
        return false
      }
      if (!this.formFields.lastName) {
        alert(this.errorMessages[this.currentLocale].lastName)
        return false
      }
      if (!this.formFields.email) {
        alert(this.errorMessages[this.currentLocale].email)
        return false
      }
      if (!this.formFields.message) {
        alert(this.errorMessages[this.currentLocale].message)
        return false
      }
      return true
    },
    sendMail() {
      if (!this.formVaidation()) {
        return
      }

      if (!this.privacyPolicy) {
        alert('Please accept the privacy policy')
        return
      }

      if (this.validate) {
        this.success = true
        setTimeout(() => {
          this.success = false
        }, 5000)
        return
      }

      const fromData = new FormData()
      fromData.append('subject', this.formFields.subject)
      let message = ''
      message += 'Vorname: ' + this.formFields.firstName + '\n'
      message += 'Nachname: ' + this.formFields.lastName + '\n'
      message += 'Email: ' + this.formFields.email + '\n'
      message += 'Telefonnummer: ' + this.formFields.phoneNumber + '\n'
      message += 'Nachricht: ' + this.formFields.message + '\n'
      fromData.append('message', message)

      for (const file of this.formFields.images) {
        fromData.append('images[]', file)
      }

      fetch('https://blue-angel.de/mail.php', {
        method: 'POST',
        body: fromData,
      })
        .then((response) => {
          return response.json()
        })
        .then((data) => {
          if (data.success) {
            this.success = true
            setTimeout(() => {
              this.success = false
            }, 5000)
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

.successMessage {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  box-sizing: border-box;
  padding: 12px 20px;
  margin: 3px 0;
  border-radius: 20px;
  border: 1px solid var(--red);
  color: var(--red);
  font-family: var(--secondary-font);
  font-size: 18px;
  background-color: var(--background-red);
  display: flex;
  justify-content: center;
  align-items: center;
}

@media (min-width: 995px) {
  .formular-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 8px;
  }
}
</style>