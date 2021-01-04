import Vue from 'vue'
import Vuex from 'vuex'
import App from './App.vue'
import store from './store/index.js'
import axios from 'axios'
import VueAxios from 'vue-axios'
import {BootstrapVue, BootstrapVueIcons, IconsPlugin} from 'bootstrap-vue'
import {BootstrapIconsPlugin} from 'bootstrap-icons-vue';


Vue.config.productionTip = false
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(IconsPlugin)
Vue.use(Vuex)
Vue.use(store)
Vue.use(VueAxios, axios)
Vue.use(BootstrapIconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './router'

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
