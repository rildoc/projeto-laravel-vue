<template>
  <div>
         <ul class="list-group" @click.prevent="search" v-model="category_id">
            <li class="list-group-item" v-for="item in categories" :key="item.id">
                    <router-link :to="{name: 'produtos.categoria', params: {id: item.id}}"> {{ item.name }} </router-link>
            </li>
        </ul>
  </div>
</template>

<script>
   export default {
     props: ['item'],
     data () {
         return {
             filter: '',
             category_id: '',
         }
     },
     computed: {
         categories () {
             return this.$store.state.categories.items.data
         }
     },
     methods: {
         search () {
             this.$emit('search', {
                   filter: this.filter,
                   category_id: this.category_id
               })
         }
     }
   }
</script>

<style scoped>

</style>
