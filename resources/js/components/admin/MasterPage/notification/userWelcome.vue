<template>
    <div class="center grid">
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="2">
                <vs-avatar history primary badge badge-color="success">
                    <img :src="currentUser.avatar" alt="E">
                    <template #badge>
                        28
                    </template>
                </vs-avatar>
            </vs-col>
            <vs-col vs-justify="center" vs-align="center" w="10">

                <p style="color:#1f60ff;font-weight: bold" v-for="role in currentUser.role" class="username">
                    <span v-if="role === 'super_admin'">
                            Super Administrator
                    </span>
                    <span v-else-if="role==='admin'" class="mb-0 font-roboto">
                            Local Administrator
                    </span>
                    <span v-else-if="role==='user'" class="mb-0 font-roboto">
                            Local User
                    </span>
                    <span v-else class="mb-0 font-roboto">
                            Admin
                    </span>
                </p>
            </vs-col>
        </vs-row>
        <br>

        <vs-row>
            <vs-col style="color:#46c93a" vs-type="flex" vs-justify="center" vs-align="center" w="12">
                Welcome {{ currentUser.name }}
            </vs-col>
        </vs-row>

        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                Login Successfully And Welcome To Your Dashboard...
            </vs-col>
        </vs-row>

    </div>
</template>

<script>
export default {
    name: "userWelcome",
    data(){
      return{
          currentUser:[],
      }
    },
    mounted(){
        this.getCurrentUser();
    },
    methods:{
        getCurrentUser(){
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
                        this.currentUser=response.data.user;
                    })
                    .catch((error)=>{
                        alert("Token has Invalid");
                    });
            }
        },
    }
}
</script>

<style scoped>

.username{
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}

</style>
