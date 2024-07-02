/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/*
Vue.config.devtools = true;
Vue.config.debug = true;
Vue.config.silent = true;
*/

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueMeta from 'vue-meta';

import NProgress from 'nprogress'
import 'nprogress/nprogress.css';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(VueRouter);
Vue.use(NProgress);
Vue.use(VueMeta);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App.vue';
//import Homepage from './components/Homepage.vue';
//Vue.component('Homepage', require('./components/Homepage.vue').default);

const routes = [
    {
        path: '/',
        name: 'Index',
        component: Vue.component('Index', require('./components/Index.vue').default)
    },
    {
        path: '/help',
        name: 'Help',
        component: Vue.component('Index', require('./components/Footers/Help.vue').default)
    },
    {
        path: '/about',
        name: 'About',
        component: Vue.component('Index', require('./components/Footers/About.vue').default)
    },
    {
        path: '/eula',
        name: 'Eula',
        component: Vue.component('Index', require('./components/Footers/Eula.vue').default)
    },
    {
        path: '/privacypolicy',
        name: 'PrivacyPolicy',
        component: Vue.component('Index', require('./components/Footers/PrivacyPolicy.vue').default)
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Vue.component('Signup', require('./components/Signup.vue').default)
    },
    {
        path: '/signin',
        name: 'Signin',
        component: Vue.component('Signin', require('./components/Signin.vue').default)
    },
    {
        path: '/verification',
        name: 'Verification',
        component: Vue.component('Verification', require('./components/Verification.vue').default),
        beforeEnter: RequireUnVerified
    },
    {
        path: '/verified',
        name: 'Verified',
        component: Vue.component('Verified', require('./components/Verified.vue').default)
    },
    {
        path: '/user/index',
        name: 'UserIndex',
        component: Vue.component('UserIndex', require('./components/User/Index.vue').default),
        beforeEnter: RequireAuthUser
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    NProgress.start();
    NProgress.set(0.1);
    next();
});

router.afterEach(() => {
    setTimeout(() => NProgress.done(), 500);
});

function RequireAuthUser(to, from, next) {
    axios.post('/auth/check/user', {
        role_id: "1"
    }).then(function (response) {
        if (response.data.authenticated == "1") {
            next(true);
        } else {
            next({
                path: '/',
                query: {
                    redirect: to.fullPath
                }
            })
        }
    }).catch(function (error) {
        /*console.log(error);*/
    });
}

function RequireUnVerified(to, from, next) {
    axios.post('/auth/check/verification', {
        role_id: "0"
    }).then(function (response) {
        if (response.data.authenticated == "1") {
            next(true);
        } else {
            next({
                path: '/',
                query: {
                    redirect: to.fullPath
                }
            })
        }
    }).catch(function (error) {
        /*console.log(error);*/
    });
}

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
