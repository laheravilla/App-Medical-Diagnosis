/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
import '../css/app.scss';
import '../css/components/autocomplete.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');
import $ from 'jquery';
// import './main.js';
//create global $ and jQuery variables
global.$ = global.jQuery = $;

// Need Bootstrap? Install it with "yarn add bootstrap"
import 'bootstrap'; //Adds functions to jQuery
import 'font-awesome/css/font-awesome.css';
//global.$ = $;

