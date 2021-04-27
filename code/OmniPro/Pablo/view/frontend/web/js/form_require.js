define([
    'jquery',
    'mage/validate'
], function($,validate) {
    return Component.extend({
    isFormValid: function (form) {
        return $(form).validation() && $(form).validation('isValid');
    }
});
});