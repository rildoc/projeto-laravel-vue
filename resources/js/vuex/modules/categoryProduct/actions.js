import axios from 'axios'
import { URL_BASE } from '../../../config/configs'

const RESOURCE = 'categories'

const CONFIGS = {
    headers: {
        'content-type': 'multipart/forma-data',
    }
}

export default {

    loadProductCat (context, id) {
        context.commit('PRELOADER', true)

        return new Promise((resolve, reject) => {
            axios.get(`${URL_BASE}${RESOURCE}/${id}`)
                .then(response => resolve(response.data))
                .catch(error => reject())
                .finally(() => context.commit('PRELOADER', false))
        })
    },


}
