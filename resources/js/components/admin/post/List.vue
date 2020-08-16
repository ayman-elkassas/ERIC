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
                                        <h4>User Posts Created</h4>
                                        <span>Posts CRUD Page, Can Edit And Display</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card">
                                    <div class="card-header table-card-header">
                                        <h5>Export Buttons</h5>
<!--                                        Add new post-->
                                        <div class="btn-group btn-group-sm" style="float: right;">
                                            <button type="button" class="footable-add btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><router-link style="color: white" to="/post-add"><i class="icofont icofont-plus"></i> Add Post</router-link></button>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <div id="basic-btn_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                                <table id="basic-btn" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="basic-btn_primary">
                                                    <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-btn" rowspan="1" colspan="1" aria-sort="ascending" aria-label="index: activate to sort column descending" style="width: 10%;">#</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-btn" rowspan="1" colspan="1" aria-sort="ascending" aria-label="title: activate to sort column descending" style="width: 30%;">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-btn" rowspan="1" colspan="1" aria-label="desc: activate to sort column ascending" style="width: 50%;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-btn" rowspan="1" colspan="1" aria-label="user: activate to sort column ascending" style="width: 10%;">User Created</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-btn" rowspan="1" colspan="1" aria-label="avatar: activate to sort column ascending" style="width: 10%;">Avatar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-btn" rowspan="1" colspan="1" aria-label="field: activate to sort column ascending" style="width: 10%;">Field</th>
                                                    <th aria-label="Edit: activate to sort column ascending" style="width: 5%;">Edit</th>
                                                    <th aria-label="Delete: activate to sort column ascending" style="width: 5%;">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">1</td>
                                                    <td class="sorting_1">Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>Tokyo</td>
                                                    <td>Tokyo</td>
                                                    <td style="white-space: nowrap; width: 1%;text-align:center;vertical-align:middle">
                                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-edit"></span></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="white-space: nowrap; width: 1%;text-align:center;vertical-align:middle">
                                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">2</td>
                                                    <td class="sorting_1">Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>San Francisco</td>
                                                    <td>San Francisco</td>
                                                    <td style="white-space: nowrap; width: 1%;text-align:center;vertical-align:middle">
                                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-edit"></span></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="white-space: nowrap; width: 1%;text-align:center;vertical-align:middle">
                                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                                <button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">#</th>
                                                    <th rowspan="1" colspan="1">Title</th>
                                                    <th rowspan="1" colspan="1">Description</th>
                                                    <th rowspan="1" colspan="1">User Created</th>
                                                    <th rowspan="1" colspan="1">Avatar</th>
                                                    <th rowspan="1" colspan="1">Field</th>
                                                    <th rowspan="1" colspan="1">Edit</th>
                                                    <th rowspan="1" colspan="1">Delete</th></tr>
                                                </tfoot>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="styleSelector">
            </div>

        </div>

<!--        datatable-->

<!--        <script src="../../helperfiles/bower_components/datatables.net/js/jquery.dataTables.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/js/jszip.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script type="9e8b5592bad3a80efa739fb4-text/javascript" src="../../helperfiles/assets/pages/data-table/js/pdfmake.min.js"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/js/vfs_fonts.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/extensions/buttons/js/jszip.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/bower_components/datatables.net-buttons/js/buttons.print.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/bower_components/datatables.net-buttons/js/buttons.html5.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
<!--        <script src="../../helperfiles/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->


        <!--    <script src="../../../app.js" type="9e8b5592bad3a80efa739fb4-text/javascript"></script>-->
    </div>

</template>

<script>
export default {
name: "List",
    // created(){
    //     let externalScript = document.createElement('script')
    //     externalScript.setAttribute('src', '../../helperfiles/bower_components/datatables.net-buttons/js/buttons.html5.min.js')
    //     externalScript.setAttribute('type','9e8b5592bad3a80efa739fb4-text/javascript')
    //     document.head.appendChild(externalScript)
    // }
}
</script>

<style scoped>

</style>
