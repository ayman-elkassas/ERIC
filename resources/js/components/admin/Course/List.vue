<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Course Available</h5>
                <span>Using Admin Panel Can Edit And Add Every Component</span>
            </div>

            <div class="card-body">

                <Menubar style="margin-bottom: 10px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px">
                    <template #start>
                        <img alt="logo" src="./../images/user.png" height="40px" class="p-mr-2">
                    </template>
                    <template #end>
                    <span class="p-input-icon-left">
                        <router-link style="color: white" to="/course-add">
                            <vs-button
                                icon
                                floating
                                success
                            >
                                <i class='bx bx-plus' ></i> Add New Course
                            </vs-button>
                        </router-link>
                    </span>
                    </template>
                </Menubar>

                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6">
                                <div class="project-box"><span class="badge badge-primary">Doing</span>
                                    <h6>Endless admin Design</h6>
                                    <div class="media"><img class="img-20 mr-1 rounded-circle" src="./images/user.png" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>Themeforest, australia</p>
                                        </div>
                                    </div>

                                    <vs-card style="margin-bottom:10px;" type="2">
                                        <template #title>
                                            <h3>Pot with a plant</h3>
                                        </template>
                                        <template  #img>
                                            <router-link to="/course-details/">
                                                <img src="./images/masonry/5.jpg" alt="">
                                            </router-link>
                                        </template>
                                        <template #text>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            </p>
                                        </template>
                                        <template #interactions>
                                            <vs-button danger icon>
                                                <i class='fa fa-heart'></i>
                                            </vs-button>
                                            <vs-button class="btn-chat" shadow primary>
                                                <i class='fa fa-inbox' ></i>
                                            </vs-button>
                                        </template>
                                    </vs-card>

                                    <div class="row details">
                                        <div class="col-6"><span>Issues </span></div>
                                        <div class="col-6 text-primary">12 </div>
                                        <div class="col-6"> <span>Resolved</span></div>
                                        <div class="col-6 text-primary">5</div>
                                        <div class="col-6"> <span>Comment</span></div>
                                        <div class="col-6 text-primary">7</div>
                                    </div>
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block ml-2">
                                                <p class="f-12">+10 More</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-status mt-4">
                                        <div class="media mb-0">
                                            <p>70% </p>
                                            <div class="media-body text-right"><span>Done</span></div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="project-box">
                                    <span class="badge badge-primary">Doing</span>
                                    <h6>Endless admin Design</h6>
                                    <div class="media"><img class="img-20 mr-1 rounded-circle" src="./images/user.png" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>Themeforest, australia</p>
                                        </div>
                                    </div>

                                    <vs-card style="margin-bottom:10px;" type="2">
                                        <template #title>
                                            <h3>Pot with a plant</h3>
                                        </template>
                                        <template #img>
                                            <img src="./images/masonry/5.jpg" alt="">
                                        </template>
                                        <template #text>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            </p>
                                        </template>
                                        <template #interactions>
                                            <vs-button danger icon>
                                                <i class='fa fa-heart'></i>
                                            </vs-button>
                                            <vs-button class="btn-chat" shadow primary>
                                                <i class='fa fa-inbox' ></i>
                                            </vs-button>
                                        </template>
                                    </vs-card>

                                    <div class="row details">
                                        <div class="col-6"><span>Issues </span></div>
                                        <div class="col-6 text-primary">12 </div>
                                        <div class="col-6"> <span>Resolved</span></div>
                                        <div class="col-6 text-primary">5</div>
                                        <div class="col-6"> <span>Comment</span></div>
                                        <div class="col-6 text-primary">7</div>
                                    </div>
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block ml-2">
                                                <p class="f-12">+10 More</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-status mt-4">
                                        <div class="media mb-0">
                                            <p>70% </p>
                                            <div class="media-body text-right"><span>Done</span></div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="project-box"><span class="badge badge-primary">Doing</span>
                                    <h6>Endless admin Design</h6>
                                    <div class="media"><img class="img-20 mr-1 rounded-circle" src="./images/user.png" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>Themeforest, australia</p>
                                        </div>
                                    </div>

                                    <vs-card style="margin-bottom:10px;" type="2">
                                        <template #title>
                                            <h3>Pot with a plant</h3>
                                        </template>
                                        <template #img>
                                            <img src="./images/masonry/5.jpg" alt="">
                                        </template>
                                        <template #text>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            </p>
                                        </template>
                                        <template #interactions>
                                            <vs-button danger icon>
                                                <i class='fa fa-heart'></i>
                                            </vs-button>
                                            <vs-button class="btn-chat" shadow primary>
                                                <i class='fa fa-inbox' ></i>
                                            </vs-button>
                                        </template>
                                    </vs-card>

                                    <div class="row details">
                                        <div class="col-6"><span>Issues </span></div>
                                        <div class="col-6 text-primary">12 </div>
                                        <div class="col-6"> <span>Resolved</span></div>
                                        <div class="col-6 text-primary">5</div>
                                        <div class="col-6"> <span>Comment</span></div>
                                        <div class="col-6 text-primary">7</div>
                                    </div>
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block ml-2">
                                                <p class="f-12">+10 More</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-status mt-4">
                                        <div class="media mb-0">
                                            <p>70% </p>
                                            <div class="media-body text-right"><span>Done</span></div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6">
                                <div class="project-box"><span class="badge badge-primary">Doing</span>
                                    <h6>Endless admin Design</h6>
                                    <div class="media"><img class="img-20 mr-1 rounded-circle" src="./images/user.png" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>Themeforest, australia</p>
                                        </div>
                                    </div>

                                    <vs-card style="margin-bottom:10px;" type="2">
                                        <template #title>
                                            <h3>Pot with a plant</h3>
                                        </template>
                                        <template #img>
                                            <img src="./images/masonry/5.jpg" alt="">
                                        </template>
                                        <template #text>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            </p>
                                        </template>
                                        <template #interactions>
                                            <vs-button danger icon>
                                                <i class='fa fa-heart'></i>
                                            </vs-button>
                                            <vs-button class="btn-chat" shadow primary>
                                                <i class='fa fa-inbox' ></i>
                                            </vs-button>
                                        </template>
                                    </vs-card>

                                    <div class="row details">
                                        <div class="col-6"><span>Issues </span></div>
                                        <div class="col-6 text-primary">12 </div>
                                        <div class="col-6"> <span>Resolved</span></div>
                                        <div class="col-6 text-primary">5</div>
                                        <div class="col-6"> <span>Comment</span></div>
                                        <div class="col-6 text-primary">7</div>
                                    </div>
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block ml-2">
                                                <p class="f-12">+10 More</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-status mt-4">
                                        <div class="media mb-0">
                                            <p>70% </p>
                                            <div class="media-body text-right"><span>Done</span></div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="project-box"><span class="badge badge-primary">Doing</span>
                                    <h6>Endless admin Design</h6>
                                    <div class="media"><img class="img-20 mr-1 rounded-circle" src="./images/user.png" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>Themeforest, australia</p>
                                        </div>
                                    </div>

                                    <vs-card style="margin-bottom:10px;" type="2">
                                        <template #title>
                                            <h3>Pot with a plant</h3>
                                        </template>
                                        <template #img>
                                            <img src="./images/masonry/5.jpg" alt="">
                                        </template>
                                        <template #text>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            </p>
                                        </template>
                                        <template #interactions>
                                            <vs-button danger icon>
                                                <i class='fa fa-heart'></i>
                                            </vs-button>
                                            <vs-button class="btn-chat" shadow primary>
                                                <i class='fa fa-inbox' ></i>
                                            </vs-button>
                                        </template>
                                    </vs-card>

                                    <div class="row details">
                                        <div class="col-6"><span>Issues </span></div>
                                        <div class="col-6 text-primary">12 </div>
                                        <div class="col-6"> <span>Resolved</span></div>
                                        <div class="col-6 text-primary">5</div>
                                        <div class="col-6"> <span>Comment</span></div>
                                        <div class="col-6 text-primary">7</div>
                                    </div>
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block ml-2">
                                                <p class="f-12">+10 More</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-status mt-4">
                                        <div class="media mb-0">
                                            <p>70% </p>
                                            <div class="media-body text-right"><span>Done</span></div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="project-box"><span class="badge badge-primary">Doing</span>
                                    <h6>Endless admin Design</h6>
                                    <div class="media"><img class="img-20 mr-1 rounded-circle" src="./images/user.png" alt="" data-original-title="" title="">
                                        <div class="media-body">
                                            <p>Themeforest, australia</p>
                                        </div>
                                    </div>

                                    <vs-card style="margin-bottom:10px;" type="2">
                                        <template #title>
                                            <h3>Pot with a plant</h3>
                                        </template>
                                        <template #img>
                                            <img src="./images/masonry/5.jpg" alt="">
                                        </template>
                                        <template #text>
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                            </p>
                                        </template>
                                        <template #interactions>
                                            <vs-button danger icon>
                                                <i class='fa fa-heart'></i>
                                            </vs-button>
                                            <vs-button class="btn-chat" shadow primary>
                                                <i class='fa fa-inbox' ></i>
                                            </vs-button>
                                        </template>
                                    </vs-card>

                                    <div class="row details">
                                        <div class="col-6"><span>Issues </span></div>
                                        <div class="col-6 text-primary">12 </div>
                                        <div class="col-6"> <span>Resolved</span></div>
                                        <div class="col-6 text-primary">5</div>
                                        <div class="col-6"> <span>Comment</span></div>
                                        <div class="col-6 text-primary">7</div>
                                    </div>
                                    <div class="customers">
                                        <ul>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block"><img class="img-30 rounded-circle" src="./images/user.png" alt="" data-original-title="" title=""></li>
                                            <li class="d-inline-block ml-2">
                                                <p class="f-12">+10 More</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-status mt-4">
                                        <div class="media mb-0">
                                            <p>70% </p>
                                            <div class="media-body text-right"><span>Done</span></div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="center con-pagination">
                    <vs-pagination progress v-model="page" :length="10" />
                </div>

            </div>
        </div>

    </div>


</template>
<script>

export default {
    name: "List",
    data:() => ({
        page: 1,
    }),
    created() {
    },
    mounted() {
        this.courses=[
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
            {"vin":"########","year": "########", "brand": "#######", "color": "######"},
        ];
    },
    methods: {
        onSortChange(event){
            const value = event.value.value;
            const sortValue = event.value;

            if (value.indexOf('!') === 0) {
                this.sortOrder = -1;
                this.sortField = value.substring(1, value.length);
                this.sortKey = sortValue;
            }
            else {
                this.sortOrder = 1;
                this.sortField = value;
                this.sortKey = sortValue;
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.project-box{
    margin-bottom: 10px;
}

</style>
