<template>
    <div id="adminmain">
<!--        todo:what is a router-view do ?-->
<!--            router-view is listen be replaced with component that path is the same path of-->
<!--            (localhost/ERIC/-PATH-)-->
        <router-view></router-view>
    </div>
</template>

<script>

export default {
    name: "content",
    mounted() {
        this.$router.push('/home');
    }
}
</script>

<style scoped>

</style>
