<template>
  <v-card
    color="grey lighten-4"
    flat
    height="200px"
    tile
  >
    <v-toolbar dense>
      <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->

        <v-toolbar-title>Meilleur</v-toolbar-title>

        <v-spacer></v-spacer>
        <!-- <router-link>
             Forum
        </router-link>
        <router-link>
             Ask Question
        </router-link>
        <router-link>
             Category
        </router-link> -->

        <div>
            <v-btn text>Forum</v-btn>
            <v-btn text>Ask Question</v-btn>
            <v-btn text>Category</v-btn>
            <router-link to="/login">Login</router-link>
        </div>


    </v-toolbar>
  </v-card>
</template>

<script>
export default {

}
</script>
