<template>
  <div class="row justify-content-center" style="width:100%" v-if="dataReady">
    <draggable v-model="grid.col1" class="col-sm-5" group="a" @end="updateGridStore">
      <Card
        v-for="item in grid.col1"
        :key="item.header+item.type"
        :cardType="item.type"
        :value="item.value"
        :header="item.header"
      ></Card>
    </draggable>
    <draggable :list="grid.col2" class="col-sm-5" group="a" @end="updateGridStore">
      <Card
        v-for="item in grid.col2"
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
import Card from '../cards/Card.vue'
let id = 1;
export default {
  order: 14,
  components: {
    draggable,
    Card
  },
  data() {
    return {
      dataReady : false,
    };
  },
  beforeCreate() {   
  },
  created() {
    console.log('dashboard created');
  },
  beforeMount() {
    this.loadGrid();
    console.log(this.$store.state.grid);
  },
  mounted() {
    console.log('dashboard mounted');
    console.log(this.$store.state.grid);
  },
  componentWillUnmount() { 
    gridConfig = this.$store.state.grid
    console.log(gridConfig);
    // this.$axios.post('user/set-dash', {
    //   params : {
    //     config : gridConfig
    //   }
    // });
},
  computed : {
      grid : {
          get() {
            return this.$store.state.grid
          },
          set(value) {
              this.$store.commit('setGrid', {
                  value
              })
          }
      },
  },
  methods: {
      updateGridStore() {
          this.$store.dispatch('updateGridStore');
      },
      async loadGrid() {
        const app = this
        const x = await axios.get('dashboard/load-dash').then((res) => {
          console.log(JSON.parse(JSON.stringify(res['data'])));
          app.$store.commit('setGrid', res['data']);
          app.dataReady = true;
        });
      }
  }
};
</script>
