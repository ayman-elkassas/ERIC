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
                            Assign Roles
                        </template>
                        Using Admin Panel Can Edit Using < Click Item > And Add Every Component
                    </vs-alert>
                </div>
            </template>
        </div>

        <div class="card-body">

            <div style="margin-bottom: 5px">
                <vs-row justify="flex-end">
                    <vs-col style="width:12.66%" w="2">
                        <router-link style="color: white" to="/admin-add">
                            <vs-button
                                icon
                                success
                            >
                                <i class='bx bx-plus' ></i> Assign Role
                            </vs-button>
                        </router-link>
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
                                    :indeterminate="selected.length === users.length" v-model="allCheck"
                                    @change="selected = $vs.checkAll(selected, users)"
                                />
                            </vs-th>

<!--                        todo:hint make roles and permission nav tab to add new role and assign permission-->
                            <!--                        todo:base-->
                            <vs-th
                                sort @click="users = $vs.sortData($event ,users, 'id')">
                                Id
                            </vs-th>

                            <vs-th
                                sort @click="users = $vs.sortData($event ,users, 'name')">
                                Name
                            </vs-th>
                            <vs-th
                                sort @click="users = $vs.sortData($event ,users, 'email')">
                                Email
                            </vs-th>

                            <vs-th
                                sort @click="users = $vs.sortData($event ,users, 'role')">
                                Role
                            </vs-th>

                            <vs-th>
                                Avatar
                            </vs-th>

                            <!--                        todo:base-->
                            <vs-th>
                                Created At
                            </vs-th>

                            <!--                        todo:view-->
                            <vs-th>
                                Edit
                            </vs-th>

                            <!--                        todo:view-->
                            <vs-th>
                                View
                            </vs-th>

                            <!--                        todo:base-->
                            <vs-th>
                                Delete
                            </vs-th>

                        </vs-tr>
                    </template>

                    <template #tbody>

                        <vs-tr
                            :key="i"
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(users, search), page, max)"
                            :data="tr"
                            :is-selected="!!selected.includes(tr)"
                        >

                            <!--                        todo:base-->
                            <vs-td checkbox>
                                <vs-checkbox :val="tr" v-model="selected" />
                            </vs-td>

                            <!--                        todo:base-->
                            <vs-td>
                                {{ tr.id }}
                            </vs-td>

                            <vs-td>
                                {{ tr.name }}
                            </vs-td>
                            <vs-td edit @click="edit = tr, editProp = 'email', editActive = true">
                                {{ tr.email }}
                            </vs-td>

                            <vs-td edit @click="edit = tr, editProp = 'roles', editActive = true">
                                <span v-if="typeof tr.roles ==='string'">
                                    <span v-if="tr.roles === 'super_admin'">
                                        Super Administrator
                                    </span>
                                    <span v-else-if="tr.roles==='admin'" class="mb-0 font-roboto">
                                        Administrator
                                    </span>
                                    <span v-else-if="tr.roles==='user'" class="mb-0 font-roboto">
                                        Local User
                                    </span>
                                </span>
                                <span v-else v-for="role in tr.roles">
                                    <span v-if="role.name === 'super_admin'">
                                        Super Administrator
                                    </span>
                                    <span v-else-if="role.name==='admin'" class="mb-0 font-roboto">
                                        Administrator
                                    </span>
                                    <span v-else-if="role.name==='user'" class="mb-0 font-roboto">
                                        Local User
                                    </span>
                                </span>

                            </vs-td>

                            <vs-td>
                                <img :src="tr.avatar" alt="" style="margin-right: 3px"  width="30px"/>
                            </vs-td>

                            <vs-td>
                                {{ tr.created_at }}
                            </vs-td>

                            <vs-td>
                                <vs-button
                                    circle
                                    icon
                                    floating
                                    size="small"
                                    primary
                                >
                                    <i class='bx bx-edit' ></i>
                                </vs-button>
                            </vs-td>

                            <vs-td>
                                <vs-button
                                    circle
                                    icon
                                    floating
                                    size="small"
                                    primary
                                >
                                    <i class='bx bxs-eyedropper' ></i>
                                </vs-button>
                            </vs-td>

                            <vs-td>
                                <vs-button
                                    circle
                                    icon
                                    floating
                                    size="small"
                                    danger
                                >
                                    <i class='bx bx-trash' ></i>
                                </vs-button>
                            </vs-td>

                        </vs-tr>
                    </template>
                </vs-table>

            </div>


            <vs-dialog v-model="editActive">
                <template #header>
                    Change Prop {{ editProp }}
                </template>
                <vs-select @change="editActive = false" block v-if="editProp == 'roles'" placeholder="Select" v-model="edit[editProp]">
                    <vs-option label="Super Administrator" value="super_admin">
                        Super Administrator
                    </vs-option>
                    <vs-option label="Administrator" value="admin">
                        Administrator
                    </vs-option>
                </vs-select>
            </vs-dialog>

            <vs-pagination progress  style="margin-top:10px" v-model="page" :length="$vs.getLength(users, max)" />
            <!--            todo:base-->
            <span class="data">
                <pre hidden>
                    {{ selected.length > 0 ? selected : 'Select an item in the table' }}
                </pre>
            </span>
        </div>
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
            editActive: false,
            edit: null,
            editProp: {},
            users: [],
            loading:null,
        }
    },
    created() {
    },
    beforeMount() {
        // this.UserRoles();
    },
    mounted() {
        this.UserRoles();
    },
    methods: {
        //todo:second step (backendApi)
        UserRoles(){
            // this.openLoading();

            let request={token:"",provider:""};

            //todo:call mutation and pass object data
            //todo:should make axios request to get user object
            //todo:make an api in back to return full user object
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){
                request.token=localStorage.getItem("token");
                request.provider=localStorage.getItem("provider");
                axios.get('/admin-role/users-role?token='+request.token+
                    '&provider='+request.provider)
                    .then((response)=>{
                        this.users=response.data;
                    })
                    .catch((error)=>{
                        alert("Token has Invalid");
                    });
            }
        }
    },
    openLoading() {
        this.loading = this.$vs.loading({
            target: this.$refs.content,
            color: 'dark'
        });
    },
}
</script>

<style scoped>

</style>
