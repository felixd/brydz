<template>
  <form @submit.prevent="getData">
    <input v-model="player1_pid" />
    <input type="submit" value="Pobierz dane" />
    <pre>{{ formData }}</pre>
    <pre>
      email: {{ email }}
      phone: {{ phone }}
      player1_cezarid: {{ player1_cezarid }}
      player1_name: {{ player1_name }}
      player1_surname: {{ player1_surname }}
      player1_food: {{ player1_food }}
      player1_looking_for_partner: {{ player1_looking_for_partner }}
    </pre>

    <div class="rendered-form">
      <div class="">
        <h1 access="false" id="formheader">
          <b style="
              color: rgb(32, 33, 36);
              font-family: docs-Roboto, Helvetica, Arial, sans-serif;
              font-size: 32px;
            ">Memoriał im. Krzysztofa Krausego - Grand Prix Wielkopolski</b>
        </h1>
      </div>
      <div class="formbuilder-text form-group field-email">
        <label for="email" class="formbuilder-text-label">Adres email<span class="formbuilder-required">*</span></label>
        <input type="text" class="email" v-model="email" name="email" access="false" id="email" required="required" />
      </div>
      <div class="formbuilder-text form-group field-phone">
        <label for="phone" class="formbuilder-text-label">Telefon komórkowy<span
            class="formbuilder-required">*</span></label>
        <input type="text" class="phone" name="phone" v-model="phone" access="false" id="phone" required="required"
          aria-required="true" />
      </div>
      <div class="formbuilder-text form-group field-player1_cezarid">
        <label for="player1_cezarid" class="formbuilder-text-label">Cezar ID</label>
        <input type="text" name="player1_cezarid" v-model="player1_cezarid" access="false" id="player1_cezarid" />
      </div>
      <div class="formbuilder-text form-group field-player1_name">
        <label for="player1_name" class="formbuilder-text-label">Imię</label>
        <input type="text" class="form-control" name="player1_name" v-model="player1_name" access="false"
          id="player1_name" />
      </div>
      <div class="formbuilder-text form-group field-player1_surname">
        <label for="player1_surname" class="formbuilder-text-label">Nazwisko</label>
        <input type="text" class="form-control" name="player1_surname" access="false" id="player1_surname"
          v-model="player1_surname" />
      </div>
      <div class="formbuilder-text form-group field-player1_club">
        <label for="player1_club" class="formbuilder-text-label">Klub</label>
        <input type="text" class="form-control" name="player1_club" access="false" id="player1_club"
          v-model="player1_club" />
      </div>
      <div class="formbuilder-checkbox-group form-group field-player1_food">
        <label for="player1_food" class="formbuilder-csheckbox-group-label">Obiad</label>
        <div class="checkbox-group">
          <div class="formbuilder-checkbox">
            <input name="player1_food[]" v-model="player1_food" access="false" id="player1_food-0" value="no-food"
              type="checkbox" />
            <label for="player1_food-0">Brak</label>
          </div>
          <div class="formbuilder-checkbox">
            <input name="player1_food[]" v-model="player1_food" access="false" id="player1_food-1" value="day1" type="checkbox" />
            <label for="player1_food-1">Dzień 1</label>
          </div>
          <div class="formbuilder-checkbox">
            <input name="player1_food[]" v-model="player1_food" access="false" id="player1_food-2" value="day2" type="checkbox" />
            <label for="player1_food-2">Dzień 2</label>
          </div>
          <div class="formbuilder-checkbox">
            <input name="player1_food[]" v-model="player1_food" access="false" id="player1_food-3" value="vege" type="checkbox" />
            <label for="player1_food-3">Wegetariański</label>
          </div>
        </div>
      </div>
      <div class="
          formbuilder-radio-group
          form-group
          field-player1_looking_for_partner
        ">
        <label for="player1_looking_for_partner" class="formbuilder-radio-group-label">Szukam partnera<span
            class="tooltip-element"
            tooltip='Jeżeli szukasz partnera zaznacz "Tak" i nie wypełniaj części o graczu.'>?</span></label>
        <div class="radio-group">
          <div class="formbuilder-radio">
            <input name="player1_looking_for_partner" access="false" v-model="player1_looking_for_partner" id="player1_looking_for_partner-0" value="yes"
              type="radio" />
            <label for="player1_looking_for_partner-0">Tak</label>
          </div>
          <div class="formbuilder-radio">
            <input name="player1_looking_for_partner" access="false" v-model="player1_looking_for_partner" id="player1_looking_for_partner-1" value="no"
              type="radio" checked="checked" />
            <label for="player1_looking_for_partner-1">Nie</label>
          </div>
        </div>
      </div>
      <div class="formbuilder-checkbox-group form-group field-other-options">
        <label for="other-options" class="formbuilder-checkbox-group-label">Pozostałe opcje</label>
        <div class="checkbox-group">
          <div class="formbuilder-checkbox">
            <input name="other-options[]" access="false" id="other-options-0" value="parking" type="checkbox" />
            <label for="other-options-0">Parking</label>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { ref } from 'vue';

export default {
  data() {
    return {
      email: '',
      phone: '',
      player1_cezarid: '5510',
      player1_name: '',
      player1_surname: '',
      player1_club: '',
      player1_food: [],
      player1_looking_for_partner: 'yes',
      player2_cezarid: '',
      player2_name: '',
      player2_surname: '',
      player2_club: '',
      player2_food: [],
      other_options: [],
    }
  }
}

const player1_cezarid = ref('');
const formData = ref(null);

const getData = async () => {
  try {
    const data = await fetch(
      `https://register.brydz.gniezno.pl/cezar/?pid=${pid.value}`
    );
    formData.value = await data.json();
    console.log(formData.value);
  } catch (err) {
    console.error(err);
  }
};
</script>
