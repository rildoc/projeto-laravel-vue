<template>
 <footer class="footer text-center">
      <div v-for="conteudo in conteudos" :key="conteudo.id">
       <div class="conteudo" v-model="conteudo.cor_background" :style="{'background-color': conteudo.cor_background } ">
           <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Localização</h3>
                     {{ conteudo.localizacao }}
                </div>
                 <div class="col-md-4">
                     <h3>Atendiemnto</h3>
                     <p>{{ conteudo.foneA }}</p>
                     <p>{{ conteudo.foneB }}</p>
                </div>
                 <div class="col-md-4">
                     <p> {{ conteudo.name }}</p>
                      <img :src="[`/storage/products/${conteudo.logo}`]" :alt="conteudo.name"  class="image-preview img-responsive">
                </div>
            </div>
          </div>
             {{ conteudo.copyright }}
       </div>
      </div>
  </footer>
</template>
<script>
    export default {
        data () {
            return {
               cor_background: ''
            }
        },
        computed: {

            conteudos () {
                return this.$store.state.cms.items
            },
        }
    }
</script>
<style scoped>
.rodape{background: #8A0808; color: #fff;}
.conteudo{color: #fff;}
</style>
