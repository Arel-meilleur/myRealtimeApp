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

    methods : {
        login(){
            User.login(this.form)
        }
    }

}
</script>

<style>

</style>
