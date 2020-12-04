<template>
    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert>
                        <template #icon>
                            <i class='bx bxs-info-circle'></i>
                        </template>
                        <template #title>
                            Create New User
                        </template>
                        Using Admin Panel Can Edit Using < Click Row > To Activate Button Operations.
                    </vs-alert>
                </div>
            </template>
        </div>

        <div class="card-body">

            <div style="margin-bottom: 5px">
                <vs-row justify="flex-end">
                    <vs-col style="width:10%" w="2">
                        <vs-tooltip top>
                            <vs-button
                                icon
                                primary
                                relief
                                @click="refresh()"
                            >
                                <i class='bx bx-refresh' ></i> Refresh
                            </vs-button>
                            <template #tooltip>
                                Refresh Content
                            </template>
                        </vs-tooltip>

                    </vs-col>
                    <vs-col style="width:13.0%" w="2">
                        <vs-button
                            icon
                            success
                            relief
                            to="/user-new"
                        >
                            <i class='bx bx-plus' ></i> Create User
                        </vs-button>
                    </vs-col>
                    <vs-col style="width:16%" w="2">
                        <vs-tooltip top>
                            <vs-button
                                icon
                                danger
                                relief
                                ref="button"
                                :active-disabled="enableRemoveAll"
                                @click="deleteAllUsers()"
                            >
                                <i class='bx bx-trash' ></i> Delete All Users
                            </vs-button>
                            <template #tooltip>
                                Delete All Users And Initialize User Role &#128540;
                            </template>
                        </vs-tooltip>

                    </vs-col>
                </vs-row>
            </div>

            <div>
                <vs-table
                    striped
                    v-model="selected">

                    <!--            todo:header-->
                    <template #header>
                        <vs-input v-model="search" border placeholder="Search" />
                    </template>

                    <template #thead>
                        <vs-tr>
                            <!--                        todo:base-->
                            <vs-th>
                                <vs-checkbox
                                    :indeterminate="selected.length === data.length" v-model="allCheck"
                                    @change="selected = $vs.checkAll(selected, data)"
                                />
                            </vs-th>

                            <!--                        todo:hint make roles and permission nav tab to add new role and assign permission-->
                            <!--                        todo:base-->
                            <vs-th
                                sort @click="data = $vs.sortData($event ,data, 'id')">
                                Id
                            </vs-th>

                            <vs-th
                                sort @click="data = $vs.sortData($event ,data, 'fname')">
                                Name
                            </vs-th>
                            <vs-th
                                sort @click="data = $vs.sortData($event ,data, 'email')">
                                email
                            </vs-th>

                            <vs-th>
                                Avatar
                            </vs-th>

                            <vs-th>
                                Phone
                            </vs-th>

                            <vs-th>
                                Role
                            </vs-th>

                            <vs-th>
                                Skills
                            </vs-th>

                            <vs-th>
                                Fields
                            </vs-th>

                        </vs-tr>
                    </template>

                    <template #tbody>

                        <!--                        <vs-tooltip top>-->
                        <!--                            <template #tooltip>-->
                        <!--                                Add New Role-->
                        <!--                            </template>-->
                        <!--                        </vs-tooltip>-->
                        <vs-tr
                            :key="i"
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getAllUsers, search), page, max)"
                            :data="tr"
                            :is-selected="selected == tr"
                            @click="index=i"
                            not-click-selected
                        >

                            <!--                        todo:base-->
                            <vs-td checkbox style="width: 1%">
                                <vs-checkbox :val="tr" v-model="selected" />
                            </vs-td>

                            <!--                        todo:base-->
                            <vs-td>
                                {{ tr.id }}
                            </vs-td>

                            <vs-td>
                                {{ tr.fname }}
                            </vs-td>
                            <vs-td>
                                {{ tr.email }}
                            </vs-td>

                            <vs-td>
                                <vs-avatar writing >
                                    <img :src="tr.avatar" alt="" style="margin-right: 3px"  width="30px"/>
                                </vs-avatar>
                            </vs-td>

                            <vs-td>
                                {{ tr.phone }}
                            </vs-td>

                            <vs-td>
                                <span v-if="tr.roles.length>0">
                                    <span v-for="role in tr.roles">
                                        {{ role.name}}
                                    </span>
                                </span>
                                <span v-else>
                                    No Role
                                </span>
                            </vs-td>

                            <vs-td>
                                <vs-button
                                    flat icon
                                    @click="editRoleD(tr.id,i)"
                                    primary
                                >
                                    <i class='bx bx-mask' ></i>
                                </vs-button>
                            </vs-td>

                            <vs-td>
                                <vs-button
                                    flat icon
                                    @click="editRoleD(tr.id,i)"
                                    success
                                >
                                    <i class='bx bx-book' ></i>
                                </vs-button>
                            </vs-td>

                            <template #expand>
                                <div class="con-content">
                                    <div class="grid">
                                        <vs-row>
                                            <vs-col :key="index" v-for="col,index in 12" vs-type="flex-end" w="1">
                                                <vs-button
                                                    v-if="col===10" flat icon
                                                    @click="editRoleD(tr.id,i)"
                                                    primary
                                                >
                                                    <i class='bx bx-edit' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===11"
                                                           flat icon
                                                           warn
                                                           @click="viewRole(i)"
                                                >
                                                    <i class='bx bx-happy-heart-eyes' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===12"
                                                           flat icon
                                                           danger
                                                           @click="deleteRole(tr.id)"
                                                >
                                                    <i class='bx bx-trash' ></i>
                                                </vs-button>

                                            </vs-col>
                                        </vs-row>
                                    </div>
                                </div>
                            </template>

                        </vs-tr>
                    </template>

                </vs-table>

            </div>

            <!--            create dialogue-->
            <vs-dialog blur overflow-hidden v-model="active">
                <template #header>
                    <h4 class="not-margin">
                        Add New <b>User</b>
                    </h4>
                </template>

                <div class="con-form">

                    <div class="center content-inputs">
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <div class="center content-inputs">
                                    <vs-input type="text"
                                              label="Admin name"
                                              v-model="request.name" placeholder="User name">
                                        <template #icon>
                                            <i class='bx bx-user'></i>
                                        </template>
                                        <template v-if="request.name===''" #message-danger>
                                            Required
                                        </template>
                                    </vs-input>
                                </div>
                            </vs-col>
                        </vs-row>
                        <br>
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <vs-input
                                    required autofocus
                                    v-model="request.email"
                                    label="Email address"
                                    placeholder="eric@eric.com">
                                    <template #icon>
                                        <i class='bx bxl-mailchimp'></i>
                                    </template>
                                    <template v-if="validEmail" #message-success>
                                        Email Valid
                                    </template>
                                    <template v-if="!validEmail && request.email !== ''" #message-danger>
                                        Email Invalid
                                    </template>
                                    <template v-if="request.email===''" #message-danger>
                                        Required
                                    </template>
                                </vs-input>
                            </vs-col>
                        </vs-row>
                        <br>
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
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
                        <vs-row style="margin-bottom: 20px">
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">

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

                <template #footer>
                    <div class="footer-dialog">
                        <vs-button
                            success
                            ref="button1"
                            :active-disabled="activeOr"
                            @click="addAdmin()"
                            block>
                            Add Admin
                        </vs-button>
                        <br>
                    </div>
                </template>
            </vs-dialog>

            <!--            edit dialogue-->
