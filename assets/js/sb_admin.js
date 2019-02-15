/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/bootstrap.min.css');
require('../css/sb-admin.css');
require('../css/dataTables.bootstrap4.css');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.

// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything

// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything


// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

//jQuery
var $ = require('../js/jquery.js');
window.jQuery = $;
window.$ = $;
window.jquery = $;

//Bootstrap Core
require('../js/bootstrap.core.js');
    
//Core plugin JavaScript
require('../js/jquery.easing.js');

