window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}



/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

import Echo from "laravel-echo";

window.Pusher = require('pusher-js');

/**
 * Keys at:
 * https://dashboard.pusher.com/
 * login with git-hub
 * @type {Echo}
 */

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'c17b473eeca45c2f1ce0',
    cluster: 'eu',
    forceTLS: true
});

/*
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'b490d88fe2cdacb92141',
    cluster: 'eu',
    forceTLS: true,
});
*/
























