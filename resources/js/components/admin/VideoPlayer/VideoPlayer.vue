<template>

    <div class="center grid">
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">

                <d-player @pause="pause()" ref="player" :options="options"></d-player>

            </vs-col>
        </vs-row>
    </div>

</template>

<script>

import VueDPlayer from 'vue-dplayer/dist/vue-dplayer'

export default {
    name: "VideoPlayer",
    data() {
        return {
            options: {
                video: {
                    url: this.playlist,
                    pic: 'http://static.smartisanos.cn/pr/img/video/video_03_cc87ce5bdb.jpg'
                },
                autoplay: false,
                theme:"#f5712c",
                screenshot:true,
                airplay:true,
                hotkey:true,
                logo:"",
                mutex: true,
                contextmenu: [
                    {
                        text: 'custom1',
                        link: 'https://github.com/DIYgod/DPlayer',
                    },
                    {
                        text: 'custom2',
                        click: (player) => {
                            console.log(player);
                        },
                    },
                ],
                highlight: [
                    {
                        text: 'marker for 20s',
                        time: 20,
                    },
                    {
                        text: 'marker for 2mins',
                        time: 120,
                    },
                ],
            }
        }
    },
    props: {
        playlist: String,
        title:String
    },
    mounted(){
        this.play();
        // setTimeout(() => {
        //     player.pause()
        // }, 2000)
    },
    updated() {
        this.play();
    },
    methods:{
        pause(){
            const player = this.$refs.player.dp
            player.notice(this.title, 2000, 0.8);
        },
        play(){
            const player = this.$refs.player.dp
            player.play()
        }
    },
    components:{
        'd-player': VueDPlayer
    },
    watch:{
        playlist(newVal){
            this.play();
        }
    }
}
</script>

<style scoped>

</style>
