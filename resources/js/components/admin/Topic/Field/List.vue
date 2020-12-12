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
                            Create New Field
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
                            @click="createNewUser()"
                        >
                            <i class='bx bx-plus' ></i> Create Field
                        </vs-button>
<!--                        <router-link to="{path: 'user-new', params: { status: 'test' } }">Link</router-link>-->

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
                                    ref="skill"
                                    @click="showSkills(tr.id,i+(page-1)*15)"
                                    primary
                                >
                                    <i class='bx bxl-spotify' ></i>
                                </vs-button>
                            </vs-td>

                            <vs-td>
                                <vs-button
                                    flat icon
                                    @click="showFields(tr.id,i+(page-1)*15)"
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
                                                    @click="editCurrentUser(tr.id,i+(page-1)*15)"
                                                    primary
                                                >
                                                    <i class='bx bx-edit' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===11"
                                                           flat icon
                                                           warn
                                                           @click="viewRole(i+(page-1)*15)"
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


            <!--            view skills dialogue-->
            <vs-dialog blur v-model="activeSkills">
                <div class="con-form">

                    <vs-card>
                        <template #title>
                            <h3><b>{{data[index].fname}} {{data[index].lname}}</b> Skills</h3>
                        </template>
                        <template #text>
                            <div class="center grid">
                                <tree style="height: 500px" raduis="15px" :data="treeSkills" type="cluster" node-text="name" layoutType="horizontal"></tree>
                            </div>
                        </template>
                    </vs-card>

                </div>

            </vs-dialog>

            <!--            view skills dialogue-->
            <vs-dialog blur v-model="activeFields">
                <div class="con-form">

                    <vs-card>
                        <template #title>
                            <h3><b>{{data[index].fname}} {{data[index].lname}}</b> Fields Follow</h3>
                        </template>
                        <template #text>
                            <div class="center grid">
                                <tree style="height: 500px" raduis="15px" :data="treeFields" type="cluster" node-text="name" layoutType="horizontal"></tree>
                            </div>
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

import {tree} from 'vued3tree'


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
            guard_name:"",
            oldRoles:[],
            activeView:false,
            activeSkills:false,
            activeFields:false,
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
            ownSkills:[],
            followFields:[],
            treeSkills: {
                name: "Skills",
                children:[]
            },
            treeFields: {
                name: "Fields Follow",
                children:[]
            }

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
    mounted() {
        console.log(this.$vs.getPage())
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
        createNewUser(){
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'field-new', params: { status: 1 } });
        },
        editCurrentUser(id,index){
            debugger
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'user-new', params: { status: 2,id:id,data:this.data[index] } });
        },
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

                axios.get('/user-members/remove-all-users?token='+this.authInfo.token+
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
        showSkills(id,index){
            this.id=id;
            this.index=index;
            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                //todo:to set inside response of axios should define global <this> object
                let self=this;

                axios.get('/user-members/getSkillUser/'+(this.id)+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider)
                    .then(function (response){
                        self.ownSkills=response.data
                        self.activeSkills=true;

                        // tree: {
                        //     name: "father",
                        //         children:[{
                        //         name: "son1",
                        //         children:[ {name: "grandson"}, {name: "grandson2"}]
                        //     },{
                        //         name: "son2",
                        //         children:[ {name: "grandson3"}, {name: "grandson4"}]
                        //     }]
                        // }

                        let childrenSkills=[]
                        self.ownSkills.forEach(async function (skill){
                            let obj={};
                            obj.name=skill.name;
                            childrenSkills.push(obj)
                        })
                        self.treeSkills.children=childrenSkills;
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }
            else{
                window.location='/admin/invalidToken';
            }
        },
        showFields(id,index){
            this.id=id;
            this.index=index;
            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                //todo:to set inside response of axios should define global <this> object
                let self=this;

                axios.get('/user-members/getFieldUser/'+(this.id)+'?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider)
                    .then(function (response){
                        self.followFields=response.data
                        self.activeFields=true;

                        // tree: {
                        //     name: "father",
                        //         children:[{
                        //         name: "son1",
                        //         children:[ {name: "grandson"}, {name: "grandson2"}]
                        //     },{
                        //         name: "son2",
                        //         children:[ {name: "grandson3"}, {name: "grandson4"}]
                        //     }]
                        // }

                        let childrenFields=[]
                        self.followFields.forEach(async function (field){
                            let obj={};
                            obj.name=field.name;
                            childrenFields.push(obj)
                        })
                        self.treeFields.children=childrenFields;
                    })
                    .catch((error)=>{
                        window.location='/admin/invalidToken';
                    });
            }
            else{
                window.location='/admin/invalidToken';
            }
        }

    },
    watch:{
        page(newVal,oldVal){
            // alert(newVal)
            // debugger
            // this.index=this.index+(this.page-1)*15;
        }
    },
    components:{
        FilePond,
        tree
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
