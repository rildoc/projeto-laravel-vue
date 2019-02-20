<template>
    <div>
        <h2>Preencha o formulário abaixo para receber o seu orçamento.</h2>
       <form  @submit.prevent="onSubmit">
            <div class="form-group">
                <input type="text" class="form-control" v-model="budget.empresa" placeholder="Empresa:">
            </div>
             <div class="form-group">
                <input type="text" class="form-control" v-model="budget.nome" placeholder="Nome:">
            </div>
            <div class="telefones">
                 <div class="form-group fixo">
                    <input type="text" class="form-control" v-model="budget.telefone" placeholder="Telefone:">
                </div>
                 <div class="form-group celular">
                    <input type="text" class="form-control" v-model="budget.celular" placeholder="Celular:">
                </div>
            </div>
            <div class="localizacao">
                   <div class="form-group estado">
                        <input type="text" class="form-control" v-model="budget.estado" placeholder="Estado:">
                    </div>
                     <div class="form-group cidade">
                        <input type="text" class="form-control" v-model="budget.cidade" placeholder="Cidade:">
                    </div>
                     <div class="form-group cep">
                        <input type="text" class="form-control" v-model="budget.cep" placeholder="CEP:">
                    </div>
            </div>
            <div class="form-group">
                <textarea name="" id="" class="form-control" v-model="budget.mensagem" placeholder="Mensagem:"></textarea>
            </div>
            <p>
                 Todos Campos Obrigatórios .
            </p>
            <div class="clearfix"></div>
            <button class="btn btn-danger">
                Solicitar Orçamento
            </button>
       </form>
    </div>
</template>
<script>
    export default {
        props: {
           budget: {
               require: false,
               type: Object,
               default: () => {
                   return {
                        empresa: '',
                        nome: '',
                        telefone: '',
                        celular: '',
                        estado: '',
                        cidade: '',
                        CEP: '',
                        mensagem: '',
                   }
               }

           }
        },
        data () {
            return {

            }
        },
        methods: {
            onSubmit () {
                this.$store.dispatch('storeBudget', this.budget)
                                .then(() => {
                                    this.$snotify.success('Sucesso ao cadastrar')
                                })
                                .catch(() => {
                                    this.$notify.error('Algo de Errado', 'Erro')
                                })
            }
        }
    }
</script>
<style scoped>
.form-group textarea{
    height: 200px;
}
.btn-danger{
    margin:10px 0;
}
.fixo{width: 50%; float: left; padding-right:5px;}
.celular{width: 50%; float: right;padding-left:5px;}
.estado{width:30%;padding-right:5px; float: left;}
.cidade{width:50%;padding-left:5px;padding-right:5px;float: left;}
.cep{width:20%;padding-left:5px;float: right;}
</style>

