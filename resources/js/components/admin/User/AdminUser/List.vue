<template>
    <div class="card">
        <div class="card-header">
            <h5>Admin Accounts</h5>
            <span>Using Admin Panel Can Edit And Add Every Component</span>
        </div>
        <div class="card-body">

            <Menubar :model="items">
                <template #start>
                    <img alt="logo" src="./user.png" height="40px" class="p-mr-2">
                </template>
                <template #end>
                    <span class="p-input-icon-left">
                        <i class="pi pi-search" />
                        <InputText v-model="filters['global']" placeholder="Global Search" />
                    </span>
                </template>
            </Menubar>
            <br>

            <DataTable :value="cars"
                       class="p-datatable-striped p-datatable-gridlines"
                       :filters="filters"
                       :paginator="true" :rows="10"
                       paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                       :rowsPerPageOptions="[10,20,50]"
                       currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
                       sortMode="multiple">

                <template #empty>
                    No customers found.
                </template>
                <template #loading>
                    Loading customers data. Please wait.
                </template>

                <Column field="vin" header="Vin" sortable>

                    <template #body="slotProps">
                        <span class="p-column-title">Vin</span>
                        {{slotProps.data.vin}}
                    </template>
                    <template #filter>
                        <InputText type="text" v-model="filters['vin']" class="p-column-filter" placeholder="Search by vin"/>
                    </template>

                </Column>

                <Column field="year" header="Year" sortable>

                    <template #body="slotProps">
                        <span class="p-column-title">Year</span>
                        {{slotProps.data.year}}
                    </template>
                    <template #filter>
                        <InputText type="text" v-model="filters['year']" class="p-column-filter" placeholder="Search by year"/>
                    </template>

                </Column>
                <Column field="brand" header="Brand" sortable>

                    <template #body="slotProps">
                        <span class="p-column-title">Vin</span>
                        {{slotProps.data.vin}}
                    </template>
                    <template #filter>
                        <InputText type="text" v-model="filters['brand']" class="p-column-filter" placeholder="Search by brand"/>
                    </template>

                    <template #body="slotProps">
                        <img src="./user.png" :alt="slotProps.data.brand" style="margin-right: 3px"  width="30px"/>
                        Ayman
                    </template>

                </Column>

                <Column field="color" header="Color">

                    <template #body="slotProps">
                        <span class="p-column-title">Color</span>
                        {{slotProps.data.color}}
                    </template>
                    <template #filter>
                        <InputText type="text" v-model="filters['color']" class="p-column-filter" placeholder="Search by color"/>
                    </template>

                </Column>

                <Column headerStyle="width: 8em" bodyStyle="text-align: center">
                    <template #header>
                        Actions
                    </template>
                    <template #body="slotProps">
                        <div class="btn-group btn-group-sm">
                            <button style="margin-right: 10px" class="btn btn-pill btn-primary btn-air-primary" type="button" data-original-title="btn btn-fall btn-secondary btn-air-secondary btn-air-secondary" title=""><router-link style="color: white" to="/admin-add" data-turbolinks="true"><i class="fa fa-edit"></i></router-link></button>
                            <button class="btn btn-pill btn-danger btn-air-danger" type="button" data-original-title="btn btn-fall btn-secondary btn-air-secondary btn-air-secondary" title=""><router-link style="color: white" to="/admin-add" data-turbolinks="true"><i class="fa fa-trash"></i></router-link></button>
                        </div>
                    </template>
                </Column>

                <template #paginatorLeft>
                    <button class="btn btn-pill btn-primary btn-air-primary" type="button" data-original-title="btn btn-fall btn-secondary btn-air-secondary btn-air-secondary" title=""><router-link style="color: white" to="/admin-add" data-turbolinks="true"><i class="fa fa-inbox"></i></router-link></button>
                </template>
                <template #paginatorRight>
                    <button class="btn btn-pill btn-primary btn-air-primary" type="button" data-original-title="btn btn-fall btn-secondary btn-air-secondary btn-air-secondary" title=""><router-link style="color: white" to="/admin-add" data-turbolinks="true"><i class="fa fa-cloud"></i></router-link></button>
                </template>

                <template #footer>
                    In total there are {{cars ? cars.length : 0 }} cars.
                </template>

            </DataTable>

        </div>
    </div>
</template>

