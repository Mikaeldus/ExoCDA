<template>
  <div class="container">
    <hr>
    <h2 class="center-align">Exemple Axios</h2>
    <hr>
    <div id="bit">
      <h1>Bitcoin Price</h1>
      <div
          v-for="currency in info"
          class="currency">
        {{ currency.description }}:
        <span class="lighten">
      <span v-html="currency.symbol"></span>{{ currency.rate_float | currencydecimal }}
    </span>

      </div>

    </div>
  </div>

</template>

<script>
export default {
  name: 'Axios',


  data() {
    return {
      info: null
    }
  },
  mounted() {
    const axios = require('axios');
    axios
        .get('https://api.coindesk.com/v1/bpi/currentprice.json')
        .then(response => (this.info = response.data.bpi))
  },
  filters: {
    currencydecimal(value) {
      return value.toFixed(2)
    }
  },
}

</script>