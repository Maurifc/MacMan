require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import routes from './routes';

//Vue Router
Vue.use(VueRouter);
const router = new VueRouter({
  routes
});

const app = new Vue({
    el: '#app',
    data: {
      teste: 'texto'
    },
    router
});
