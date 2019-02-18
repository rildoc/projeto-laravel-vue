<template>
    <div>
        <h2>Entre em contato.</h2>
       <form @submit.prevent="submit">
            <div class="form-group">
                <input type="text" class="form-control" name="empresa" id="empresa" v-model="fields.empresa" placeholder="Empresa:">
                <div v-if="errors && errors.empresa" class="text-danger">{{ errors.empresa[0] }}</div>
            </div>
             <div class="form-group">
                <input type="text" class="form-control" name="nome" id="nome" v-model="fields.nome" placeholder="Nome:">
                <div v-if="errors && errors.nome" class="text-danger">{{ errors.nome[0] }}</div>
            </div>
            <div class="telefones">
                 <div class="form-group fixo">
                    <input type="text" class="form-control" name="telefone" id="telefone" v-model="fields.telefone" placeholder="Telefone:">
                    <div v-if="errors && errors.telefone" class="text-danger">{{ errors.telefone[0] }}</div>
                </div>
                 <div class="form-group celular">
                    <input type="text" class="form-control" name="celular" id="celular" v-model="fields.celular" placeholder="Celular:">
                    <div v-if="errors && errors.celular" class="text-danger">{{ errors.celular[0] }}</div>
                </div>
            </div>
            <div class="localizacao">
                   <div class="form-group estado">
                        <input type="text" class="form-control" name="estado" id="estado" v-model="fields.estado" placeholder="Estado:">
                        <div v-if="errors && errors.estado" class="text-danger">{{ errors.estado[0] }}</div>
                    </div>
                     <div class="form-group cidade">
                        <input type="text" class="form-control" name="cidade" id="cidade" v-model="fields.cidade" placeholder="Cidade:">
                        <div v-if="errors && errors.cidade" class="text-danger">{{ errors.cidade[0] }}</div>
                    </div>
                     <div class="form-group cep">
                        <input type="text" class="form-control" name="cep" id="cep" v-model="fields.cep" placeholder="CEP:">
                        <div v-if="errors && errors.cep" class="text-danger">{{ errors.cep[0] }}</div>
                    </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="mensagem" id="mensagem" v-model="fields.mensagem" placeholder="Mensagem:"></textarea>
                <div v-if="errors && errors.mensagem" class="text-danger">{{ errors.mensagem[0] }}</div>
            </div>
            <p>
                 Todos Campos Obrigatórios .
            </p>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-danger">
                Solicitar Orçamento
            </button>
       </form>
    </div>
</template>
<script>
    export default {
       data () {
           return {
               fields: {},
               errors: {},
           }
       },
       methods: {

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


