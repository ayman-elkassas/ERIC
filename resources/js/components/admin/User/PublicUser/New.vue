<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            Add New User
                        </template>
                        Admin can control between all users can share any information
                    </vs-alert>
                </div>
            </template>
        </div>
        <div class="card-body">

            <div class="center grid">

            <vs-row justify="space-around">
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                    <vs-input v-model="request.fname" placeholder="First name">
                        <template #icon>
                            <i class='bx bx-user'></i>
                        </template>
                    </vs-input>
                </vs-col>
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="2">
                </vs-col>
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                    <vs-input v-model="request.lname" placeholder="Last name">
                        <template #icon>
                            <i class='bx bx-user'></i>
                        </template>
                    </vs-input>
                </vs-col>
            </vs-row>
                <br>
            <vs-row justify="space-between">
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                    <vs-input v-model="request.email" placeholder="eric@gmail.com">
                        <template #icon>
                            <i class='bx bx-message'></i>
                        </template>
                        <template v-if="validEmail" #message-success>
                            Email Valid
                        </template>
                        <template v-else #message-danger>
                            Email Invalid
                        </template>
                        <template v-if="request.email===''" #message-danger>
                            Required
                        </template>
                    </vs-input>
                </vs-col>
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="2">
                </vs-col>
                <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                    <vs-input
                        type="password"
                        v-model="request.password"
                        label="Password Account"
                        placeholder="password"
                        :progress="getProgress">
                        <template #icon>
                            <i class='bx bx-lock-open'></i>
                        </template>

                        <template v-if="getProgress >= 100" #message-success>
                            Secure password
                        </template>

                        <template v-if="getProgress < 40" #message-danger>
                            A special character-More than 6 digits-One lower case letter-An uppercase letter-A number
                        </template>

                    </vs-input>
                </vs-col>
            </vs-row>
                <br>
                <vs-row justify="space-between">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                        <vs-input
                            type="number"
                            v-model="request.phone"
                            placeholder="phone no."
                        >
                            <template #icon>
                                <i class='bx bx-phone'></i>
                            </template>
                        </vs-input>

                        <br>

                        <vs-select
                            filter
                            multiple
                            placeholder="Follow Fields"
                            v-model="request.fields"
                            :loading="selectLoading"
                        >
                            <vs-option-group
                                v-for="(category,key) in getAllCategoriesWithFields"
                                :key="key" :value="category">
                                <div slot="title">
                                    {{category.name}}
                                </div>
                                <vs-option
                                    v-for="(field,key) in category.fields_under"
                                    :key="key" :value="field.name"
                                    :label="field.name"
                                >
                                    {{field.name}}
                                </vs-option>
                            </vs-option-group>
                        </vs-select>

                        <br>

                        <vs-select
                            filter
                            multiple
                            placeholder="Your Skills"
                            v-model="request.skills"
                        >
                            <vs-option
                                v-for="(skill,key) in getAllSkills"
                                :key="key" :value="skill.name"
                                :label="skill.name"
                            >
                                {{skill.name}}
                            </vs-option>

                        </vs-select>

                        <vs-button
                            relief
                            block
                            success
                            ref="button1"
                            @click="addUser()"
                        >
                            <i class='bx bx-plus' ></i>Add User
                        </vs-button>


                    </vs-col>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="2">
                    </vs-col>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="5">
                        <file-pond
                            name="test"
                            ref="pond"
                            class-name="my-pond"
                            label-idle="Add Avatar..."
                            v-bind:allow-multiple="true"
                            allowDrop="true"
                            allowPaste="true"
                            allowReplace="true"
                            allowRevert="true"
                            allowRemove="true"
                            maxFiles="1"
                            accepted-file-types="image/jpeg, image/png, image/jpg"
                            allowFileEncode="true"
                            v-on:init="handleFilePondInit"
                            v-on:addfile="fileAdd"
                            v-on:removefile="fileRemove"
                        />
                    </vs-col>
                </vs-row>
            </div>
        </div>
    </div>

