<template>
  <nav class="navbar navbar-dark bg-dark">
    <span class=" ">
      <li
          class="green lighten-2 col s3"
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
        {id: 2, icon: 'Axios', actionBtn: this.AxiosFunction}
      ]
    }
  },
  methods: {
    CourFunction: function () {
      // Toggle boolean
      this.$parent.$parent.appCour ^= true
      this.$parent.$parent.appAxios ^= false
    },
    AxiosFunction: function () {
      // Toggle boolean
      this.$parent.$parent.appAxios ^= true
      this.$parent.$parent.appCour ^= false
    },
  }
}

</script>

<style>
nav{
  cursor: pointer;
}
</style>