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
                            Create New Pdf
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
                            <i class='bx bx-plus' ></i> Create Pdf
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
                                @click="deleteAllCategory()"
                            >
                                <i class='bx bx-trash' ></i> Delete All Text
                            </vs-button>
                            <template #tooltip>
                                Delete All Pdf And Initialize User Role &#128540;
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
                                File Name
                            </vs-th>

                            <vs-th>
                                User Creation
                            </vs-th>

                            <vs-th>
                                Avatar
                            </vs-th>

                            <vs-th>
                                Category Name
                            </vs-th>

                            <vs-th>
                                Created At
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
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getAllTxt, search), page, max)"
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
                                <router-link :to="tr.desc">{{tr.desc}}.pdf</router-link>
                            </vs-td>

                            <vs-td>
                                {{ tr.fname }} {{ tr.lname }}
                            </vs-td>

                            <vs-td>
                                <vs-avatar writing >
                                    <img :src="tr.avatar" alt="" style="margin-right: 3px"  width="30px"/>
                                </vs-avatar>
                            </vs-td>

                            <vs-td>
                                {{ tr.name }}
                            </vs-td>

                            <vs-td>
                                {{ tr.created_at }}
                            </vs-td>

                            <template #expand>
                                <div class="con-content">
                                    <div class="grid">
                                        <vs-row>
                                            <vs-col :key="index" v-for="col,index in 12" vs-type="flex-end" w="1">
                                                <vs-button
                                                    v-if="col===10" flat icon
                                                    primary
                                                    @click="editCurrentUser(tr.id,i+(page-1)*15)"
                                                >
                                                    <i class='bx bx-edit' ></i>
                                                </vs-button>
                                                <vs-button v-if="col===11"
                                                           flat icon
                                                           warn
                                                           @click="viewTopic(i+(page-1)*15)"
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

<!--            &lt;!&ndash;            view dialogue&ndash;&gt;-->
<!--            <vs-dialog blur v-model="activeView">-->

<!--                <template #header>-->
<!--                    &lt;!&ndash;                    <h3>&ndash;&gt;-->
<!--                    &lt;!&ndash;                        Introduction&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </h3>&ndash;&gt;-->
<!--                </template>-->

<!--                <div v-if="data.length>0" class="con-content">-->


<!--                    <div class="card-body viewPost">-->
<!--                        <div class="d-flex justify-content-start align-items-center mb-1 mt-0">-->

<!--                            &lt;!&ndash; avatar &ndash;&gt;-->
<!--                            <div class="avatar mr-3">-->
<!--                                <vs-avatar writing badge badge-color="success">-->
<!--                                    <img :src="avatars[getAllPosts[index].user_id]" alt="">-->
<!--                                </vs-avatar>-->
<!--                            </div>-->

<!--                            &lt;!&ndash;/ avatar &ndash;&gt;-->
<!--                            <div class="profile-user-info">-->
<!--                                <h6 class="mb-0">{{ getAllPosts[index].post_user.fname }} {{ getAllPosts[index].post_user.lname }}</h6>-->
<!--                                <small class="text-muted">{{getAllPosts[index].created_at}}</small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <p style="color: #7366ff;" class="card-title mt-3">-->
<!--                            <b>{{ getAllPosts[index].post_field.name }}</b>-->
<!--                        </p>-->
<!--                        <p class="card-title mt-0">-->
<!--                            <b>{{ getAllPosts[index].title }}</b>-->
<!--                        </p>-->
<!--                        <p class="card-text mt-0">-->
<!--                            {{ getAllPosts[index].desc.replace(/<[^>]*>/g, '') }}-->
<!--                        </p>-->
<!--                        &lt;!&ndash; post img &ndash;&gt;-->
<!--                        <img class="img-fluid rounded mb-3" src="../../images/back.jpg" alt="avatar img">-->
<!--                        &lt;!&ndash;/ post img &ndash;&gt;-->

<!--                        &lt;!&ndash; like share &ndash;&gt;-->
<!--                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">-->
<!--                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">-->
<!--                                <a href="javascript:void(0)" class="d-flex align-items-center text-muted text-nowrap">-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart profile-likes font-medium-3 mr-50"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>-->
<!--                                    <span class="ml-2">1.25k</span>-->
<!--                                </a>-->

<!--                                &lt;!&ndash; avatar group with tooltip &ndash;&gt;-->
<!--                                <div class="d-flex align-items-center ml-3">-->

<!--                                    <vs-avatar-group max="8">-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar >-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                        <vs-avatar size="35">-->
<!--                                            <img src="../../images/user.png" alt="">-->
<!--                                        </vs-avatar>-->
<!--                                    </vs-avatar-group>-->

