const moduleResourcePdf = {
    state: () => ({
        resourcePdf:[]
    }),
    actions: {
        AllResourcePdf(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-pdf/pdf/'+'?token='+request.token+
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
            return state.resourcePdf=data;
        }
    },
    getters: {
        getAllResourcePdf(state){
            return state.resourcePdf;
        }
    }
}

export default moduleResourcePdf;
