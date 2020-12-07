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
                            Assign Permission To Role
                        </template>
                        Using Admin Panel Can Edit Using < Click Row > To Activate Button Operations.
                    </vs-alert>
                </div>
            </template>
        </div>

        <div class="card-body">

            <div style="margin-bottom: 5px">
                <vs-row justify="flex-end">
                    <vs-col style="width:10%" w="1">
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
                                    :indeterminate="selected.length === data2.length" v-model="allCheck"
                                    @change="selected = $vs.checkAll(selected, data2)"
                                />
                            </vs-th>

<!--                        todo:hint make roles and permission nav tab to add new role and assign permission-->
                            <!--                        todo:base-->
                            <vs-th
                                sort @click="data2 = $vs.sortData($event ,data2, 'id')">
                                Id
                            </vs-th>

                            <vs-th
                                sort @click="data2 = $vs.sortData($event ,data2, 'name')">
                                Role Name
                            </vs-th>
                            <vs-th
                                sort @click="data2 = $vs.sortData($event ,data2, 'guard_name')">
                                Guard Name
                            </vs-th>

<!--                            todo:loop here permissions-->
                            <vs-th
                                :key="i"
                                :data="head"
                                v-for="(head,i) in getPermissions"
                                sort @click="getPermissions = $vs.sortData($event ,getPermissions, 'name')">

                                <vs-tooltip top>
                                    {{head.name}}
                                    <template #tooltip>
                                        Guard name : {{head.guard_name}}
                                    </template>
                                </vs-tooltip>

                            </vs-th>

                        </vs-tr>
                    </template>

                    <template #tbody>



<!--                        <vs-tooltip top>-->
<!--                            create here content-->
<!--                            <template #tooltip>-->
<!--                                Add New Role-->
<!--                            </template>-->
<!--                        </vs-tooltip>-->
                        <vs-tr
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getRolesWithPermissions, search), page, max)"
                            :is-selected="selected == tr"
                            :key="i"
                            :data="tr"
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

                            <vs-td
                                :key="j"
                                v-for="(head,j) in getPermissions">

                                <span v-if="tr.permissions.length>0">
                                    <span
                                        :data="permission"
                                        v-for="permission in tr.permissions">

                                        <span v-if="permission.name===head.name && permission.guard_name===head.guard_name">
                                            <span hidden>{{check=true}}</span>
                                            <vs-checkbox
                                                danger
                                                disabled="true"
                                                v-model="select_permission[i][j]">
                                                <template #icon>
                                                    <i class='bx bx-check' ></i>
                                                </template>
                                            </vs-checkbox>
                                        </span>
                                    </span>
                                    <span v-if="!check">
                                        <span hidden>{{check=false}}</span>
                                        <vs-checkbox
                                            primary
                                            disabled="true"
                                            v-model="select_permission[i][j]">
                                            <template #icon>
                                                <i class='bx bx-check' ></i>
                                            </template>
                                        </vs-checkbox>
                                    </span>
                                    <span hidden>{{check=false}}</span>
                                </span>
                                <span v-else>
                                    <vs-checkbox
                                        warn
                                        disabled="true"
                                        v-model="select_permission[i][j]">
                                        <template #icon>
                                            <i class='bx bx-check' ></i>
                                        </template>
                                    </vs-checkbox>
                                </span>

                            </vs-td>


                            <template #expand>
                                <div class="con-content">
                                    <div class="grid">
                                        <vs-row>
                                            <vs-col :key="index" v-for="col,index in 12" vs-type="flex-end" w="1">
                                                <vs-button
                                                    v-if="col===12" flat icon
                                                    @click="editRoleD(tr.id,i+(page-1)*15)"
                                                    primary
                                                >
                                                    <i class='bx bx-edit' ></i>
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

            <vs-dialog blur overflow-hidden v-model="activeEdit">
                <template #header>
                    <h4 class="not-margin">
                        Edit <b>Permissions Assign Role</b>
                    </h4>
                </template>

                <div class="con-form">

                    <div class="center content-inputs">

