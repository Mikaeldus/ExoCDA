<template>
  <div class="container">
    <hr>
    <h1>Nombre magique - Devinez une valeur entre 0 et 100</h1>
    <hr>
    <label for="nb">
      <input type="number" name="nb" id="nb" v-model.number="nb" @change="verification">
    </label>
    <h2 class="text-center"> {{ message }}</h2>
    <p>Nombre a trouver : {{ nbMagic }}</p>
    <hr>
  </div>
</template>

<script>

let nbMagic = parseInt(Math.random() * 100);
console.log(nbMagic);
export default {
  name: "Magic",
  data() {
    return {
      nb: 0,
      nbMagic,
      message: 'Veuillez entrez un nombre !',
    }
  },
  methods: {
    verification: function () {

      if (!nbMagic) {
        this.message = "Veuillez entré un nombre"
      }
      if (nbMagic < this.nb) {
        this.message = "Plus petit";
      }
      if (nbMagic > this.nb) {
        this.message = "Plus grand";
      }
      if (nbMagic === this.nb) {
        this.message = "Bravo !!";
      }

    },

  },
}
</script>
