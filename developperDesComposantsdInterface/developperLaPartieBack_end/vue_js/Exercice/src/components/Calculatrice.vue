<template>
  <div class="container">
    <div class="calculator">
      <div class="display">{{ operator }} {{ display }}</div>
      <div @click="clear" class="btn operator2 c">C</div>
      <div class="btn" v-bind:key="number" v-for="number in numbers" @click="addNum(number)">{{number}}</div>
      <div class="btn operator2" v-bind:key="op" v-for="op in ops" @click="calc(op)">{{op}}</div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Calculatrice",
  data () {
    return {
      numbers: [1, 2, 3, 4, 5, 6, 7, 8, 9],
      ops: ['-', '+', '='],
      operator: '',
      display: 0,
      result: 0,
    }
  },

  methods: {
    addNum: function (number) {
      this.display = number;


      switch (this.operator) {
        case '+':
          this.result += number;
          break;
        case '-':
          this.result -= number;
          break;
        case '=':
          this.display = this.result;
          break;

        default:
          this.result = number;
          break;
      }
    },

    calc: function (opp) {
      this.operator = opp;
      this.display = opp === '=' ? this.result : this.display;
    },

    clear: function () {
      this.result = 0;
      this.display = 0;
      this.operator = '';
    }
  }
}
</script>

<style scoped>
* { font-size: 25px }

.calculator {
  margin: 0 auto;
  width: 250px;
  height: 450px;
  text-align: center;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-auto-rows: minmax(30px, auto);
  box-shadow: 5px 10px 8px #888888;
}

.display {
  padding: 2px;
  grid-column:  1 / 4;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  background-color: #333;
  color: #fff;
}

.c {
  grid-column:  1 / 4;
}

.btn {
  background-color: #f2f2f2;
  border: 1px solid #333;
  display: flex;
  justify-content: center;
  align-items: center;
}
.btn:hover { background-color: rgb(33.8%, 86.6%, 50.5%); cursor: pointer; }
.operator2 { background-color: rgb(32.1%, 50.5%, 81.6%) }
.operator2:hover { background-color: rgb(21.9%, 37.6%, 64%); cursor: pointer; }

</style>
