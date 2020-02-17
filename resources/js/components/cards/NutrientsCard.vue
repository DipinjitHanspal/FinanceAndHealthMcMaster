<template>
  <div class="card">
    <div class="card-header">{{ header }}</div>
    <div class="card-text"></div>
    <nutrient-pie :arr="arr"></nutrient-pie>
  </div>
</template>

<script>
import NutrientPie from "../graphs/NutrientPie.vue";
export default {
  props: {
    header: {
      type: String,
      default : ""
    },
    arr : {
      type: Array
    }
  },
  components: { NutrientPie }
};
</script>
