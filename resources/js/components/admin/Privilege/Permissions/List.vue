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
                            Create Permissions
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
                    <vs-col style="width:16.66%" w="2">
                        <vs-tooltip top>
                            <vs-button
                                icon
                                success
                                relief
                                @click="openAddPermission()"
                            >
                                <i class='bx bx-plus' ></i> Create Permission
                            </vs-button>
                            <template #tooltip>
                                Add New Permission
                            </template>
                        </vs-tooltip>
                    </vs-col>
                    <vs-col style="width:20%" w="2">
                        <vs-tooltip top>
                            <vs-button
                                icon
                                danger
                                relief
                                ref="button"
                                :active-disabled="enableRemoveAll"
                                @click="deleteAllRoles()"
                            >
                                <i class='bx bx-trash' ></i> Delete All Permissions
                            </vs-button>
                            <template #tooltip>
                                Delete All Permission And Initialize Super Admin Permission &#128540;
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
                                sort @click="data = $vs.sortData($event ,data, 'name')">
                                Permission Name
                            </vs-th>
                            <vs-th
                                sort @click="data = $vs.sortData($event ,data, 'guard_name')">
                                Guard Name
                            </vs-th>

                            <!--                        todo:base-->
                            <vs-th>
                                Created At
                            </vs-th>

                            <!--                        todo:base-->
                            <vs-th>
                                Updated At
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
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getUserPermissions, search), page, max)"
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
                                {{ tr.name }}
                            </vs-td>
                            <vs-td>
                                {{ tr.guard_name }}
                            </vs-td>

                            <vs-td>
                                {{ tr.created_at }}
                            </vs-td>

                            <vs-td>
                                {{ tr.updated_at }}
                            </vs-td>

                            <template #expand>
                                <div class="con-content">
                                    <div class="grid">
                                        <vs-row>
                                            <vs-col :key="index" v-for="col,index in 12" vs-type="flex-end" w="1">
                                                <vs-button
                                                    v-if="col===10" flat icon
                                                    @click="editPermissionD(tr.id,i)"
                                                    primary
                                                >
                                                    <i class='bx bx-edit' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===11"
                                                           flat icon
                                                           warn
                                                           @click="viewPermission(i)"
                                                >
                                                    <i class='bx bx-happy-heart-eyes' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===12"
                                                           flat icon
                                                           danger
                                                           @click="deletePermission(tr.id)"
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
                        Add New <b>Permission</b>
                    </h4>
                </template>

                <div class="con-form">

                    <div class="center content-inputs">
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <div class="center content-inputs">
                                    <vs-input type="text" v-model="permission_name" placeholder="Permission name">
                                        <template #icon>
                                            <i class='bx bx-book'></i>
                                        </template>
                                        <template v-if="permission_name===''" #message-danger>
                                            Required
                                        </template>
                                    </vs-input>
                                </div>
                            </vs-col>
                        </vs-row>
                        <br>
                        <br>
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <vs-select
                                    label="Guard Name"
                                    filter
                                    v-model="guard_name"
                                >
                                    <vs-option-group>
                                        <div slot="title">
                                            Admin Guards
                                        </div>
                                        <vs-option v-for="guard in getGuardsName" key="0" :label="guard" :value="guard">
                                            {{guard}}
                                        </vs-option>
                                    </vs-option-group>
                                </vs-select>
                            </vs-col>
                        </vs-row>
                        <br>
                    </div>
                </div>

                <template #footer>
                    <div class="footer-dialog">
                        <vs-button
                            ref="button1"
                            @click="addPermission()"
                            block>
                            Add Permission
                        </vs-button>
                        <br>
                    </div>
                </template>
            </vs-dialog>

            <!--            edit dialogue-->
            <vs-dialog blur overflow-hidden v-model="activeEdit">
                <template #header>
                    <h4 class="not-margin">
                        Edit <b>Permission</b>
                    </h4>
                </template>

                <div class="con-form">

                    <div class="center content-inputs">
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <div class="center content-inputs">
                                    <vs-input type="text" v-model="permissionEditName" placeholder="Permission name">
                                        <template #icon>
                                            <i class='bx bx-book'></i>
                                        </template>
                                        <template v-if="permissionEditName===''" #message-danger>
                                            Required
                                        </template>
                                    </vs-input>
                                </div>
                            </vs-col>
                        </vs-row>
                        <br>
                        <br>
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <vs-select
                                    label="Guard Name"
                                    filter
                                    v-model="guardEditName"
                                    placeholder="Guard Name"
                                >
                                    <vs-option-group>
                                        <div slot="title">
                                            Admin Guards
                                        </div>
                                        <vs-option v-for="guard in getGuardsName" key="0" :label="guard" :value="guard">
                                            {{guard}}
                                        </vs-option>
                                    </vs-option-group>
                                </vs-select>
                            </vs-col>
                        </vs-row>
                        <br>
                    </div>
                </div>

                <template #footer>
                    <div class="footer-dialog">
                        <vs-button
                            ref="button2"
                            @click="editPermission()"
                            success
                            block>
                            Edit Permission
                        </vs-button>
                        <br>
                    </div>
                </template>
            </vs-dialog>

            <!--            view dialogue-->
            <vs-dialog blur v-model="activeView">

                <div class="con-form">

                    <vs-card type="3">
                        <template #title>
                            <h3>{{data[index].name}}</h3>
                        </template>
                        <template #img>
                            <img src="../../MasterPage/notification/avatar-6.png" alt="">
                        </template>
                        <template #text>
                            <p>
                                {{data[index].guard_name}}
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
                        Are you sure delete this <b>Permission</b>
                    </h4>
                </template>


                <div class="con-content">
                    <p>
                        where users may be assigned permissions, each which has its own set of permissions. How can we make that work?
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

        <p v-if="data.length===0 && flagP">
            {{this.reload()}}
        </p>
        <p v-else-if="firstLoadP && data.length>0">
            {{this.removeReload()}}
        </p>

    </div>
