<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            <span v-if="status===1">
                                <i class='bx bx-plus' ></i> Add New Course
                            </span>
                            <span v-else-if="status===2">
                                <i class='bx bx-edit' ></i> Edit Course
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

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <vs-input v-model="request.postTitle"
                                  label="Course Title"
                                  placeholder="What's in your mind?">
                            <template #icon>
                                <i class='bx bx-book'></i>
                            </template>
                        </vs-input>
                    </vs-col>
                </vs-row>

                <br>

<!--                text : 1, image:2, video:3, audio:4-->
                <vs-row w="12">
                    <vs-col w="2">
                        <vs-radio primary v-model="request.postType" val="1">
                            Text
                        </vs-radio>
                    </vs-col>

                    <vs-col w="2">
                        <vs-radio success v-model="request.postType" val="2">
                            Image
                        </vs-radio>
                    </vs-col>

                    <vs-col w="3">
                        <vs-radio warn v-model="request.postType" val="3">
                            Video
                        </vs-radio>
                    </vs-col>

                    <vs-col w="2">
                        <vs-radio danger v-model="request.postType" val="4">
                            Audio
                        </vs-radio>
                    </vs-col>

                    <vs-col w="2">
                        <vs-radio danger v-model="request.postType" val="5">
                            Mix
                        </vs-radio>
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

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <ckeditor :editor="editor"
                                  v-model="request.postContent"
                                  :config="editorConfig"
                                  @ready="onEditorReady"
                                  @focus="onEditorFocus"
                                  @blur="onEditorBlur"
                                  @input="onEditorInput"></ckeditor>
                    </vs-col>
                </vs-row>
                <br>

                <vs-row w="12">
                    <vs-col w="12">
                        <file-pond
                            name="test"
                            ref="pond"
                            class-name="my-pond"
                            label-idle="Add Course Cover..."
                            v-bind:allow-multiple="false"
                            allowDrop="true"
                            allowPaste="true"
                            allowReplace="true"
                            allowRevert="true"
                            allowRemove="true"
                            allowFileEncode="true"
                            v-on:addfile="coverAdd"
                            accepted-file-types="image/jpeg, image/png, image/jpg"
                            v-on:removefile="coverRemove"
                        />
                    </vs-col>
                </vs-row>
                <br>

                <vs-row w="12">
                    <vs-col w="12">
                        <file-pond
                            name="test"
                            ref="pond"
                            class-name="my-pond"
                            label-idle="Add Course Playlist..."
                            v-bind:allow-multiple="true"
                            allowDrop="true"
                            allowPaste="true"
                            allowReplace="true"
                            allowRevert="true"
                            allowRemove="true"
                            allowFileEncode="true"
                            v-on:addfile="fileAdd"
                            accepted-file-types="video/mp4, audio/mp3, audio/mpeg"
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
                                <i class='bx bx-plus' ></i>Add New Course
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
                                <i class='bx bx-edit-alt' ></i> Edit Course
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
        fieldChar:"",
        request:{
            Uid:"",
            postTitle:"",
            postType:1,
            fieldId:"",
            postContent:"",
            postCover:"",
            attachments:[],
            price:"150 $"
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
        editor: ClassicEditor,
        editorConfig: {
            // The configuration of the editor.
        },
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
        onEditorReady(){
            // alert("ready")
            if(this.status===2){
                //todo:remove html tags (str.replace(/(<p[^>]+?>|<p>|<\/p>)/img, "")))
                let con=this.oldData["desc"].replace(/(<p[^>]+?>|<p>|<\/p>)/img, "");
                this.request.postContent="<p>"+con+"</p>";
            }
        },
        onEditorFocus(){
            // alert("focus")
        },
        onEditorBlur(){
            // alert("blur")
        },
        onEditorInput(){
            // alert("input")
        },
        addTopic(){
            if(JSON.stringify(this.request.Uid)!=="" && this.request.fieldId!==""
                && this.request.postTitle!=="" && this.request.postType!==""
                && this.request.postContent!=="" && this.request.postCover!==""){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'success',
                    opacity: 1,
                    color: '#fff'
                })

                axios.post('/admin-course/course'+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.openNotification('top-right', 'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            'Add New Course Successfully',
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
            this.path='/admin-course/course/'+this.id
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
                            "Edit Course Successfully",
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
        fileRemove:function () {
            this.imgUpload=false;
            this.request.attachments=[]
        },
        fileAdd:function (error,file){
            if (error) {
                console.log('Oh no');
                return;
            }

            //todo: 1000000 Byte = 1MB
            //todo: max size is 15MB
            if(file.fileSize <15000000){
                this.request.attachments.push(file.getFileEncodeDataURL());
                this.imgUpload=true;
            }
            else{
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Avatar size is large',
                    'Upload image with minimal of 15 MB...');
            }
        },
        coverAdd(error,file){
            if (error) {
                console.log('Oh no');
                return;
            }

            //todo: 1000000 Byte = 1MB
            //todo: max size is 15MB
            if(file.fileSize <6000000){
                this.request.postCover=file.getFileEncodeDataURL();
                this.imgUpload=true;
            }
            else{
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Cover size is large',
                    'Upload image with minimal of 6 MB...');
            }
        },
        coverRemove(){
            this.imgUpload=false;
            this.request.postCover=""
        }
    },
    mounted() {
        if(this.status===2){
            //todo:run any js can mounted
            this.request.postTitle=this.oldData["title"];
            //todo:remove html tags (str.replace(/(<p[^>]+?>|<p>|<\/p>)/img, "")))
            this.request.postType=this.oldData["type"];
            this.request.Uid=this.oldData["user_id"];
            this.request.fieldId=this.oldData["field_id"];
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
