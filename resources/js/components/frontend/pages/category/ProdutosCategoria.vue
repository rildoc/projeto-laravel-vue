<template>
    <div>
            <div class="row conteudo-produtos">
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
    </div>
</template>
<script>
  import Item from '../../../layouts/Item'
  import ListaCategoria from '../home/partials/ListaCategoria'

    export default {
        props: ['id'],

        created () {
          this.loadProductCat()
        },

        data () {
            return {
                filter: '',
                category_id: '',
                product: {}
            }
        },

        computed: {
          products () {
              return this.$store.state.products.items
             }
          },

          methods: {
            loadProductCat () {
                 this.$store.dispatch('loadProductCat', this.id)
                   .then(product => this.product = product)
            }
          },

          components: {
            Item,
            ListaCategoria,
          }
        }
</script>
<style scoped>
.conteudo-produtos{ padding:30px 0; }
</style>
