//todo:make routes refer to components
import AdminHome from './components/admin/AdminHome.vue'
import AdminUser from './components/admin/AdminUser.vue'
import PostList from './components/admin/post/List.vue'
import PostNew from './components/admin/post/New.vue'

// function lazyLoad(view){
//     return() => import(`@/views/${view}.vue`)
// }

export const routes=[
    {path:'/home/',name:'Home',component:AdminHome},
    {path:'/admin-user/',name:'Admin-User',component:AdminUser},
    {path:'/post-list/',name:'Post List',component: PostList},
    {path:'/post-add/',name:'Post Add',component: PostNew},
];
