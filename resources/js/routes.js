import ExampleComponent from "./components/ExampleComponent.vue"
import Dashboard from "./components/Dashboard.vue"
// import Login from "./components/Auth/Login.vue"
// import Register from "./components/Auth/Register.vue"
import App from "./components/App.vue"

const routes = () => {
    return [
        {
            path: "/",
            name: "landing",
            component: Dashboard,
            meta : {
                auth : true
            }
        },
        {
            path: "/app",
            name: "app",
            component: App,
            meta : {
                auth : undefined
            }
        },
        {
            path: "/login",
            name: "user.login",
            component: Login,
            meta : {
                auth : false
            }
        },
        {
            path: "/register",
            name: "user.register",
            component: Register,
            meta : {
                auth : undefined
            }
        }
    ]
}

export default routes()
