window.$ = window.jQuery = require('jquery');
window.Laravel = {csrfToken: $('meta[name=csrf-token]').attr("content")};

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter({mode: 'history'});
const app = new Vue(Vue.util.extend({router})).$mount('#app');