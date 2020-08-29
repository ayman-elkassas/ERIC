/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//include bootstrap file
require('./bootstrap');
//include files
require('./admin-js/popper.min')
require('./admin-js/jquery.slimscroll')
require('./admin-js/jquery-ui.min')
require('./admin-js/i18next.min')
require('./admin-js/i18nextBrowserLanguageDetector.min')
require('./admin-js/script')
require('./admin-js/i18nextXHRBackend.min')
require('./admin-js/jquery-i18next.min')
require('./admin-js/jquery.mCustomScrollbar.concat.min')
require('./admin-js/pcoded.min')
require('./admin-js/vartical-layout.min')
require('admin-panel/files/assets/js/menu/box-layout')

window.Vue = require('vue');

//TODO:vue-router
//todo:first step in vue-router
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//show errors in console with vue component
Vue.config.productionTip = true

//todo:import routes.js
import {routes} from './routes';

//todo:Example Component
//  note name of component should be (name-name) as example
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/MasterPage/content').default);

const router=new VueRouter({
    //todo:base => for make localhost call vue-routes
    base:'/ERIC/',
    routes, //short for 'routes:routes'
    mode:'history',
});

const app = new Vue({
    el: '#pcoded',
    router,
});
