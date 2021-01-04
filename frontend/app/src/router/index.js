import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import CurrencyRate from "@/components/CurrencyRate";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about',
        name: 'About',
        component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
    },
    {
        path: '/currency',
        name: 'Currency',
        component: CurrencyRate
    }
]

const router = new VueRouter({
    routes
})

export default router
