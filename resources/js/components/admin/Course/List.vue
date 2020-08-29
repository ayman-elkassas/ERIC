<template>

    <div id="pcoded">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h4>Course User Created</h4>
                                            <span>Course CRUD Page, Can Edit And Display</span>
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
                                            <!--                                        Add new Post-->
                                            <div class="btn-group btn-group-sm" style="float: right;">
                                                <button type="button" class="footable-add btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"><router-link style="color: white" to="/course-add"><i class="icofont icofont-plus"></i> Add Course</router-link></button>
                                            </div>
                                        </div>
                                        <div class="card-block">

                                        </div>

                                    </div>
                                    <div class="default-grid row" style="position: relative; height: 1188.33px;">
                                        <div class="row lightboxgallery-popup">
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 0px; top: 0px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <router-link class="media-middle" to="./course-details">
                                                            <img class="img-fluid" :src="'images/masonry-1.jpg'" alt="masonary">
                                                        </router-link>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 265px; top: 0px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'images/masonry-2.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 530px; top: 0px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'./images/masonry-3.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 796px; top: 0px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'./images/masonry-4.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 265px; top: 451px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'./images/masonry-5.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 530px; top: 505px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'./images/masonry-6.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 796px; top: 554px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'./images/masonry-7.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 default-grid-item" style="position: absolute; left: 0px; top: 557px;">
                                                <div class="card gallery-desc">
                                                    <div class="masonry-media">
                                                        <a class="media-middle" href="#!">
                                                            <img class="img-fluid" :src="'./images/masonry-8.jpg'" alt="masonary">
                                                        </a>
                                                    </div>
                                                    <div class="card-block">
                                                        <h6 class="job-card-desc">Job Description</h6>
                                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>
                                                        <div class="job-meta-data"><i class="icofont icofont-university"></i>10 Years</div>
                                                    </div>
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

        </div>
    </div>

</template>

<script>

//todo: include component script
import 'jquery/src/jquery'
// import slide from '../../../admin-js/slide-div';

import jqi from 'admin-panel/files/assets/pages/isotope/jquery.isotope'

export default {
    name: "List",
    mounted() {
        slide.slide_call();

        jqi.grid_call();
    }
}
</script>

<style scoped>

</style>
