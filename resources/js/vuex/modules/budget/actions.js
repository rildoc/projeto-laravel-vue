// importar axios para fazer requisição  http
import axios from 'axios'
import { URL_BASE } from '../../../config/configs'

const RESOURCE = 'budgets'

export default {
    loadBudgets (context) {
        axios.get(`${URL_BASE}${RESOURCE}`)
                    // o context.comit vai receber o mutation
                .then(response => context.commit('LOAD_BUDGETS', response.data))
                .catch(error => console.log(error))
                .finally(() => context.commit('PRELOADER', false))
    }
}
