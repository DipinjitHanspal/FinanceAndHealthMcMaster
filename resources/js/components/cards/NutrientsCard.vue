<template>
  <div class="card">
    <div class="card-header">{{ header }}</div>
    <div class="card-text"></div>
    <nutrient-pie></nutrient-pie>
  </div>
</template>

<script>
import NutrientPie from "../graphs/NutrientPie.vue";
export default {
  props: {
    header: {
      type: String
    }
  },
  components: { NutrientPie }
};
</script>
