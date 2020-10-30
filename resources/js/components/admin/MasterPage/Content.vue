<template>
    <div>
<!--        todo:what is a router-view do ?-->
<!--            router-view is listen be replaced with component that path is the same path of-->
<!--            (localhost/ERIC/-PATH-)-->
        <router-view></router-view>

        <vs-dialog width="550px" not-center v-model="active">
            <template #header>
                <h4 class="not-margin">
                    Welcome to <b>ERIC</b>
                </h4>
            </template>


            <div class="con-content">
                <p>
                    ERIC is a relatively new framework with a refreshing design and in the latest trends, vuesax based on vuejs which means that we go hand in hand with one of the most popular javascript frameworks in the world and with a huge community with which you will have all the help and documentation to create and make your project
                </p>
            </div>

            <template #footer>
                <div class="con-footer">
                    <vs-button @click="active=false" transparent>
                        Ok
                    </vs-button>
                </div>
            </template>
        </vs-dialog>

    </div>
</template>

<script>

import user from './notification/userWelcome.vue'

export default {
    name: "content",
    data(){
        return{
            username:"",
            percent: 0,
            interval:null,
            loading:null,
            color: '#7a76cb',
            active:false
        }
    },
    created() {
        if(!(localStorage.hasOwnProperty("token") || !(localStorage.hasOwnProperty("provider")))){
            window.location='/auth/login';
        }
    },
    beforeMount() {
        this.openLoading();
    },
    mounted() {

        this.$router.push('/home');
        this.$store.dispatch("UserAllInfo");

        setTimeout(() => {
            this.loading.close()
            clearInterval(this.interval)
            this.percent = 0

            if(localStorage.hasOwnProperty("welcome")){
                if(localStorage.getItem("welcome")==="1"){
                    this.active=true;
                    localStorage.removeItem("welcome");
                }
                else {
                    this.active=false;
                }
            }

            this.openNotification('bottom-right',
                'success',
                `<i class='bx bx-select-multiple' ></i>`);

        }, 4000)
    },
    computed:{
        getCurrentUser(){
            return this.$store.getters.getUser
        },
    },
    methods:{
        openNotification(position = null, color,icon) {
            const notify = this.$vs.notification({
                duration:'10000',
                width: 'auto',
                content: user,
                progress: 'auto',
            })
        },
        openLoading() {

            this.loading = this.$vs.loading({
                percent: this.percent,
                background: this.color,
                color: '#fff'
            })

            this.interval= setInterval(() => {
                if (this.percent <= 100) {
                    this.loading.changePercent(`${this.percent++}%`)
                }
            }, 40)
        }
    }
}
</script>

<style scoped>

</style>
