<template>


        <!-- <reply v-for="reply in replies" :data="reply" :key="reply"></reply>
        <div v-for="reply in replies" :data="reply" :key="reply">
             {{replies}}
        </div> -->
        <div></div>

</template>

<script>

import Reply from './reply'

export default {

    props: ['replies'],
    components : {Reply}

}
</script>

<style scoped>

</style>
