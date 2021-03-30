<template>
  <div class="container">
    <hr>
    <h1>Additionneur</h1>
    <hr>
    <div class="col 12">
      <div class="row">
        <label for="nb2">
          <input class="text-center center-align" type="number" v-model.number="nb1" name="nb1" id="nb1" @change="add">
        </label>
        <div>
          <i>+</i>
        </div>
        <label for="nb2">
          <input class="text-center center-align" type="number" v-model.number="nb2" name="nb2" id="nb2" @change="add">
        </label>
        <div>
          <i>=</i>
        </div>
        <h2 class="center-align" type="number">{{ resultat }}</h2>

      </div>
    </div>
    <hr>
  </div>
</template>

<script>

export default {
  name: 'Addition',
  data() {
    return {
      nb1: 0,
      nb2: 0,
      resultat: 0,
    }

  },
  methods: {
    add: function () {
      this.resultat = this.nb1 + this.nb2;
    }
  }
}

</script>