//todo:make routes refer to components
//todo:Home
import AdminHome from './components/admin/HomePage/AdminHome.vue'
//todo:MRoles
import MRoleList from './components/admin/Privilege/Roles/List.vue'
import MPermissionList from './components/admin/Privilege/Permissions/List.vue'
import MAssignP_T_R from './components/admin/Privilege/AssignP-T-R/List.vue'
//todo:Admin
import AdminList from './components/admin/User/AdminUser/List.vue'
//todo:User
import PublicUserList from './components/admin/User/PublicUser/List.vue'
import PublicUserNew from './components/admin/User/PublicUser/New.vue'
//todo:Main Topic
import TopicList from './components/admin/Topic/mainTopic/List'
import TopicNew from './components/admin/Topic/mainTopic/New.vue'
//todo:Field Under Topic
import FieldList from './components/admin/Topic/Field/List'
import FieldNew from './components/admin/Topic/Field/New'
//todo:Skill
import SkillList from './components/admin/Topic/Skill/List'
import SkillNew from './components/admin/Topic/Skill/New'
//todo:Post
import PostList from './components/admin/Post/List.vue'
import PostNew from './components/admin/Post/New.vue'
//todo:Resource - Text
import ResourceTextList from './components/admin/Resource/Text/List'
import ResourceTextNew from './components/admin/Resource/Text/New'
//todo:Resource - Pdf
import ResourcePdfList from './components/admin/Resource/Pdf/List'
import ResourcePdfNew from './components/admin/Resource/Pdf/New'
//todo:Resource - Image
import ResourceImageList from './components/admin/Resource/Image/List'
import ResourceImageNew from './components/admin/Resource/Image/New'
//todo:Resource - Image
import ResourceVideoList from './components/admin/Resource/Video/List'
import ResourceVideoNew from './components/admin/Resource/Video/New'
//todo:Course
import CourseList from './components/admin/Course/List'
import CourseNew from './components/admin/Course/New'
import CourseDetails from './components/admin/Course/Details'
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
    //todo:Manage Roles
    {path:'/admin-mrole/',name:'Admin List',component:MRoleList},
    {path:'/admin-mpermission/',name:'Admin Add',component:MPermissionList},
    {path:'/admin-mrole-permission/',name:'Admin Add',component:MAssignP_T_R},
    //todo:Admin
    {path:'/admin-list/',name:'Admin List',component:AdminList},
    //todo:User
    {path:'/user-list/',name:'User List',component:PublicUserList},
    {path:'/user-new/',name:'user-new',component:PublicUserNew},
    //todo:Topic
    {path:'/topic-list/',name:'Topic List',component: TopicList},
    {path:'/topic-add/',name:'topic-add',component: TopicNew},
    //todo:Field
    {path:'/field-list/',name:'Field List',component: FieldList},
    {path:'/field-new/',name:'field-new',component: FieldNew},
    //todo:Field
    {path:'/skill-list/',name:'Skill List',component: SkillList},
    {path:'/skill-new/',name:'skill-new',component: SkillNew},
    //todo:Post
    {path:'/post-list/',name:'post-list',component: PostList},
    {path:'/post-new/',name:'post-new',component: PostNew},
    //todo:Resource-text
    {path:'/text-list/',name:'text-list',component:ResourceTextList },
    {path:'/text-new/',name:'text-new',component:ResourceTextNew },
    //todo:Resource-pdf
    {path:'/pdf-list/',name:'pdf-list',component:ResourcePdfList },
    {path:'/pdf-new/',name:'pdf-new',component:ResourcePdfNew },
    //todo:Resource-image
    {path:'/image-list/',name:'image-list',component:ResourceImageList },
    {path:'/image-new/',name:'image-new',component:ResourceImageNew },
    //todo:Resource-image
    {path:'/video-list/',name:'video-list',component:ResourceVideoList },
    {path:'/video-new/',name:'video-new',component:ResourceVideoNew },
    //todo:Course
    {path:'/course-list/',name:'Course List',component: CourseList},
    {path:'/course-add/',name:'Course Add',component: CourseNew},
    {path:'/course-details/',name:'Course Details',component:CourseDetails },
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
