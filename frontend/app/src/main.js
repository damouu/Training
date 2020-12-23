import Vue from 'vue'
import App from './App.vue'
import {BootstrapVue, BootstrapVueIcons, IconsPlugin} from 'bootstrap-vue'

Vue.config.productionTip = false
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

new Vue({
    render: h => h(App),
}).$mount('#app')
