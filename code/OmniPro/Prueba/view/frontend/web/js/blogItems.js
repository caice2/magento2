define([
    'uiComponent',
    'ko',
    'jquery'
], function(Component, ko, $) {
    return Component.extend({
        defaults: {
            textoPrueba: "Texto Prueba",
            variable1: 25
        },
        initialize: function() {
            this._super();
            setTimeout($.proxy(function() {
                this.textoPrueba("Prueba 2");
                console.log(this);
            }, this), 1000)
            return this;
        },
        initObservable: function() {
            this._super()
                .observe([
                    'variable1',
                    'textoPrueba'
                ]);

            return this;
        },
        cambiarVariable: function() {
            this.variable1(0);
        }
    });
});