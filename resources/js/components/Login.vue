<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card login-box">
                    <div
                        class="card-header"
                        style="font-size: 1.5rem; color: rgb(0, 0, 127)"
                    >
                        Login
                    </div>
                    <div class="card-body">
                        <form
                            id="form-login"
                            method="POST"
                            action=""
                            @submit.prevent="login($event)"
                        >
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrf_token"
                            />

                            <div class="input-group mb-3">
                                <input
                                    id="email"
                                    type="text"
                                    class="form-control input-email"
                                    name="email"
                                    required
                                    autocomplete="email"
                                    autofocus
                                    placeholder="Usuario@email.com"
                                    v-model="email"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        &nbsp;<i
                                            class="fa fa-user fa-lg"
                                            aria-hidden="true"
                                        ></i
                                        >&nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Senha"
                                    v-model="password"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        &nbsp;<i
                                            class="fa fa-key fa-lg"
                                            aria-hidden="true"
                                        ></i
                                        >&nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-7">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                        />

                                        <label
                                            class="form-check-label"
                                            for="remember"
                                        >
                                            Mantenha-me conectado
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <a class="btn btn-link" href="">
                                        Esqueci a senha
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-1">
                                    <button
                                        type="submit"
                                        class="btn btn-primary w-100"
                                        @click="login($event)"
                                    >
                                        Acessar
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
    props: ["csrf_token"],
    data() {
        return {
            email: "",
            password: "",
        };
    },
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        login(e) {
            let url = "http://localhost:8000/api/login";
            let config = {
                method: "post",
                body: new URLSearchParams({
                    email: this.email,
                    password: this.password,
                }),
            };

            fetch(url, config)
                .then((res) => res.json())
                .then((data) => {
                    if (data.token)
                        document.cookie =
                            "token=Bearer " + data.token + ";SameSite=Lax";
                    e.target.submit();
                });
        },
    },
};
</script>
