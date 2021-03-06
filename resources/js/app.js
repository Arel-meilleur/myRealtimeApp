/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vuetify from 'vuetify';
Vue.use(Vuetify);


// Importation pour la library vuesimpleMDE

import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'

Vue.component('vue-simplemde', VueSimplemde)

// importation pour sotker les dondéé tes qui'il ont été enregistré grace a vueSimplemde

import md from 'marked'
window.md = md

//importation du helpers pour les users
import User from './Helpers/User'
window.User = User

import Exception from './Helpers/Exception'
window.Exception = Exception
// console.log(User.logout())
// console.log(User.id())
window.EventBus = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('AppHome', require('./components/AppHome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './Router/router.js';

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
  });
