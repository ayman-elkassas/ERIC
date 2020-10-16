<template>
    <div class="auth-side-form">
        <div class="auth-content">
            <h3 class="mb-4 f-w-400">Sign Up</h3>
            <div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                    </div>
                    <input
                        required autofocus
                        v-model="request.name"
                        type="text" name="name" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bx bx-mail-send"></i></span>
                    </div>
                    <!--                    todo:email input-->
                    <input type="email"
                           name="email"
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

                <vs-button
                    block
                    @click="registerAdmin"
                >
                    Sign Up
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

                <p class="mb-2 mt-4 text-muted">Already have an account? <router-link to="/auth-login" class="f-w-400">SignIn</router-link></p>

            </div>

        </div>

    </div>
</template>

<script>
export default {
    name: "Register",
    data(){
        return{
            request:{
                name:"",
                email:"",
                password:"",
            },
        }
    },
    methods:{
        registerAdmin(){
            axios.post('/auth/register',this.request)
                .then((response)=>{
                    alert("Done Added Successfully")
                })
                .catch((error)=>{
                    console.log(error.response);
                });
        }
    }
}
</script>

<style scoped>

.vs-button--icon{
    display:inline;
}

</style>
