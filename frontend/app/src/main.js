import Vue from 'vue'
import Vuex from 'vuex'
import App from './App.vue'
import store from './store/index.js'
import {BootstrapVue, BootstrapVueIcons, IconsPlugin} from 'bootstrap-vue'

Vue.config.productionTip = false
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(IconsPlugin)
Vue.use(Vuex)
Vue.use(store)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import router from './router'

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
