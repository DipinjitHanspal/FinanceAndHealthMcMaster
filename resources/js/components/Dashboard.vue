<template>
  <div class="row justify-content-center" style="width:100%">
      <div class="col-sm-4">
        <GreetingCard></GreetingCard>
        <ValueCard header="Average Calories" value="2200"></ValueCard>
        <NutrientsCard header="Macros"></NutrientsCard>
      </div>
    <div class="col-sm-6">
    <ValueCard header="Funds remaining" value="$4800"></ValueCard>
      <BurndownCard header="Burndown Chart"></BurndownCard>
    </div>
  </div>
</template>

<script>
import GreetingCard from "./cards/GreetingCard.vue"
import BurndownCard from "./cards/BurndownCard.vue";
import ValueCard from "./cards/ValueCard.vue";
import NutrientsCard from "./cards/NutrientsCard.vue"
export default {
  components: { BurndownCard, ValueCard , GreetingCard, NutrientsCard }
};
</script>
