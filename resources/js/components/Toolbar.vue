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
            <!-- <v-btn text>Forum</v-btn> -->
            <router-link
            v-for="item in items"
            :key="item.title"
            :to = "item.to"
            >
                <v-btn text v-if="item.show">{{item.title}} </v-btn>
            </router-link>
            <!-- <v-btn text>Ask Question</v-btn>
            <v-btn text>Category</v-btn>
            <router-link to="/login">Login</router-link> -->
        </div>


    </v-toolbar>
  </v-card>
</template>

<script>
export default {

    data(){
        return {
            items: [

                {title : 'Forum', to:'/forum',show:true},
                {title : 'Ask Question', to:'/ask',show: User.loggedIn()},
                {title : 'Category', to:'/category',show: User.loggedIn()},
                {title : 'Login', to:'/login',show: !User.loggedIn()},
                {title : 'Logout', to:'/logout',show: User.loggedIn()},
            ]

        }
    },
    created(){
        EventBus.$on('logout',() =>{
            User.logout()
        })
    }

}
</script>
