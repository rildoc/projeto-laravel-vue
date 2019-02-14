<template>
  <div>
          <div class="col-md-12" style="background-color: red;">
              <button-cart :product="item"></button-cart>
              <div v-if="product.image">
                  <img :src="[`/storage/products/${product.image}`]" :alt="product.name" class="img-list img-responsive">
              </div>
              <div v-else>
                  <img src="/imgs/no-image.jpg" :alt="product.name" class="img-list img-responsive">
              </div>
         </div>
          <div class="col-md-4">
                <h1>{{ product.name }}</h1>
                <p>
                    {{ product.description }}
                </p>
          </div>
      </div>
</template>

<script>
 import ButtonCart from '../../../layouts/ButtonCart'
export default {
    props: ['id','item'],

    created () {
      this.loadProduct()
    },

    data () {
      return {
        product: {}
      }
    },

    methods: {
        loadProduct () {
            this.$store.dispatch('loadProduct', this.id)
                      .then(product => this.product = product)
        }
    },
    components:{
        ButtonCart
    }
}
</script>
<style scoped>
.img-list{ max-width: 400px; }
h2{
    color: #404040;
    font-size: 27px;
    font-weight: 700;
}
p{
   color: #666666;
    font-size: 15px;
    font-weight: 400;
    line-height: 30px;
}
</style>
