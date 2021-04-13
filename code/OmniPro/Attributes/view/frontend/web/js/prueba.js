define([
    'jquery',
    'underscore',
    'ko',
    'uiComponent',
    'mage/url',
    'mage/storage',
    'Magento_Customer/js/customer-data'
], function($, _, ko, Component, url, storage,customerData){
    
   return Component.extend({
       defaults: {
            blogs: ko.observableArray([]),    
            template: 'OmniPro_Attributes/blog',
            ignoreTmpls:{
                templates:false
            }       
                  },

        initialize: function () {     
            this._super();   
            console.log(this);    
                var self = this; 
                console.log(customerData.get('cart')());
                var blogs = "/rest/V1/blogs?searchCriteria"
                storage.get(blogs)
               .done(function (response){
                     self.blogs(response.items);
                     console.log(self.blogs());
                 });
                return this;
        }
   });
})

   /*function(config){
       console.log(config['prueba-parametro']);   
   var blogs = "/rest/V1/blogs?searchCriteria"
   $.ajax({
       url:blogs
   }).done(function (response){
       console.log(response);
   });
}
})*/