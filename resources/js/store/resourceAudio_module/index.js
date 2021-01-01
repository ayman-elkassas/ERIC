const moduleResourceAudio = {
    state: () => ({
        resourceAudio:[]
    }),
    actions: {
        AllResourceAudio(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-audio/audio/'+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allResourceAudio',response.data);
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
        allResourceAudio(state,data){
            return state.resourceAudio=data;
        }
    },
    getters: {
        getAllResourceAudio(state){
            return state.resourceAudio;
        }
    }
}

export default moduleResourceAudio;
