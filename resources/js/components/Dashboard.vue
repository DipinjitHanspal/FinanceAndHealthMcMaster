<template>
  <div class="row justify-content-center" style="width:100%">
    <draggable :list="col1" class="col-sm-5" group="a">
      <Card
        v-for="item in col1"
        :key="item.header+item.type"
        :cardType="item.type"
        :value="item.value"
        :header="item.header"
      ></Card>
    </draggable>
    <draggable :list="col2" class="col-sm-5" group="a">
      <Card
        v-for="item in col2"
        :key="item.header+item.type"
        :cardType="item.type"
        :value="item.value"
        :header="item.header"
      ></Card>
    </draggable>
  </div>
</template>
<script>
import draggable from "vuedraggable";
import Card from "./Card.vue";
let id = 1;
export default {
  order: 14,
  components: {
    draggable,
    Card
  },
  data() {
    return {
      col1: [
        { id: 0, type: "greeting", header: "Greeting"},
        { id: 1, type: "value", value: "2200", header: "Average Calories" },
        { id: 2, type: "nutrient", header: "Macros" }
      ],
      col2: [
        { id: 0, type: "value", header: "Funds Remaining", value: "$2530" },
        { id: 1, type: "burndown", header: "Burndown" }
      ]
    };
  }
};
</script>
