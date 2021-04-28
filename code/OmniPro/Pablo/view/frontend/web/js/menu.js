
require([
  'jquery',
  'accordion'  
], function ($) {
$(document).ready(function(){
  var tab = 1;
  $("#tab-login");
  $("#register").hide();
  $("#sucess").hide();
  
  $("button").on("click", function(){
    
    tab = $(this).attr("id");
    $("#console").text(tab);
    
    switch(tab) {
      case "tab-register":      
        $("#register").show();
        $("#login").hide();
        $("#sucess").hide();
        break;
      case "btnRegist":        
        $("#sucess").show();
        $("#login").hide();
        $("#register").hide();
        break;
      default:        
        $("#login").show();
        $("#register").hide();
        $("#sucess").hide();
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
sucess.addEventListener('click',()=>{
  alarm.classList.add('shown');
  setTimeout(()=>{
    alarm.classList.remove('shown')
  },1500);
})
});

