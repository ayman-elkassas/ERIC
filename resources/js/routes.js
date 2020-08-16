//todo:make routes refer to components
import AdminHome from './components/admin/AdminHome.vue'
import AdminUser from './components/admin/AdminUser.vue'
import PostList from './components/admin/post/List.vue'
import PostNew from './components/admin/post/New.vue'

export const routes=[
    {path:'/home/',component:AdminHome},
    {path:'/admin-user/',component:AdminUser},
    {path:'/post-list/',component:PostList},
    {path:'/post-add/',component:PostNew},
];
