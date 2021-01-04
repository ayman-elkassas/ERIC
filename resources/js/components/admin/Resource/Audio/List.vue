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
                            Create Audio List
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
                    <vs-col style="width:16.0%" w="2">
                        <vs-button
                            icon
                            success
                            relief
                            @click="createNewUser()"
                        >
                            <i class='bx bx-plus' ></i> Create Audio List
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
                                <i class='bx bx-trash' ></i> Delete All Lists
                            </vs-button>
                            <template #tooltip>
                                Delete All Playlist And Initialize User Role &#128540;
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
                                Playlist Name
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
                            v-for="(tr, i) in $vs.getPage($vs.getSearch(getAllPdf, search), page, max)"
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
                                {{tr.desc}}
                            </vs-td>

                            <vs-td>
                                {{ tr.resource_user.fname }} {{tr.resource_user.lname }}
                            </vs-td>

                            <vs-td>
                                <vs-avatar writing >
                                    <img :src="avatars[tr.resource_user.id]" alt="" style="margin-right: 3px"  width="30px"/>
                                </vs-avatar>
                            </vs-td>

                            <vs-td>
                                {{ tr.resource_field.name }}
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
                                                           @click="viewTopic(tr.id,i+(page-1)*15)"
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

            <vs-dialog prevent-close v-if="data.length>0" blur v-model="activeView">

                <vs-row>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <AudioPlayer :title="data[index].desc" :mainSong="data[index].file_path" :playlist="childeren[id]"></AudioPlayer>
                    </vs-col>

                </vs-row>
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

    </div>
</template>

<script>
import AudioPlayer from "../../AudioPlayer/AudioPlayer";

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
            avatars:[],
            childeren:[],
            activeSidebar: '',
            videoPlay:"",
        }
    },
    beforeCreate() {
        //todo:first step
        this.$store.dispatch("AllResourceAudio");
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
        getAllPdf(){
            //todo:last step render value to component
            const pdf=this.$store.getters.getAllResourceAudio;

            if(!(pdf.length>0)) return []

            if(pdf.length>0){
                this.avatars=pdf[pdf.length - 1 ];
                pdf.pop();

                this.childeren=pdf[pdf.length - 1 ];
                pdf.pop();
            }

            this.data=pdf;

            return this.data;
        },
    },
    methods: {
        createNewUser(){
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'audio-new', params: { status: 1 } });
        },
        editCurrentUser(id,index){
            //todo:if you want to send params to component in router-link should call as <name> no <path>
            this.$router.push({name: 'audio-new', params: { status: 2,id:id,avatar:this.avatars[this.data[index].user_id],data:this.data[index] } });
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
        viewTopic(id,i){
            debugger;
            this.index=i;
            this.id=id;
            this.activeView=true;
            this.videoPlay=this.getAllPdf[i].file_path;
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

            axios.delete('/admin-image/image/'+(this.id)+'?token='+this.authInfo.token+
                '&provider='+this.authInfo.provider)
                .then((response)=>{
                    if(response.data!=="error"){
                        loading.close();
                        this.openNotification('top-right',
                            'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            "Playlist Is Deleted Successfully",
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
            this.$store.dispatch("AllResourceAudio");
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

                axios.get('/admin-audio/remove-all-audio?token='+this.authInfo.token+
                    '&provider='+this.authInfo.provider)
                    .then((response)=>{
                        if(response.data!=="error"){
                            this.loading.close();
                            this.openNotification('top-right',
                                'danger',
                                `<i class='bx bx-select-multiple' ></i>`,
                                "All Playlist Are Deleted Successfully",
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
        handleClose () {
            console.log('close event')
        }
    },
    watch:{
        page(newVal,oldVal){
            // alert(newVal)
            // debugger
            // this.index=this.index+(this.page-1)*15;
        },
    },
    components: {
        AudioPlayer
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

.con-image {
    border-radius :inherit
}




</style>
