
<template>
    <div class="center">
        <vs-dialog not-close blur v-model="active">
            <template #header>
                <h4 class="not-margin">
                    Unauthorized <b>401</b>
                </h4>
            </template>
            <div class="con-form">

                <vs-row style="margin-bottom: 20px">
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        Sorry, your session has expired. Please refresh and try again
                    </vs-col>
                </vs-row>
                <vs-row>
                    <vs-col offset="2" w="8">
                        <vs-button
                            block
                            @click="returnToLogin()"
                        >
                            Return Login Again
                        </vs-button>
                    </vs-col>
                </vs-row>

            </div>

            <template #footer>

            </template>
        </vs-dialog>
    </div>
</template>
<script>

export default {
    data:() => ({
        active: true,
    }),
    mounted() {
        $("body").click(function (event){
            this.active=true;
        });
    },
    methods:{
        returnToLogin(){
            localStorage.removeItem("token");
            localStorage.removeItem("provider");
            window.location="/auth/login"
        }
    }
}
</script>
<style scoped>
.not-margin{
    margin: 0px;
    font-weight :normal;
    padding :10px
}

.con-form{
    width :100%
}

.con-form .flex{
    display :flex;
    align-items :center;
    justify-content :space-between
}

.con-form .flex a{
    font-size :.8rem  ;
    opacity: .7
}
.con-form .flex a:hover{
    opacity :1
}





</style>

