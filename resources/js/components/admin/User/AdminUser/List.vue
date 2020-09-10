<template>
    <div class="card">
        <div class="card-header">
            <h5>Home Card</h5>
            <span>Home Page Admin Panel...</span>
        </div>
        <div class="card-body">
<!--            add button-->
            <div class="btn-group btn-group-sm" style="float: right;margin: 0 0 16px 0">
                <button class="btn btn-pill btn-primary btn-air-primary" type="button" data-original-title="btn btn-pill btn-secondary btn-air-secondary btn-air-secondary" title=""><router-link style="color: white" to="/admin-add" data-turbolinks="true"><i class="fa fa-plus"></i> Add Admin</router-link></button>
            </div>

<!--            table-->
            <div>
                <code>query: {{ query }}</code>
                <v-datatable v-bind="$data" />
            </div>


        </div>
    </div>
</template>

<script>
//continue https://github.com/OneWayTech/vue2-datatable/blob/master/examples/src/Advanced/index.vue

export default {
    name: "List",
    data: () => ({
        columns: [
            { title: 'User ID', field: 'uid', sortable: true },
            { title: 'Username', field: 'name' },
            { title: 'Age', field: 'age', sortable: true },
            { title: 'Email', field: 'email' },
            { title: 'Country', field: 'country' }
        ],
        data: [],
        total: 1,
        query: {}
    }),
    watch: {
        query: {
            handler (query) {
                this.data = [{'uid':"1","name":"a","age":"5","email":"a","country":"asd"}]
                this.total = 1
                // mockData(query).then(({ rows, total }) => {
                //
                // })
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
