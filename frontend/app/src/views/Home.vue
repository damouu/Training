<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    {{ this.$store.commit("email", 'sortirLesKetes@gmail.com') }}
    <p class="text-danger col-7 offset-6">{{ this.$store.state.email }}</p>
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    HelloWorld
  }
}
</script>
