<template>

        <div class="auth-wrapper align-items-stretch aut-bg-img">

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
    mounted() {
        this.$router.push('/auth-login');
    }
}
</script>

<style scoped>
.auth-wrapper{
    background-image: url("./login-back.jpg");
}

</style>
