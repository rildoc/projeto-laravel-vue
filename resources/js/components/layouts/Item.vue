<template>
  <div class="col-xs-1 col-sm-6 col-md-4 produtos">
      <router-link :to="{name: 'product.detail', params: {id: item.id}}">
        <div v-if="item.image">
            <img :src="[`/storage/${path}/${item.image}`]" :alt="item.name" class="img-list">
        </div>
        <div v-else>
            <img src="/imgs/no-image.jpg" :alt="item.name" class="img-list">
        </div>
        <p>{{item.name}}</p>
      </router-link>
      <button-cart :product="item"></button-cart>
  </div>
</template>


<script>
import ButtonCart from './ButtonCart'

export default {
    props: ['item', 'path'],
    components: {
        ButtonCart
    }
}
</script>

<style scoped>
.img-list{
    max-width: 200px;
    margin:0 auto;
}
.produtos {
    text-align: center;
    margin:20px 0;
    height: 320px;
    box-shadow: 9px 9px 30px rgba(0, 0, 0, 0.08);
    border-radius: 10px;
    margin: 0 10px;
    background-color: #ffffff;
    padding-top: 30px;
    margin-bottom: 35px;
    max-width: 268px;
}
.produtos a { color:#6E6E6E;  }
</style>