</template>

<script>

//todo:file upload (filePond)
// Import Vue FilePond
import vueFilePond from 'vue-filepond';
// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileEncode from 'filepond-plugin-file-encode';

// Create component
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview,FilePondPluginFileEncode);

export default {
    name: "New",
    data: () => ({
        dataF:[],
        dataS:[],
        request:{
            fname:"",
            lname:"",
            email:"",
            password:"",
            phone:"",
            avatar:"",
            fields:[],
            skills:[]
        },
        authInfo:{
            token:localStorage.getItem("token"),
            provider:localStorage.getItem("provider")
        },
        emailValid:false,
        passwordValid:0,
        selectLoading:true,
    }),
    beforeCreate() {
        this.$store.dispatch("AllCategoriesWithFields");
        this.$store.dispatch("AllSkills");
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    computed:{
        getAllCategoriesWithFields(){
            //todo:last step render value to component
            const categoriesWithFields=this.$store.getters.getCategoriesWithFields;
            this.dataF=categoriesWithFields;
            if(this.dataF.length>0){
                this.selectLoading=false;
            }
            return categoriesWithFields;
        },
        getAllSkills(){
            //todo:last step render value to component
            const allSkills=this.$store.getters.getSkills;
            this.dataS=allSkills;
            return allSkills;
        },
        validEmail() {
            this.emailValid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.request.email)
            return this.emailValid;
        },
        getProgress() {
            let progress = 0

            // at least one number

            if (/\d/.test(this.request.password)) {
                progress += 20
            }

            // at least one capital letter

            if (/(.*[A-Z].*)/.test(this.request.password)) {
                progress += 20
            }

            // at menons a lowercase

            if (/(.*[a-z].*)/.test(this.request.password)) {
                progress += 20
            }

            // more than 5 digits

            if (this.request.password.length >= 6) {
                progress += 20
            }

            // at least one special character

            if (/[^A-Za-z0-9]/.test(this.request.password)) {
                progress += 20
            }

            this.passwordValid=progress;
            return progress
        },
    },
    methods: {
        removeAllFiles() {
            this.$refs.dropzone.removeAllFiles();
        },
        handleFilePondInit: function() {
            console.log('FilePond has initialized');

            // FilePond instance methods are available on `this.$refs.pond`
            // alert(this.$refs.pond.getFile());
        },

        fileAdd:function (error,file){
            if (error) {
                console.log('Oh no');
                return;
            }

            if(file.fileSize <5000000){
                this.request.avatar=file.getFileEncodeDataURL();
            }
            else{
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Avatar size is large',
                    'Upload image with minimal of 6 MB...');
            }
        },
        fileRemove:function () {
            this.request.avatar=''
        },
        addUser(){
            if(this.request.avatar!==''
                && this.request.name!=='' && this.request.email!==''
                && this.request.password!=='' && this.request.phone
                &&  this.request.skills!=="" && this.request.fields!==""){
                this.uploadRequest();
            }
            else {
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Enter Valid Inputs',
                    'Create Again User Admin Account');
            }
        },
        uploadRequest(){
            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                const loading = this.$vs.loading({
                    target: this.$refs.button1,
                    scale: '0.6',
                    background: 'success',
                    opacity: 1,
                    color: '#fff'
                })

                axios.post('/user-members/users?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.openNotification('top-right',
                            'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Add New Role Successfully",
                            "New role will be able to handle new permission and assign users...");
                        loading.close();
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }
            else{
                window.location='/admin/invalidToken';
            }
        },
        openNotification(position = null, border,icon,title,text) {
            const noti = this.$vs.notification({
                border,
                icon,
                position,
                title: title,
                text: text
            })
        },
    },
    mounted() {
        //todo:run any js can mounted
    },
}

</script>

<style scoped>

</style>
