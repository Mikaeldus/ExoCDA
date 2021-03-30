<template>
  <div id="app">
  <Index/>
    <Cour v-if="appCour"/>
    <Axios v-if="appAxios"/>
    <Addition v-if="appAddition"/>
    <Magic v-if="appMagic"/>



  </div>
</template>

<script>


import Magic from "@/components/Magic";
import Index from "@/components/Index";
import Cour from "@/components/Cour";
import Axios from "@/components/Axios";
import Addition from "@/components/Addition";
export default {
  name: 'App',
  components: {
    Addition,
    Axios,
    Cour,
    Index,
    Magic,
  },
  data () {
    return {
      appCour: false,
      appAxios: false,
      appAddition: false,
      appMagic: false,
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