<!--                        <span v-for="(permission,key) in data2[index].permissions">-->
<!--                            {{selectedPermission[key]=permission.name}}-->
<!--                        </span>-->

                        <br>
                        <vs-row>
                            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                                <vs-select
                                    multiple
                                    label="Permissions"
                                    filter
                                    v-model="selectedPermission"
                                    placeholder="Permission Name"
                                >
                                    <vs-option-group>
                                        <div slot="title">
                                            Admin Role Assign Permission
                                        </div>
                                        <vs-option v-for="permission in data.filter(permission=>permission.guard_name===data2[index].guard_name)" key="0" :label="permission.name" :value="permission.name">
                                            {{permission.name}}
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
                            Edit Permissions
                        </vs-button>
                        <br>
                    </div>
                </template>
            </vs-dialog>

            <vs-pagination progress  style="margin-top:10px" v-model="page" :length="$vs.getLength(data2, max)" />

            <!--            todo:base-->
            <span class="data">
                <pre hidden>
                    {{ selected.length >1 ? enableRemoveAll=false : enableRemoveAll=true }}
                </pre>
            </span>

        </div>
        <div ref="content_i" class="content-div-i">

        </div>
        <p v-if="data2.length===0 && flag">
            {{this.reload()}}
        </p>
        <p v-else-if="firstLoad && data2.length>0">
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
            data: [],
            data2: [],
            loading:null,
            selectedPermission:[],
            activeEdit:false,
            request:{
                role_id:"",
                selected_RP:{},
            },
            enableRemoveAll:false,
            authInfo:{
                token:localStorage.getItem("token"),
                provider:localStorage.getItem("provider")
            },
            index:0,
            id:0,
            refreshLoading:null,
            progress:0,
            flag:false,
            firstLoad:true,
            select_permission:[],
            oldValue:[]
        }
    },
    beforeCreate() {
        //todo:first step
        this.$store.dispatch("UserPermissions")
        this.$store.dispatch("RolesWithPermissions");
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    computed:{
        getPermissions(){
            //todo:last step render value to component
            const userPermissions=this.$store.getters.getUserPermissions;
            this.data=userPermissions;
            this.flag=true;
            return userPermissions;
        },
        getRolesWithPermissions(){
            //todo:last step render value to component
            const rolesWithPermissions=this.$store.getters.getRolesWithPermissions;
            this.data2=rolesWithPermissions;
            this.flag=true;

            if(this.data2.length>0 && this.data.length>0){
                for (let i of Object.keys(this.data2)) {
                    let arr=[];
                    for (let j of Object.keys(this.data)) {
                        debugger;
                        arr[j] = this.data2[i].permissions.length > 0 && this.data2[i].permissions.some(e=>e.name===this.data[j].name);
                    }
                    this.select_permission[parseInt(i)]=arr;
                }
            }

            return rolesWithPermissions;
        },
    },
    methods: {
        refresh(){
            this.$store.dispatch("UserPermissions")
            this.$store.dispatch("RolesWithPermissions");
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
        editRoleD(id,index){
            this.id=id;
            this.index=index;
            this.activeEdit=true;
            this.selectedPermission=[];
            this.oldValue=[];

            if(this.data2[this.index].permissions.length>0){
                for (let key of this.data2[this.index].permissions) {
                    let val = key.name;
                    this.selectedPermission.push(val);
                    this.oldValue.push(val);
                }
            }
        },
        editPermission(){
            if(JSON.stringify(this.oldValue)!==JSON.stringify(this.selectedPermission)){

                if(this.selectedPermission.length<=0){
                    this.request.selected_RP=JSON.stringify(["read"])
                }
                else{
                    for (let i = 0; i < this.selectedPermission.length; i++) {
                        this.request.selected_RP[i]=this.selectedPermission[i];
                    }
                    this.request.selected_RP=JSON.stringify(this.request.selected_RP);
                }

                this.request.role_id=this.id;


                if(localStorage.hasOwnProperty('token')
                    && localStorage.hasOwnProperty('provider')) {

                    const loading = this.$vs.loading({
                        target: this.$refs.button2,
                        scale: '0.6',
                        background: 'success',
                        opacity: 1,
                        color: '#fff'
                    })

                    axios.post('/admin-mrole/update-role-permission/'+'?token='+this.authInfo.token+
                        '&provider='+this.authInfo.provider,this.request)
                        .then((response)=>{
                            this.openNotification('top-right',
                                'success',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "Update Role Permissions Successfully",
                                "New role will be able to handle new permission and assign users...");
                            this.activeEdit=false;
                            loading.close();
                            this.selectedPermission=[];
                            this.request.selected_RP={}
                            this.refresh();
                        })
                        .catch((error)=>{
                            window.location='/admin/invalidToken';
                        });
                }
            }
            else{
                this.activeEdit=false;
                this.openNotification('top-right',
                    'danger',
                    `<i class='bx bx-select-multiple' ></i>`,
                    "There is no change in permissions",
                    "New role will be able to handle new permission and assign users...");
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
