<template>
   <header class="text-center">
     <div v-for="conteudo in conteudos" :key="conteudo.id">
       <div class="conteudo" v-model="conteudo.cor_background" :style="{'background-color': conteudo.cor_background } ">

           <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                                <img :src="[`/storage/products/${conteudo.logo}`]" :alt="conteudo.name"  class="image-preview img-responsive">
                        </div>
                         <div class="col-md-4">
                             <search @search="search"></search>
                        </div>
                         <div class="col-md-4">
                                 <span class="atendimento"> Atendimento</span>
                                 <p>{{ conteudo.foneA }}</p>
                        </div>
                    </div>
              </div>
       </div>
       <div class="menu">
            <ul class="nav container">
                <li class="nav-item">
                    <router-link :to="{name: 'home'}" class="nav-link">HOME</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'contact'}" class="nav-link">CONTATO</router-link>
                </li>
                <li class="nav-item">
                     <router-link :to="{name: 'cart'}" class="nav-link">CARRINHO ({{ cart.length }})</router-link>
                </li>

                 <li class="nav-item dropdown show" v-if="me.name">
                     <a class="dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Olá {{ me.name }}!
                     </a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     <router-link :to="{name: 'profile'}" class="dropdown-item">Meu Perfil</router-link>
                     <a class="dropdown-item" @click.prevent="logout">Sair</a>
                     </div>
                 </li>
                 <li class="nav-item" v-else>
                     <router-link :to="{name: 'login'}" class="nav-link">LOGIN</router-link>
                 </li>
                 </ul>
             </div>
           </div>
     </header>
</template>

<script>
import Search from './pages/home/partials/Search'
export default {
     created () {
      if (this.products.data.length == 0)
        this.$store.dispatch('loadProducts', {})
    },

    data () {
        return {
            filter: '',
            category_id: '',
            cor_background: '',
        }
    },
    computed: {
      cart () {
        return this.$store.state.cart.products
      },
      me () {
        return this.$store.state.auth.me
      },
      conteudos () {
         return this.$store.state.cms.items
      },
      products () {
          return this.$store.state.products.items
      },
      categories () {
         return this.$store.state.categories.items.data
      },
      params () {
          return {
              filter: this.filter,
              category_id: this.category_id,
              page: this.products.current_page,
          }
      }
    },

    methods: {
      logout () {
        this.$store.dispatch('logout')
      },
      loadProducts (page = 1) {
            this.$store.dispatch('loadProducts', {...this.params, page})
        },

        search (values) {
            this.filter = values.filter
            this.category_id = values.category_id

            this.loadProducts()
        }
    },
    components: {
        Search,
    }
}
</script>
<style scoped>
 .atendimento{ padding:5px 0; color: #fff }
 .menu{background: #8A0808; color: #fff;}
.conteudo{color: #fff; padding:20px 0;}
.nav-link{color: #fff;}
.btn-outline-success { color: #fff; background-color: transparent; background-image: none; border-color: #fff;}
</style>
