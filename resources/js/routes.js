import Dashboard from "./components/user/Dashboard.vue"
import Login from "./components/Auth/Login.vue"
import Register from "./components/Auth/Register.vue"
import App from "./components/App.vue"
import Welcome from './components/Welcome.vue'
import AdminDashboard from './components/admin/AdminDashboard.vue'
import Unauth from "./components/admin/Unauth.vue"

const routes = () => {
    return [
        {
            path: "/dashboard",
            name: "user.dashboard",
            component: Dashboard,
            meta : {
                auth : true
            }
        },
        {
            path : "/403",
            name : 'unauthorized',
            component : Unauth,
            meta : {
                auth : undefined
            }
        },
        {
          path : '/admin',
          name : 'user.admin',
          component : AdminDashboard,
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
        },
        {
            path : '/',
            name : 'landing',
            component : Welcome,
            meta : {
                auth: undefined
            }
        }
    ]
}

export default routes()
