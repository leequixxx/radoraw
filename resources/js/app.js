require('./bootstrap');

window.Vue = require('vue');
window.Vuex = require('vuex');
window.VueWait = require('vue-wait').default;
window.Vuesax = require('vuesax');

Vue.use(Vuex);
Vue.use(VueWait);
Vue.use(Vuesax);

const store = new Vuex.Store(require('./store').default);
const wait = new VueWait({ useVuex: true });

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const app = new Vue({
    el: '#app',
    store,
    wait,
});
