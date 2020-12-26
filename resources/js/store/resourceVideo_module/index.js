const moduleResourceVideo = {
    state: () => ({
        resourceVideo:[]
    }),
    actions: {
        AllResourceVideo(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-video/video/'+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allResourceVideo',response.data);
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
        allResourceVideo(state,data){
            return state.resourceVideo=data;
        }
    },
    getters: {
        getAllResourceVideo(state){
            return state.resourceVideo;
        }
    }
}

export default moduleResourceVideo;
