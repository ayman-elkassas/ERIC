//todo:make routes refer to components
//todo:Home
import AdminHome from './components/admin/HomePage/AdminHome.vue'
//todo:MRoles
import MRoleList from './components/admin/Privilege/Roles/List.vue'
import MPermissionList from './components/admin/Privilege/Permissions/List.vue'
import MAssignP_T_R from './components/admin/Privilege/AssignP-T-R/List.vue'
//todo:Roles
import RoleList from './components/admin/Role/Roles/List.vue'
import PermissionList from './components/admin/Role/Permissions/List.vue'
//todo:Admin
import AdminList from './components/admin/User/AdminUser/List.vue'
//todo:User
import PublicUserList from './components/admin/User/PublicUser/List.vue'
import PublicUserNew from './components/admin/User/PublicUser/New.vue'
//todo:Post
import PostList from './components/admin/Post/List.vue'
import PostNew from './components/admin/Post/New.vue'
//todo:Field
import FieldList from './components/admin/Field/List'
import FieldNew from './components/admin/Field/New.vue'
//todo:Course
import CourseList from './components/admin/Course/List'
import CourseNew from './components/admin/Course/New'
import CourseDetails from './components/admin/Course/Details'
//todo:Resource - text
import ResourceTextList from './components/admin/Resource/Text/List'
import ResourceTextNew from './components/admin/Resource/Text/New'
//todo:Audio
import ResourceAudioList from './components/admin/Resource/Audio/List'
import ResourceAudioNew from './components/admin/Resource/Audio/New'
//todo:Auth
import Login from './components/admin/Authentication/Login'
import Register from './components/admin/Authentication/Register'
import MasterSeen from './components/admin/Authentication/MasterSeen'

export const routes=[
    //todo:Default
    {path:'/',name:'Home',component:AdminHome},
    //todo:Home
    {path:'/home/',name:'Home',component:AdminHome},
    //todo:Roles
    {path:'/admin-role/',name:'Admin List',component:RoleList},
    {path:'/admin-permission/',name:'Admin Add',component:PermissionList},
    //todo:Manage Roles
    {path:'/admin-mrole/',name:'Admin List',component:MRoleList},
    {path:'/admin-mpermission/',name:'Admin Add',component:MPermissionList},
    {path:'/admin-mrole-permission/',name:'Admin Add',component:MAssignP_T_R},
    //todo:Admin
    {path:'/admin-list/',name:'Admin List',component:AdminList},
    //todo:User
    {path:'/user-list/',name:'User List',component:PublicUserList},
    {path:'/user-new/',name:'User New',component:PublicUserNew},
    //todo:Post
    {path:'/post-list/',name:'Post List',component: PostList},
    {path:'/post-add/',name:'Post Add',component: PostNew},
    //todo:Field
    {path:'/field-list/',name:'Field List',component: FieldList},
    {path:'/field-add/',name:'Field Add',component: FieldNew},
    //todo:Course
    {path:'/course-list/',name:'Course List',component: CourseList},
    {path:'/course-add/',name:'Course Add',component: CourseNew},
    {path:'/course-details/',name:'Course Details',component:CourseDetails },
    //todo:Resource-text
    {path:'/resource-text-list/',name:'Resource Text List',component:ResourceTextList },
    {path:'/resource-text-add/',name:'Resource Text Add',component:ResourceTextNew },
    //todo:Resource-audio
    {path:'/resource-voice-list/',name:'Resource Audio List',component:ResourceAudioList },
    {path:'/resource-voice-add/',name:'Resource Audio Add',component:ResourceAudioNew},
    //todo:Auth
    {path:'/auth-login',name:'auth-login',components:{
            default: Login,
            login:Login
    }},
    {path:'/auth-register/',name:'auth-register',components: {
            default: Register,
            login:Register
    }},
    {path:'/master-seen/',name:'master-seen',components:{
            default:MasterSeen,
            master:MasterSeen
    }},

];
