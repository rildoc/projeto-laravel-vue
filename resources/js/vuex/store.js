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
import budget from './modules/budget/budget'
import categoryProduct from './modules/categoryProduct/categoryProduct'

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
        budget,
        categoryProduct,
    }
})

export default store
