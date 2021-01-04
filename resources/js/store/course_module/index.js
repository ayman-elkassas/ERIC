const moduleCourse = {
    state: () => ({
        allFieldByName:[],
        allCourse:[],
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
        AllCourse(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-course/course/'+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allCourse',response.data);
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
        allCourse(state,data){
            return state.allCourse=data;
        }
    },
    getters: {
        getFieldByCharName(state){
            //todo:fourth and last step return value of states
            return state.allFieldByName;
        },
        getAllCourse(state){
            return state.allCourse;
        }
    }
}

export default moduleCourse;
