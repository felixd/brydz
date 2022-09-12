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
    const { data } = await fetch(
      `https://register.brydz.gniezno.pl/cezar/?pid=${pid.value}`
    );
    formData.value = await data.json();
  } catch (err) {
    console.error(err);
  }
};
</script>
<style scoped>
.read-the-docs {
  color: #888;
}
</style>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
