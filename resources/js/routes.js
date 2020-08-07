//todo:make routes refer to components
import AdminHome from './components/admin/AdminHome.vue'
import AdminUser from './components/admin/AdminUser.vue'

export const routes=[
    {path:'/home',component:AdminHome},
    {path:'/adminuser',component:AdminUser},
];
