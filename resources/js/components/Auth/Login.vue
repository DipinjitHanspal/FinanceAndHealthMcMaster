<template>
    <div id="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <div id="login_user">
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrf_token"
                            />
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right"
                                    >E-Mail Address</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        v-bind:class="getClass('email')"
                                        name="email"
                                        v-model="email"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    />
                                    <!-- <span class="invalid-feedback" role="alert" v-if="error_email != ''">
                                    <strong>{{ error_message }}</strong>
                                </span> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Password</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        v-bind:class="getClass('password')"
                                        name="password"
                                        v-model="password"
                                        required
                                        autocomplete="current-password"
                                    />
                                    <!-- <span class="invalid-feedback" role="alert" v-if="error_password != ''">
                                    <strong>{{ error_message }}</strong>
                                </span> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                            v-model="remember"
                                        />

                                        <label
                                            class="form-check-label"
                                            for="remember"
                                        >
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        class="btn btn-primary"
                                        @click="loginButton"
                                    >
                                        Login
                                    </button>

                                    <!-- @if (Route::has('password.request')) -->
                                    <router-link
                                        class="btn btn-link"
                                        :to="{ name: 'landing' }"
                                    >
                                        Forgot your password?
                                    </router-link>
                                    <!-- @endif -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            remember: false,
            errors: {},
            success: false,
            loaded: true
        };
    },
    mounted() {
        console.log("Component mounted");
    },
    computed: {
        csrf_token() {
            let token = document.head.querySelector('meta[name="csrf-token"]');
            return token.content;
        }
    },
    methods: {
        loginButton() {
            const app = this;
            console.log(app.email);
            console.log(app.password);
            this.$auth.login({
                data : {
                    email : 'test2@gmail.com',
                    password : 'test1234'
                },
                redirect : {name : 'app'}, 
                fetchUser : true,
                success (msg) {
                    console.log(msg);
                },
                error : function (err) {
                    console.log(err);
                }
            });
        },
        getClass(property) {
            if (property == "email") {
                return this.error_email
                    ? "form-control is-invalid"
                    : "form-control";
            }
            if (property == "password") {
                return this.error_password
                    ? "form-control is-invalid"
                    : "form-control";
            }
        },
        checkForm: function(e) {
            //     this.errors = [];
            //     if (!this.email) {
            //         this.errors.push("Email required.");
            //     }
            //     if (!this.password) {
            //         this.errors.push("Password required.");
            //     } else {
            //         var formContents = jQuery("#auth_user").serialize();
            //         console.log("Auth requested");
            //         axios.post("/auth", formContents).then(
            //             (response, status, request) => {
            //                 if (response.data == null) {
            //                     alert(response.data.user);
            //                 } else {
            //                     this.$store.commit(
            //                         "setAuthUser",
            //                         response.data.user
            //                     );
            //                     return true;
            //                 }
            //             },
            //             function() {
            //                 console.log("failed");
            //             }
            //         );
            //     }
        }
    }
};
</script>
