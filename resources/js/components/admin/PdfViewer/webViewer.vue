<template>
    <div ref='viewer'></div>
</template>

<script>
import WebViewer from "@pdftron/webviewer"
export default {
    name: "webViewer",
    props: {
        url: String
    },
    mounted: function () {
        WebViewer({
            path: "./pdfViewer/",
        }, this.$refs.viewer).then((instance) => {
            // call apis here
            instance.loadDocument(this.base64ToBlob(this.url), { filename: 'myfile.pdf' });
            const { docViewer } = instance;
            docViewer.on('documentLoaded', () => {
                // perform document operations
            });
        });
    },
    methods:{
        base64ToBlob(base64) {
            const binaryString = window.atob(base64);
            const len = binaryString.length;
            const bytes = new Uint8Array(len);
            for (let i = 0; i < len; ++i) {
                bytes[i] = binaryString.charCodeAt(i);
            }

            return new Blob([bytes], { type: 'application/pdf' });
        },
    }
}
</script>

<style scoped>
div {
    width: 100%;
    height: 100vh;
}
</style>
