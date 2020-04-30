<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                {{ app_name }}
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" v-if="!$auth.check()">
                        <router-link
                            class="nav-link"
                            tag="a"
                            :to="{ name: 'user.login' }"
                            >Login</router-link
                        >
                    </li>

                    <li class="nav-item dropdown" v-if="$auth.check()">
                        <a
                            id="navbarDropdown"
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span class="caret"> {{ $auth.user()['name'] }} </span>
                        </a>

                        <div
                            class="dropdown-menu dropdown-menu-right"
                            aria-labelledby="navbarDropdown"
                        >
                            <a class="dropdown-item" @click="logout">
                                Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item" v-if="!$auth.check()">
                        <router-link
                            class="nav-link"
                            tag="a"
                            :to="{ name: 'user.register' }"
                            >Register</router-link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: ["status", "name", "app"],
    data() {
        return {};
    },
    methods: {
        logout() {
            const gridConfig = JSON.stringify(this.$store.state.grid);
            console.log(gridConfig);
            axios.post('dashboard/set-dash', {
            config : gridConfig
            });
            this.$auth.logout();
        }
    },
    mounted() {},
    computed: {
        app_name() {
            if (!this.app) {
                return "Finance Tracker";
            }
        },
        user() {
            return this.$store.state.user;
        },
        loggedIn: {
            get() {
                return this.$store.state.loggedIn;
            },
            set(value) {
                this.$store.commit("setLoggedIn", value);
            }
        }
    }
};
</script>
