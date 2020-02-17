<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link class="navbar-brand" tag="a" :to="{name: 'landing'}">
                    {{ app_name }}
                </router-link>
                <!-- <a class="navbar-brand" href="/">
                    {{ app_name }}
                </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <router-link class="nav-link" tag="a" :to="{name : 'logs'}">Transactions Log</router-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <router-link class="nav-link"  tag="a" :to="{name : 'landing'}">Login</router-link>
                        </li>

                        <li class="nav-item dropdown" v-if="loggedIn">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"> {{ user }} </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item" v-else>
                            <router-link class="nav-link" tag="a" :to="{name : 'user.register'}">Register</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
    export default {
        props: ['status', 'name', 'app'],
        data() {
            return {
                // user: this.$store.state.user
            }
        },
        mounted() {
        },
        computed: {
            app_name() {
                if (!this.app) {
                    return 'Finance Tracker'
                }
            },
            loggedIn() {
                return this.$store.getters.isLoggedIn
            },
            user() {
                return this.$store.state.user
            }
        }
    }
</script>
