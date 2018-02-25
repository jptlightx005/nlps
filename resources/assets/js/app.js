
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./waitingFor');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('map-component', require('./components/MapComponent.vue'));
Vue.component('dashboard-map-component', require('./components/DashboardMapComponent.vue'));
Vue.component('locations-map-component', require('./components/LocationsMapComponent.vue'));
// Vue.component('register-map-component', require('./components/RegisterMapComponent.vue'));

const app = new Vue({
    el: '#app'
});

