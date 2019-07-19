import $ from 'jquery';
$(document).ready(function () {
    $('.js-symtoms-autocomplete').autocomplete({hint: false}, [
        {
            source: function (query, cb) {
                cb([
                    {value: 'foo'},
                    {value: 'bar'}
                ])
            }
        }
    ])
});