<template>

    <div class="card">
        <div class="card-header">
            <template>
                <div class="center">
                    <vs-alert color="warn">
                        <template #title>
                            Add New Course
                        </template>
                        Admin can control between all users can share any information
                    </vs-alert>
                </div>
            </template>
        </div>
        <div class="card-body">

            <form>
                <div class="row product-page-main">
                    <div class="col-xl-6">
                        <div class="center content-inputs">
                            <vs-input
                                v-model="value1"
                                label="Course Title"
                            >
                                <template #icon>
                                    <i class='bx bxl-blogger'></i>
                                </template>
                            </vs-input>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="center content-inputs">
                            <vs-input
                                v-model="value1"
                                label="Course Description"
                            >
                                <template #icon>
                                    <i class='bx bx-message-alt'></i>
                                </template>
                            </vs-input>
                        </div>
                    </div>
                </div>

                <div class="row product-page-main">
                    <div class="col-xl-6">
                        <div class="center content-inputs">
                            <vs-input
                                type="number"
                                v-model="value1"
                                label="Course Price"
                            >
                                <template #icon>
                                    <i class='bx bx-money'></i>
                                </template>
                            </vs-input>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="center content-inputs">
                            <vs-select
                                label="Category Name"
                                filter
                                multiple
                                v-model="value6"
                            >
                                <vs-option-group>
                                    <div slot="title">
                                        Vuejs
                                    </div>
                                    <vs-option label="Vuesax" value="1">
                                        Vuesax
                                    </vs-option>
                                    <vs-option label="Vue" value="2">
                                        Vue
                                    </vs-option>
                                    <vs-option label="Javascript" value="3">
                                        Javascript
                                    </vs-option>
                                </vs-option-group>
                                <vs-option-group>
                                    <div slot="title">
                                        Others
                                    </div>
                                    <vs-option label="Sass" value="4">
                                        Sass
                                    </vs-option>
                                    <vs-option label="Typescript" value="5">
                                        Typescript
                                    </vs-option>
                                    <vs-option label="Webpack" value="6">
                                        Webpack
                                    </vs-option>
                                    <vs-option label="Nodejs" value="7">
                                        Nodejs
                                    </vs-option>
                                </vs-option-group>
                            </vs-select>

                        </div>
                    </div>
                </div>

                <div class="row product-page-main">
                    <div class="col-xl-6">
                        <div class="center content-inputs">
                            <vs-select
                                label="Type Media"
                                filter
                                multiple
                                v-model="value6"
                            >
                                <vs-option-group>
                                    <div slot="title">
                                        Vuejs
                                    </div>
                                    <vs-option label="Vuesax" value="1">
                                        Vuesax
                                    </vs-option>
                                    <vs-option label="Vue" value="2">
                                        Vue
                                    </vs-option>
                                    <vs-option label="Javascript" value="3">
                                        Javascript
                                    </vs-option>
                                </vs-option-group>
                                <vs-option-group>
                                    <div slot="title">
                                        Others
                                    </div>
                                    <vs-option label="Sass" value="4">
                                        Sass
                                    </vs-option>
                                    <vs-option label="Typescript" value="5">
                                        Typescript
                                    </vs-option>
                                    <vs-option label="Webpack" value="6">
                                        Webpack
                                    </vs-option>
                                    <vs-option label="Nodejs" value="7">
                                        Nodejs
                                    </vs-option>
                                </vs-option-group>
                            </vs-select>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="center content-inputs">
                            <vs-select
                                label="Course Owner"
                                filter
                                multiple
                                v-model="value6"
                            >
                                <vs-option-group>
                                    <div slot="title">
                                        Vuejs
                                    </div>
                                    <vs-option label="Vuesax" value="1">
                                        Vuesax
                                    </vs-option>
                                    <vs-option label="Vue" value="2">
                                        Vue
                                    </vs-option>
                                    <vs-option label="Javascript" value="3">
                                        Javascript
                                    </vs-option>
                                </vs-option-group>
                                <vs-option-group>
                                    <div slot="title">
                                        Others
                                    </div>
                                    <vs-option label="Sass" value="4">
                                        Sass
                                    </vs-option>
                                    <vs-option label="Typescript" value="5">
                                        Typescript
                                    </vs-option>
                                    <vs-option label="Webpack" value="6">
                                        Webpack
                                    </vs-option>
                                    <vs-option label="Nodejs" value="7">
                                        Nodejs
                                    </vs-option>
                                </vs-option-group>
                            </vs-select>

                        </div>
                    </div>
                </div>


                <div class="form-group row has-error">
                    <label class="col-sm-2 col-form-label">Upload Avatar</label>
                    <div class="col-sm-10">

                        <vueDropzone ref="dropzone" :useCustomSlot=true class="dropzone digits dz-clickable" id="drop1" :options="dropOptions" :include-styling="false">
                            <div class="dz-message needsclick"><i class="fa fa-upload"></i>
                                <h6>Drop file here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                            </div>
                        </vueDropzone>

                        <div class="card-body megaoptions-border-space-sm">
                            <form class="mega-inline">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="media p-20">
                                                <div class="radio radio-primary mr-3">
                                                    <input id="radio14" type="radio" name="radio1" value="option1" data-original-title="" title="">
                                                    <label for="radio14"></label>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-0 mega-title-badge">Private<span class="badge badge-primary pull-right digits">50 INR</span></h6>
                                                    <p>Estimated 1 Day Shipping ( Duties end tax may be due delivery )</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="media p-20">
                                                <div class="radio radio-success mr-3">
                                                    <input id="radio13" type="radio" name="radio1" value="option1" data-original-title="" title="">
                                                    <label for="radio13"></label>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-0 mega-title-badge">Public<span class="badge badge-success pull-right digits">100 INR</span></h6>
                                                    <p>Estimated 1 Day Shipping ( Duties end tax may be due delivery )</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <br>
                            <form class="mega-inline">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="media p-20">
                                                <div class="radio radio-danger mr-3">
                                                    <input id="radio12" type="radio" name="radio1" value="option1" data-original-title="" title="">
                                                    <label for="radio12"></label>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-0 mega-title-badge">Read only<span class="badge badge-danger pull-right digits">100 INR</span></h6>
                                                    <p>Estimated 1 Day Shipping ( Duties end tax may be due delivery )</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="media p-20">
                                                <div class="radio radio-secondary mr-3">
                                                    <input id="radio11" type="radio" name="radio1" value="option1" data-original-title="" title="">
                                                    <label for="radio11"></label>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-0 mega-title-badge">Share Now<span class="badge badge-secondary pull-right digits">100 INR</span></h6>
                                                    <p>Estimated 1 Day Shipping ( Duties end tax may be due delivery )</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <vs-button
                            size="large"
                            color="success"
                            circle
                        >
                            Save
                        </vs-button>

                    </div>
                </div>

            </form>
        </div>
    </div>

