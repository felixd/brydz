<template>
  <form @submit.prevent="getData">
    <input v-model="pid" />
    <input type="submit" value="Get Data" />
  </form>
  <pre>{{ formData }}</pre>

  <div class="rendered-form">
    <div class="">
      <h1 access="false" id="control-423088">
        <b
          style="
            color: rgb(32, 33, 36);
            font-family: docs-Roboto, Helvetica, Arial, sans-serif;
            font-size: 32px;
          "
          >Memoriał im. Krzysztofa Krausego - Grand Prix Wielkopolski</b
        >
      </h1>
    </div>
    <div class="formbuilder-text form-group field-email">
      <label for="email" class="formbuilder-text-label"
        >Adres email<span class="formbuilder-required">*</span></label
      >
      <input
        type="text"
        class="email"
        name="email"
        access="false"
        id="email"
        required="required"
        aria-required="true"
      />
    </div>
    <div class="formbuilder-text form-group field-phone">
      <label for="phone" class="formbuilder-text-label"
        >Telefon komórkowy<span class="formbuilder-required">*</span></label
      >
      <input
        type="text"
        class="phone"
        name="phone"
        access="false"
        id="phone"
        required="required"
        aria-required="true"
      />
    </div>
    <div class="formbuilder-text form-group field-player1-cezarid">
      <label for="player1-cezarid" class="formbuilder-text-label"
        >Cezar ID</label
      >
      <input
        type="text"
        class="player1-cezarid"
        name="player1-cezarid"
        access="false"
        id="player1-cezarid"
      />
    </div>
    <div class="formbuilder-text form-group field-player1-name">
      <label for="player1-name" class="formbuilder-text-label">Imię</label>
      <input
        type="text"
        class="form-control"
        name="player1-name"
        access="false"
        id="player1-name"
      />
    </div>
    <div class="formbuilder-text form-group field-player1-surname">
      <label for="player1-surname" class="formbuilder-text-label"
        >Nazwisko</label
      >
      <input
        type="text"
        class="form-control"
        name="player1-surname"
        access="false"
        id="player1-surname"
      />
    </div>
    <div class="formbuilder-text form-group field-player1-club">
      <label for="player1-club" class="formbuilder-text-label">Klub</label>
      <input
        type="text"
        class="form-control"
        name="player1-club"
        access="false"
        id="player1-club"
      />
    </div>
    <div class="formbuilder-checkbox-group form-group field-player1-food">
      <label for="player1-food" class="formbuilder-checkbox-group-label"
        >Obiad</label
      >
      <div class="checkbox-group">
        <div class="formbuilder-checkbox">
          <input
            name="player1-food[]"
            access="false"
            id="player1-food-0"
            value="no-food"
            type="checkbox"
          />
          <label for="player1-food-0">Brak</label>
        </div>
        <div class="formbuilder-checkbox">
          <input
            name="player1-food[]"
            access="false"
            id="player1-food-1"
            value="day1"
            type="checkbox"
          />
          <label for="player1-food-1">Dzień 1</label>
        </div>
        <div class="formbuilder-checkbox">
          <input
            name="player1-food[]"
            access="false"
            id="player1-food-2"
            value="day2"
            type="checkbox"
          />
          <label for="player1-food-2">Dzień 2</label>
        </div>
        <div class="formbuilder-checkbox">
          <input
            name="player1-food[]"
            access="false"
            id="player1-food-3"
            value="vege"
            type="checkbox"
          />
          <label for="player1-food-3">Wegetariański</label>
        </div>
      </div>
    </div>
    <div
      class="
        formbuilder-radio-group
        form-group
        field-player1-looking-for-partner
      "
    >
      <label
        for="player1-looking-for-partner"
        class="formbuilder-radio-group-label"
        >Szukam partnera<span
          class="tooltip-element"
          tooltip='Jeżeli szukasz partnera zaznacz "Tak" i nie wypełniaj części o graczu.'
          >?</span
        ></label
      >
      <div class="radio-group">
        <div class="formbuilder-radio">
          <input
            name="player1-looking-for-partner"
            access="false"
            id="player1-looking-for-partner-0"
            value="yes"
            type="radio"
          />
          <label for="player1-looking-for-partner-0">Tak</label>
        </div>
        <div class="formbuilder-radio">
          <input
            name="player1-looking-for-partner"
            access="false"
            id="player1-looking-for-partner-1"
            value="no"
            type="radio"
            checked="checked"
          />
          <label for="player1-looking-for-partner-1">Nie</label>
        </div>
      </div>
    </div>
    <div class="formbuilder-checkbox-group form-group field-other-options">
      <label for="other-options" class="formbuilder-checkbox-group-label"
        >Pozostałe opcje</label
      >
      <div class="checkbox-group">
        <div class="formbuilder-checkbox">
          <input
            name="other-options[]"
            access="false"
            id="other-options-0"
            value="parking"
            type="checkbox"
          />
          <label for="other-options-0">Parking</label>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
const pid = ref('');
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
