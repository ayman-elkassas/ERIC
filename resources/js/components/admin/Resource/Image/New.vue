<template>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Add New Admin</h4>
                                        <span>Admin can control between all users can share any information</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <router-link to="/home"><i class="feather icon-home"></i></router-link>
                                        </li>
                                        <li class="breadcrumb-item">Home</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Create your admin</h5>
                                        <span>Admin can create any post in any user timeline...</span>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                <li><i class="feather icon-trash-2 close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Admin Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Type admin name in placeholder">
                                                </div>
                                            </div>
                                            <div class="form-group row has-error">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control input-danger" id="email" name="email" placeholder="Enter valid e-mail address">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row has-error">
                                                <label class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control input-danger" id="password" name="password" placeholder="Password input">
<!--                                                    <span class="messages"><p class="text-danger error">Password can't be blank</p></span>-->
                                                </div>
                                            </div>
                                            <div class="form-group row has-error">
                                                <label class="col-sm-2 col-form-label">Repeat Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control input-danger" id="repeat-password" name="repeat-password" placeholder="Repeat Password">
<!--                                                    <span class="messages"><p class="text-danger error">Repeat password can't be blank</p></span>-->
                                                </div>
                                            </div>

                                            <div class="form-group row has-error">
                                                <label class="col-sm-2 col-form-label">Upload Avatar</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="files[]" id="filer_input" multiple="multiple">

                                                    <br>
                                                    <div class="btn-group dropdown-split-success">
                                                        <button type="button" class="btn btn-success"><i class="icofont icofont-check-circled"></i>Save</button>
                                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle primary</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item waves-effect waves-light" href="#">Public</a>
                                                            <a class="dropdown-item waves-effect waves-light" href="#">Only me</a>
                                                            <a class="dropdown-item waves-effect waves-light" href="#">Specific users</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item waves-effect waves-light" href="#">Timeline</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

//todo: include component script

export default {
    name: "New",
    mounted() {
    }
}

</script>

<style scoped>

</style>
