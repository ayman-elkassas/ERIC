<template>
    <div class="auth-side-form">
        <div class="auth-content">
            <h3 class="mb-4 f-w-400">Sign Up</h3>
            <div>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                        <vs-input v-model="request.name" placeholder="Username">
                            <template v-if="request.name === '' " #message-danger>
                                Required
                            </template>
                        </vs-input>
                    </vs-col>
                </vs-row>
                <br>
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

                <vs-button
                    block
                    @click="openLoading()">
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
            emailValid:false,
            passwordValid:0,
            percent: 0,
            interval:null,
            loading:null,
            color: '#7a76cb',
        }
    },
    created() {
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

            if(this.emailValid && this.passwordValid >60) {
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

                axios.post('/auth/register',this.request)
                    .then((response)=>{

                        this.openNotification('top-left', 'success',
                            `<i class='bx bx-select-multiple' ></i>`,
                            'Add New Admin Account Successfully',
                            'New Admin added with rules and permissions');

                        this.loading.close()
                        clearInterval(this.interval)
                        this.percent = 0

                        this.$router.push('/auth-login');

                    })
                    .catch((error)=>{
                        this.openNotification('top-left', 'danger',
                            `<i class='bx bxs-bug' ></i>`,
                            'Make Sure From Credentials',
                            'Username or password not matched with account credentials,' +
                            'make sure and try again...');

                        this.loading.close()
                        clearInterval(this.interval)
                        this.percent = 0
                    });
            }
            else {
                this.openNotification('top-left', 'danger', `<i class='bx bxs-bug' ></i>`
                ,'Make Sure From Credentials','Username or password not matched with account credentials, make sure and try again...');
            }


        },
        openNotification(position = null, border,icon,title,text) {
            const noti = this.$vs.notification({
                border,
                icon,
                progress: 'auto',
                position,
                title:title ,
                text:text
            })
        }
    }
}
</script>

<style scoped>

.vs-button--icon{
    display:inline;
}

</style>
