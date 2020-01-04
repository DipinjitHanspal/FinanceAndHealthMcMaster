import ExampleComponent from "./components/ExampleComponent.vue"
import Login from "./components/Auth/Login.vue"
import Register from "./components/Auth/Register.vue"
import App from "./components/App.vue"

const routes = () => {
    return [
        {
            path: "/",
            name: "landing",
            component: ExampleComponent
        },
        {
            path: "/app",
            name: "app",
            component: App
        },
        {
            path: "/login",
            name: "user.login",
            component: Login
        },
        {
            path: "/register",
            name: "user.register",
            component: Register
        }
    ]
}

export default routes()