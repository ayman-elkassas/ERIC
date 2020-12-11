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
                            Create New Scientific Topic
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
                            <i class='bx bx-plus' ></i> Create Topic
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
                            >
                                <i class='bx bx-trash' ></i> Delete All Topics
                            </vs-button>
                            <template #tooltip>
                                Delete All Topics And Initialize User Role &#128540;
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
                                Topic Name
                            </vs-th>
                            <vs-th
                                sort @click="data = $vs.sortData($event ,data, 'email')">
                                Creator email
                            </vs-th>

                            <vs-th>
                                Creator Name
                            </vs-th>

                            <vs-th>
                                Creator Avatar
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
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getAllTopics, search), page, max)"
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
                                {{ tr.category_user.email }}
                            </vs-td>

                            <vs-td>
                                {{ tr.category_user.fname }} {{ tr.category_user.lname }}
                            </vs-td>

                            <vs-td>
                                <vs-avatar writing >
                                    <img :src="avatars[tr.category_user.id]" alt="" style="margin-right: 3px"  width="30px"/>
                                </vs-avatar>
                            </vs-td>

                            <template #expand>
                                <div class="con-content">
                                    <div class="grid">
                                        <vs-row>
                                            <vs-col :key="index" v-for="col,index in 12" vs-type="flex-end" w="1">
                                                <vs-button
                                                    v-if="col===10" flat icon
                                                    primary
                                                >
                                                    <i class='bx bx-edit' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===11"
                                                           flat icon
                                                           warn
                                                >
                                                    <i class='bx bx-happy-heart-eyes' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===12"
                                                           flat icon
                                                           danger
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
                            transparent>
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
    </div>
</template>

<script>

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
            avatars:[],
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
        this.$store.dispatch("AllTopics");
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    mounted() {
        this.$store.dispatch("AllTopics");
    },
    computed:{
        getAllTopics(){
            //todo:last step render value to component
            const users=this.$store.getters.getTopics;

            if(users.length>0){
                this.avatars=users[users.length - 1 ];
                users.pop();
            }

            this.data=users;

            return users;
        },
    },
    methods: {
        createNewUser(){
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'topic-add', params: { status: 1 } });
        },
        editCurrentUser(id,index){
            debugger
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'user-new', params: { status: 2,id:id,data:this.data[index] } });
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
    watch:{
        page(newVal,oldVal){
            // alert(newVal)
            // debugger
            // this.index=this.index+(this.page-1)*15;
        }
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
