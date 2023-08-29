<template>
  <div class="formular-container">
    <form>
      <div class="formular-row">
        <input
          type="text"
          id="fname"
          name="firstname"
          :placeholder="translations[$i18n.locale].firstName"
          v-model="formFields.firstName"
        />
        <input
          type="text"
          id="lname"
          name="lastname"
          :placeholder="translations[$i18n.locale].lastName"
          v-model="formFields.lastName"
        />
      </div>
      <div class="formular-row">
        <input
          type="email"
          id="email"
          name="email"
          :placeholder="translations[$i18n.locale].email"
          v-model="formFields.email"
        />
        <input
          type="text"
          id="phone"
          name="phone"
          :placeholder="translations[$i18n.locale].phoneNumber"
          v-model="formFields.phoneNumber"
        />
      </div>
      <textarea
        id="subject"
        name="subject"
        :placeholder="translations[$i18n.locale].message"
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
          >{{ translations[$i18n.locale].privacyPolicy }}
        </label>
      </div>
      <input type="checkbox" v-model="validate" style="display: none" />
      <div class="button" @click="sendMail()">Senden</div>
      <div v-if="success" class="successMessage">
        {{ successmessage[$i18n.locale].message }}
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formFields: {
        subject: 'Kontaktanfrage über Blue Angel Website',
        firstName: '',
        lastName: '',
        email: '',
        phoneNumber: '',
        message: '',
      },
      validate: false,
      privacyPolicy: false,
      success: false,
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
      },
      translations: {
        de: {
          subject: 'Kontaktanfrage über Blue Angel Website',
          firstName: 'Vorname',
          lastName: 'Nachname',
          email: 'E-Mail',
          phoneNumber: 'Telefonnummer',
          message: 'Nachricht',
          privacyPolicy: 'Datenschutzerklärung',
          send: 'Senden',
        },
        en: {
          subject: 'Contact request via Blue Angel website',
          firstName: 'First name',
          lastName: 'Last name',
          email: 'E-Mail',
          phoneNumber: 'Phone number',
          message: 'Message',
          privacyPolicy: 'Privacy policy',
          send: 'Send',
        },
        fr: {
          subject: 'Demande de contact via le site Web Blue Angel',
          firstName: 'Prénom',
          lastName: 'Nom de famille',
          email: 'E-Mail',
          phoneNumber: 'Numéro de téléphone',
          message: 'Message',
          privacyPolicy: 'Politique de confidentialité',
          send: 'Envoyer',
        },
      },
    }
  },
  methods: {
    formVaidation() {
      if (!this.formFields.firstName) {
        alert(this.errorMessages[this.$i18n.locale].firstName)
        return false
      }
      if (!this.formFields.lastName) {
        alert(this.errorMessages[this.$i18n.locale].lastName)
        return false
      }
      if (!this.formFields.email) {
        alert(this.errorMessages[this.$i18n.locale].email)
        return false
      }
      if (!this.formFields.message) {
        alert(this.errorMessages[this.$i18n.locale].message)
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

      fetch('http://blue-angel-breisach.de/mail.php', {
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
          console.log(error)
          alert('Something went wrong')
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