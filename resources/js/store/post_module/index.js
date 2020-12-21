const modulePost = {
    state: () => ({
        allFieldByName:[],
        allPost:[],
    }),
    actions: {
        AllFieldsByName(context,fieldChar){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-post/getFieldsByCharFromName/'+fieldChar+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allFieldByCharName',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllPost(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-post/posts/'+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allPost',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        }
    },
    mutations: {
        allFieldByCharName(state,data){
            return state.allFieldByName=data;
        },
        allPost(state,data){
            return state.allPost=data;
        }
    },
    getters: {
        getFieldByCharName(state){
            //todo:fourth and last step return value of states
            return state.allFieldByName;
        },
        getAllPost(state){
            return state.allPost;
        }
    }
}

export default modulePost;
