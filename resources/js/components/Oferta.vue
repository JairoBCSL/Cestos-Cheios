<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card login-box">
                    <div
                        class="card-header"
                        style="font-size: 1.5rem; color: rgb(0, 0, 127)"
                    >
                        Registrar Oferta
                    </div>
                    <div class="card-body">
                        <form id="form-login">
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrf_token"
                            />

                            <input type="hidden" v-model="form.obreiro_id" />

                            <div
                                v-if="transationDetails.type == 'success'"
                                class="alert alert-success"
                                role="alert"
                            >
                                Oferta cadastrada com sucesso
                            </div>

                            <div
                                v-if="transationDetails.type == 'danger'"
                                class="alert alert-danger"
                                role="alert"
                            >
                                Erro ao cadastrar oferta
                            </div>

                            <div class="form-group row mb-3">
                                <label
                                    for="membro_id"
                                    class="col-sm-3 col-form-label fw-bold"
                                    >Nome do membro</label
                                >
                                <div class="col-sm-9">
                                    <select
                                        class="form-control col-sm-9"
                                        v-model="form.membro_id"
                                    >
                                        <option value="" class="disabled">
                                            Selecione um membro
                                        </option>
                                        <option
                                            v-for="(membro, index) in membros"
                                            :key="index"
                                            :value="membro.id"
                                        >
                                            {{ membro.nome }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label
                                    for="valor_entregue"
                                    class="col-sm-3 col-form-label fw-bold"
                                    >Valor entregue</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.valor_entregue"
                                        placeholder="100,00"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label
                                    for="valor_final"
                                    class="col-sm-3 col-form-label fw-bold"
                                    >Valor final</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.valor_final"
                                        placeholder="100,00"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label
                                    for="data_oferta"
                                    class="col-sm-3 col-form-label fw-bold"
                                    >Data da oferta</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="datetime-local"
                                        class="form-control"
                                        v-model="form.data_oferta"
                                    />
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        @click="postOferta()"
                                    >
                                        Registrar oferta
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
            membros: JSON.parse(this.membrosProp),
            apiUrl: "http://localhost:8000/api",
            config: {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            },
            form: {
                obreiro_id: this.obreiro_id,
                membro_id: "",
                valor_entregue: "",
                valor_final: "",
                data_oferta: "",
            },
            transationDetails: {
                type: "",
            },
        };
    },
    props: ["csrf_token", "obreiro_id", "membrosProp"],
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        postOferta: function () {
            console.log("Form aqui:", this.form);
            let formData = new FormData();
            formData.append("obreiro_id", this.form.obreiro_id);
            formData.append("membro_id", this.form.membro_id);
            formData.append("valor_entregue", this.form.valor_entregue);
            formData.append(
                "troco",
                this.form.valor_entregue - this.form.valor_final
            );
            formData.append("valor_final", this.form.valor_final);
            formData.append(
                "data_oferta",
                this.form.data_oferta.replaceAll("T", " ") + ":00"
            );

            axios
                .post(this.apiUrl + "/oferta", formData, this.config)
                .then((res) => {
                    if (res.status == 201)
                        this.transationDetails.type = "success";
                })
                .catch((data) => {
                    this.transationDetails.type = "danger";
                });
        },
    },
};
</script>
