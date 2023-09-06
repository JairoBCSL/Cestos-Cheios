<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card login-box">
                    <div
                        class="card-header"
                        style="font-size: 1.5rem; color: rgb(0, 0, 127)"
                    >
                        Relatório de Ofertas
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Membro</th>
                                    <th>Valor Entregue</th>
                                    <th>Valor Final</th>
                                    <th>Troco</th>
                                    <th>Data da Oferta</th>
                                    <th>Obreiro Responsável</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(oferta, key) in ofertas" :key="key">
                                    <td>{{ oferta.membro.nome }}</td>
                                    <td>
                                        {{
                                            formataDinheiro(
                                                oferta.valor_entregue
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            formataDinheiro(oferta.valor_final)
                                        }}
                                    </td>
                                    <td>{{ formataDinheiro(oferta.troco) }}</td>
                                    <td>
                                        {{
                                            formataDataTempoMySQL(
                                                oferta.data_oferta
                                            )
                                        }}
                                    </td>
                                    <td>{{ oferta.obreiro.name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["csrf_token", "ofertasProp"],
    data() {
        return {
            ofertas: JSON.parse(this.ofertasProp),
        };
    },
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        formataDataTempo(d) {
            if (!d) return "";

            d = d.split("T");
            let data = d[0];
            data = data.split("-");
            data = data[2] + "/" + data[1] + "/" + data[0];

            let tempo = d[1];
            tempo = tempo.split(".");
            tempo = tempo[0];

            return data + " " + tempo;
        },
        formataDataTempoMySQL(d) {
            if (!d) return "";

            d = d.split(" ");
            let data = d[0];
            data = data.split("-");
            data = data[2] + "/" + data[1] + "/" + data[0];

            return data;
        },
        formataDinheiro(d) {
            if (!d) return "";
            let str = d.toString();
            let data = str.split(".");
            if (data.length > 1) data = "R$" + data[0] + "," + data[1];
            else data = "R$" + data[0] + ",00";

            return data;
        },
    },
};
</script>
