<template>
    <div id="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form id="register_user">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label
                                        for="name"
                                        class="col-md-4 col-form-label text-md-right"
                                    >
                                        Name</label
                                    >
                                    <input
                                        id="name"
                                        type="name"
                                        name="name"
                                        v-model="name"
                                        required
                                        autocomplete="name"
                                        autofocus
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right"
                                    >E-Mail Address
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        v-model="email"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    />
                                    <span
                                        class="invalid-feedback"
                                        role="alert"
                                        v-if="error_email"
                                    >
                                        <strong>{{ email_message }}</strong>
                                    </span>
                                </div>
                                <div v-if="email">
                                    <label
                                        for="email-confirm"
                                        class="col-md-4 col-form-label text-md-right"
                                    >
                                        Confirm Email
                                    </label>
                                    <div class="col-md-6">
                                        <input
                                            id="confirm-email"
                                            type="email"
                                            name="confirm-email"
                                            v-model="confirm_email"
                                            required
                                            autocomplete="email"
                                        />
                                    </div>
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
                                        name="password"
                                        v-model="password"
                                        required
                                        autocomplete="current-password"
                                    />
                                    <span
                                        class="invalid-feedback"
                                        role="alert"
                                        v-if="error_password"
                                    >
                                        <strong>{{ password_message }}</strong>
                                    </span>
                                </div>
                                <div v-if="password">
                                    <label
                                        for="confirm-password"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Confirm Password</label
                                    >
                                    <div class="col-md-6">
                                        <input
                                            id="confirm-password"
                                            type="password"
                                            name="confirm_password"
                                            v-model="confirm_password"
                                            required
                                            autocomplete="current-password"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        class="btn btn-primary"
                                        @click.prevent="registerButton"
                                    >
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
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
            name: "",
            email: "",
            confirm_email: "",
            confirm_password: "",
            password: "",
            remember: false,
            error_email: false,
            error_password: false,
            email_message: "Emails do not match!",
            password_message: "Passwords do not match!",
            errors: {},
            success: false,
            loaded: true
        };
    },
    methods: {
        registerButton() {
            console.log(this.name);
            console.log(this.email);
            console.log(this.confirm_email);
            console.log(this.password);
            console.log(this.confirm_password);
            const app = this;
            console.log(app.name);
            console.log(app.email);
            console.log(app.password);
            console.log(app.confirm_password);
            if (this.email != this.confirm_email) {
                self.error_email = true;
            }
            if (this.password != this.confirm_password) {
                self.error_password = true;
            }
            if (
                this.password == this.confirm_password &&
                this.email == this.confirm_email
            ) {
                console.log("good to go");
                this.error_email = this.error_password = false;
                this.$auth.register({
                    data: {
                        name : app.name,
                        email: app.email,
                        password: app.password,
                        password_confirmation: app.confirm_password
                    },
                    autoLogin: true,
                    fetchUser: true,
                    success : () => {

                    }, 
                    failure : (dst) => {
                        console.log(dst);
                    }
                });
            }
        }
    }
};
</script>
