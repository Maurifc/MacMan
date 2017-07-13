require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import Acl from 'vue-acl';
import routes from './routes';

//Vue Router
Vue.use(VueRouter);
const router = new VueRouter({
  routes
})

//Vue Acl
Vue.use(Acl, {router, init: 'any'})

const app = new Vue({
    el: '#app',
    data: {
      teste: 'texto'
    },
    router
});
