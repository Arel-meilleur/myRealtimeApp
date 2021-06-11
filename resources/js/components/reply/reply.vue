<template>
    <div>
        <!-- <v-card>
            <v-card-title>
                <div class="headlin">{{data.user}} </div>
                <div>said {{data.created_at}} </div>
            </v-card-title>
        </v-card> -->

        donne = {{ this.data}}
    </div>
</template>

<script>
export default {

    props : ['data']

}
</script>

<style scoped>

</style>
