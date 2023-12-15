/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
import Vue from 'vue'; 
//import VueI18n from 'vue-i18n';



import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
//Vue.use(VueI18n);

import App from './app.vue';
import { routes } from './routes';

/*const i18n = new VueI18n({
    locale: 'en', // default locale
    messages: {
        en: require('../../lang/en/messages.json'),
        es: require('../../lang/es/messages.json'),
        fr: require('../../lang/fr/messages.json'),
    },
});
*/

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
   // i18n,
    render: h => h(App),
});


