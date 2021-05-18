<template>
    <v-container fluid>
        <v-card>
            <v-form @submit.prevent="update">
                <v-text-field
                    label="Title"
                    type="text"
                    v-model="form.title"
                    required
                    ></v-text-field>

                    <vue-simplemde v-model="form.body"> </vue-simplemde>

                    <v-card-actions>
                        <v-btn icon small type="submit">
                            <v-icon color="teal"> save </v-icon>
                        </v-btn>
                        <v-btn icon small @click="cancel" >
                            <v-icon color="black">cancel</v-icon>
                        </v-btn>
                    </v-card-actions>
            </v-form>
        </v-card>
    </v-container>
</template>

<script>
export default {

    props : ['data'],

   data (){
       return {
           form : {
               title : null,
               body : null
           }
       }
   },

   methods : {
       cancel(){
           EventBus.$emit('cancelEditing')
       },

       update(){
           axios.patch(`/api/question/${this.form.slug}`,this.form)
           .then(res => this.cancel())
       }
   },

    mounted(){
        this.form = this.data
    }

}
</script>

<style>

</style>
