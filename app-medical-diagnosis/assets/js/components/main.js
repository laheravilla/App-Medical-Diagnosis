import $ from 'jquery';

let startingButton = document.getElementById('js-starting-button');
startingButton.addEventListener('click', function (e) {
    e.preventDefault();
    window.location.href = '#';
});