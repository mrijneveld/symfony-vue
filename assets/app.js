/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// SCSS
import './styles/app.scss';

// JS
import generateHeader from './js/generate-header';

// start the Stimulus application
import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    let z = document.createElement('h1')
    z.innerText = generateHeader('Mick')

    document.body.appendChild(z)
});
