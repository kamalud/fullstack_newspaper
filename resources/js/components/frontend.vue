<template>
         <router-view></router-view>
</template>

<script>
    export default {
        mounted() {
            if(!this.$store.getters.getpost.length){}
            axios.post('/frontend/get_all_post').then(Response=>{
                this.$store.commit('postall',Response.data);
            });
        },
    
    }
</script>
