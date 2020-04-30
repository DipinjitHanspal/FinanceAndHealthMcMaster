import Vue from "vue";
import Vuex from "vuex";
import VueCookies from 'vue-cookies';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: "Default User",
        loggedIn: false,
        grid: {}
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        },
        setGrid(state, data) {
            state.grid = data;
        },
        setLoggedIn(state, status) {
            state.loggedIn = status;
        },
        loadGridModel() {

        }
    },
    getters: {
        isLoggedIn(state) {
            return state.loggedIn;
        }
    },
    actions: {
        updateGridStore(context) {
            const jsonGrid = context.state.grid;
            $cookies.set("grid-data", jsonGrid);
        }
    }
});
