<template>
  <form @submit.prevent="getData">
    <input v-model="pid" />
    <input type="submit" value="Get Data" />
  </form>
  <pre>{{ formData }}</pre>
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
    formData.value = await data.[0].json();
    console.log(formData.value);
  } catch (err) {
    console.error(err);
  }
};
</script>
