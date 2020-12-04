<template>
    <div class="card">
        <div class="card-header">
            <h5>Welcome Admin</h5>
            <span>Home Page Admin Panel...</span>
        </div>
        <div  class="card-body">
            <div class="card o-hidden profile-greeting">
                    <div ref="content" class="content-div card-body">
                    <div class="media">
                        <div class="badge-groups w-100">
                            <div class="badge f-12"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock mr-1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span id="txt">Session started in {{getHours}} : {{getMinutes}}</span></div>
                            <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                        </div>
                    </div>
                    <div class="greeting-user text-center">
                        <div class="profile-vector"><img class="img-fluid" src="./welcome.png" alt="" data-original-title="" title=""></div>
                        <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                        <p><span> You have done 57.6% more sales today. Check your new badge in your profile.</span></p>
                        <div class="whatsnew-btn"><a class="btn btn-primary" data-original-title="" title="">Whats New !</a></div>
                        <div class="left-icon"><i class="fa fa-bell"> </i></div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
    export default {
        name: "AdminHome",
        data: () => ({
            hour:0,
            minute:0,
            date:new Date()
        }),
        mounted() {
            this.openLoading();
            setTimeout(this.getHour(), 1000);
            setTimeout(this.getMinute(), 1000);
        },
        methods:{
            openLoading() {
                const loading = this.$vs.loading({
                    target: this.$refs.content,
                    color: 'dark'
                })
                setTimeout(() => {
                    loading.close()
                }, 6000)
            },
            getHour(){
                this.hour =this.date.getHours();
            },
            getMinute(){
                this.minute=this.date.getMinutes()
            }
        },
        computed:{
            getHours(){
                return this.hour;
            },
            getMinutes(){
                return this.minute;
            }
        }
    }
</script>

<style scoped>

</style>
