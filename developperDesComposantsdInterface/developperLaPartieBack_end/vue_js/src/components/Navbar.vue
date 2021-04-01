<template>
  <nav class="navbar navbar-dark bg-dark">
    <span class="navbar icon ">
<!--      je parcour mon tableau pour recuperer les btn correspondant -->
          <li
          v-for="btns in btnsNavbar" :key="btns.id">
            <i class="btn btn-primary" @click="btns.actionBtn">{{ btns.icon }}</i>
          </li>
    </span>
  </nav>

</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      btnsNavbar: [
        {id: 1, icon: 'Cour', actionBtn: this.CourFunction},
        {id: 2, icon: 'Axios', actionBtn: this.AxiosFunction},
        {id: 3, icon: 'Addition', actionBtn: this.AdditionFunction},
        {id: 4, icon: 'Magic', actionBtn: this.MagicFunction},
        {id: 5, icon: 'Calculatrice', actionBtn: this.CalculatriceFunction}
      ]
    }
  },
  methods: {
    CourFunction: function () {
      this.$parent.$parent.appCour ^= true
    },
    AxiosFunction: function () {
      this.$parent.$parent.appAxios ^= true
    },
    AdditionFunction: function () {
      this.$parent.$parent.appAddition ^= true
    },
    MagicFunction: function () {
      this.$parent.$parent.appMagic ^= true
    },
    CalculatriceFunction: function () {
      this.$parent.$parent.appCalculatrice ^= true
    }
  }
}

</script>

<style>
nav {
  cursor: pointer;
}
</style>