const moduleRole = {
    state: () => ({
        guardsName:[],
        userRoles:[],
        userPermissions:[],
        rolesWithPermissions:[],
        usersWithRoles:[],
        allRoles:[],
    }),
    actions: {
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
    },
    mutations: {
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
    },
    getters: {
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
    }
}

export default moduleRole;
