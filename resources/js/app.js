/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
//include all js files
// require('admin-control/files/assets/js/script');
// require('admin-control/files/bower_components/jquery/js/jquery.min');
// require('admin-control/files/bower_components/bootstrap/js/bootstrap.min');
// require('admin-control/files/bower_components/jquery-ui/js/jquery-ui.min');
// require('admin-control/files/bower_components/popper.js/js/popper.min');
// require('admin-control/files/bower_components/jquery-slimscroll/js/jquery.slimscroll');
// require('admin-control/files/bower_components/modernizr/js/modernizr');
// require('admin-control/files/bower_components/modernizr/js/css-scrollbars');
// require('admin-control/files/bower_components/i18next/js/i18next.min');
// require('admin-control/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min');
// require('admin-control/files/bower_components/jquery-i18next/js/jquery-i18next.min');
// require('admin-control/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min');
// require('admin-control/files/assets/js/pcoded.min');
// require('admin-control/files/assets/js/vartical-layout.min');
// // require('admin-control/files/assets/js/jquery.mCustomScrollbar.concat.min');
// require('admin-control/files/bower_components/rocket-loader/rocket-loader.min');

window.Vue = require('vue');

//TODO:vue-router
//todo:first step in vue-router
import vueRouter from 'vue-router';
Vue.use(VueRouter);

//todo:Example Component
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes=[
    {path:'/foo',component:Foo},
    {path:'/bar',component:Bar},
];

const router=new VueRouter({
    routes //short for 'routes:routes'
});
const app = new Vue({
    el: '#pcoded',
});
