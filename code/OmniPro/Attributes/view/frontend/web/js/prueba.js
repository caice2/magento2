define([
    'jquery',
    'underscore'
], function($, _){
   // $('body').addClass('pruebamagento');
   return function(config){
       console.log(config['prueba-parametro']);   
   var blog = "/rest/V1/blogs?searchCriteria"
   $.ajax({
       url:blogs
   }).done(function (response){
       console.log(response);
   });
}
})