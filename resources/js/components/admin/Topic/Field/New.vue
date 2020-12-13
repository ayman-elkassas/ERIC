<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            <span v-if="status===1">
                                <i class='bx bx-plus' ></i> Add New Field
                            </span>
                            <span v-else-if="status===2">
                                <i class='bx bx-edit' ></i> Edit Topic
                            </span>
                        </template>
                        Admin can control between all users can share any information
                    </vs-alert>
                </div>
            </template>
        </div>
        <div class="card-body">

            <div class="center grid">

                <vs-row v-if="status===2" justify="space-around">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <vs-avatar size="70" history success>
                            <img :src="avatar" alt="">
                        </vs-avatar>
                    </vs-col>
                </vs-row>
                <br>
                <br>

                <vs-row justify="space-around">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">

                        <vs-input
                            label="User Creator Name"
                            v-model="char" placeholder="Search By User Name...">
                            <template #icon>
                                <i class='bx bx-search'></i>
                            </template>
                        </vs-input>

                        <vs-select
                            filter
                            v-model="Uid"
                            placeholder="User Name"
                            :loading="selectLoading"
                        >
                            <vs-option-group>
                                <div slot="title">
                                    Users
                                </div>
                                <vs-option v-for="user in getUserByChar" :label="user.fname" key="0" :value="user.id">
                                    <vs-avatar size="25">
                                        <img :src="user.avatar" alt="">
                                    </vs-avatar> &nbsp;&nbsp; {{user.fname}} {{user.lname}}
                                </vs-option>
                            </vs-option-group>
                        </vs-select>
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="2">
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                        <vs-input v-model="request.fieldName" placeholder="Field Name">
                            <template #icon>
                                <i class='bx bx-bomb'></i>
                            </template>
                        </vs-input>
                        <br>
                        <vs-select
                            filter
                            v-model="request.categoryId"
                            placeholder="Category Name"
                            :loading="selectLoading2"
                        >
                            <vs-option-group>
                                <div slot="title">
                                    Select Category Added Under
                                </div>
                                <vs-option v-for="category in getCategoryOfUser" :label="category.name" key="0" :value="category.id">
                                    {{category.name}}
                                </vs-option>
                            </vs-option-group>
                        </vs-select>

                    </vs-col>

                </vs-row>
                <br>
                <vs-row justify="space-between">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                        <div v-if="status===1">
                            <vs-button
                                relief
                                block
                                success
                                ref="button1"
                                @click="addTopic()"
                            >
                                <i class='bx bx-plus' ></i>Add New Topic
                            </vs-button>
                        </div>
                        <div v-else>
                            <vs-button
                                relief
                                block
                                primary
                                ref="button1"
                                @click="editTopic()"
                            >
                                <i class='bx bx-edit-alt' ></i> Edit Topic
                            </vs-button>
                        </div>
                    </vs-col>
                </vs-row>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    name: "New",
    data: () => ({
        char:"",
        Uid:"",
        request:{
            Uid:"",
            fieldName:"",
            categoryId:""
        },
        authInfo:{
            token:localStorage.getItem("token"),
            provider:localStorage.getItem("provider")
        },
        selectLoading:true,
        selectLoading2:true,
        status:0,
        avatar:"",
        oldData:[],
        id:0,
    }),
    beforeCreate() {
        this.$store.dispatch("AllUserByName","a");
        this.$store.dispatch("AllUserCategory","1");
    },
    created() {
        this.status=this.$route.params.status;
        if(this.status===2){
            this.id=this.$route.params.id
            this.avatar=this.$route.params.avatar
            this.oldData=this.$route.params.data
        }
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    computed:{
        getUserByChar(){
            //todo:last step render value to component
            const allUsers=this.$store.getters.getUserByCharFname;
            allUsers.length>0?this.selectLoading=false:null;
            return allUsers;
        },
        getCategoryOfUser(){
            //todo:last step render value to component
            const allCategory=this.$store.getters.getUserTopics;
            allCategory.length>0?this.selectLoading2=false:null;
            return allCategory;
        }
    },
    methods: {
        openNotification(position = null, border,icon,title,text) {
            const noti = this.$vs.notification({
                border,
                icon,
                position,
                title: title,
                text: text
            })
        },
        addTopic(){
            this.request.Uid=this.Uid;
            if(JSON.stringify(this.request.Uid)!=="" && this.request.fieldName!==""){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'success',
                    opacity: 1,
                    color: '#fff'
                })

                debugger

                axios.post('/admin-fields/fields'+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.openNotification('top-right', 'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            'Add New Field Topic Successfully',
                            'New Admin added with rules and permissions');
                        loading.close();
                    })
                    .catch((error)=>{
                        this.openNotification('top-right', 'danger',
                            `<i class='bx bxs-bug' ></i>`,
                            'Make Sure From Inputs',
                            "Inputs invalid make sure from inputs...");
                        loading.close();
                    });
            }
        },
        editTopic(){
            this.path='/admin-topics/topics/'+this.id
            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'primary',
                    opacity: 1,
                    color: '#fff'
                })

                axios.put(this.path+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.openNotification('top-right',
                            'primary',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Edit User Successfully",
                            "New user will be able to handle new permission and assign users...");
                        loading.close();
                    })
                    .catch((error)=>{
                        this.openNotification('top-right',
                            'danger',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Invalid insert New User Successfully",
                            "New user will be able to handle new permission and assign users...");
                        loading.close();
                    });
            }
            else{
                window.location='/admin/invalidToken';
            }
        },
        performDelete(){

            const loading = this.$vs.loading({
                target: this.$refs.button3,
                scale: '0.6',
                background: 'danger',
                opacity: 1,
                color: '#fff'
            })

            axios.delete('/user-members/users/'+(this.id)+'?token='+this.authInfo.token+
                '&provider='+this.authInfo.provider)
                .then((response)=>{
                    if(response.data!=="error"){
                        loading.close();
                        this.openNotification('top-right',
                            'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Role Is Deleted Successfully",
                            "Can add new role will be able to handle new permission and assign users...");
                        this.active_ensure=false;
                        this.refresh();
                        $('.vs-table__tr__expand').hide();
                    }
                    else{
                        this.openNotification('top-right',
                            'danger',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Error In Remove",
                            "Can add new role will be able to handle new permission and assign users...");
                        this.active_ensure=false
                    }
                })
                .catch((error)=>{
                    window.location='/admin/invalidToken';
                });
        },
    },
    mounted() {
        if(this.status===2){
            //todo:run any js can mounted
            this.request.topicName=this.oldData["name"];
            this.request.Uid=this.oldData["category_user"].id;
        }
    },
    watch:{
        char(newVal,oldVal){
            newVal===""?this.$store.dispatch("AllUserByName","a"):
                this.$store.dispatch("AllUserByName",newVal);

            this.selectLoading=true;
        },
        Uid(newVal,oldVal){
            newVal===""?this.$store.dispatch("AllUserCategory","1"):
                this.$store.dispatch("AllUserCategory",newVal);

            this.selectLoading2=true;
        },
    },
}

</script>

<style scoped>

</style>
