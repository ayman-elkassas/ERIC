<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            <span v-if="status===1">
                                <i class='bx bx-plus' ></i> Add New Playlist
                            </span>
                            <span v-else-if="status===2">
                                <i class='bx bx-edit' ></i> Edit Playlist
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

                <vs-row w="12">
                    <vs-col w="12">
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
                </vs-row>

                <br>
                <br>
                <vs-row w="12">
                    <vs-col w="12">

                        <vs-input
                            label="Field Name"
                            v-model="fieldChar" placeholder="Search By Field Name...">
                            <template #icon>
                                <i class='bx bx-search'></i>
                            </template>
                        </vs-input>

                        <vs-select
                            filter
                            v-model="request.fieldId"
                            placeholder="Field Name"
                            :loading="selectLoading2"
                        >
                            <vs-option-group>
                                <div slot="title">
                                    Select Field
                                </div>
                                <vs-option v-for="field in getFieldByName" :label="field.name" key="0" :value="field.id">
                                    {{field.name}}
                                </vs-option>
                            </vs-option-group>
                        </vs-select>
                    </vs-col>
                </vs-row>
                <br>
                <br>
                <vs-row w="12">
                    <vs-col w="12">
                        <vs-input
                            label="Resource Title"
                            v-model="request.desc" placeholder="Write Album Title Here...">
                            <template #icon>
                                <i class='bx bx-book'></i>
                            </template>
                        </vs-input>
                    </vs-col>
                </vs-row>
                <br>
                <vs-row w="12">
                    <vs-col w="12">
                        <vs-input
                            label="Resource Description"
                            v-model="request.overviewDesc" placeholder="Write Album Description Here...">
                            <template #icon>
                                <i class='bx bx-book'></i>
                            </template>
                        </vs-input>
                    </vs-col>
                </vs-row>
                <br>

<!--                pdf resource type 2-->
                <vs-row w="12">
                    <vs-col w="12">
                        <file-pond
                            name="test"
                            ref="pond"
                            class-name="my-pond"
                            label-idle="Add Playlist..."
                            v-bind:allow-multiple="true"
                            allowDrop="true"
                            allowPaste="true"
                            allowReplace="true"
                            allowRevert="true"
                            allowRemove="true"
                            allowFileEncode="true"
                            v-on:addfile="albumAdd"
                            accepted-file-types="video/mp4"
                            v-on:removefile="albumRemove"
                        />
                    </vs-col>
                </vs-row>

                <vs-row justify="space-between">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <div v-if="status===1">
                            <vs-button
                                relief
                                block
                                success
                                ref="button1"
                                @click="addTopic()"
                            >
                                <i class='bx bx-plus' ></i>Add New Playlist
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
                                <i class='bx bx-edit-alt' ></i> Edit Playlist
                            </vs-button>
                        </div>
                    </vs-col>
                </vs-row>
            </div>
        </div>
    </div>

</template>

<script>

import * as FilePond from "filepond";
import FilePondPluginMediaPreview from "filepond-plugin-media-preview";

FilePond.registerPlugin(FilePondPluginMediaPreview);

export default {
    name: "New",
    data: () => ({
        char:"",
        fieldChar:"",
        request:{
            Uid:"",
            resourceType:4,
            fieldId:"",
            Album:[],
            desc:"",
            overviewDesc:""
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
        this.$store.dispatch("AllFieldsByName","m");
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
        getFieldByName(){
            //todo:last step render value to component
            const allFields=this.$store.getters.getFieldByCharName;
            allFields.length>0?this.selectLoading2=false:null;
            return allFields;
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
            if(this.request.Uid!=="" && this.request.fieldId!==""
                && this.request.resourceType!==""
                && JSON.stringify(this.request.Album)!==""){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'success',
                    opacity: 1,
                    color: '#fff'
                })

                axios.post('/admin-image/image'+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.openNotification('top-right', 'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            'Add New Playlist Successfully',
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
            }else {
                this.openNotification('top-right', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Make Sure From Inputs',
                    "Inputs invalid make sure from inputs...");
                loading.close();
            }
        },
        editTopic(){
            this.path='/admin-image/image/'+this.id
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
                            "Edit Playlist Successfully",
                            "New user will be able to handle new permission and assign users...");
                        loading.close();
                    })
                    .catch((error)=>{
                        this.openNotification('top-right',
                            'danger',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Invalid insert New Post",
                            "New user will be able to handle new permission and assign users...");
                        loading.close();
                    });
            }
            else{
                window.location='/admin/invalidToken';
            }
        },
        albumAdd(error,file){
            if (error) {
                console.log('Oh no');
                return;
            }

            //todo: 1000000 Byte = 1MB
            //todo: max size is 15MB
            if(file.fileSize <60000000){
                this.request.Album.push(file.getFileEncodeDataURL());
                this.imgUpload=true;
            }
            else{
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Cover size is large',
                    'Upload image with minimal of 6 MB...');
            }
        },
        albumRemove(){
            this.imgUpload=false;
            this.request.Album=[]
        }
    },
    mounted() {
        if(this.status===2){
            //todo:run any js can mounted
            this.request.Uid=this.oldData["user_id"];
            this.request.fieldId=this.oldData["field_id"];
            this.request.desc=this.oldData["desc"];
            this.request.overviewDesc=this.oldData["overviewDesc"];
        }
    },
    watch:{
        char(newVal,oldVal){
            newVal===""?this.$store.dispatch("AllUserByName","a"):
                this.$store.dispatch("AllUserByName",newVal);

            this.selectLoading=true;
        },
        fieldChar(newVal,oldVal){
            newVal===""?this.$store.dispatch("AllFieldsByName","m"):
                this.$store.dispatch("AllFieldsByName",newVal);

            this.selectLoading2=true;
        },
    },
    components:{
        FilePondPluginMediaPreview
    },
}

</script>

<style scoped>

</style>
