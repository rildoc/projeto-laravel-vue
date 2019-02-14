import axios from 'axios'
import { URL_BASE } from '../../../config/configs'

const RESOURCE = 'cms'

const CONFIGS = {
    headers: {
        'content-type': 'multipart/forma-data',
    }
}

export default {
    loadConteudos (context) {
        context.commit('PRELOADER', true)
        axios.get(`${URL_BASE}${RESOURCE}`)
                .then(response => context.commit('LOAD_CONTEUDOS', response.data))
                .catch(error =>  console.log(error))
                .finally(() => context.commit('PRELOADER', false))
    },
   // action para update
     loadConteudo (context, id) {
        context.commit('PRELOADER', true)

        return new Promise((resolve, reject) => {
            axios.get(`${URL_BASE}${RESOURCE}/${id}`)
                .then(response => resolve(response.data))
                .catch(error =>  reject())
                .finally(() => context.commit('PRELOADER', false))

        })
    },
  // action para fazer o cadastro
    storeConteudo (context, formData){
        context.commit('PRELOADER', true)

        return new Promise(() => {
            axios.post(`${URL_BASE}${RESOURCE}`, formData, CONFIGS)
                    .then(response => resolve())
                    .catch(error => {
                        context.commit('PRELOADER', false)

                        reject(error.response)
                    })
        })
    },

      updateConteudo (context, formData){
        context.commit('PRELOADER', true)

        formData.append('_method', 'PUT')

        return new Promise((resolve, reject) => {
            axios.post(`${URL_BASE}${RESOURCE}/${formData.get('id')}`, formData)
                    .then(response => resolve())
                    .catch(error => {
                        context.commit('PRELOADER', false)

                     reject(error.response)
               })
        })
    }
}
