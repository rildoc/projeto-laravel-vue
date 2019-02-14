<template>
     <div>
         <h1>Painel de Administração do site</h1>
       <!--  <button class="btn btn-success" @click.prevent="showModal = true">
            Cadastro
         </button> -->
         <vodal
         :show="showModal"
         animation="zoom"
         @hide="hideModal"
         :width="400"
         :height="400">
         <cms-form
         :cms="conteudo"
         :update="update"
         @success="success">

         </cms-form>
         </vodal>

         <!--pega a propriedde computada conteudos -->
      <ul v-for="conteudo in conteudos" :key="conteudo.id">
                <li><span class="destaque">Nome do site :</span> <span class="pull-right">{{ conteudo.name }}</span></li>
                <li><span class="destaque">Logo :</span>
                  <span class="pull-right">
                     <img :src="[`/storage/products/${conteudo.logo}`]" :alt="conteudo.name"  class="image-preview">
                   </span>
                </li>
                <li><span class="destaque">Telefone 1 :</span><span class="pull-right"> {{ conteudo.foneA }}</span></li>
                <li><span class="destaque">Telefone 2 :</span> <span class="pull-right">{{ conteudo.foneB }}</span></li>
                <li><span class="destaque">Endereço :</span> <span class="pull-right">{{ conteudo.localizacao }}</span></li>
                <li><span class="destaque">Copyright :</span> <span class="pull-right"> {{ conteudo.copyright }}</span></li>
                <li><span class="destaque">Cor background :</span> <span class="pull-right"> {{ conteudo.cor_background }}</span></li>

                <a href="#" @click.prevent="edit(conteudo.id)" class="btn btn-success"> Editar</a>
         </ul>
     </div>
</template>
<script>
import vodal from 'vodal'
import CmsForm from './partials/CmsForm'

export default {
  created () {
   // chama o metodo loadCms
   this.loadConteudos()
  },
  data () {
    return {
      showModal: false,
      conteudo: {
             id: '',
             title: '',
             logo: '',
             name: '',
             keywords: '',
             foneA: '',
             foneB: '',
             localizacao: '',
      },
      update: false,
    }
  },
  computed: {
    conteudos () {
      return this.$store.state.cms.items
    }
  },
  methods: {
    // cria  o metodo loadCmss
    loadConteudos () {
        //dispara a action criada
         this.$store.dispatch('loadConteudos')
    },

    edit (id) {
      this.$store.dispatch('loadConteudo', id)
                 .then(response => {
                    this.conteudo = response

                    this.showModal = true

                    this.update = true

                 })
                 .catch(() => {
                   this.$snotify.error('Erro ao carregar o dado.')
                 })
    },

    hideModal () {
      this.showModal = false
    },

    success () {
      this.hideModal()

      this.loadConteudos()
    }

  },
  components: {
    vodal,
    CmsForm,
  }
}
</script>
<style scoped>
ul li {
    list-style: none;
    padding:15px 0;
}
ul li .destaque {
    width:30%;
    font-size: 18px;
    font-weight: bold;
}
ul li {
      height:120px;
}
ul li .pull-right {
    width:70%;
   float: right;
}
.image-preview{max-width:80px;}
</style>
