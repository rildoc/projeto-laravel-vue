<template>
  <div>
      <h1>Produtos</h1>

     <!-- <search @search="search"></search> -->

      <div class="row">
             <div class="col-md-3">
                <lista-categoria></lista-categoria>
            </div>
            <div class="col-md-9">
                 <div class="row">
                      <item
                      v-for="product in products.data"
                      :key="product.id"
                      :item="product"
                      class="item"
                      :path="'products'">
                      </item>
                 </div>
             </div>
        </div>
        <paginate
            :pagination="products"
            @paginate="loadProducts">
        </paginate>
  </div>
</template>

<script>
import PaginationComponent from '../../../layouts/PaginationComponent'
import Item from '../../../layouts/Item'
// import Search from './partials/Search'
import ListaCategoria from './partials/ListaCategoria'

export default {
    created () {
      if (this.products.data.length == 0)
        this.$store.dispatch('loadProducts', {})
    },

    data () {
        return {
            filter: '',
            category_id: '',
        }
    },

    computed: {
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
        paginate: PaginationComponent,
        Item,
      //  Search,
        ListaCategoria,
    }
}
</script>

<style scoped>
.list-group-item a{ color:#6E6E6E;  }
</style>
