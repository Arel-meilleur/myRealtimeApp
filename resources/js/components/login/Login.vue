<template>
    <v-container>
        <v-form
            @submit.prevent="login"
            ref="form"
            lazy-validation
        >

            <v-text-field
            label="E-mail"
            type="email"
            v-model="form.email"
            required
            ></v-text-field>

            <v-text-field
            type="password"
            label="Password"
            v-model="form.password"
            required
            ></v-text-field>

            <v-btn
            color="green"
            type="submit"
            >
            Login
            </v-btn>

            <router-link to="/singup"><v-btn color="blue">Sing Up</v-btn></router-link>

        </v-form>
    </v-container>
</template>

<script>
export default {
    data (){
        return {
            form: {
                email: 'meilleur@gmail.com',
                password: 'meilleur'
            }
        }
    },

    created(){
            if(User.loggedIn()){
                this.$router.push({name:'forum'})
            }
        },

    methods : {
        login(){
            User.login(this.form)
            // this.$router.push({name: 'forum'})
        }
    }

}
</script>

<style>

</style>
