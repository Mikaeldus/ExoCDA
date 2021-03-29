<template>
  <div id="app">
  <Index/>
    <Cour v-if="appCour"/>
    <Axios v-if="appAxios"/>
    <hr>
    <h1 class="text-center">Exercices</h1>
    <hr>
  </div>
</template>

<script>



import Index from "@/components/Index";
import Cour from "@/components/Cour";
import Axios from "@/components/Axios";
export default {
  name: 'App',
  components: {
    Axios,
    Cour,
    Index,
  },
  data () {
    return {
      appCour: false,
      appAxios: false
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
