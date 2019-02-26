<template>
    <div>
        <h1>Listagem de Pedidos</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Cep</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="budget in budgets.data" :key="budget.id">
                    <td>{{ budget.empresa }}</td>
                    <td>{{ budget.nome }}</td>
                    <td>{{ budget.data }}</td>
                    <td>{{ budget.telefone }}</td>
                    <td>{{ budget.celular }}</td>
                    <td>{{ budget.estado }}</td>
                    <td>{{ budget.cidade }}</td>
                    <td>{{ budget.cep }}</td>
                    <td>{{ budget.mensagem }}</td>
                    <td>
                        <a href="" class="btn btn-info">Editar</a>
                        <a href="" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        created  () {
            // chama o método criado
            this.loadBudgets()
        },
        //pega os items para mostrar no componente
        computed:{
            budgets () {
                return this.$store.state.budget.items
            }
        },
        methods: {
            // cria o método
            loadBudgets () {
                this.$store.dispatch('loadBudgets')
            }
        }
    }
</script>
<style scoped>
table thead tr th { text-transform: uppercase; }
</style>
