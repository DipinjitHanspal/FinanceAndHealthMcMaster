/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap");
import Vue from "vue";
import Vuex from "vuex";
import VueCookies from "vue-cookies";
import VueRouter from "vue-router";
import NavBar from "./components/NavBar.vue";
import routes from "./routes.js";
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueCookies);

const store = new Vuex.Store({
    state: {
        user: "Default User",
        grid: {
            col1: [
              { id: 0, type: "greeting", header: "Greeting" },
              { id: 1, type: "value", value: "2200", header: "Average Calories" },
              { id: 2, type: "nutrient", arr: [25, 55, 73],  header: "Macros" }
            ],
            col2: [
              { id: 0, type: "value", header: "Funds Remaining", value: "$2530" },
              { id: 1, type: "burndown", header: "Burndown" }
            ]
          }
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        },
        setGrid (state, grid) {
            state.grid = grid
        }
    },
    getters: {
        isLoggedIn(state) {
            return state.user !== null;
        },
    },
    actions : {
        updateGridStore(context) {
            let jsonGrid = JSON.parse(JSON.stringify(context.state.grid));
            $cookies.set("grid-data", jsonGrid);
        }
    }
});

const router = new VueRouter({
    mode: "history",
    routes
});

const app = new Vue({
    el: "#app", // mount the base component
    components: { NavBar },
    router,
    store
});
