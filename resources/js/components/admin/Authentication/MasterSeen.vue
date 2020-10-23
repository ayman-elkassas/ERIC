<template>

        <div ref="target" id="target" class="center auth-wrapper align-items-stretch aut-bg-img">

            <div  class="flex-grow-1">

                <div class="h-100 d-md-flex align-items-end auth-side-img">
                    <div class="col-sm-10 auth-content w-auto">
                        <img src="./logo.svg" alt="" class="img-fluid">
                        <h1 class="text-white my-4">Welcome Back!</h1>
                        <h4 class="text-white font-weight-normal">Authenticate to your account and get explore the ERIC Dashboard.
                            <br />Do not forget to play with live customizer</h4>
                    </div>
                </div>

<!--                todo:new way with VueJs-->
                <div style="height: 100%">
                    <router-view name="login"></router-view>
                </div>

            </div>

        </div>

</template>

<script>
export default {
    name: "MasterView",
    beforeCreate() {
        this.openLoading();
    },
    data: () => ({
        color: '#7a76cb',
        loading:null,
        percent: 0,
        interval:null
    }),
    beforeMount() {
        this.openLoading();
    },
    mounted() {
        this.$router.push('/auth-login');
        setTimeout(() => {
            this.loading.close()
            clearInterval(this.interval)
            this.percent = 0
        }, 4100)
    },
    methods:{
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
.auth-wrapper{
    background-image: url("./login-back.jpg");
}

</style>