<!--                                    <a href="javascript:void(0)" class="text-muted text-nowrap ml-3">+140 more</a>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; avatar group with tooltip &ndash;&gt;-->
<!--                            </div>-->

<!--                            &lt;!&ndash; share and like count and icons &ndash;&gt;-->
<!--                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">-->
<!--                                <a href="javascript:void(0)" class="text-nowrap">-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square text-body font-medium-3 mr-50"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>-->
<!--                                    <span class="text-muted mr-1">1.25k</span>-->
<!--                                </a>-->

<!--                                <a href="javascript:void(0)" class="text-nowrap">-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 text-body font-medium-3 mx-50"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>-->
<!--                                    <span class="text-muted">1.25k</span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            &lt;!&ndash; share and like count and icons &ndash;&gt;-->
<!--                        </div>-->
<!--                        &lt;!&ndash; like share &ndash;&gt;-->

<!--                        &lt;!&ndash; comments &ndash;&gt;-->
<!--                        <div class="d-flex align-items-start mb-1">-->
<!--                            <div class="avatar mt-25 mr-2">-->
<!--                                <img src="../../images/user.png" alt="Avatar" width="34" height="34">-->
<!--                            </div>-->
<!--                            <div class="profile-user-info w-100">-->
<!--                                <div class="d-flex align-items-center justify-content-between">-->
<!--                                    <h6 class="mb-0">Kitty Allanson</h6>-->
<!--                                    <a href="javascript:void(0)">-->
<!--                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart text-body font-medium-3"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>-->
<!--                                        <span class="align-middle text-muted">34</span>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                                <small>Easy &amp; smart fuzzy search🕵🏻 functionality which enables users to search quickly.</small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        &lt;!&ndash;/ comments &ndash;&gt;-->

<!--                        &lt;!&ndash; comment box &ndash;&gt;-->
<!--                        <fieldset class="form-label-group mb-2">-->
<!--                            <textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>-->
<!--                        </fieldset>-->
<!--                        &lt;!&ndash;/ comment box &ndash;&gt;-->
<!--                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light">Post Comment</button>-->
<!--                    </div>-->


<!--                </div>-->

<!--            </vs-dialog>-->

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
            activeView:false,
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
            activeOr:true,
        }
    },
    beforeCreate() {
        //todo:first step
        this.$store.dispatch("AllResourceTxt");
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/admin/invalidToken';
        }
    },
    mounted() {
        //this.$store.dispatch("AllFieldsWithCategoriesUnder");
    },
    computed:{
        getAllTxt(){
            //todo:last step render value to component
            const txt=this.$store.getters.getAllResourceTxt;

            if(!(txt.length>0)) return []
            this.data=txt;
            // debugger

            return txt;
        },
    },
    methods: {
        createNewUser(){
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'text-new', params: { status: 1 } });
        },
        editCurrentUser(id,index){
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'text-new', params: { status: 2,id:id,avatar:this.data[index].avatar,data:this.data[index] } });
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
        viewTopic(i){
            debugger;
            this.index=i;
            this.activeView=true;
        },
        deleteRole(i){
            this.id=i
            this.active_ensure=true
        },
        performDelete(){

            const loading = this.$vs.loading({
                target: this.$refs.button3,
                scale: '0.6',
                background: 'danger',
                opacity: 1,
                color: '#fff'
            })

            axios.delete('/admin-txt/txt/'+(this.id)+'?token='+this.authInfo.token+
                '&provider='+this.authInfo.provider)
                .then((response)=>{
                    if(response.data!=="error"){
                        loading.close();
                        this.openNotification('top-right',
                            'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Pdf Is Deleted Successfully",
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
            this.$store.dispatch("AllResourceTxt");
        },
        deleteAllCategory(){
            if(localStorage.hasOwnProperty('token')
                && localStorage.hasOwnProperty('provider')){

                this.loading = this.$vs.loading({
                    target: this.$refs.button,
                    scale: '0.6',
                    background: 'danger',
                    opacity: 1,
                    color: '#fff'
                })

                axios.get('/admin-post/remove-all-posts?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider)
                    .then((response)=>{
                        if(response.data!=="error"){
                            this.loading.close();
                            this.openNotification('top-right',
                                'danger',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "All Fields Are Deleted Successfully",
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
        truncate(source,size){
            return source.length > size ? source.slice(0, size - 1) + "…" : source;
        }
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

.con-content .viewPost{
    margin: 20px 0px;
    position: relative;
    display: block;
    font-size: .9rem;
}

</style>
