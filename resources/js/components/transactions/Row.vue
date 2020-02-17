<template>
  <div id="transaction_row">
    <div id="ts">
      <span>{{ name }}</span>
      <span>H2</span>
    </div>
    <div id="container">
      <Card :cardType="n" :arr="data" />
    </div>
  </div>
</template>

<script>
import Card from "../Card.vue";
export default {
  props: {
    name: {
      type: String,
      default: ""
    },
    data: {
      type: Array,
      default: () => {
        return [];
      }
    }
  },
  components: {
    Card
  },
  data() {
    return {
      n: "breakdown"
    };
  }
};
</script>

<style lang="scss" scoped>
#transaction_row {
  background: white;
  display: flex;
  height: 14%;
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 1%;
  text-align: center;
  border-style: solid;
  border-width: medium;
  border-color: aquamarine;
  border-width: 2px 0px 2px 0px;
  border-radius: 3px;
} 
#container {
  width: 10%;
  margin-right: 20%;
  margin-left: auto;
}
#ts {
  width: 100%;
  height: 100%;
  display: table;
  table-layout: fixed;
}
span {
  height: 100%;
  margin: auto;
  display: table-cell;
  text-align: center;
}
</style>