<template>
       <v-container>
        <v-form
            @submit.prevent="create"
            ref="form"
            lazy-validation
        >

            <v-text-field
            label="Title"
            type="text"
            v-model="form.title"
            required
            ></v-text-field>

            <v-autocomplete
                v-model="form.category_id"
                :items="categories"
                hide-no-data
                hide-details
                item-text="name"
                item-value="id"
                label="Category"
                solo-inverted

            ></v-autocomplete>
            <br/>

            <vue-simplemde v-model="form.body"> </vue-simplemde>

            <v-btn
            color="green"
            type="submit"

            >
            Create
            </v-btn>

        </v-form>
    </v-container>
</template>

<script>
export default {

    data () {
      return {
          form : {
              title : null,
              category_id : null,
              body : null,

          },

          categories: {},
          errors: {},
      }
  },

    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data.data )
    },

    methods : {
        create(){
            axios.post('/api/question', this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => this.errors = error.response.data)
        }
    },



}
</script>

<style>

</style>
