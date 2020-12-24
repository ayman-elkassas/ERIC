import moduleRole from './role_module/index'
import moduleAccount from './account_module/index'
import moduleTopic from './topic_module/index'
import modulePost from './post_module/index'
import moduleResourceTXT from './resourceTXT_module/index'
import moduleResourcePdf from './resourcePdf_module/index'
export default {
    actions:{
        // template(context){
        //     let request={token:"",provider:""};
        //
        //     //todo:call mutation and pass object data
        //     //todo:should make axios request to get user object
        //     //todo:make an api in back to return full user object
        //     if(localStorage.hasOwnProperty('token')
        //         && localStorage.hasOwnProperty('provider')){
        //
        //         request.token=localStorage.getItem("token");
        //         request.provider=localStorage.getItem("provider");
        //
        //         axios.get('/admin-members/roles?token='+request.token+
        //             '&provider='+request.provider)
        //             .then((response)=>{
        //                 context.commit('allRoles',response.data);
        //             })
        //             .catch((error)=>{
        //                 window.location='/admin/invalidToken';
        //             });
        //     }else{
        //         window.location='/admin/invalidToken';
        //     }
        // }
    },
    modules:{
        moduleRole,
        moduleAccount,
        moduleTopic,
        modulePost,
        moduleResourceTXT,
        moduleResourcePdf,
    }
}
