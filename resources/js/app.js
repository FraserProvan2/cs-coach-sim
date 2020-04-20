/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('player-card', require('./components/MyTeam/PlayerCard.vue').default);
Vue.component('inventory', require('./components/MyTeam/Inventory.vue').default);
Vue.component('roster-amount', require('./components/MyTeam/RosterAmount.vue').default);
Vue.component('synergy', require('./components/MyTeam/Synergy.vue').default);

/**
 * Noty setup/adding functions to window
 * 
 */

import VueNotifications from 'vue-notifications';
import Noty from 'noty';

Noty.overrideDefaults({
    theme: 'light',
});

function toast({title, message, type, timeout, cb}) {
  if (type === VueNotifications.types.warn) type = 'warning'
  return new Noty({text: message, timeout: 1800, type}).show()
}

Vue.use(VueNotifications, {
  success: toast,
  error: toast,
  info: toast,
  warn: toast
});

window.notifySuccess = function(message) {
    toast({
        type: VueNotifications.types.success,
        title: '',
        message: '<i class="fas fa-check"></i>&nbsp;&nbsp;' + message
    });
};

window.notifyError = function(message) {
    toast({
        type: VueNotifications.types.error,
        title: '',
        message: '<i class="fas fa-exclamation"></i>&nbsp;&nbsp;' + message
    });
};

/**
 * Event Bus
 * 
 */

window.bus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
