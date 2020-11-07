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
                            Assign Permissions To Roles
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
                    <vs-col style="width:10.66%" w="2">
                        <vs-tooltip top>
                            <vs-button
                                icon
                                success
                                relief
                                :active-disabled="enableRemoveAll"
                                @click=""
                            >
                                <i class='bx bx-plus' ></i> Assign
                            </vs-button>
                            <template #tooltip>
                                Assign Selected Permissions To Roles
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
                                {{head.name}}
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
                            :key="i"
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getRolesWithPermissions, search), page, max)"
                            :data="tr"
                            :is-selected="selected == tr"
                            @click="index=i"

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
                                :data="head"
                                v-for="(head,j) in getPermissions">

                                <span v-if="tr.permissions.length>0">
                                    <span
                                        :key="p"
                                        :data="permission"
                                        v-for="permission in tr.permissions">

                                        <span v-if="permission.name===head.name && permission.guard_name===head.guard_name">
                                            <span hidden>{{select_permission[i+j]=true}}</span>
                                            <vs-checkbox v-model="select_permission[i+j]">
                                                <template #icon>
                                                    <i class='bx bx-check' ></i>
                                                </template>
                                            </vs-checkbox>
                                        </span>
                                    </span>
                                    <span v-if="!select_permission[i+j]">
                                        <span hidden>{{select_permission[i+j]=false}}</span>
                                        <vs-checkbox v-model="select_permission[i+j]">
                                            <template #icon>
                                                <i class='bx bx-check' ></i>
                                            </template>
                                        </vs-checkbox>
                                    </span>
                                </span>
                                <span v-else>
                                    <span hidden>{{select_permission[i+j]=false}}</span>
                                    <vs-checkbox v-model="select_permission[i+j]">
                                        <template #icon>
                                            <i class='bx bx-check' ></i>
                                        </template>
                                    </vs-checkbox>
                                </span>

                            </vs-td>

                        </vs-tr>
                    </template>

                </vs-table>

            </div>

<!--            view dialogue-->
<!--            <vs-dialog blur v-model="activeView">-->

<!--                <div class="con-form">-->

<!--                    <vs-card type="3">-->
<!--                        <template #title>-->
<!--                            <h3>{{data[index].name}}</h3>-->
<!--                        </template>-->
<!--                        <template #img>-->
<!--                            <img src="../../MasterPage/notification/avatar-6.png" alt="">-->
<!--                        </template>-->
<!--                        <template #text>-->
<!--                            <p>-->
<!--                                {{data[index].guard_name}}-->
<!--                            </p>-->
<!--                            <p>{{data[index].created_at}}</p>-->
<!--                            <p>{{data[index].updated_at}}</p>-->
<!--                            <p>If you're using multiple guards we've got you covered as well.-->
<!--                                Every guard will have its own set of permissions and roles</p>-->
<!--                        </template>-->
<!--                    </vs-card>-->

<!--                </div>-->
<!--            </vs-dialog>-->

<!--            &lt;!&ndash;            delete dialogue&ndash;&gt;-->

<!--            <vs-dialog blur width="550px" not-center v-model="active_ensure">-->
<!--                <template #header>-->
<!--                    <h4 class="not-margin">-->
<!--                        Are you sure delete this <b>Role</b>-->
<!--                    </h4>-->
<!--                </template>-->


<!--                <div class="con-content">-->
<!--                    <p>-->
<!--                        where users may be assigned roles, each which has its own set of permissions. How can we make that work?-->
<!--                    </p>-->
<!--                </div>-->

<!--                <template #footer>-->
<!--                    <div class="con-footer">-->
<!--                        <vs-button-->
<!--                            ref="button3"-->
<!--                            @click="performDelete()" transparent>-->
<!--                            Ok-->
<!--                        </vs-button>-->
<!--                        <vs-button @click="active_ensure=false" dark transparent>-->
<!--                            Cancel-->
<!--                        </vs-button>-->
<!--                    </div>-->
<!--                </template>-->
<!--            </vs-dialog>-->

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
<!--        <p v-if="data2.length===0 && flag">-->
<!--            {{this.reload()}}-->
<!--        </p>-->
<!--        <p v-else-if="firstLoad && data2.length>0">-->
<!--            {{this.removeReload()}}-->
<!--        </p>-->
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
            data2: [],
            loading:null,
            role_name:"",
            guard_name:"",
            roleEditName:"",
            guardEditName:"",
            activeView:false,
            activeEdit:false,
            request:{
                role_name:"",
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
            flag:false,
            firstLoad:true,
            select_permission: {},
            check:true,
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
