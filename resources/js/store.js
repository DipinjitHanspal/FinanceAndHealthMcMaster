import Vue from "vue";
import Vuex from "vuex";
import VueCookies from 'vue-cookies';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: "Default User",
        loggedIn: false,
        grid: {
            col1: [
                { id: 0, type: "greeting", header: "Greeting" },
                {
                    id: 1,
                    type: "value",
                    value: "2200",
                    header: "Average Calories"
                },
                { id: 2, type: "nutrient", header: "Macros" }
            ],
            col2: [
                {
                    id: 0,
                    type: "value",
                    header: "Funds Remaining",
                    value: "$2530"
                },
                { id: 1, type: "burndown", header: "Burndown" }
            ]
        }
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        },
        setGrid(state, grid) {
            state.grid = grid;
        },
        setIsLoggedIn(state, status) {
            state.loggedIn = status;
        }
    },
    getters: {
        isLoggedIn(state) {
            return state.loggedIn;
        }
    },
    actions: {
        updateGridStore(context) {
            let jsonGrid = JSON.parse(JSON.stringify(context.state.grid));
            $cookies.set("grid-data", jsonGrid);
        }
    }
});
