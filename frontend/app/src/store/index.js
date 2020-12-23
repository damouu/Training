import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        email: '',
    },
    mutations: {
        email(state, email) {
            state.email = email;
        },
    },
    getters: {
        email: state => state.email,
    },
    actions: {},
    modules: {}
})