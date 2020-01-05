/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap");

import Vue from "vue";
import Vuex from "vuex";
import VueRouter from "vue-router";
import NavBar from "./components/NavBar.vue";
import routes from "./routes.js";
Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: "Dipin"
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        },
        getters: {
            isLoggedIn(state) {
                return state.user !== null;
            }
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
