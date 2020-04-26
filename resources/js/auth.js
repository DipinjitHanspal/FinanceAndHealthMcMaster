import basic from '@websanova/vue-auth/drivers/auth/basic'
import axios from '@websanova/vue-auth/drivers/http/axios.1.x'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'

const config = {
    auth : basic,
    http : axios,
    router : router,
    tokenDefaultName : 'laravel-jwt-auth',
    tokenStore : ['localStorage'],
    registerData : {
        url : 'auth/register',
        method : 'POST',
        redirect : {name : 'app'}
    },
    loginData : {
        url : 'auth/login',
        method : 'POST',
        redirect : {name : 'app'},
        fethUser : true
    },
    logoutData : {
        url : 'auth/logout',
        method : 'POST',
        redirect : {name : 'user.login'},
        makeRequest : true
    },
    fetchData : {
        url : 'auth/user',
        method : 'GET',
        enabled : true
    },
    refreshData : {
        url : 'auth/refresh',
        method : 'GET',
        enabled : true,
        interval : 30
    }
}

export default config