export default {
    state: {
        products: []
    },

    mutations: {
        ADD_PRODUCT_CART (state, product) {
            state.products.push(product)
        },

        REMOVE_PRODUCT_CART (state, product) {
            let index =  state.products.findIndex(prod => {
                return prod.id === product.id
            })

            state.products.splice(index, 1)
        }
    },
    actions: {
        storeBudget (context, params) {
            context.commit('PRELOADER', true)

            return new Promise((resolve, reject) => {
                axios.post('/api/v1/budget', params)
                          .then(response => resolve())
                          .catch(error => reject(error.response))
                          .finallly(() => context.commit('PRELOADER', fasle))
            })
        }
    }
}
