const moduleAccount = {
    state: () => ({
        user:[],
        allUsers:[],
        UserByCharFname:[],
    }),

    actions: {
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
    },
    mutations: {
        //todo:third call mutation (devTools) to set value to state of vars
        currentUser(state,data){
            return state.user=data;
        },
        allUsers(state,data){
            return state.allUsers=data;
        },
        allUserByCharFname(state,data){
            return state.UserByCharFname=data
        },
    },
    getters: {
        getUser(state){
            //todo:fourth and last step return value of states
            return state.user;
        },
        getAllUsers(state){
            return state.allUsers;
        },
        getUserByCharFname(state){
            return state.UserByCharFname;
        },
    }
}

export default moduleAccount;
