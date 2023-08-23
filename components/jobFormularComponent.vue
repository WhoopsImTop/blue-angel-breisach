<template>
  <div class="content-container text-container text-block">
    <div class="formular-container">
      <form>
        <div class="formular-row">
          <input
            type="text"
            id="fname"
            name="firstname"
            placeholder="Vorname"
          />
          <input
            type="text"
            id="lname"
            name="lastname"
            placeholder="Nachname"
          />
        </div>
        <div class="formular-row">
          <input type="email" id="email" name="email" placeholder="E-Mail" />
          <input
            type="text"
            id="phone"
            name="phone"
            placeholder="Telefonnummer"
          />
        </div>
        <input type="file" id="file" name="file" />
        <textarea
          id="subject"
          name="subject"
          placeholder="Nachricht"
          style="height: 200px"
        ></textarea>

        <div style="display: flex; flex-direction: row; align-items: center">
          <input style="width: max-content; margin: 0 20px 0 0" type="checkbox" v-model="privacyPolicy" />
          <label
            >Ich bin mit der verarbeitung meiner Daten einverstanden.
          </label>
        </div>
        <div class="button">Bewerben</div>
      </form>
    </div>
  </div>
</template>

<script>
export default {}
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

@media (min-width: 995px) {
  .formular-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 8px;
  }
}
</style>