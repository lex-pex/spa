/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// register globally
var infiniteScroll =  require('vue-infinite-scroll');
Vue.use(infiniteScroll);

// App Root Component ( Widget ) for this Route
import Articles from './components/Articles.vue';

// App Additional Component ( Widget ) for this Route
import Navbar from './components/Navbar.vue';

if (window.location.href.split('/').pop().replace(/#/, "") === 'feed') {

    let app = new Vue({

        el: '#app',

        render(h) {

            // Add the props you want to these two components
            const dna = h(Navbar);

            const other = h(Articles);

            // return a container with both of them as children
            return h("div", [dna, other])

        },

    });
}

















