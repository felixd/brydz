<template>
  <form id="app" action="/app/" method="post">
    <div class="form-group">
      <label for="email" class="required">Email</label>
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
          <input id="player1_cezarid" name="player1_cezarid" v-model="player1_cezarid" type="text"
            aria-describedby="player1_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text" @click="getCezar1">Pobierz dane</div>
          </div>
        </div>
        <div v-if="getCezar1_alert" class="alert alert-primary" role="alert">{{ getCezar1_alert }}</div>
        <span id="player1_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR.<br />Jeżeli
          gracz nie znajduje się w bazie, uzupełnij poniższe pola samodzielnie.</span>

      </div>
      <div class="form-group">
        <label for="player1_name" class="required">Imię</label>
        <input id="player1_name" name="player1_name" placeholder="Imię (pole wymagane)" v-model="player1_name"
          type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_surname" class="required">Nazwisko</label>
        <input id="player1_surname" name="player1_surname" placeholder="Nazwisko (pole wymagane)"
          v-model="player1_surname" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_club">Drużyna</label>
        <input id="player1_club" name="player1_club" v-model="player1_club" type="text" class="form-control">
      </div>

      <!-- POSIŁKI -->
      <div class="form-group">
        <h3>Posiłki</h3>
        <p class="text-info">W sobotę nie ma obiadu. W niedzielę dostępna jest tylko jedna restauracja (Estella) z dwiema opcjami - wegetariańskie posiłki oraz normalne</p>
        <div>
          <div class="form-group">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input name="player1_food_vege" id="player1_food_vege" v-model="player1_food_vege" type="checkbox"
                class="custom-control-input">
              <label for="player1_food_vege" value="0" class="custom-control-label">Posiłki wegetariańskie</label>
            </div>
          </div>

          <div v-if="false" class="form-group">
            <label for="player1_food_breakfast">Śniadania</label>
            <input name="player1_food_breakfast" id="player1_food_breakfast" v-model="player1_food_breakfast"
              type="text" class="form-control" placeholder="Podaj liczbę śniadań: 0,1,2,3 itd"
              aria-describedby="player1_food_breakfastHelpBlock">
          </div>
          <div class="form-group">
            <label for="player1_food_dinner">Obiady</label>
            <input name="player1_food_dinner" id="player1_food_dinner" v-model="player1_food_dinner" type="text"
              class="form-control" placeholder="Podaj liczbę obiadów: 0,1,2,3 itd"
              aria-describedby="player1_food_dinnerHelpBlock">
          </div>
          <div v-if="false" class="form-group">
            <label for="player1_food_supper">Kolacje</label>
            <input name="player1_food_supper" id="player1_food_supper" v-model="player1_food_supper" type="text"
              class="form-control" placeholder="Podaj liczbę kolacji: 0,1,2,3 itd"
              aria-describedby="player1_food_supperHelpBlock">
          </div>
        </div>
      </div>
      <div class="form-group">
        <h3 style="color: green">Mam partnera</h3>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_has_partner" id="player1_has_partner" v-model="player1_has_partner" type="checkbox"
              class="custom-control-input" value="0" aria-describedby="player1_has_partnerHelpBlock">
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
          <input id="player2_cezarid" name="player2_cezarid" v-model="player2_cezarid" type="text"
            aria-describedby="player2_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text" @click="getCezar2">Pobierz dane</div>
          </div>
        </div>
        <div v-if="getCezar2_alert" class="alert alert-primary" role="alert">{{ getCezar2_alert }}</div>
        <span id="player2_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR.<br />Jeżeli
          gracz nie znajduje się w bazie, uzupełnij poniższe pola samodzielnie.</span>
      </div>
      <div class="form-group">
        <label for="player2_name" class="required">Imię</label>
        <input id="player2_name" name="player2_name" placeholder="Imię (pole wymagane)" v-model="player2_name"
          type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player2_surname" class="required">Nazwisko</label>
        <input id="player2_surname" name="player2_surname" placeholder="Nazwisko (pole wymagane)"
          v-model="player2_surname" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player2_club">Drużyna</label>
        <input id="player2_club" name="player2_club" v-model="player2_club" type="text" class="form-control">
      </div>

      <!-- POSIŁKI -->
      <div class="form-group">
        <h3>Posiłki</h3>
        <div>
          <div class="form-group">
            <div class="custom-control custom-checkbox custom-control-inline">
              <input name="player2_food_vege" id="player2_food_vege" v-model="player2_food_vege" type="checkbox"
                class="custom-control-input" value="1">
              <label for="player2_food_vege" class="custom-control-label">Posiłki wegetariańskie</label>
            </div>
          </div>

          <div v-if="false" class="form-group">
            <label for="player2_food_breakfast">Śniadania</label>
            <input name="player2_food_breakfast" id="player2_food_breakfast" v-model="player2_food_breakfast"
              type="text" class="form-control" placeholder="Podaj liczbę śniadań: 0,1,2,3 itd"
              aria-describedby="player2_food_breakfastHelpBlock">
          </div>
          <div class="form-group">
            <label for="player2_food_dinner">Obiady</label>
            <input name="player2_food_dinner" id="player2_food_dinner" v-model="player2_food_dinner" type="text"
              class="form-control" placeholder="Podaj liczbę obiadów: 0,1,2,3 itd"
              aria-describedby="player2_food_dinnerHelpBlock">
          </div>
          <div v-if="false" class="form-group">
            <label for="player2_food_supper">Kolacje</label>
            <input name="player2_food_supper" id="player2_food_supper" v-model="player2_food_supper" type="text"
              class="form-control" placeholder="Podaj liczbę kolacji: 0,1,2,3 itd"
              aria-describedby="player2_food_supperHelpBlock">
          </div>
        </div>
      </div>

    </div>

    <div class="form-group">
      <h2>Pozostałe opcje</h2>

      <div class="form-group">
        <label>Restauracja</label>
        <div>
          <select id="restaurant" v-model="restaurant" name="restaurant" class="custom-select">
            <option value="restaurant0" selected>Dowolna</option>
            <option value="restaurant1">Restauracja 1: Estella</option>
            <option v-if="false"  value="restaurant2">Restauracja 2: Gotham Pizza</option>
          </select>
        </div>
      </div>

      <div v-if="false" class="form-group">
        <label>Wybierz hotel</label>
        <div>
          <select id="hotel" v-model="hotel" name="hotel" class="custom-select">
            <option value="" selected>Bez noclegu</option>
            <option value="hotel1">Hotel 1</option>
            <option value="hotel2">Hotel 2</option>
          </select>
        </div>
      </div>

      <div class="form-group" v-if="hotel">
        <label for="hotel_room_type">Rodzaj pokoi</label>                               
        <div>
          <select id="hotel_room_type" v-model="hotel_room_type" name="hotel_room_type" class="custom-select">
            <option value="single">Pojedyncze</option>
            <option value="multi">Wieloosobowe</option>
          </select>
        </div>
      </div>
      
    </div>
    <div class="form-group">
      <label for="parking">Liczba miejsc parkingowych</label>
      <input name="parking" id="parking" v-model="parking" type="text" class="form-control"
        placeholder="Podaj potrzebną eliczbę miejsc parkingowych: 0,1,2,3 itd" aria-describedby="parkingHelpBlock">
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="information">Uwagi</label>
        <textarea name="information" id="information" v-model="information" type="textarea" class="form-control"
          placeholder="Uwagi" rows="3" />
      </div>
    </div>



    <div class="row">
      <p>Przed wysłaniem formularza upewnij się, że wszystkie dane zostały podane prawidłowo.</p>
    </div>

    <div class="form-group">
      <div class="custom-control custom-checkbox custom-control-inline">
        <input name="rodo" id="rodo" v-model="rodo" type="checkbox" class="custom-control-input" required="required">
        <label for="rodo" class="custom-control-label required">Zgadzam się na przetwarzanie danych</label>
      </div>
      <button name="submit" type="submit" class="btn btn-primary">Wyślij</button>
    </div>

  </form>
