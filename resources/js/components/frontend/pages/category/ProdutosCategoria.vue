<template>
    <div>
             produtos da categoria
            <div class="row">
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
</template>
<script>
  import Item from '../../../layouts/Item'

    export default {
        props: ['id'],

        created () {
          this.loadProduct()
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
            loadProduct () {
                 this.$store.dispatch('loadProduct', this.id)
                   .then(product => this.product = product)
            }
          },

          components: {
            Item,
          }
        }
</script>
<style scoped>

</style>
