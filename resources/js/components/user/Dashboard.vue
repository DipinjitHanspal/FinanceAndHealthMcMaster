<template>
    <div class="container">
        <div
            class="row justify-content-center"
            style="width:100%"
            v-if="dataReady"
        >
            <draggable
                v-model="grid.col1"
                class="col-sm-5"
                group="a"
                @end="updateGridStore"
            >
                <Card
                    v-for="item in grid.col1"
                    :key="item.header + item.type"
                    :cardType="item.type"
                    :value="item.value"
                    :header="item.header"
                ></Card>
            </draggable>
            <draggable
                :list="grid.col2"
                class="col-sm-5"
                group="a"
                @end="updateGridStore"
            >
                <Card
                    v-for="item in grid.col2"
                    :key="item.header + item.type"
                    :cardType="item.type"
                    :value="item.value"
                    :header="item.header"
                ></Card>
            </draggable>
        </div>
        <div class="loading" v-else>
            <div class="card">
                <div class="header">Loading...</div>
            </div>
        </div>
    </div>
</template>
<script>
import draggable from "vuedraggable";
import Card from "../cards/Card.vue";
let id = 1;
export default {
    order: 14,
    components: {
        draggable,
        Card
    },
    data() {
        return {
            dataReady: false
        };
    },
    beforeCreate() {},
    created() {
        if (this.$auth.user()['role'] === 'admin') {
            this.$router.push({ name : 'user.admin'});
        } else {
            this.loadGrid();
        }
    },
    beforeMount() {},
    mounted() {},
    componentWillUnmount() {
        gridConfig = this.$store.state.grid;
    },
    computed: {
        grid: {
            get() {
                return this.$store.state.grid;
            },
            set(value) {
                this.$store.commit("setGrid", {
                    value
                });
            }
        }
    },
    methods: {
        updateGridStore() {
            this.$store.dispatch("updateGridStore");
        },
        async loadGrid() {
            const app = this;
            const x = await axios.get("dashboard/load-dash").then(res => {
                const data = JSON.parse(res["data"]);
                app.$store.commit("setGrid", data);
                app.dataReady = true;
                console.log(app.$store.state.grid);
            });
        }
    }
};
</script>