</template>

<script>
export default {
    name: "List",
    data() {
        return {
            hidden:true,
            search: '',
            allCheck: false,
            page: 1,
            max: 10,
            selected: [],
            active: false,
            edit: null,
            editProp: {},
            data: [],
            loading:null,
            permission_name:"",
            guard_name:"",
            permissionEditName:"",
            guardEditName:"",
            activeView:false,
            activeEdit:false,
            request:{
                permission_name:"",
                guard_name:"",
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
            flagP:false,
            firstLoadP:true,
        }
    },
    beforeCreate() {
        //todo:first step
        this.$store.dispatch("GuardsName");
        this.$store.dispatch("UserPermissions");
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    computed:{
        getGuardsName(){
            //todo:last step render value to component
            const data=this.$store.getters.getGuardsName;
            return data;
        },
        getUserPermissions(){
            this.flagP=true;
            //todo:last step render value to component
            const userPermissions=this.$store.getters.getUserPermissions;
            this.data=userPermissions;
            return userPermissions;
        },
    },
    methods: {
        openAddPermission(){
            this.active=true;
        },
        addPermission(){
            if(this.permission_name !=="" && this.guard_name!==""){

                this.request.guard_name=this.guard_name;
                this.request.permission_name=this.permission_name;

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

                    axios.post('/admin-mpermission/manage-permission?token='+this.authInfo.token+
                        '&provider='+this.authInfo.provider,this.request)
                        .then((response)=>{
                            this.openNotification('top-right',
                                'success',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "Add New Permission Successfully",
                                "New Permission will be able to handle new permission and assign users...");
                            this.active=false;
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
        },
        viewPermission(i){
            this.index=i;
            this.activeView=true;
        },
        editPermissionD(id,index){
            this.id=id;
            this.index=index;
            this.activeEdit=true;
            this.guardEditName=this.data[this.index].guard_name
            this.permissionEditName=this.data[this.index].name
        },
        editPermission(){
            if((this.permissionEditName !=="" && this.guardEditName!=="") &&
                (this.permissionEditName!==this.data[this.index].name ||
                    this.guardEditName!==this.data[this.index].guard_name))
            {

                this.request.guard_name=this.guardEditName
                this.request.permission_name=this.permissionEditName
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

                    axios.put('/admin-mpermission/manage-permission/'+(this.id)+'?token='+this.authInfo.token+
                        '&provider='+this.authInfo.provider,this.request)
                        .then((response)=>{
                            this.openNotification('top-right',
                                'success',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "Edit Permission Successfully",
                                "Edit Permission will be able to handle new permission and assign users...");
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
                if((this.permissionEditName==="" && this.guardEditName==="") ||
                    this.permissionEditName===this.data[this.index].name ||
                    this.guardEditName===this.data[this.index].guard_name){

                    this.openNotification('top-right',
                        'danger',
                        `<i class='bx bx-select-multiple' ></i>`,
                        "There is no update",
                        "Edit Permission will be able to handle new permission and assign users...");
                    this.activeEdit=false;
                    return;
                }
                else if(this.request.permission_name===""){
                    this.request.permission_name=this.data[this.index].name;
                }
                else if(this.guardEditName===""){
                    this.request.guard_name=this.data[this.index].guard_name;
                }
                this.editPermission();
            }
        },
        deletePermission(i){
            this.id=i
            this.active_ensure=true
        },
        deleteAllRoles(){
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                this.loading = this.$vs.loading({
                    target: this.$refs.button,
                    scale: '0.6',
                    background: 'danger',
                    opacity: 1,
                    color: '#fff'
                })

                axios.get('/admin-mrole/remove-all-rolls?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider)
                    .then((response)=>{
                        if(response.data!=="error"){
                            this.loading.close();
                            this.openNotification('top-right',
                                'danger',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "All Permissions Are Deleted Successfully",
                                "Can add new Permission will be able to handle new permission and assign users...");
                            this.enableRemoveAll=true
                            this.refresh();
                        }
                        else{
                            this.openNotification('top-right',
                                'danger',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "Error In Remove",
                                "Can add new Permission will be able to handle new permission and assign users...");
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

            axios.delete('/admin-mpermission/manage-permission/'+(this.id)+'?token='+this.authInfo.token+
                '&provider='+this.authInfo.provider)
                .then((response)=>{
                    if(response.data!=="error"){
                        loading.close();
                        this.openNotification('top-right',
                            'danger',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Permission Is Deleted Successfully",
                            "Can add new Permission will be able to handle new permission and assign users...");
                        this.active_ensure=false;
                        this.refresh();
                        $('.vs-table__tr__expand').hide();
                    }
                    else{
                        this.openNotification('top-right',
                            'danger',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Error In Remove",
                            "Can add new Permission will be able to handle new permission and assign users...");
                        this.active_ensure=false
                    }
                })
                .catch((error)=>{
                    window.location='/admin/invalidToken';
                });
        },
        refresh(){
            this.$store.dispatch("UserPermissions");
        },
        reload(){
            $(".content-div-i").show();
            this.refreshLoading = this.$vs.loading({
                target: this.$refs.content_i,
                color: 'dark'
            })

            this.flagP=false;
        },
        removeReload(){
            this.refreshLoading = this.$vs.loading({
                target: this.$refs.content_i,
                color: 'dark'
            })
            this.refreshLoading.close();
            $(".content-div-i").hide();

            this.firstLoadP=false;
        },
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
