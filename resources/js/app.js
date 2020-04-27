/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import "./bootstrap";

// Basics 
import Vue from "vue";
import Vuex from 'vuex';
import routes from "./routes.js";
import axios from "axios";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
import VueAuth from "@websanova/vue-auth";

// Call config js files 
import auth from "./auth";
import { store } from './store';

// NavBar is a persistent component across all vues so its rendered at the root 
import NavBar from "./components/NavBar.vue";
import App from './components/App.vue'

// Add plugins to Vue
Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.use(Vuex);

// Modify the base url to point websanova auth object to the correct endpoints
axios.defaults.baseURL = "/api/";

// Router must be established before VueAuth 
const router = new VueRouter({
    mode: "history",
    routes
});
Vue.router = router;

Vue.use(VueAuth, auth);

const app = new Vue({
    el: "#app", // mount the base component
    components: { },
    router,
    store,
    render: h => h(App)
});
