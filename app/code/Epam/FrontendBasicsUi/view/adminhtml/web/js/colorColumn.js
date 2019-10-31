define([
    'Magento_Ui/js/grid/columns/column'
], function(uiColumn){
    'use strict';

    return uiColumn.extend({

        /**
         * Custom text
         *
         * @return {string}
         * */
        getSomething: function() {
            return 'Length:' + this.color.length + ' ' + this.name;
        }
    })
});