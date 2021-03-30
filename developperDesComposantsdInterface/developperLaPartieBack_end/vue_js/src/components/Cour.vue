<template>
  <div class="container">
    <hr>
    <h2 class="center-align">Exemple</h2>
    <hr>
      <h1 v-show="affichage">{{ message }}</h1>
      <h1 v-show="!affichage">ce n'est pas bon !</h1>
      <hr>
      <input type="text" v-model="message">

      <!--    Si on clik alors le labbel sera visible a la place du msg-->
      <button v-on:click="btn1_click">Test</button>
      <hr>
      <div id="label1" v-show="label_visible"></div>
    </div>



</template>

<script>
export default {
  name: 'Cour',

  data() {
    return {
      message: 'Exemple 1-2',
      // Si affichage egale true alors il affiche Message sinon il affiche ce n'est pas bon, pour tester juste changer la valeur de affichage.
      affichage: true, // ou false
      label_visible: false,

    }
  },
  // on increment une methode pour le clik
  methods: {
    btn1_click: function () {
      this.message = "Le label est visible";
      this.label_visible = true;
    }
  },
}


</script>