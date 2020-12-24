const moduleResourceImage = {
    state: () => ({
        resourceImage:[]
    }),
    actions: {
        AllResourceImage(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-image/image/'+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allResourceImage',response.data);
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
        allResourceImage(state,data){
            return state.resourceImage=data;
        }
    },
    getters: {
        getAllResourceImage(state){
            return state.resourceImage;
        }
    }
}

export default moduleResourceImage;
