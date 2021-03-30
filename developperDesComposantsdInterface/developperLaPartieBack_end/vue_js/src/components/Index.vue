<template>
  <div class="container">
    <div class="card">
  <div class="row">
    <div class="col s6 offset-s1">
      <hr>
      <h1>{{ msg }}</h1>
      <hr>
      <navbar></navbar>
    </div>
  </div>
    </div>
  </div>
</template>

<script>
import Navbar from "@/components/Navbar";


export default {
  name: 'Index',
  components: {
    Navbar
  },
  data () {
    return {
      msg: 'VueJS'
    }
  }
}
</script>