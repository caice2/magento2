
require([
  'jquery',
  'accordion'  
], function ($) {
$(document).ready(function(){
  var tab = 1;
  $("#tab-login");
  $("#register").hide();
  $("#help").hide();
  
  $("button").on("click", function(){
    
    tab = $(this).attr("id");
    $("#console").text(tab);
    
    switch(tab) {
      case "tab-register":      
        $("#register").show();
        $("#login").hide();
        $("#help").hide();
        break;
      case "tab-help":        
        $("#help").show();
        $("#login").hide();
        $("#register").hide();
        break;
      default:        
        $("#login").show();
        $("#register").hide();
        $("#help").hide();
  	}
  });
});
$(document).ready(function() {


  var Menu = {

      body: $('.menu'),
      button: $('.button'),
      tools: $('.tools')

  };

  Menu.button.click(function () {
      Menu.body.toggleClass('menu--closed');
      Menu.body.toggleClass('menu--open');
      Menu.tools.toggleClass('tools--visible');
      Menu.tools.toggleClass('tools--hidden');
  });


});
});