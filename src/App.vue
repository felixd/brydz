<template>
  <!-- 
    <form id="app" @submit="checkForm" action="/" method="post">
    -->


  <!-- FORMULARZ -->

  <form id="app" @submit="checkForm">
    <div class="form-group">
      <label for="email">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card-o"></i>
          </div>
        </div>
        <input id="email" name="email" v-model="email" placeholder="Email" type="text" required="required"
          class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="phone">Telefon komórkowy</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-phone"></i>
          </div>
        </div>
        <input id="phone" name="phone" v-model="phone" placeholder="+48xxxxxxxxx" type="text" class="form-control"
          required="required">
      </div>
    </div>

    <div class="form-group">
      <h2>Dane pierwszego gracza</h2>
      <div class="form-group">
        <label for="player1_cezarid">Cezar ID</label>
        <div class="input-group">
          <input id="player1_cezarid" name="player1_cezarid" v-model="player1_cezarid" placeholder="xxxxx" type="text"
            aria-describedby="player1_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text" @click="getCezar1">Pobierz dane</div>
          </div>
        </div>
        <span id="player1_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR.</span>
      </div>
      <div class="form-group">
        <label for="player1_name">Imię</label>
        <input id="player1_name" name="player1_name" v-model="player1_name" type="text" class="form-control"
          required="required">
      </div>
      <div class="form-group">
        <label for="player1_surname">Nazwisko</label>
        <input id="player1_surname" name="player1_surname" v-model="player1_surname" type="text" class="form-control"
          required="required">
      </div>
      <div class="form-group">
        <label for="player1_club">Klub</label>
        <input id="player1_club" name="player1_club" v-model="player1_club" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Obiad</label>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_0" v-model="player1_food" type="checkbox"
              class="custom-control-input" value="no">
            <label for="player1_food_0" class="custom-control-label">Brak</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_1" v-model="player1_food" type="checkbox"
              class="custom-control-input" value="day1">
            <label for="player1_food_1" class="custom-control-label">Dzień 1</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_2" v-model="player1_food" type="checkbox"
              class="custom-control-input" value="day2">
            <label for="player1_food_2" class="custom-control-label">Dzień 2</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_3" v-model="player1_food" type="checkbox"
              class="custom-control-input" value="vege">
            <label for="player1_food_3" class="custom-control-label">Wegetariański</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Szukam partnera</label>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_looking_partner" id="player1_looking_partner" v-model="player1_looking_partner"
              type="checkbox" class="custom-control-input" value="yes"
              aria-describedby="player1_looking_partnerHelpBlock">
            <label for="player1_looking_partner" class="custom-control-label">Tak</label>
          </div>
          <span id="player1_looking_partnerHelpBlock" class="form-text text-muted">Zaznacz to pole jeżeli szukasz
            partnera</span>
        </div>
      </div>
    </div>

    <div class="form-group">
      <h2>Dane drugiego gracza</h2>
      <div class="form-group">
        <label for="player2_cezarid">Cezar ID</label>
        <div class="input-group">
          <input id="player2_cezarid" name="player2_cezarid" v-model="player2_cezarid" placeholder="xxxxx" type="text"
            aria-describedby="player2_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text" @click="getCezar2">Pobierz dane</div>
          </div>
        </div>
        <span id="player2_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR.</span>
      </div>
      <div class="form-group">
        <label for="player2_name">Imię</label>
        <input id="player2_name" name="player2_name" v-model="player2_name" type="text" class="form-control"
          required="required">
      </div>
      <div class="form-group">
        <label for="player2_surname">Nazwisko</label>
        <input id="player2_surname" name="player2_surname" v-model="player2_surname" type="text" class="form-control"
          required="required">
      </div>
      <div class="form-group">
        <label for="player2_club">Klub</label>
        <input id="player2_club" name="player2_club" v-model="player2_club" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Obiad</label>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player2_food" id="player2_food_0" v-model="player2_food" type="checkbox"
              class="custom-control-input" value="no">
            <label for="player2_food_0" class="custom-control-label">Brak</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player2_food" id="player2_food_1" v-model="player2_food" type="checkbox"
              class="custom-control-input" value="day1">
            <label for="player2_food_1" class="custom-control-label">Dzień 1</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player2_food" id="player2_food_2" v-model="player2_food" type="checkbox"
              class="custom-control-input" value="day2">
            <label for="player2_food_2" class="custom-control-label">Dzień 2</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player2_food" id="player2_food_3" v-model="player2_food" type="checkbox"
              class="custom-control-input" value="vege">
            <label for="player2_food_3" class="custom-control-label">Wegetariański</label>
          </div>
        </div>
      </div>

    </div>

    <div class="form-group">
      <h2>Dodatkowe opcje</h2>
      <div class="form-group">
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="other_options" id="other_options_0" v-model="other_options" type="checkbox"
              class="custom-control-input" value="parking">
            <label for="other_options_0" class="custom-control-label">Parking</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Wyślij</button>
      </div>
    </div>
  </form>



  <pre>{{ formData }}</pre>
  <pre>
      email: {{ email }}
      phone: {{ phone }}

      player1_cezarid: {{ player1_cezarid }}
      player1_name: {{ player1_name }}
      player1_surname: {{ player1_surname }}
      player1_club: {{ player1_club }}
      player1_food: {{ player1_food }}
      player1_looking_partner: {{ player1_looking_partner }}

      player2_cezarid: {{ player2_cezarid }}
      player2_name: {{ player2_name }}
      player2_surname: {{ player2_surname }}
      player2_club: {{ player2_club }}
      player2_food: {{ player2_food }}
     

      other_options: {{ other_options }}
    </pre>

</template>

<script setup>
import { ref } from 'vue';

const email = ref('')
const phone = ref('')

const player1_cezarid = ref('')
const player1_name = ref('')
const player1_surname = ref('')
const player1_club = ref('')
const player1_food = ref([])
const player1_looking_partner = ref(false)

const player2_cezarid = ref('')
const player2_name = ref('')
const player2_surname = ref('')
const player2_club = ref('')
const player2_food = ref([])
const other_options = ref([])

const formData = ref(null);

const getCezar1 = async () => {
  try {
    console.log('Trying to get data for player one');
    const player1_cezarData = await fetch(
      `https://rejestracja.gpwlkp2022.brydz.gniezno.pl/cezar/?pid=${player1_cezarid.value}`
    );
    formData.value = await player1_cezarData.json();
    player1_name = formData["IMIE"];
    player1_surname = formData["NAZWISKO"];
    player1_club = formData["KLUB"];

    console.log(formData.value);
  } catch (err) {
    console.error(err);
  }
};

const getCezar2 = async () => {
  try {
    console.log('Trying to get data for player two');
    const player2_cezarData = await fetch(
      `https://rejestracja.gpwlkp2022.brydz.gniezno.pl/cezar/?pid=${player2_cezarid.value}`
    );
    formData.value = await player2_cezarData.json();

    player2_name = formData["IMIE"];
    player2_surname = formData["NAZWISKO"];
    player2_club = formData["KLUB"];

    console.log(formData.value);
  } catch (err) {
    console.error(err);
  }
};


</script>
