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

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
