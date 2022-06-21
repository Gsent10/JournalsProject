<template>
    <div>
        <div class="sidebar">
            <sidebar />
        </div>
        
    </div>
</template>

<script>
    import sidebar from "./Side.vue"

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        components: {
            sidebar,
        }
    }
</script>

<style scoped>
.container {
    position: absolute;
    right: 0;
    width: 80vw;
    height: 100vh;
    background: #f1f1f1;
}
</style>
