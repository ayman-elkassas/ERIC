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
                                                <label class="col-sm-2 col-form-label">Select User</label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-placeholder-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                                        <option value="AL">Video</option>
                                                        <option value="WY">Audio</option>
                                                        <option value="WY">Text</option>
                                                        <option value="WY">Image</option>
                                                        <option value="WY">Pdf</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Course Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Course Title in placeholder">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Course Description</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" cols="5" class="form-control" placeholder="Type your description in placeholder"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Field Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Field Name in placeholder">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Select Category Name</label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-placeholder-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                                        <option value="AL">Video</option>
                                                        <option value="WY">Audio</option>
                                                        <option value="WY">Text</option>
                                                        <option value="WY">Image</option>
                                                        <option value="WY">Pdf</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" placeholder="Course Price in placeholder">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Select Type Media</label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-placeholder-multiple col-sm-12 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                                                        <option value="AL">Video</option>
                                                        <option value="WY">Audio</option>
                                                        <option value="WY">Text</option>
                                                        <option value="WY">Image</option>
                                                        <option value="WY">Pdf</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row has-error">
                                                <label class="col-sm-2 col-form-label">Upload Course Banner</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="files[]" id="filer_input" multiple="multiple">
                                                </div>
                                            </div>

                                            <div class="form-group row has-error">
                                                <label class="col-sm-2 col-form-label">Upload Course Content</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="files[]" id="filer_input1" multiple="multiple">
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
import 'jquery/src/jquery'
// import slide from '../../../admin-js/slide-div';

//todo:Input avatar
import jf from 'admin-panel/files/assets/pages/jquery.filer/js/jquery.filer.min'
import cf from 'admin-panel/files/assets/pages/filer/custom-filer'
import fu from 'admin-panel/files/assets/pages/filer/jquery.fileuploads.init'

//todo:select
import sf from 'admin-panel/files/assets/js/select2/js/select2.full.min'
import bm from  'admin-panel/files/assets/js/bootstrap-multiselect/js/bootstrap-multiselect'
import jms from  'admin-panel/files/assets/js/multiselect/js/jquery.multi-select'
import jq from  'admin-panel/files/assets/js/jquery.quicksearch'
import sc from  'admin-panel/files/assets/pages/advance-elements/select2-custom'

export default {
    name: "New",
    mounted() {
        slide.slide_call();

        jf.input_call();
        cf.input_call();
        fu.input_call();

        sf.select_ops();
        bm.select_ops();
        jms.select_ops();
        jq.select_ops();
        sc.select_ops();
    }
}

</script>

<style scoped>

</style>
