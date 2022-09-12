<template>
  <form @submit.prevent="getData">
    <input v-model="pid" />
    <input type="submit" value="Get Data" />
  </form>
  <pre>{{ formData }}</pre>
</template>

<script type="module">
import { ref } from 'vue';
const pid = ref('');
const formData = ref(null);

const getData = async () => {
  try {
    const { data } = await fetch(
      `https://sur10.dyn.konopnickiej.com/5510/?pid=${pid.value}`
    );
    formData.value = data.json();
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
