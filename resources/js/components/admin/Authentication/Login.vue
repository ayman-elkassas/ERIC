<template>
    <div class="auth-side-form">
        <div class="auth-content">
            <h3 class="mb-4 f-w-400">Sign In</h3>
            <div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-mail-send"></i></span>
                    </div>
                    <!--                    todo:email input-->
                    <input type="email"
                           name="email"
                           required autofocus
                           v-model="request.email"
                           class="form-control" placeholder="Email address">
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-lock-open-alt"></i></span>
                    </div>
                    <input type="password"
                           name="password"
                           v-model="request.password"
                           class="form-control" placeholder="Password">
                </div>

                <div style="margin-bottom: 20px">
                    <vs-checkbox
                        v-model="request.remember_me">
                        Save credentials
                    </vs-checkbox>
                </div>

                <vs-button
                    block
                    @click="loginAdmin"
                >
                    Sign in
                </vs-button>

            </div>

            <div class="text-center">
                <div class="saprator my-4"><span>OR</span></div>
                <div class="center">
                    <vs-button
                        circle
                        icon
                        floating
                    >
                        <i class='bx bxl-facebook' ></i>
                    </vs-button>
                    <vs-button
                        danger
                        circle
                        icon
                        floating
                    >
                        <i class='bx bxl-google-plus' ></i>
                    </vs-button>
                    <vs-button
                        circle
                        icon
                        floating
                    >
                        <i class='bx bxl-twitter' ></i>
                    </vs-button>
                </div>

                <p class="mb-2 mt-4 text-muted">Forgot password? <a href="" class="f-w-400">Reset</a></p>
                <p  class="mb-0 text-muted">Don’t have an account? <router-link to="/auth-register" class="f-w-400">SignUp</router-link></p>

            </div>

        </div>

    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return{
            request:{
                email:"",
                password:"",
                remember_me:false,
            },
        }
    },
    created(){
        // this.checkIfLogin();
    },
    methods:{
        loginAdmin(){
            axios.post('/auth/login',this.request)
                .then((response)=>{
                    let token=response.data.token;
                    let user=response.data.user;
                    let provider=response.data.provider;
                    if(token){
                        localStorage.setItem('token',token);
                        localStorage.setItem('provider',provider);
                        window.location="/admin?token="+token+"&provider="+provider;
                    }
                })
                .catch((error)=>{
                    alert("Error");
                });
        },
        checkIfLogin(){
            if(localStorage.getItem('token')!=null){
                window.location="/admin/";
            }
        }
    }
}
</script>

<style scoped>

</style>
