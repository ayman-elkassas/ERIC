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

<!--            <vue-table class="box is-paddingless raises-on-hover is-rounded"-->
<!--                       path="route('initTable')"-->
<!--                       :error-handler="myErrorHandler"-->
<!--                       :intervals="intervals"-->
<!--                       :i18n="myI18n"-->
<!--                       id="example"/>-->

        </div>
    </div>
</template>

<script>

export default {
    name: "List",
    data() {
        return {
            // intervals: {
            //     menus: {
            //         updated_at: {
            //             min: null,
            //             max: null,
            //             dateFormat: 'Y-m-d H-i-s',
            //         },
            //     },
            // },
        };
    },
}
</script>

<style scoped>

</style>
