<template>
    <div class="mt-4">
         <vue-simplemde v-model="body"> </vue-simplemde>
         <v-btn dark color="green" @click="submit">
             <!-- <v-icon color="green"> done

             </v-icon> -->
             Reply
         </v-btn>
    </div>
</template>

<script>
    export default {

        props : ['questionSlug'],

        data(){
            return {
                body: null
            }
        },
        methods : {
            submit(){
                axios.post(`apip/question/${this.questionSlug}/reply`,{body:this.body})
                .then(res=>{
                    this.body = null
                    EventBus.$emit('newReply', res.data.reply)
                } )
            }
        }

    }

</script>

<style>

</style>
