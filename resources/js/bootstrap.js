window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap')

    // require('jquery/dist/jquery.min')
    // require('bootstrap/dist/js/bootstrap.min');
    // require('admin-panel/files/assets/js/jquery-ui/js/jquery-ui.min');
    // require('admin-panel/files/assets/js/popper.js/js/popper.min');
    // require('admin-panel/files/assets/js/jquery-slimscroll/js/jquery.slimscroll');
    // require('admin-panel/files/assets/js/modernizr/js/modernizr');
    // require('admin-panel/files/assets/js/modernizr/js/css-scrollbars');
    // require('admin-panel/files/assets/js/i18next/js/i18next.min');
    // require('admin-panel/files/assets/js/i18next-xhr-backend/js/i18nextXHRBackend.min');
    // require('admin-panel/files/assets/js/jquery-i18next/js/jquery-i18next.min');
    // require('admin-panel/files/assets/js/pcoded.min');
    // require('admin-panel/files/assets/js/vartical-layout.min');
    // require('admin-panel/files/assets/js/jquery.mCustomScrollbar.concat.min');
    // require('admin-panel/files/assets/js/script');
    // require('admin-panel/files/assets/js/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min');
    // require('admin-panel/files/assets/js/rocket-loader/rocket-loader.min');
    //include namespaces
    require('admin-panel')
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
//     forceTLS: true
// });
