<template>
    <div>
        <h3>Painel de Administração</h3>
         <form class="form" @submit.prevent="onSubmit">
          <div :class="['form-group', {'has-error': errors.name}]">
              <div v-if="errors.name">{{ errors.name[0] }}</div>
              <input type="text" v-model="cms.name" class="form-control" placeholder="Nome do site :">
          </div>
            <div :class="['form-group', {'has-error': errors.logo}]">
                   <div v-if="errors.logo">{{ errors.logo[0] }}</div>
                      <div v-if="imagePreview">
                          <img :src="imagePreview" alt="" class="image-preview">
                      </div>
                      <div v-else>
                            <input type="file" class="form-control" @change="onFileChangeLogo">
                      </div>
            </div>
          <div class="row">
              <div class="col-md-6">
               <div :class="['form-group', {'has-error': errors.foneA}]">
                   <div v-if="errors.foneA">{{ errors.foneA[0] }}</div>
                   <input type="text" v-model="cms.foneA" class="form-control" placeholder="Telefone 1 :">
              </div>
          </div>
          <div class="col-md-6">
              <div :class="['form-group', {'has-error': errors.foneB}]">
                    <div v-if="errors.foneB">{{ errors.foneB[0] }}</div>
                    <input type="text" v-model="cms.foneB" class="form-control" placeholder="Telefone 2 :">
              </div>
          </div>
          </div>
          <div :class="['form-group', {'has-error': errors.localizacao}]">
              <div v-if="errors.localizacao">{{ errors.localizacao[0] }}</div>
              <input type="text" v-model="cms.localizacao" class="form-control" placeholder="Endereço :">
          </div>
          <div :class="['form-group', {'has-error': errors.copyright}]">
              <div v-if="errors.copyright">{{ errors.copyright[0] }}</div>
              <input type="text" v-model="cms.copyright" class="form-control" placeholder="Copyright :">
          </div>
           <div :class="['form-group', {'has-error': errors.cor_background}]">
              <div v-if="errors.cor_background">{{ errors.cor_background[0] }}</div>
              <input type="color" v-model="cms.cor_background" class="form-control" placeholder="Cor Background :">
          </div>

          <div class="form-group">
               <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
      </form>
    </div>
</template>
<script>
    export default {
         props: {
            update: {
                require: false,
                type: Boolean,
                default: false
            },
            cms: {
                require: false,
                type: Object,
                default: () => {
                    return {
                         id: '',
                         logo: '',
                         name: '',
                         copyright: '',
                         foneA: '',
                         foneB: '',
                         localizacao: '',
                         cor_background: '',
                    }
                }
            }
         },
         data () {
            return {
               errors: {},
               upload: null,
               imagePreview: null,
            }
         },
         methods: {
            onSubmit () {
                let action = this.update ? 'updateConteudo' : 'storeConteudo'

                const formData = new FormData()
                if (this.upload != null)
                    formData.append('logo', this.upload)

                        formData.append('id', this.cms.id)
                        formData.append('logo', this.cms.logo)
                        formData.append('name', this.cms.name)
                        formData.append('copyright', this.cms.copyright)
                        formData.append('foneA', this.cms.foneA)
                        formData.append('foneB', this.cms.foneB)
                        formData.append('localizacao', this.cms.localizacao)
                        formData.append('cor_background', this.cms.cor_background)




                this.$store.dispatch(action, formData)
                                .then(() => {
                                    this.$snotify.success('Sucesso ao enviar!')

                                    this.reset()

                                    this.$emit('success')
                                })
                                .catch(errors => {
                                    this.$snotify.error('Algo errado', 'Erro')

                                    this.errors = errors.data.errors
                                })


            },
            reset () {
                this.errors = {}

                this.cms = {
                         id: '',
                         logo: '',
                         name: '',
                         copyright: '',
                         foneA: '',
                         foneB: '',
                         localizacao: '',
                         cor_background: '',

                }

            },

                onFileChangeLogo (e) {
                    let files = e.target.files || e.dataTransfer.files
                    if (!files.length)
                        return


                    this.upload = files[0]

                    this.previewImage(files[0])
                },

                onFileChange (e) {
                    let files = e.target.files || e.dataTransfer.files
                    if (!files.length)
                        return


                    this.upload = files[0]

                    this.previewImage(files[0])
                },

                previewImage (file) {
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        this.imagePreview = e.target.result
                    }
                    reader.readAsDataURL(file)
                },



                removePreviewImage () {

                    this.imagePreview = null

                    this.upload = null
                }
         }
    }
</script>
<style scoped>
.image-preview{max-width:60px;}
</style>
