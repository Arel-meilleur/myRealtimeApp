<template>
       <v-container>
            <!-- <v-alert
            v-if="errors"
      dense
      outlined
      type="error"
    >
      Svp veuillez remplir tous les champs
    </v-alert> -->
        <v-form
            @submit.prevent="create"
            ref="form"
            lazy-validation
        >

            <span class="red--text" v-if="errors.title">{{errors.title[0]}} </span>

            <v-text-field
            label="Title"
            type="text"
            v-model="form.title"
            required
            ></v-text-field>
            <span class="red--text" v-if="errors.title">{{errors.category_id[0]}} </span>
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
            <span class="red--text" v-if="errors.title">{{errors.body[0]}} </span>
            <vue-simplemde v-model="form.body"> </vue-simplemde>

            <v-btn
            :disabled="disabled"
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
        //   errors: null,

          categories: {},
          errors: {},
      }
  },

    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data.data )
    },

    computed : {
        disabled(){
            return !(this.form.title && this.form.body && this.form.category_id)
        }
    },

    methods : {
        create(){
            axios.post('/api/question', this.form)
            .then(res => this.$router.push(res.data.path))
            // .catch(error => Exception.handle(error))
            .catch(error => this.errors = error.response.data.errors)
        }
    },



}
</script>

<style>

</style>