<script>
export default {
    name: "List",
    data() {
        return {
            cars: null,
            filters: {},
            loading: false,
            selectedProduct1: null,
            totalRecords: 0,
            items: [
                {
                    label:'File',
                    icon:'pi pi-fw pi-file',
                    items:[
                        {
                            label:'New',
                            icon:'pi pi-fw pi-plus',
                            items:[
                                {
                                    label:'Bookmark',
                                    icon:'pi pi-fw pi-bookmark'
                                },
                                {
                                    label:'Video',
                                    icon:'pi pi-fw pi-video'
                                },

                            ]
                        },
                        {
                            label:'Delete',
                            icon:'pi pi-fw pi-trash'
                        },
                        {
                            separator:true
                        },
                        {
                            label:'Export',
                            icon:'pi pi-fw pi-external-link'
                        }
                    ]
                },
                {
                    label:'Edit',
                    icon:'pi pi-fw pi-pencil',
                    items:[
                        {
                            label:'Left',
                            icon:'pi pi-fw pi-align-left'
                        },
                        {
                            label:'Right',
                            icon:'pi pi-fw pi-align-right'
                        },
                        {
                            label:'Center',
                            icon:'pi pi-fw pi-align-center'
                        },
                        {
                            label:'Justify',
                            icon:'pi pi-fw pi-align-justify'
                        },

                    ]
                },
                {
                    label:'Users',
                    icon:'pi pi-fw pi-user',
                    items:[
                        {
                            label:'New',
                            icon:'pi pi-fw pi-user-plus',

                        },
                        {
                            label:'Delete',
                            icon:'pi pi-fw pi-user-minus',

                        },
                        {
                            label:'Search',
                            icon:'pi pi-fw pi-users',
                            items:[
                                {
                                    label:'Filter',
                                    icon:'pi pi-fw pi-filter',
                                    items:[
                                        {
                                            label:'Print',
                                            icon:'pi pi-fw pi-print'
                                        }
                                    ]
                                },
                                {
                                    icon:'pi pi-fw pi-bars',
                                    label:'List'
                                }
                            ]
                        }
                    ]
                },
                {
                    label:'Events',
                    icon:'pi pi-fw pi-calendar',
                    items:[
                        {
                            label:'Edit',
                            icon:'pi pi-fw pi-pencil',
                            items:[
                                {
                                    label:'Save',
                                    icon:'pi pi-fw pi-calendar-plus'
                                },
                                {
                                    label:'Delete',
                                    icon:'pi pi-fw pi-calendar-minus'
                                },

                            ]
                        },
                        {
                            label:'Archieve',
                            icon:'pi pi-fw pi-calendar-times',
                            items:[
                                {
                                    label:'Remove',
                                    icon:'pi pi-fw pi-calendar-minus'
                                }
                            ]
                        }
                    ]
                },
                {
                    label:'Quit',
                    icon:'pi pi-fw pi-power-off'
                }
            ]
        }
    },
    created() {
        // this.carService = new CarService();
    },
    mounted() {
        this.loading = true;
        setTimeout(() => {

            //todo:after get data from axios request in response make loading false to fade

            this.cars=[
                {"brand": "Volkswagen", "year": 2012, "color": "Orange", "vin": "dsad231ff"},
                {"brand": "Audi", "year": 2011, "color": "Black", "vin": "gwregre345"},
                {"brand": "Renault", "year": 2005, "color": "Gray", "vin": "h354htr"},
                {"brand": "BMW", "year": 2003, "color": "Blue", "vin": "j6w54qgh"},
                {"brand": "Mercedes", "year": 1995, "color": "Orange", "vin": "hrtwy34"},
                {"brand": "Volvo", "year": 2005, "color": "Black", "vin": "jejtyj"},
                {"brand": "Honda", "year": 2012, "color": "Yellow", "vin": "g43gr"},
                {"brand": "Jaguar", "year": 2013, "color": "Orange", "vin": "greg34"},
                {"brand": "Ford", "year": 2000, "color": "Black", "vin": "h54hw5"},
                {"brand": "Fiat", "year": 2013, "color": "Red", "vin": "245t2s"}
            ];

            this.loading = false;

        }, 500);

    },
    methods: {
        filterDate(value, filter) {
            if (filter === undefined || filter === null || (typeof filter === 'string' && filter.trim() === '')) {
                return true;
            }

            if (value === undefined || value === null) {
                return false;
            }

            return value === this.formatDate(filter);
        },
        formatDate(date) {
            let month = date.getMonth() + 1;
            let day = date.getDate();

            if (month < 10) {
                month = '0' + month;
            }

            if (day < 10) {
                day = '0' + day;
            }

            return date.getFullYear() + '-' + month + '-' + day;
        },
        onPage(event) {
            this.loading = true;

            setTimeout(() => {
                this.cars = this.cars.slice(event.first, event.first + event.rows);
                this.loading = false;
            }, 500);
        }
    }
}
</script>

<style scoped>

</style>
