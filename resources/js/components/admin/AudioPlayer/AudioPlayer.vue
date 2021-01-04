<template>

    <div class="center grid">
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                <a-player ref="player" :music="options" :list="list"></a-player>
            </vs-col>
        </vs-row>
    </div>

</template>

<script>

import VueAPlayer from 'vue-aplayer/dist/vue-aplayer.min'
VueAPlayer.disableVersionBadge = true

export default {
    name: "VideoPlayer",
    data() {
        return {
            options: {
                title: this.title,
                artist: 'Naser Alqatami',
                src: this.mainSong,
                pic: 'http://ar.assabile.com/media/person/200x256/nasser-al-qatami.png',
            },
            list:[]

        }
    },
    props: {
        mainSong:String,
        playlist: Array,
        title:String
    },
    created(){
        for (const song in this.playlist) {
            let obj={}
            obj.title=this.title;
            obj.artist=this.title;
            obj.src=this.playlist[song];
            obj.pic="http://ar.assabile.com/media/person/200x256/nasser-al-qatami.png";
            debugger
            this.list.push(obj);
        }
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
            const player = this.$refs.player.ap
            player.notice(this.title, 2000, 0.8);
        },
        play(){
            const player = this.$refs.player.ap
            player.play()
        }
    },
    components:{
        'a-player': VueAPlayer
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