<!--            <vs-dialog blur overflow-hidden v-model="activeEdit">-->
<!--                <template #header>-->
<!--                    <h4 class="not-margin">-->
<!--                        Edit <b>Account</b>-->
<!--                    </h4>-->
<!--                </template>-->

<!--                <div class="con-form">-->

<!--                    <div class="center content-inputs">-->
<!--                        <vs-row justify="center">-->
<!--                            <vs-col w="2">-->
<!--                                <div class="center content-inputs">-->
<!--                                    <div class="center con-avatars">-->
<!--                                        <vs-avatar size="70" history success>-->
<!--                                            <img :src="avatarEdit" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </vs-col>-->
<!--                        </vs-row>-->
<!--                        <br>-->
<!--                        <vs-row>-->
<!--                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">-->
<!--                                <div class="center content-inputs">-->
<!--                                    <vs-input type="text" v-model="FullEditName" placeholder="Role name">-->
<!--                                        <template #icon>-->
<!--                                            <i class='bx bx-book'></i>-->
<!--                                        </template>-->
<!--                                        <template v-if="FullEditName===''" #message-danger>-->
<!--                                            Required-->
<!--                                        </template>-->
<!--                                    </vs-input>-->
<!--                                </div>-->
<!--                            </vs-col>-->
<!--                        </vs-row>-->
<!--                        <br>-->
<!--                        <br>-->
<!--                        <vs-row>-->
<!--                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">-->
<!--                                <vs-input-->
<!--                                    required autofocus-->
<!--                                    v-model="emailEditName"-->
<!--                                    label="Email address"-->
<!--                                    placeholder="eric@eric.com">-->
<!--                                    <template #icon>-->
<!--                                        <i class='bx bxl-mailchimp'></i>-->
<!--                                    </template>-->
<!--                                    <template v-if="validEmail" #message-success>-->
<!--                                        Email Valid-->
<!--                                    </template>-->
<!--                                    <template v-if="!validEmail && emailEditName !== ''" #message-danger>-->
<!--                                        Email Invalid-->
<!--                                    </template>-->
<!--                                    <template v-if="emailEditName===''" #message-danger>-->
<!--                                        Required-->
<!--                                    </template>-->
<!--                                </vs-input>-->
<!--                            </vs-col>-->
<!--                        </vs-row>-->
<!--                        <br>-->
<!--                        <br>-->
<!--                        <vs-row>-->
<!--                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">-->
<!--                                <vs-select-->
<!--                                    label="Role Name"-->
<!--                                    filter-->
<!--                                    multiple-->
<!--                                    v-model="roleEditName"-->
<!--                                    placeholder="Role Name"-->
<!--                                >-->
<!--                                    <vs-option-group v-if="this.data.length>0">-->
<!--                                        <div slot="title">-->
<!--                                            Assign Roles-->
<!--                                        </div>-->
<!--                                        <vs-option v-for="role in getRoles[this.data[this.index].roles[0].guard_name]" :label="role" key="0" :value="role">-->
<!--                                            {{role}}-->
<!--                                        </vs-option>-->
<!--                                    </vs-option-group>-->
<!--                                </vs-select>-->
<!--                            </vs-col>-->
<!--                        </vs-row>-->
<!--                        <br>-->
<!--                        <vs-row style="margin-bottom: 20px">-->
<!--                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">-->

