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
                            Create New Text Notes
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
                            <i class='bx bx-plus' ></i> Create Text
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
                                Delete All Text And Initialize User Role &#128540;
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

            <vs-dialog blur overflow-hidden full-screen v-model="activeView">
                <template #header>
<!--                    <h4 class="not-margin">-->
<!--                        Welcome to <b>Vuesax</b>-->
<!--                    </h4>-->
                </template>

                <div class="con-form ">
                    <div class="pdfViewer">
                        <WebViewer :fileName="getAllTxt[index].desc" :url="getAllTxt[index].file_path"/>
                    </div>
                </div>

                <template #footer>

                </template>
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

import WebViewer from '../../PdfViewer/webViewer.vue'

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
            debugger

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

            // WebViewer({
            //     path: 'pdfViewer/', // path to the PDF.js Express'lib' folder on your server
            //     licenseKey: 'Insert commercial license key here after purchase',
            //     initialDoc: '',
            //     // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
            // }, document.getElementById('viewer'))
            //     .then(instance => {
            //
            //         instance.loadDocument(this.base64ToBlob(this.data[this.index].file_path), { filename: 'myfile.pdf' });
            //
            //         const { docViewer } = instance;
            //         docViewer.on('documentLoaded', () => {
            //             // perform document operations
            //         });
            //     });
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
    components: {
        WebViewer
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

.pdfViewer{
    width:100%;
    height: 100%;
}

</style>
