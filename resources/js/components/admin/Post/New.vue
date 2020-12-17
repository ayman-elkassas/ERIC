<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            <span v-if="status===1">
                                <i class='bx bx-plus' ></i> Add New Post
                            </span>
                            <span v-else-if="status===2">
                                <i class='bx bx-edit' ></i> Edit Post
                            </span>
                        </template>
                        Admin can control between all users can share any information
                    </vs-alert>
                </div>
            </template>
        </div>
        <div class="card-body">

            <div class="center grid">

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
                </vs-row>

                <br>
                <br>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <vs-input v-model="request.fieldName"
                                  label="Post Title"
                                  placeholder="What's in your mind?">
                            <template #icon>
                                <i class='bx bx-book'></i>
                            </template>
                        </vs-input>
                    </vs-col>
                </vs-row>

                <br>

                <vs-row w="12">
                    <vs-col w="3">
                        <vs-radio primary v-model="picked" val="1">
                            Text
                        </vs-radio>
                    </vs-col>

                    <vs-col w="3">
                        <vs-radio success v-model="picked" val="2">
                            Image
                        </vs-radio>
                    </vs-col>

                    <vs-col w="3">
                        <vs-radio warn v-model="picked" val="3">
                            Video
                        </vs-radio>
                    </vs-col>

                    <vs-col w="3">
                        <vs-radio danger v-model="picked" val="4">
                            Audio
                        </vs-radio>
                    </vs-col>
                </vs-row>

                <br>

                <vs-row w="12">
                    <vs-col w="12">
                        <vs-select
                            filter
                            v-model="request.categoryId"
                            placeholder="Field Name"
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

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <ckeditor :editor="editor"
                                  v-model="editorData"
                                  :config="editorConfig"
                                  @ready="onEditorReady"
                                  @focus="onEditorFocus"
                                  @blur="onEditorBlur"
                                  @input="onEditorInput"></ckeditor>
                    </vs-col>
                </vs-row>

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
                        <file-pond
                            name="test"
                            ref="pond"
                            class-name="my-pond"
                            label-idle="Add Attachments..."
                            v-bind:allow-multiple="true"
                            allowDrop="true"
                            allowPaste="true"
                            allowReplace="true"
                            allowRevert="true"
                            allowRemove="true"
                            maxFiles="5"
                            allowFileEncode="true"
                            v-on:addfile="fileAdd"
                            v-on:removefile="fileRemove"
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
                                <i class='bx bx-edit-alt' ></i> Edit Field
                            </vs-button>
                        </div>
                    </vs-col>
                </vs-row>
            </div>
        </div>
    </div>

</template>

<script>

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import * as FilePond from "filepond";
import FilePondPluginMediaPreview from "filepond-plugin-media-preview";

FilePond.registerPlugin(FilePondPluginMediaPreview);

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
        picked:2,
        selectLoading:true,
        selectLoading2:true,
        status:0,
        avatar:"",
        oldData:[],
        id:0,
        editor: ClassicEditor,
        editorData: '<p>Edit your content.</p>',
        editorConfig: {
            // The configuration of the editor.
        },
        onEditorReady(){
            // alert("ready")
        },
        onEditorFocus(){
            // alert("focus")
        },
        onEditorBlur(){
            // alert("blur")
        },
        onEditorInput(){
            // alert("input")
        }
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
            this.request.Uid=this.Uid;
            if(JSON.stringify(this.request.Uid)!=="" && this.request.fieldName!==""){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'success',
                    opacity: 1,
                    color: '#fff'
                })

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
            this.path='/admin-fields/fields/'+this.id
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
        fileRemove:function () {
            this.imgUpload=false;
            this.request.avatar=''
        },
        fileAdd:function (error,file){
            if (error) {
                console.log('Oh no');
                return;
            }

            if(file.fileSize <5000000){
                this.request.avatar=file.getFileEncodeDataURL();
                this.imgUpload=true;
            }
            else{
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Avatar size is large',
                    'Upload image with minimal of 6 MB...');
            }
        },
    },
    mounted() {
        if(this.status===2){
            //todo:run any js can mounted
            this.request.fieldName=this.oldData["name"];
            debugger;
            this.request.fieldName=this.oldData["name"];
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
    components:{
        FilePondPluginMediaPreview
    },
}

</script>

<style scoped>

</style>
