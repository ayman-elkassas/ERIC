<template>

    <div class="card">
        <div class="card-header">
            <h5>Add New Admin</h5>
            <span>Admin can control between all users can share any information</span>
        </div>
        <div class="card-body">

            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Admin Name</label>
                    <div class="col-sm-10">
<!--                        input-->
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <input class="form-control" type="text" placeholder="Admin FullName" data-original-title="" title="">
                        </div>
                    </div>
                </div>
                <div class="form-group row has-error">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inbox"></i></span></div>
                            <input class="form-control" type="text" placeholder="Email" data-original-title="" title="">
                        </div>
                        <span class="messages"></span>
                    </div>
                </div>

                <div class="form-group row has-error">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input class="form-control" type="password" name="password" placeholder="Password" data-original-title="" title="">
                        </div>
                    </div>
                </div>

                <div class="form-group row has-error">
                    <label class="col-sm-2 col-form-label">Repeat Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input class="form-control" type="password" name="repeat-password" placeholder="Repeat Password" data-original-title="" title="">
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

                        <button class="btn btn-pill btn-success btn-air-success"
                                type="button" data-original-title="btn btn-pill btn-secondary btn-air-secondary btn-air-secondary"
                                title="">Save</button>

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
        }
    }),
    methods: {
        removeAllFiles() {
            this.$refs.dropzone.removeAllFiles();
        }
    },
    mounted() {
        //todo:run any js can mounted
    }
}

</script>

<style scoped>

</style>
