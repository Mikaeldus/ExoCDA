<template>
  <nav class="navbar navbar-dark bg-dark">
    <span class="navbar icon ">
      <li
          v-for="btnN in btnsNavbar"
          v-bind:key="btnN.id">
            <i class="btn btn-primary" v-on:click="btnN.actionBtn">{{btnN.icon}}</i>
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
        {id: 4, icon: 'Magic', actionBtn: this.MagicFunction}
      ]
    }
  },
  methods: {
    CourFunction: function () {
      this.$parent.$parent.appCour ^= true
      this.$parent.$parent.appAxios ^= false
      this.$parent.$parent.appAddition ^= false
      this.$parent.$parent.appMagic ^= false
    },
    AxiosFunction: function () {
      this.$parent.$parent.appAxios ^= true
      this.$parent.$parent.appCour ^= false
      this.$parent.$parent.appAddition ^= false
      this.$parent.$parent.appMagic ^= false
    },
    AdditionFunction: function () {
      this.$parent.$parent.appAddition ^= true
      this.$parent.$parent.appAxios ^= false
      this.$parent.$parent.appCour ^= false
      this.$parent.$parent.appMagic ^= false
    },
    MagicFunction: function () {
      this.$parent.$parent.appMagic ^= true
      this.$parent.$parent.appAddition ^= false
      this.$parent.$parent.appAxios ^= false
      this.$parent.$parent.appCour ^= false
    }
  }
}

</script>

<style>
nav{
  cursor: pointer;
}
</style>