<!--                                <file-pond-->
<!--                                    name="test"-->
<!--                                    ref="pond"-->
<!--                                    class-name="my-pond"-->
<!--                                    label-idle="Add Avatar..."-->
<!--                                    v-bind:allow-multiple="true"-->
<!--                                    allowDrop="true"-->
<!--                                    allowPaste="true"-->
<!--                                    allowReplace="true"-->
<!--                                    allowRevert="true"-->
<!--                                    allowRemove="true"-->
<!--                                    maxFiles="1"-->
<!--                                    accepted-file-types="image/jpeg, image/png, image/jpg"-->
<!--                                    allowFileEncode="true"-->
<!--                                    v-on:init="handleFilePondInit"-->
<!--                                    v-on:addfile="fileAdd"-->
<!--                                    v-on:removefile="fileRemove"-->
<!--                                />-->
<!--                            </vs-col>-->
<!--                        </vs-row>-->

<!--                    </div>-->
<!--                </div>-->

<!--                <template #footer>-->
<!--                    <div class="footer-dialog">-->
<!--                        <vs-button-->
<!--                            ref="button2"-->
<!--                            @click="editRole()"-->
<!--                            success-->
<!--                            block>-->
<!--                            Edit Account-->
<!--                        </vs-button>-->
<!--                        <br>-->
<!--                    </div>-->
<!--                </template>-->
<!--            </vs-dialog>-->

            <!--            view dialogue-->
            <vs-dialog blur v-model="activeView">
                <div class="con-form">

                    <vs-card>
                        <template #title>
                            <h3>{{data[index].fname}} {{data[index].lname}}</h3>
                        </template>
                        <template #img>
                            <vs-avatar size="150" circle writing >
                                <img :src="data[index].avatar" alt="">
                            </vs-avatar>
                        </template>
                        <template #text>
                            <p>{{data[index].email}}</p>
                            <p>
                                <span v-if="data[index].roles.length>0">
                                    <span v-for="role in data[index].roles">
                                        {{ role.name}}
                                    </span>
                                </span>
                                <span v-else>
                                    No Role
                                </span>
                            </p>
                            <p>{{data[index].created_at}}</p>
                            <p>{{data[index].updated_at}}</p>
                            <p>If you're using multiple guards we've got you covered as well.
                                Every guard will have its own set of permissions and roles</p>
                        </template>
                    </vs-card>

                </div>

            </vs-dialog>

            <!--            delete dialogue-->

            <vs-dialog blur width="550px" not-center v-model="active_ensure">
                <template #header>
                    <h4 class="not-margin">
                        Are you sure delete this <b>Role</b>
                    </h4>
                </template>


                <div class="con-content">
                    <p>
                        where users may be assigned roles, each which has its own set of permissions. How can we make that work?
                    </p>
                </div>

                <template #footer>
                    <div class="con-footer">
                        <vs-button
                            ref="button3"
                            @click="performDelete()" transparent>
                            Ok
                        </vs-button>
                        <vs-button @click="active_ensure=false" dark transparent>
                            Cancel
                        </vs-button>
                    </div>
                </template>
            </vs-dialog>

            <vs-pagination progress  style="margin-top:10px" v-model="page" :length="$vs.getLength(data, max)" />

            <!--            todo:base-->
            <span class="data">
                <pre hidden>
                    {{ selected.length >1 ? enableRemoveAll=false : enableRemoveAll=true }}
                </pre>
            </span>

        </div>
        <div ref="content_i" class="content-div-i">

        </div>
        <p v-if="data.length===0 && flag">
            {{this.reload()}}
        </p>
        <p v-else-if="firstLoad && data.length>0">
            {{this.removeReload()}}
        </p>

        <span hidden v-if="imgUpload && request.name!=='' && emailValid && passwordValid">
            {{activeOr=false}}
        </span>
        <span hidden v-else>
            {{activeOr=true}}
        </span>
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
    name: "List",
    data() {
        return {
            hidden:false,
            search: '',
            allCheck: false,
            page: 1,
            max: 15,
            selected: [],
            active: false,
            edit: null,
            editProp: {},
            data: [],
            loading:null,
            role_name:"",
            guard_name:"",
            FullEditName:"",
            emailEditName:"",
            roleEditName:"",
            avatarEdit:'',
            oldRoles:[],
            activeView:false,
            activeEdit:false,
            request:{
                name:"",
                email:"",
                password:"",
                avatar:"",
                roles:""
            },
            enableRemoveAll:false,
            authInfo:{
                token:localStorage.getItem("token"),
                provider:localStorage.getItem("provider")
            },
            index:0,
            id:0,
            refreshLoading:null,
            previous: null,
            active_ensure:false,
            progress:0,
            interval:null,
            flag:false,
            firstLoad:true,
            emailValid:false,
            passwordValid:0,
            activeOr:true,
            imgUpload:false,

        }
    },
    beforeCreate() {
        //todo:first step
        this.$store.dispatch("AllUsers");
        this.$store.dispatch("AllRoles");
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    computed:{
        getAllUsers(){
            //todo:last step render value to component
            const users=this.$store.getters.getAllUsers;
            if(users.length>0){
                this.data=users;
                this.flag=true;
            }else{
                this.flag=true;
                this.data.push("1");
            }
            return users;
        },
        getRoles(){
            //todo:last step render value to component
            const allRoles=this.$store.getters.getAllRoles;
            let data=[]

            for (const role of allRoles) {
                data[role.guard_name]=[]
            }

            for (const role of allRoles) {
                data[role.guard_name].push(role.name)
            }
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
        openAddUser(){
            this.active=true;
            this.request.avatar=''
            this.imgUpload=false;
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
                this.imgUpload=true;
            }
            else{
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Avatar size is large',
                    'Upload image with minimal of 6 MB...');
            }
        },
        addAdmin(){
            if(this.request.avatar!=='' &&
                this.request.name!=='' && this.request.email!==''
                && this.request.password!==''){
                this.uploadRequest();
            }
            else {
                this.openNotification('top-left', 'danger',
                    `<i class='bx bxs-bug' ></i>`,
                    'Enter Valid Inputs',
                    'Create Again User Admin Account');
                this.active=false;
            }
        },
        fileRemove:function () {
            this.imgUpload=false;
            this.request.avatar=''
        },
        uploadRequest(){

            const loading = this.$vs.loading({
                target: this.$refs.button1,
                scale: '0.6',
                background: 'success',
                opacity: 1,
                color: '#fff'
            })

            axios.post('/auth/register',this.request)
                .then((response)=>{
                    this.openNotification('top-right', 'success',
                        `<i class='bx bx-select-multiple' ></i>`,
                        'Add New Admin Account Successfully',
                        'New Admin added with rules and permissions');
                    this.active=false;
                    loading.close();
                    this.refresh();
                })
                .catch((error)=>{
                    this.openNotification('top-right', 'danger',
                        `<i class='bx bxs-bug' ></i>`,
                        'Make Sure From Credentials',
                        'Username or password not matched with account credentials,' +
                        'make sure and try again...');
                    this.active=false;
                    loading.close();
                });
        },
        viewRole(i){
            this.index=i;
            this.activeView=true;
        },
        editRoleD(id,i){
            this.activeEdit=true;
            this.request.avatar=''

            this.oldRoles=[];
            this.id=id;
            this.index=i;
            this.FullEditName=this.data[this.index].name
            this.emailEditName=this.data[this.index].email
            this.avatarEdit=this.data[this.index].avatar

            let count=0;
            if(this.data[this.index].roles.length>0){
                this.data[this.index].roles.forEach(item=>{
                    this.oldRoles.push(item.name);
                    count++;
                })
                if(this.data[this.index].roles.length===count){
                    this.roleEditName=this.oldRoles;
                }
            }
            else{
                this.roleEditName="";
            }
        },
        editRole(){
            if((this.FullEditName !=="" && this.emailEditName!=="" && this.avatarEdit!=="")
                && (this.FullEditName!==this.data[this.index].name ||
                    this.emailEditName!==this.data[this.index].email ||
                    this.request.avatar!=="" ||
                    JSON.stringify(this.roleEditName)!==JSON.stringify(this.oldRoles)))
            {
                this.request.name=this.FullEditName
                this.request.email=this.emailEditName
                if(this.request.avatar===""){
                    this.request.avatar=this.avatarEdit
                }

                if(this.roleEditName.length>0){
                    this.request.roles=JSON.stringify(this.roleEditName)
                }
                else{
                    this.request.roles=""
                }
                //todo:call mutation and pass object data
                //todo:should make axios request to get user object
                //todo:make an api in back to return full user object
                if(localStorage.hasOwnProperty('token')
                    && localStorage.hasOwnProperty('provider')){

                    const loading = this.$vs.loading({
                        target: this.$refs.button2,
                        scale: '0.6',
                        background: 'success',
                        opacity: 1,
                        color: '#fff'
                    })

                    axios.put('/admin-members/admins/'+(this.id)+'?token='+this.authInfo.token+
                        '&provider='+this.authInfo.provider,this.request)
                        .then((response)=>{
                            this.openNotification('top-right',
                                'success',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "Edit Role Successfully",
                                "Edit role will be able to handle new permission and assign users...");
                            this.activeEdit=false;
                            loading.close();
                            this.refresh();
                        })
                        .catch((error)=>{
                            window.location='/admin/invalidToken';
                        });
                }
                else{
                    window.location='/admin/invalidToken';
                }
            }
            else{
                if((this.roleEditName==="" && this.guardEditName==="") ||
                    this.roleEditName===this.data[this.index].name ||
                    this.guardEditName===this.data[this.index].guard_name){

                    this.openNotification('top-right',
                        'danger',
                        `<i class='bx bx-select-multiple' ></i>`,
                        "There is no update",
                        "Edit role will be able to handle new permission and assign users...");
                    this.activeEdit=false;
                    return;
                }
                else if(this.request.role_name===""){
                    this.request.role_name=this.data[this.index].name;
                }
                else if(this.guardEditName===""){
                    this.request.guard_name=this.data[this.index].guard_name;
                }
                this.editRole();
            }
        },
        deleteRole(i){
            this.id=i
            this.active_ensure=true
        },
        deleteAllUsers(){
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                this.loading = this.$vs.loading({
                    target: this.$refs.button,
                    scale: '0.6',
                    background: 'danger',
                    opacity: 1,
                    color: '#fff'
                })

                axios.get('/admin-members/remove-all-admins?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider)
                    .then((response)=>{
                        if(response.data!=="error"){
                            this.loading.close();
                            this.openNotification('top-right',
                                'danger',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "All Roles Are Deleted Successfully",
                                "Can add new role will be able to handle new permission and assign users...");
                            this.enableRemoveAll=true
                            this.refresh();
                        }
                        else{
                            this.openNotification('top-right',
                                'danger',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "Error In Remove",
                                "Can add new role will be able to handle new permission and assign users...");
                            this.enableRemoveAll=true
                        }

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
        performDelete(){

            const loading = this.$vs.loading({
                target: this.$refs.button3,
                scale: '0.6',
                background: 'danger',
                opacity: 1,
                color: '#fff'
            })

            axios.delete('/admin-members/admins/'+(this.id)+'?token='+this.authInfo.token+
                '&provider='+this.authInfo.provider)
                .then((response)=>{
                    if(response.data!=="error"){
                        loading.close();
                        this.openNotification('top-right',
                            'danger',
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
        refresh(){
            this.$store.dispatch("AllUsers");
            this.$store.dispatch("AllRoles");
        },
        reload(){
            $(".content-div-i").show();
            this.refreshLoading = this.$vs.loading({
                target: this.$refs.content_i,
                color: 'dark'
            })

            this.flag=false;
        },
        removeReload(){
            this.refreshLoading = this.$vs.loading({
                target: this.$refs.content_i,
                color: 'dark'
            })
            this.refreshLoading.close();
            $(".content-div-i").hide();

            this.firstLoad=false;
        },

    },
    components:{
        FilePond
    },
}
</script>

<style scoped>

.content-div-i{
    width: 100%;
    height :100%;
    box-shadow: 0px 6px 25px -10px rgba(0,0,0,.1);
    border-radius :20px;
    position: absolute;
    z-index: 9999;
    display :flex;
    align-items: center;
    justify-content: center;
    flex-direction :column;
    text-align :center;
    font-size :.6rem;
    display: none;
}

</style>
