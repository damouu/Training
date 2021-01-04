<template>
  <div class="container">
    <label class="col">Pokemon data 🎉</label>
    <button @click="getPokemon" type="button" class="btn btn-outline-primary">Pokemon games generations</button>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">url</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(data, index) in pokemon" :key="index">
        <td>{{ index }}</td>
        <td :class="[pokemonEvenOrOdd]">{{ data.name }}</td>
        <td>{{ data.url }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>

export default {
  name: "RobotBuilder.vue",
  data() {
    return {
      pokemon: [],
    }
  },
  methods: {
    getPokemon() {
      this.axios.get('https://pokeapi.co/api/v2/generation/').then(response => (this.pokemon = response.data.results))
    }
  },
  computed: {
    pokemonEvenOrOdd() {
      return this.pokemon.length < 10 ? 'border border-5 border-danger' : 'border border-1 border-warning';
    }
  },
}
</script>