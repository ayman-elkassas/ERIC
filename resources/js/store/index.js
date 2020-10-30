export default {
    //todo:the main 5 core concepts
    state:{
        user:[],
        guardsName:[]
    },
    getters:{
        getUser(state){
            //todo:fourth and last step return value of states
            return state.user;
        },
        getGuardsName(state){
            return state.guardsName;
        },
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
            //axios

            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){
                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");
                axios.get('/admin-mrole/manage-role/create?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('guardsName',response.data);
                    })
                    .catch((error)=>{
                        alert("Token has Invalid");
                    });
            }
        }
    },
    mutations:{
        //todo:third call mutation (devTools) to set value to state of vars
        currentUser(state,data){
            return state.user=data;
        },
        guardsName(state,data){
            return state.guardsName=data;
        },
    },
    modules:{

    }
}
