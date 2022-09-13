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
        <input id="phone" name="phone" placeholder="+48xxxxxxxxx" type="text" class="form-control" required="required">
      </div>
    </div>

    <div class="form-group">
      <h2>Dane pierwszego gracza</h2>
      <div class="form-group">
        <label for="player1_cezarid">Cezar ID</label>
        <div class="input-group">
          <input id="player1_cezarid" name="player1_cezarid" placeholder="xxxxx" type="text"
            aria-describedby="player1_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">Pobierz dane</div>
          </div>
        </div>
        <span id="player1_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR.</span>
      </div>
      <div class="form-group">
        <label for="player1_name">Imię</label>
        <input id="player1_name" name="player1_name" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_surname">Nazwisko</label>
        <input id="player1_surname" name="player1_surname" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_club">Klub</label>
        <input id="player1_club" name="player1_club" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Obiad</label>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_0" type="checkbox" class="custom-control-input" value="no">
            <label for="player1_food_0" class="custom-control-label">Brak</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_1" type="checkbox" class="custom-control-input" value="day1">
            <label for="player1_food_1" class="custom-control-label">Dzień 1</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_2" type="checkbox" class="custom-control-input" value="day2">
            <label for="player1_food_2" class="custom-control-label">Dzień 2</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_3" type="checkbox" class="custom-control-input" value="vege">
            <label for="player1_food_3" class="custom-control-label">Wegetariański</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Szukam partnera</label>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_partner" id="player1_partner_0" type="checkbox" class="custom-control-input"
              value="yes" aria-describedby="player1_partnerHelpBlock">
            <label for="player1_partner_0" class="custom-control-label">Tak</label>
          </div>
          <span id="player1_partnerHelpBlock" class="form-text text-muted">Zaznacz to pole jeżeli szukasz
            partnera</span>
        </div>
      </div>
    </div>

    <div class="form-group">
      <h2>Dane drugiego gracza</h2>
      <div class="form-group">
        <label for="player1_cezarid">Cezar ID</label>
        <div class="input-group">
          <input id="player1_cezarid" name="player1_cezarid" placeholder="xxxxx" type="text"
            aria-describedby="player1_cezaridHelpBlock" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">Pobierz dane</div>
          </div>
        </div>
        <span id="player1_cezaridHelpBlock" class="form-text text-muted">Identyfikator gracza w bazie CEZAR.</span>
      </div>
      <div class="form-group">
        <label for="player1_name">Imię</label>
        <input id="player1_name" name="player1_name" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_surname">Nazwisko</label>
        <input id="player1_surname" name="player1_surname" type="text" class="form-control" required="required">
      </div>
      <div class="form-group">
        <label for="player1_club">Klub</label>
        <input id="player1_club" name="player1_club" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Obiad</label>
        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_0" type="checkbox" class="custom-control-input" value="no">
            <label for="player1_food_0" class="custom-control-label">Brak</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_1" type="checkbox" class="custom-control-input" value="day1">
            <label for="player1_food_1" class="custom-control-label">Dzień 1</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_2" type="checkbox" class="custom-control-input" value="day2">
            <label for="player1_food_2" class="custom-control-label">Dzień 2</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="player1_food" id="player1_food_3" type="checkbox" class="custom-control-input" value="vege">
            <label for="player1_food_3" class="custom-control-label">Wegetariański</label>
          </div>
        </div>
      </div>

    </div>


    <div class="form-group">
      <h2>Dodatkowe opcje</h2>

      <div class="form-group">

        <div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input name="other_options" id="other_options_0" type="checkbox" class="custom-control-input"
              value="parking">
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
      player1_food: {{ player1_food }}
      player1_looking_partner: {{ player1_looking_partner }}

      player2_cezarid: {{ player2_cezarid }}
      player2_name: {{ player2_name }}
      player2_surname: {{ player2_surname }}
      player2_food: {{ player2_food }}
    </pre>

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
      player1_looking_partner: false,

      player2_cezarid: '',
      player2_name: '',
      player2_surname: '',
      player2_club: '',
      player2_food: [],

      other_options: [],
    }
  }
}

const formData = ref(null);

const getCezar1 = async () => {
  try {
    const cezarData = await fetch(
      `https://register.brydz.gniezno.pl/cezar/?pid=${pid.value}`
    );
    formData.value = await cezarData.json();
    console.log(formData.value);
  } catch (err) {
    console.error(err);
  }
};
</script>
