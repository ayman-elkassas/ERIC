/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//include bootstrap file
require('./bootstrap')

//todo:main vue file
window.Vue = require('vue');

//TODO:vue-router
//todo:first step in vue-router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//todo:import routes.js
import {routes} from './routes';

//todo:Vuex
import Vuex from 'vuex';
Vue.use(Vuex);
import storeData from './store/index'
const store=new Vuex.Store(storeData);

//todo:show errors in console with vue component
Vue.config.productionTip = true

//todo:v-form
import {Form,HasError,AlertError} from 'vform';
Vue.component(HasError.name,HasError);
Vue.component(AlertError.name,AlertError);
window.Form=Form;

//todo:User-define Component
//todo:Admin Dashboard
Vue.component('admin-main', require('./components/admin/MasterPage/Content').default);
Vue.component('admin-header', require('./components/admin/MasterPage/Header').default);
//todo:Authentication Admin Dashboard
Vue.component('master-seen', require('./components/admin/Authentication/MasterSeen').default);
Vue.component('token-expire', require('./components/admin/Authentication/TokenExpire').default);

//todo:External vue components
//1-select
import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
//2-vue-dropzone
import vueDropzone from "vue2-dropzone";
Vue.component('vueDropzone', vueDropzone)
import Menubar from "primevue/menubar"
Vue.component('Menubar', Menubar)
//3-Vuesax components
//todo:import vuesax as * to enable all functions
import vuesax from 'vuesax'
Vue.use(vuesax);
//todo:import boxicons
import 'boxicons'

import vsCard from 'vuesax/dist/vsCard/index'
Vue.component('vs-card',vsCard)
import vsButton from 'vuesax/dist/vsButton/index'
Vue.component('vs-button',vsButton)
import vsPagination from 'vuesax/dist/vsPagination/index'
Vue.component('vs-pagination',vsPagination);
import vsAlert from 'vuesax/dist/vsAlert/index'
Vue.component('vs-alert',vsAlert);
import vsInput from 'vuesax/dist/vsInput/index'
Vue.component('vs-input',vsInput);
import vsTable from 'vuesax/dist/vsTable/index'
Vue.component('vs-table',vsTable);
import vsTableTr from 'vuesax/dist/vsTableTr/index'
Vue.component('vs-tr',vsTableTr);
import vsTableTh from 'vuesax/dist/vsTableTh/index'
Vue.component('vs-th',vsTableTh);
import vsTableTd from 'vuesax/dist/vsTableTd/index'
Vue.component('vs-td',vsTableTd);
import vsSelect from 'vuesax/dist/vsSelect/index'
Vue.component('vs-select',vsSelect);
import vsOptionGroup from 'vuesax/dist/vsOptionGroup/index'
Vue.component('vs-option-group',vsOptionGroup);
import vsOption from 'vuesax/dist/vsOption/index'
Vue.component('vs-option',vsOption);
import vsCheckbox from 'vuesax/dist/vsCheckbox/index'
Vue.component('vs-checkbox',vsCheckbox);
import vsAvatar from 'vuesax/dist/vsAvatar/index'
Vue.component('vs-avatar',vsAvatar);

//todo:declare main router array
const router=new VueRouter({
    //todo:base => for make localhost call vue-routes
    base:'/ERIC/',
    routes, //short for 'routes:routes'
    mode:'hash',
});

//todo:create for each tab in sidebar vue object separately
const content = new Vue({
    el: "#content",
    router,
    store
});

const user = new Vue({
    el:"#user",
    router,
});

const post = new Vue({
    el:"#post",
    router,
});

const field = new Vue({
    el:"#field",
    router,
});

const resource = new Vue({
    el:"#resource",
    router,
});

const course = new Vue({
    el:"#course",
    router,
});

const adminheader = new Vue({
    el:"#admin-header",
    router,
    store
});
