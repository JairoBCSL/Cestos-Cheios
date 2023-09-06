<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div
                        class="card-header"
                        style="font-size: 1.5rem; color: rgb(0, 0, 127)"
                    >
                        Registrar
                    </div>

                    <div class="card-body">
                        <form method="POST" action="">
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrf_token"
                            />

                            <div class="input-group mb-3">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                    autocomplete="name"
                                    autofocus
                                    placeholder="Usuário"
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
                                <select class="form-control" name="cargo_id">
                                    <option value="" class="disabled">
                                        Selecione um cargo
                                    </option>
                                    <option
                                        v-for="(cargo, index) in cargos"
                                        :key="index"
                                        :value="cargo.id"
                                    >
                                        {{ cargo.nome }}
                                    </option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    required
                                    autocomplete="email"
                                    placeholder="usuario@email.com"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        &nbsp;<i
                                            class="fa fa-envelope fa-lg"
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
                                    autocomplete="new-password"
                                    placeholder="Senha"
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

                            <div class="input-group mb-3">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirma senha"
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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Registrar
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
    props: ["csrf_token", "cargosProp"],
    data() {
        return {
            cargos: JSON.parse(this.cargosProp),
        };
    },
    mounted() {
        console.log("Component mounted.");
        this.load();
    },
};
</script>
