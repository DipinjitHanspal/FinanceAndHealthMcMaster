<template>
  <div class="card">
    <GreetingCard v-if="cardType === 'greeting'"></GreetingCard>
    <ValueCard v-if="cardType === 'value'" :value="value" :header="header"></ValueCard>
    <NutrientCard v-if="cardType === 'nutrient'" :arr="ars" :header="header" ></NutrientCard>
    <BurndownCard v-if="cardType === 'burndown'" :header="header"></BurndownCard>
    <LineBreakdownCard v-if="cardType === 'breakdown'" :arr="ars"/>
  </div>
</template>

<script>
import GreetingCard from "./cards/GreetingCard.vue";
import ValueCard from "./cards/ValueCard.vue";
import NutrientCard from "./cards/NutrientsCard.vue";
import BurndownCard from "./cards/BurndownCard.vue";
import LineBreakdownCard from "./cards/LineBreakdownCard.vue";
export default {
  data() {
    return {
      card: this.cardType,
      ars : this.arr,
    };
  },
  props: {
    cardType: {
      default: "greeting",
      type: String
    },
    value: {
      default: "0",
      type: String
    },
    arr : {
      default : function() {return []},
      type: Array
    },
    header: {
      default: "",
      type: String
    }
  },
  components: { GreetingCard, ValueCard, NutrientCard, BurndownCard, LineBreakdownCard},
  methods: {},
  mounted() {
    console.log(this.arr);
  }
};
</script>