</template>

<script setup>
import { ref } from 'vue';

const email = ref('')
const phone = ref('')

const player1_cezarid = ref()
const player1_name = ref()
const player1_surname = ref()
const player1_club = ref()
const player1_food_breakfast = ref()
const player1_food_dinner = ref()
const player1_food_supper = ref()
const player1_food_vege = ref()

const player1_has_partner = ref()

const player2_cezarid = ref()
const player2_name = ref()
const player2_surname = ref()
const player2_club = ref()
const player2_food_breakfast = ref()
const player2_food_dinner = ref()
const player2_food_supper = ref()
const player2_food_vege = ref()

const parking = ref()
const hotel = ref()
const hotel_room_type = ref()
const restaurant = ref()
const information = ref()
const rodo = ref()

const formData = ref(null);

const getCezar1_alert = ref();
const getCezar1 = async () => {
  try {
    console.log('Trying to get data for player one');
    const player1_cezarData = await fetch(
      `/app/?pid=${player1_cezarid.value}`
    );

    formData.value = await player1_cezarData.json();

    if (formData.value == null) {
      getCezar1_alert.value = 'Nie znaleziono gracza';
    } else {
      getCezar1_alert.value = '';
      player1_name.value = formData.value["IMIE"];
      player1_surname.value = formData.value["NAZWISKO"];
      player1_club.value = formData.value["KLUB"];
    }


  } catch (err) {
    console.error(err);
  }
};

const getCezar2_alert = ref('');
const getCezar2 = async () => {
  try {
    console.log('Trying to get data for player two');
    const player2_cezarData = await fetch(
      `/app/?pid=${player2_cezarid.value}`
    );
    formData.value = await player2_cezarData.json();

    if (formData.value == null) {
      getCezar2_alert.value = 'Nie znaleziono gracza';
    } else {
      getCezar2_alert.value = '';
      player2_name.value = formData.value["IMIE"];
      player2_surname.value = formData.value["NAZWISKO"];
      player2_club.value = formData.value["KLUB"];
    }

  } catch (err) {
    console.error(err);
  }
};


</script>