</template>

<script>
export default {
    name: "New",
    data: () => ({
        dropOptions: {
            url: "https://httpbin.org/post",
            maxFilesize: 2, // MB
            maxFiles: 4,
            chunking: true,
            chunkSize: 500, // Bytes
            thumbnailWidth: 70, // px
            thumbnailHeight: 70,
            addRemoveLinks: true,
        },
        value1:"",
        value2:"",
        value3:"",
        value4:"",
        value5:"",
        value6:[""],
        hasVisiblePassword: false,
        textarea: '',
        counterDanger: false
    }),
    methods: {
        removeAllFiles() {
            this.$refs.dropzone.removeAllFiles();
        }
    },
    mounted() {
        //todo:run any js can mounted
    },
    computed:{
        validEmail() {
            return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.value3)
        },
        getProgress() {
            let progress = 0

            // at least one number

            if (/\d/.test(this.value)) {
                progress += 20
            }

            // at least one capital letter

            if (/(.*[A-Z].*)/.test(this.value)) {
                progress += 20
            }

            // at menons a lowercase

            if (/(.*[a-z].*)/.test(this.value)) {
                progress += 20
            }

            // more than 5 digits

            if (this.value.length >= 6) {
                progress += 20
            }

            // at least one special character

            if (/[^A-Za-z0-9]/.test(this.value)) {
                progress += 20
            }

            return progress
        }
    }
}

</script>

<style scoped>

</style>
