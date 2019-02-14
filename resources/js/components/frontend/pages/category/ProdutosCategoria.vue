<template>
    <div>
             produtos da categoria
            <div class="row">
                <item
                      v-for="product in products.data"
                      :key="product.id"
                      :item="category_id"
                      class="item"
                      :path="'products'">
                      </item>
            </div>

    </div>
</template>
<script>
import Item from '../../../layouts/Item'


    export default {
        props: ['item'],
        data () {
            return {
                filter: '',
                category_id: '',
            }
        },

        computed: {
          products () {
              return this.$store.state.products.items
             }
          },
           components: {
            Item,
        }

        }
</script>
<style scoped>

</style>
