<template>
      <div class="card">
        <div class="card-header"> {{ header }} </div>
        <div class="card-body">
          <burndown></burndown>
        </div>
      </div>
</template>

<script>
import Burndown from "../graphs/Burndown.vue";
export default {
  props: {
    header: {
      type: String
    }
  },
  components: { Burndown }
};
</script>
