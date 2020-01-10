import Vue from 'vue'
import Router from 'vue-router'
import index from '@/views/index'
import AllProducts from '@/components/AllProducts'
import ProductDetail from '@/components/ProductDetail'
import Cart from '@/components/cart'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'index',
            component: index
        },
        {
            path: '/AllProducts',
            name: 'AllProducts',
            component: AllProducts
        },
        {
            path: '/productDetail',
            name: 'ProductDetail',
            component: ProductDetail
        },
        {
            path: '/cart',
            name: 'Cart',
            component: Cart
        }
    ]
})