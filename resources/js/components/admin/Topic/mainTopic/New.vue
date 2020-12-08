<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            <span v-if="status===1">
                                <i class='bx bx-plus' ></i> Add New User
                            </span>
                            <span v-else-if="status===2">
                                <i class='bx bx-edit' ></i> Edit Current User
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

                        <vs-select
                            label="Role Name"
                            filter
                            multiple
                            v-model="request.role"
                            placeholder="Role Name"
                        >
                            <vs-option-group>
                                <div slot="title">
                                    Assign Roles
                                </div>
                                <vs-option v-for="role in getRoles['user']" :label="role" key="0" :value="role">
                                    {{role}}
                                </vs-option>
                            </vs-option-group>
                        </vs-select>

                        <br>

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
                        <br>

                        <div v-if="status===1">
                            <vs-button
                                relief
                                block
                                success
                                ref="button1"
                                @click="addUser()"
                            >
                                <i class='bx bx-plus' ></i>Add User
                            </vs-button>
                        </div>
                        <div v-else>
                            <vs-button
                                relief
                                block
                                primary
                                ref="button1"
                                @click="editUser()"
                            >
                                <i class='bx bx-edit-alt' ></i> Edit User
                            </vs-button>
                        </div>

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

//todo:uploaded all media
// https://ernestbrandi.github.io/filepond-plugin-media-preview/

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
            role:[],
            fields:[],
            skills:[],
            skillsIds:[],
            fieldsIds:[],
        },
        data: [],
        authInfo:{
            token:localStorage.getItem("token"),
            provider:localStorage.getItem("provider")
        },
        roleName:"",
        emailValid:false,
        passwordValid:0,
        selectLoading:true,
        status:0,
        id:0,
        oldData:[],
        path:'',
        avatar:""
    }),
    beforeCreate() {
        this.$store.dispatch("AllCategoriesWithFields");
        this.$store.dispatch("AllSkills");
        this.$store.dispatch("AllRoles");
    },
    created() {
        this.status=this.$route.params.status;
        if(this.status===2){
            this.id=this.$route.params.id
            this.oldData=this.$route.params.data
        }
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    computed:{
        getAllCategoriesWithFields(){
            //todo:last step render value to component
            const categoriesWithFields=this.$store.getters.getCategoriesWithFields;
            this.dataF=categoriesWithFields;
            this.dataF.length>0?this.selectLoading=false:null;
            return categoriesWithFields;
        },
        getAllSkills(){
            //todo:last step render value to component
            const allSkills=this.$store.getters.getSkills;
            this.dataS=allSkills;
            return allSkills;
        },
        getRoles(){
            //todo:last step render value to component
            const allRoles=this.$store.getters.getAllRoles;
            let data=[]

            allRoles.forEach(obj=>{
                data[obj.guard_name]=[]
            });

            allRoles.forEach(obj=>{
                data[obj.guard_name].push(obj.name)
            });
            return data;
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

                this.prepareSkillsFields();

                this.path='/user-members/users';
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
            debugger;
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

                axios.post(this.path+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider,this.request)
                    .then((response)=>{
                        this.request={
                            fname:"",
                            lname:"",
                            email:"",
                            password:"",
                            phone:"",
                            role:"",
                            avatar:"",
                            fields:[],
                            skills:[]
                        };
                        this.openNotification('top-right',
                            'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Add New User Successfully",
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
        editUser(){
            this.prepareSkillsFields();

            this.path='/user-members/users/'+this.id
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
        prepareSkillsFields(){
            let fields=this.dataF;
            let arrF=this.request.fields;
            let resultF=[];

            fields.forEach(function (obj,i,fields) {
                const arr=obj.fields_under;
                arr.forEach(function(val,index,arr){
                    arrF.forEach(function (val2,index2,arrF){
                        if(JSON.stringify(val2)===JSON.stringify(val.name)){
                            resultF.push(val);
                        }
                    });
                });
            });

            this.request.fields=resultF;

            let skills=this.dataS;
            const arrS=this.request.skills;
            let resultS=[];

            skills.forEach(function (obj,i,skills) {
                arrS.forEach(function (val,index2,arrS){
                    if(JSON.stringify(obj.name)===JSON.stringify(val)){
                        resultS.push(obj);
                    }
                });
            });
            this.request.skills=resultS;
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
        if(this.status===2){
            //todo:run any js can mounted
            this.request.fname=this.oldData["fname"];
            this.request.lname=this.oldData["lname"];
            this.request.email=this.oldData["email"];
            this.request.phone=this.oldData["phone"];
            this.avatar=this.oldData["avatar"];

            //todo: set arrays
            if((this.oldData["roles"].length>0)){
                this.oldData["roles"].forEach(obj=>{
                    this.request.role.push(obj["name"]);
                });
            }

            if(this.oldData["fields_following"].length>0){
                this.oldData["fields_following"].forEach(obj=>{
                    this.request.fields.push(obj["name"]);
                    this.request.fieldsIds.push(obj["id"]);
                });
            }

            if(this.oldData["own_skills"].length>0){
                this.oldData["own_skills"].forEach(obj=>{
                    this.request.skills.push(obj["name"]);
                    this.request.skillsIds.push(obj["id"]);
                });
            }
        }
    },
}

</script>

<style scoped>

</style>
