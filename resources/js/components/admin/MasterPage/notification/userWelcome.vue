<template>
    <div class="center grid">
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="2">
                <vs-avatar history primary badge badge-color="success">
                    <img src="./avatar-6.png" alt="E">
                    <template #badge>
                        28
                    </template>
                </vs-avatar>
            </vs-col>
            <vs-col vs-justify="center" vs-align="center" w="10">
                <p class="username">Ayman Elkassas</p>
            </vs-col>
        </vs-row>
        <br>

        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                Welcome Admin
            </vs-col>
        </vs-row>

        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                Login Successfully And Welcome To Your Dashboard...
            </vs-col>
        </vs-row>

    </div>
</template>

<script>
export default {
name: "userWelcome"
}
</script>

<style scoped>

.username{
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}

</style>
