<template>
  <!-- 
    <form id="app" @submit="checkForm" action="/" method="post">
    -->


  <!-- FORMULARZ -->

  <form id="app" @submit="checkForm" action="" method="post">
    <div class="form-group">
      <label for="email"><strong>Email</strong></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card-o"></i>
          </div>
        </div>
        <input id="email" name="email" v-model="email" placeholder="Email (wymagany)" type="text" required="required"
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
        <input id="phone" name="phone" v-model="phone" placeholder="+48xxxxxxxxx" type="text" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <h2>Dane gracza</h2>
      <div class="form-group">
        <label for="player1_cezarid">Cezar ID</label>
        <div class="input-group">
          <input id="player1_cezarid" name="player1_cezarid" v-model="player1_cezarid" placeholder="xxxxx" type="text"
            aria-describedby="player1_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text" @click="getCezar1">Pobierz dane</div>
          </div>
        </div>
        <span id="player1_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR. Jeżeli
          gracz nie znajduje się w bazie podaj dane samodzielnie.</span>
      </div>
      <div class="form-group">
        <label for="player1_name"><strong>Imię</strong></label>
        <input id="player1_name" name="player1_name" placeholder="Imię (pole wymagane)" v-model="player1_name"
          type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_surname"><strong>Nazwisko</strong></label>
        <input id="player1_surname" name="player1_surname" placeholder="Nazwisko (pole wymagane)"
          v-model="player1_surname" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_club">Klub</label>
        <input id="player1_club" name="player1_club" v-model="player1_club" type="text" class="form-control">
      </div>
      <div class="form-group">
        <h3>Obiad</h3>
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
        <h3>Mam partnera</h3>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_has_partner" id="player1_has_partner" v-model="player1_has_partner" type="checkbox"
              class="custom-control-input" value="true" aria-describedby="player1_has_partnerHelpBlock">
            <label for="player1_has_partner" class="custom-control-label">Tak</label>
          </div>
          <span id="player1_has_partnerHelpBlock" class="form-text text-muted"></span>
        </div>
      </div>
    </div>

    <div v-if="player1_has_partner" class="form-group">
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
        <span id="player2_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR. Jeżeli
          gracz nie znajduje się w bazie podaj dane samodzielnie.</span>
      </div>
      <div class="form-group">
        <label for="player2_name"><strong>Imię</strong></label>
        <input id="player2_name" name="player2_name" placeholder="Imię (pole wymagane)" v-model="player2_name"
          type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player2_surname"><strong>Nazwisko</strong></label>
        <input id="player2_surname" name="player2_surname" placeholder="Nazwisko (pole wymagane)"
          v-model="player2_surname" type="text" class="form-control" required="required">
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
        <div class="custom-control custom-checkbox custom-control-inline">
          <input name="rodo" id="rodo" v-model="rodo" type="checkbox" class="custom-control-input" required="required">
          <label for="rodo" class="custom-control-label">Zgadzam się na przetwarzanie danych</label>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Wyślij</button>
      </div>
    </div>
  </form>
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
const player1_has_partner = ref(false)

const player2_cezarid = ref('')
const player2_name = ref('')
const player2_surname = ref('')
const player2_club = ref('')
const player2_food = ref([])
const other_options = ref([])

const rodo = ref(false)

const formData = ref(null);

const getCezar1 = async () => {
  try {
    console.log('Trying to get data for player one');
    const player1_cezarData = await fetch(
      `https://rejestracja.gpwlkp2022.brydz.gniezno.pl/cezar/?pid=${player1_cezarid.value}`
    );
    formData.value = await player1_cezarData.json();

    player1_name.value = formData.value["IMIE"];
    player1_surname.value = formData.value["NAZWISKO"];
    player1_club.value = formData.value["KLUB"];

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

    player2_name.value = formData.value["IMIE"];
    player2_surname.value = formData.value["NAZWISKO"];
    player2_club.value = formData.value["KLUB"];

  } catch (err) {
    console.error(err);
  }
};


</script>
