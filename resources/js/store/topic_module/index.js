const moduleTopic = {
    state: () => ({
        categoryWithFields:[],
        skills:[],
        topics:[],
        topicsCreatedByUser:[],
        fieldsUnderCategories:[],
        skillsOfUser:[],
    }),
    actions: {
        AllCategoriesWithFields(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/user-members/category?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('categoryWithFields',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllSkills(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/user-members/skill?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allSkills',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllTopics(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-topics/topics?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allTopics',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },

        AllUserCategory(context,id){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-topics/getTopics/'+id+'?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allCategoryOfUser',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllFieldsWithCategoriesUnder(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-fields/fields?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allFields',response.data);
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }else{
                window.location='/admin/invalidToken';
            }
        },
        AllSkillsOfUser(context){
            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");

                axios.get('/admin-skill/skills?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        context.commit('allSkillsUser',response.data);
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
        categoryWithFields(state,data){
            return state.categoryWithFields=data;
        },
        allSkills(state,data){
            return state.skills=data;
        },
        allTopics(state,data){
            return state.topics=data;
        },

        allCategoryOfUser(state,data){
            return state.topicsCreatedByUser=data;
        },
        allFields(state,data){
            return state.fieldsUnderCategories=data;
        },
        allSkillsUser(state,data){
            return state.skillsOfUser=data;
        }
    },
    getters: {
        getCategoriesWithFields(state){
            return state.categoryWithFields;
        },
        getSkills(state){
            return state.skills;
        },
        getTopics(state){
            return state.topics;
        },

        getUserTopics(state){
            return state.topicsCreatedByUser;
        },
        getFieldsUnderCategories(state){
            return state.fieldsUnderCategories;
        },
        getSkillsOfUser(state){
            return state.skillsOfUser;
        }
    }
}

export default moduleTopic;
