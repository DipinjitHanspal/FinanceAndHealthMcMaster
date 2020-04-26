/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap'
import Vue from "vue"; 
import Vuex from 'vuex'
import NavBar from "./components/NavBar.vue"
import routes from "./routes.js"
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import VueAuth from '@websanova/vue-auth';
import auth from './auth'

Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.use(Vuex);

axios.defaults.baseURL = '/api/';
const store = new Vuex.Store({
    state: {
        user : null
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        }
    },
    getters : {
        isLoggedIn(state) {
            return state.user !== null;
        }
    }
});

const router = new VueRouter({
    mode: "history",
    routes, 
});
Vue.router = router; 
Vue.use(VueAuth, auth);

const app = new Vue({
    el: '#app', // mount the base component
    components: { NavBar },
    router,
    store
})
