<template>

    <div class="auth-side-form" >
        <div class="auth-content" style="padding: 30px 40px">
            <h3 class="mb-4 f-w-400">Sign In</h3><br>
            <div>
                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <vs-input
                            required autofocus
                            v-model="request.email"
                            label="Email address"
                            placeholder="eric@eric.com">
                            <template v-if="validEmail" #message-success>
                                Email Valid
                            </template>
                            <template v-if="!validEmail && request.email !== ''" #message-danger>
                                Email Invalid
                            </template>
                        </vs-input>
                    </vs-col>
                </vs-row>
                <br>
                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <vs-input
                            type="password"
                            v-model="request.password"
                            label="Password Account"
                            placeholder="password"
                            :progress="getProgress">

                            <template v-if="getProgress >= 100" #message-success>
                                Secure password
                            </template>

                            <template v-if="getProgress < 40" #message-danger>
                                A special character-More than 6 digits-One lower case letter-An uppercase letter-A number
                            </template>

                        </vs-input>
                    </vs-col>
                </vs-row>
                <br>

                <div style="margin-bottom: 20px">
                    <vs-checkbox
                        v-model="request.remember_me">
                        Save credentials
                    </vs-checkbox>
                </div>

                <vs-button
                    block
                    @click="openLoading"
                >
                    Sign in
                </vs-button>

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
            progress: 0,
            token:"",
            provider:"",
            emailValid:false,
            passwordValid:0,
        }
    },
    created(){
        if(localStorage.hasOwnProperty('token')
            && localStorage.hasOwnProperty('provider')) {
            this.token=localStorage.getItem("token");
            this.provider=localStorage.getItem("provider");

            const loading = this.$vs.loading({
                progress: 0
            })
            const interval = setInterval(() => {
                if (this.progress <= 100) {
                    loading.changeProgress(this.progress++)
                }
            }, 40)
            window.location="/admin?token="+this.token+"&provider="+this.provider;
        }
    },
    mounted() {

    },
    computed:{
        validEmail() {
            this.emailValid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.request.email)
            return this.emailValid;
        },
        getProgress() {
            let progress = 0

            // at least one number

            if (/\d/.test(this.request.password)) {
                progress += 20
            }

            // at least one capital letter

            if (/(.*[A-Z].*)/.test(this.request.password)) {
                progress += 20
            }

            // at menons a lowercase

            if (/(.*[a-z].*)/.test(this.request.password)) {
                progress += 20
            }

            // more than 5 digits

            if (this.request.password.length >= 6) {
                progress += 20
            }

            // at least one special character

            if (/[^A-Za-z0-9]/.test(this.request.password)) {
                progress += 20
            }

            this.passwordValid=progress;
            return progress
        }
    },
    methods:{
        openLoading() {

            if(this.emailValid){
                const loading = this.$vs.loading({
                    progress: 0
                })
                const interval = setInterval(() => {
                    if (this.progress <= 100) {
                        loading.changeProgress(this.progress++)
                    }
                }, 40)

                axios.post('/auth/login',this.request)
                    .then((response)=>{
                        if(response.data.error!=null){
                            this.openNotification('top-left', 'danger', `<i class='bx bxs-bug' ></i>`);
                            loading.close()
                            clearInterval(interval)
                            this.progress = 0
                        }else
                        {
                            this.token=response.data.token;
                            let user=response.data.user;
                            this.provider=response.data.provider;
                            if(this.token){
                                localStorage.setItem('token',this.token);
                                localStorage.setItem('provider',this.provider);

                                window.location="/admin?token="+this.token+"&provider="+this.provider;

                                loading.close()
                                clearInterval(interval)
                                this.progress = 0
                            }
                        }

                    })
                    .catch((error)=>{
                        alert("Error");
                    });
            }
            else{
                this.openNotification('top-left', 'danger', `<i class='bx bxs-bug' ></i>`);
            }
        },
        openNotification(position = null, border,icon) {
            const notify = this.$vs.notification({
                border,
                icon,
                progress: 'auto',
                position,
                title: 'Make Sure From Credentials',
                text: `Username or password not matched with account credentials,
                make sure and try again...`
            })
        }
    }
}
</script>

<style scoped>

</style>
