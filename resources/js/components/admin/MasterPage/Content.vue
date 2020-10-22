<template>
    <div>
<!--        todo:what is a router-view do ?-->
<!--            router-view is listen be replaced with component that path is the same path of-->
<!--            (localhost/ERIC/-PATH-)-->
        <router-view></router-view>
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
