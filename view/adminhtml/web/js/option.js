define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select',
    'Magento_Ui/js/modal/modal'
], function (_, uiRegistry, select, modal) {
    'use strict';

    return select.extend({
        initialize: function (value) {
            var field1 = uiRegistry.get('index = language');
            var field2 = uiRegistry.get('index = designer');
            var status = this._super().initialValue;
            if (status === 'Programeer') {
                field1.show();
                field2.hide();
            } else if (status === 'Designer') {
                field1.hide();
                field2.show();
            } else {
                field1.hide();
                field2.hide();
            }
        },

        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
            var field1 = uiRegistry.get('index = language');
            if (value === 'Programeer') {
                field1.show();
            } else {
                field1.hide();
            }

            var field2 = uiRegistry.get('index = designer');
            if (value === 'Designer') {
                field2.show();
            } else {
                field2.hide();
            }

            return this._super();
        },
    });
});