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



// const messages = {
//     fr: {
//       Bonjour: 'Hello',
 
//     apropos : 'À propos',
//     login : 'Se Connecter',
//     register : 'Enregistrer',
//     logout : 'Déconnexion',
//     name : 'Nom',
//     email : 'Courriel',
//     password : 'Mot de passe',
//     confirmpassword : 'Confirmation mot de passe',
//     rememberme : 'Mémoriser',
//     forgottenpassword : 'Oublié mot de passe?',
//     showdetails : 'En savoir plus',
//     writtenby : 'Ecrit par: ',
//     addgenus : 'Ajouter un genre',
//     addanimal : 'Ajouter un animal',
//     modifyanimal : 'Modifier Animal',
//     modifygenus : 'Modifier Genre',
//     title : 'Mon blog avec  Laravel',
//     associatedanimals : 'Animaux associés',
//     modify : 'Modifier',
//     delete : 'Supprimer',
//     addname : 'nom:',
//     adddescription : 'Ajouter le contenu:',
//     save : 'Enregistrer',
//     upload : 'Téléverser une image',
//     choosefile : 'Choisir un fichier',
//     nofilechosen : 'Aucun fichier choisi',
//     class : '420-5H6 MO Applications Web transactionnelles',
//     college : 'Automne 2023, Collège Montmorency',
//     uploadapropos : 'tu peux uploader une image pour les animaux, fonctionne',
//     verifyapropos : 'tu recois un mail de verification quand tu register, fonctionne',
//     internationlizeapropos : 'cest internationalisé',
//     back : 'retour',
//     felix : 'Félix Laprise-Narbonne',
//     cours : '420-5H6MO Applications Web transactionnelles',
//     session : 'Automne 2023, Collège Montmorency',

//     },
//   };

// const i18n = new VueI18n({
//     locale: 'fr', // default locale
//     messages,
// });



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


