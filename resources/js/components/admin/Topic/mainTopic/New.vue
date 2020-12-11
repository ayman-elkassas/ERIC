<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            <span v-if="status===1">
                                <i class='bx bx-plus' ></i> Add New Topic
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
                        v-model="request.Uid"
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
                    <vs-input v-model="request.topicName" placeholder="Topic name">
                        <template #icon>
                            <i class='bx bx-bomb'></i>
                        </template>
                    </vs-input>
                </vs-col>

            </vs-row>
                <br>
                <vs-row justify="space-between">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                        <vs-button
                            relief
                            block
                            success
                            ref="button1"
                            @click="addTopic()"
                        >
                            <i class='bx b-add' ></i> Add New Topic
                        </vs-button>
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
        request:{
            Uid:"",
            topicName:""
        },
        authInfo:{
            token:localStorage.getItem("token"),
            provider:localStorage.getItem("provider")
        },
        selectLoading:true,
        status:0,
    }),
    beforeCreate() {
        this.$store.dispatch("AllUserByName","a");
    },
    created() {
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
            if(JSON.stringify(this.request.Uid)!=="" && this.request.topicName!==""){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'success',
                    opacity: 1,
                    color: '#fff'
                })

                axios.post('/admin-topics/topics'+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.openNotification('top-right', 'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            'Add New Main Topic Successfully',
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
        }
    },
    mounted() {
    },
    watch:{
        char(newVal,oldVal){
            newVal===""?this.$store.dispatch("AllUserByName","a"):
                this.$store.dispatch("AllUserByName",newVal);

            this.selectLoading=true;
        }
    },
}

</script>

<style scoped>

</style>
