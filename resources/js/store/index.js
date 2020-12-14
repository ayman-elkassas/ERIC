export default {
    //todo:the main 5 core concepts
    state:{
        user:[],
        guardsName:[],
        userRoles:[],
        userPermissions:[],
        rolesWithPermissions:[],
        usersWithRoles:[],
        allRoles:[],
        allUsers:[],
        categoryWithFields:[],
        skills:[],
        topics:[],
        UserByCharFname:[],
        topicsCreatedByUser:[],
        fieldsUnderCategories:[],
        skillsOfUser:[],

    },
    getters:{
        getUser(state){
            //todo:fourth and last step return value of states
            return state.user;
        },
        getGuardsName(state){
            return state.guardsName;
        },
        getUserRoles(state){
            return state.userRoles;
        },
        getUserPermissions(state){
            return state.userPermissions;
        },
        getRolesWithPermissions(state){
            return state.rolesWithPermissions;
        },
        getUsersWithRoles(state){
            return state.usersWithRoles;
        },
        getAllRoles(state){
            return state.allRoles;
        },
        getAllUsers(state){
            return state.allUsers;
        },
        getCategoriesWithFields(state){
            return state.categoryWithFields;
        },
        getSkills(state){
            return state.skills;
        },
        getTopics(state){
            return state.topics;
        },
        getUserByCharFname(state){
            return state.UserByCharFname;
        },
        getUserTopics(state){
            return state.topicsCreatedByUser;
        },
        getFieldsUnderCategories(state){
            return state.fieldsUnderCategories;
        },
        getSkillsOfUser(state){
            return state.skillsOfUser;
        }
    },
    actions:{

        //todo:second step (backendApi)
        UserAllInfo(context){

            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){
                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");
                axios.post('/admin/user?token='+request.token+
                    '&provider='+request.provider,request)
                    .then((response)=>{
                        context.commit('currentUser',response.data.user);
                    })
                    .catch((error)=>{
                        alert("Token has Invalid");
                    });
            }
        },
        GuardsName(context){

            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){
                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");
                axios.get('/admin-mrole/manage-role/create?token='+request.token+
                    '&provider='+request.token)
                    .then((response)=>{
                        context.commit('guardsName',response.data);
                    })
                    .catch((error)=>{
                        alert("Token has Invalid");
                    });
            }
        },
        UserRoles(context){

            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){
                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");
                axios.get('/admin-mrole/manage-role?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('userRoles',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        UserPermissions(context){

            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-mpermission/manage-permission?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('userPermissions',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        RolesWithPermissions(context) {
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-mrole/all-roles-with-permission?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('rolesWithPermissions',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        UsersWithRoles(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-members/admins?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('usersWithRoles',response.data);
                    })
                    .catch((error)=>{
                        // alert("error")
                        window.location='/admin/invalidToken';
                    });
            }else{
                alert("error")
                window.location='/admin/invalidToken';
            }
        },
        AllRoles(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-members/roles?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allRoles',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllUsers(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/user-members/users?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allUsers',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllCategoriesWithFields(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/user-members/category?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('categoryWithFields',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllSkills(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/user-members/skill?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allSkills',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllTopics(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-topics/topics?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allTopics',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllUserByName(context,char){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/user-members/getUserByCharFromFName/'+char+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allUserByCharFname',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllUserCategory(context,id){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-topics/getTopics/'+id+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allCategoryOfUser',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllFieldsWithCategoriesUnder(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-fields/fields?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allFields',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllSkillsOfUser(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-skill/skills?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allSkillsUser',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        }
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
    mutations:{
        //todo:third call mutation (devTools) to set value to state of vars
        currentUser(state,data){
            return state.user=data;
        },
        guardsName(state,data){
            return state.guardsName=data;
        },
        userRoles(state,data){
            return state.userRoles=data;
        },
        userPermissions(state,data){
            return state.userPermissions=data;
        },
        rolesWithPermissions(state,data){
            return state.rolesWithPermissions=data;
        },
        usersWithRoles(state,data){
            return state.usersWithRoles=data;
        },
        allRoles(state,data){
            return state.allRoles=data;
        },
        allUsers(state,data){
            return state.allUsers=data;
        },
        categoryWithFields(state,data){
            return state.categoryWithFields=data;
        },
        allSkills(state,data){
            return state.skills=data;
        },
        allTopics(state,data){
            return state.topics=data;
        },
        allUserByCharFname(state,data){
            return state.UserByCharFname=data
        },
        allCategoryOfUser(state,data){
            return state.topicsCreatedByUser=data;
        },
        allFields(state,data){
            return state.fieldsUnderCategories=data;
        },
        allSkillsUser(state,data){
            return state.skillsOfUser=data;
        }
    },
    modules:{

    }
}
