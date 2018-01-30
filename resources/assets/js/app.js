
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import 'vue-googlemaps/dist/vue-googlemaps.css'
// import VueGoogleMaps from 'vue-googlemaps'

// Vue.use(VueGoogleMaps, {
//   load: {
//     apiKey: 'AIzaSyD_XljDoRneX7A7Xgsqe17mq46pOgSp_lo',
//     libraries: ['places'],
//   },
// })

// import * as VueGoogleMaps from 'vue2-google-maps'
// Vue.use(VueGoogleMaps, {
//   load: {
//     key: 'AIzaSyBvWE_sIwKbWkiuJQOf8gSk9qzpO96fhfY',
//     libraries: 'places', // This is required if you use the Autocomplete plugin
//     // OR: libraries: 'places,drawing'
//     // OR: libraries: 'places,drawing,visualization'
//     // (as you require)
//   }
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('map-component', require('./components/MapComponent.vue'));

const app = new Vue({
    el: '#app'
});