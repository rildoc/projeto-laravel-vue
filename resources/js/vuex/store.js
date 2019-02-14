import Vue from 'vue'
import Vuex from 'vuex'

import Categories from './modules/categories/categories'
import preloader from './modules/preloader/preloader'
import products from './modules/products/products'
import cart from './modules/cart/cart'
import auth from './modules/auth/auth'
import profile from './modules/users/profile'
import chart from './modules/charts/charts'
import cms from './modules/cms/cms'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        categories: Categories,
        preloader,
        products,
        cart,
        auth,
        profile,
        chart,
        cms,
    }
})

export default store
