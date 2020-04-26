<template>
    <div class="card text-center">
        <div class="card-header"> {{ header }} </div>
        <!-- This data will eventually be pulled from the user's account -->
        <div class="card-body">
            <div class="card-text">
                {{ value }}
            </div>
        </div>
      </div>
</template>

<script>
export default {
  props: {
    header: {
      type: String
    },
    value : {
        type: String
    }
  },
  components: {  }
};
</script>
