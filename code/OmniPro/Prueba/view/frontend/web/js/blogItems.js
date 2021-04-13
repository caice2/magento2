define([
    'uiComponent',
    'ko',
    'jquery',
    'mage/url',
], function(Component, ko, $, url) {
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
            var blogs = "/rest/V1/blogs?searchCriteria"
            $.ajax({
                url:blogs
            }).done(function (response){
                console.log(response);
            });
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
        },      
    });
});