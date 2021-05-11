<template>
    <v-container>
        <v-form
            @submit.prevent="singup"
            ref="form"
            lazy-validation
        >

            <v-text-field
            label="name"
            type="text"
            v-model="form.name"
            required
            ></v-text-field>
            <span class="red--text" v-if="errors.name">{{errors.name[0] }} </span>

            <v-text-field
            label="E-mail"
            type="email"
            v-model="form.email"
            required
            ></v-text-field>

            <span class="red--text" v-if="errors.email">{{errors.email[0] }} </span>

            <v-text-field
            type="password"
            label="Password"
            v-model="form.password"
            required
            ></v-text-field>

            <span class="red--text" v-if="errors.password">{{errors.password[0] }} </span>

            <v-text-field
            type="password"
            label="Password confirmation"
            v-model="form.password_confirmation"
            required
            ></v-text-field>

            <v-btn
            color="green"
            type="submit"
            >
            Sign Up
            </v-btn>

            <router-link to="/login"><v-btn color="blue">Longin</v-btn></router-link>
        </v-form>
    </v-container>
</template>

<script>

    export default {

        data(){
            return {
                form : {
                    name :null,
                    email:null,
                    password:null,
                    password_confirmation: null
                },
                errors: {}
            }
        },

        created(){
            if(User.loggedIn()){
                this.$router.push({name:'forum'})
            }
        },

        methods : {
            singup(){
                axios.post('api/auth/singup',this.form)
                .then(res=> {
                    User.responseAfterLogin(res)
                    this.$router.push({name: 'forum'})
                })
                // .catch(error=> console.log(error.response.data))
                .catch(error=> this.errors = error.response.data.errors)
            }
        }
    }

</script>

<style>

</style>
