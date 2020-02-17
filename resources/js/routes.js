import ExampleComponent from "./components/ExampleComponent.vue"
import Dashboard from "./components/Dashboard.vue"
// import Login from "./components/Auth/Login.vue"
// import Register from "./components/Auth/Register.vue"
import App from "./components/App.vue"
import TransactionsLogs from "./components/TransactionsLogs.vue"

const routes = () => {
    return [
        {
            path: "/",
            name: "landing",
            component: Dashboard
        },
        {
            path: "/app",
            name: "app",
            component: App
        },
        { 
            path : "/logs",
            name: "logs",
            component : TransactionsLogs
        }
        // {
        //     path: "/login",
        //     name: "user.login",
        //     component: Login
        // },
        // {
        //     path: "/register",
        //     name: "user.register",
        //     component: Register
        // }
    ]
}

export default routes()
