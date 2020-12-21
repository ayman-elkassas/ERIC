const moduleResourceTXT = {
    state: () => ({
        resourceTxt:[]
    }),
    actions: {
        AllResourceTxt(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-txt/txt/'+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allResourceTxt',response.data);
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
        allResourceTxt(state,data){
            return state.resourceTxt=data;
        }
    },
    getters: {
        getAllResourceTxt(state){
            return state.resourceTxt;
        }
    }
}

export default moduleResourceTXT;
