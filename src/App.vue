<template>
  <form id="app" @submit="checkForm" action="/" method="post">
    <div>
      <div>
        <label for="email">Adres email<span class="required">*</span></label>
        <input type="text" v-model="email" name="email" id="email" required="required" aria-required="true" />
      </div>
      <div>
        <label for="phone">Telefon komórkowy<span class="required">*</span></label>
        <input type="text" name="phone" v-model="phone" id="phone" required="required" aria-required="true" />
      </div>

      <!-- PLAYER 1 -->
      <div>
        <label for="player1_cezarid">Cezar ID</label>
        <button class="closebutton" @click="getCezar1">Pobierz dane z CEZARA</button>
        <input type="text" name="player1_cezarid" v-model="player1_cezarid" id="player1_cezarid" />
      </div>
      <div>
        <label for="player1_name">Imię</label>
        <input type="text" name="player1_name" v-model="player1_name" id="player1_name" />
      </div>
      <div>
        <label for="player1_surname">Nazwisko</label>
        <input type="text" name="player1_surname" id="player1_surname" v-model="player1_surname" />
      </div>
      <div>
        <label for="player1_club">Klub</label>
        <input type="text" name="player1_club" id="player1_club" v-model="player1_club" />
      </div>
      <div>
        <label for="player1_food">Obiad</label>
        <div>
          <div>
            <input name="player1_food[]" v-model="player1_food" id="player1_food-0" value="no-food" type="checkbox" />
            <label for="player1_food-0">Brak</label>
          </div>
          <div>
            <input name="player1_food[]" v-model="player1_food" id="player1_food-1" value="day1" type="checkbox" />
            <label for="player1_food-1">Dzień 1</label>
          </div>
          <div>
            <input name="player1_food[]" v-model="player1_food" id="player1_food-2" value="day2" type="checkbox" />
            <label for="player1_food-2">Dzień 2</label>
          </div>
          <div>
            <input name="player1_food[]" v-model="player1_food" id="player1_food-3" value="vege" type="checkbox" />
            <label for="player1_food-3">Wegetariański</label>
          </div>
        </div>
      </div>
      <div>
        <input name="player1_looking_partner" v-model="player1_looking_partner" id="player1_looking_partner"
          type="checkbox" />
        <label for="player1_looking_partner">Szukam partnera</label>
      </div>

      <!-- PLAYER 2 -->
      <div>
        <label for="player2_cezarid">Cezar ID</label>
        <input type="text" name="player2_cezarid" v-model="player2_cezarid" id="player2_cezarid" />
      </div>
      <div>
        <label for="player2_name">Imię</label>
        <input type="text" name="player2_name" v-model="player2_name" id="player2_name" />
      </div>
      <div>
        <label for="player2_surname">Nazwisko</label>
        <input type="text" name="player2_surname" id="player2_surname" v-model="player2_surname" />
      </div>
      <div>
        <label for="player2_club">Klub</label>
        <input type="text" name="player2_club" id="player2_club" v-model="player2_club" />
      </div>
      <div>
        <label for="player2_food">Obiad</label>
        <div>
          <div>
            <input name="player2_food[]" v-model="player2_food" id="player2_food-0" value="no-food" type="checkbox" />
            <label for="player2_food-0">Brak</label>
          </div>
          <div>
            <input name="player2_food[]" v-model="player2_food" id="player2_food-1" value="day1" type="checkbox" />
            <label for="player2_food-1">Dzień 1</label>
          </div>
          <div>
            <input name="player2_food[]" v-model="player2_food" id="player2_food-2" value="day2" type="checkbox" />
            <label for="player2_food-2">Dzień 2</label>
          </div>
          <div>
            <input name="player2_food[]" v-model="player2_food" id="player2_food-3" value="vege" type="checkbox" />
            <label for="player2_food-3">Wegetariański</label>
          </div>
        </div>
      </div>

      <!-- OTHER OPTIONS -->
      <div>
        <label for="other-options">Pozostałe opcje</label>
        <div>
          <div>
            <input name="other-options[]" id="other-options-0" value="parking" type="checkbox" />
            <label for="other-options-0">Parking</label>
          </div>
        </div>
      </div>
    </div>
    <p>
      <input type="submit" value="Wyślij zgłoszenie">
    </p>
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
