
define([
    'jquery',
    'underscore',
    'Magento_Ui/js/modal/alert'
], function($,  _, alert) {
    'use strict';

    return function (config, e) {
        let btn = $(e).find(config.button);

        btn.on('click', function () {
            let list1 = $('#id-matches-one').val().split(',').map(item => item.trim());
            let list2 = $('#id-matches-two').val().split(',').map(item => item.trim());
            let matches = _.intersection(list1, list2);

            alert({
                title: 'Matches words',
                content: 'Matches words: ' + matches.join(', ')
            })
        })
    }

});
