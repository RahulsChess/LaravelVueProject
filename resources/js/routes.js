import VueRouter from 'vue-router';

import List from './components/List';
import Detail from './components/Detail';
import Price from './components/Price';
let routes = [{
        path: '/',
        component: List
    },

    {
        path: '/detail',
        component: Detail
    },

    {
        path: '/price',
        component: Price,
        name: 'Price'
    },
];


export default new VueRouter({
    routes,
    mode: 'history'
});