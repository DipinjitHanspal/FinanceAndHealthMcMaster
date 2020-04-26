<template>
  <div class="card">
    <GreetingCard v-if="cardType === 'greeting'"></GreetingCard>
    <ValueCard v-if="cardType === 'value'" :value="value" :header="header"></ValueCard>
    <NutrientCard v-if="cardType === 'nutrient'" :value="value" :header="header"></NutrientCard>
    <BurndownCard v-if="cardType === 'burndown'" :header="header"></BurndownCard>
  </div>
</template>

<script>
import GreetingCard from "./cards/GreetingCard.vue";
import ValueCard from "./cards/ValueCard.vue";
import NutrientCard from "./cards/NutrientsCard.vue";
import BurndownCard from "./cards/BurndownCard.vue";
export default {
  data() {
    return {
      card: this.cardType
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
    header: {
      default: "",
      type: String
    }
  },
  components: { GreetingCard, ValueCard, NutrientCard, BurndownCard},
  methods: {}
};
</script>
