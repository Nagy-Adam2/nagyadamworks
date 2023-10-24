$(document).ready(function() {


  /*----------------------------------------*\
    #WINDOW SIZE, MENU SHOW OR HIDE
  \*----------------------------------------*/

  $(window).resize(function() {
	  window.location.reload();
    if($(window).innerWidth() > 576) {
    menu.show();
	} else {
	  menu.hide();
	}
  });





  /*----------------------------------------*\
    #FLUID, DESKTOP OR MOBILE
  \*----------------------------------------*/

  const fluid = function() {	  
    if ($(window).innerWidth() > 992) {
      desktop();
    } else {
      mobile();
    }	
  };
  
  fluid();
  
  $(window).resize(fluid);





  /*----------------------------------------*\
    #DESKTOP MENU FUNCTION
  \*----------------------------------------*/
  
  function desktop() {
    $(".li-main-menu").mouseenter(function() {
      $(".open-submenu").addClass("active");
	    $(".ul-submenu").slideDown();
    }); 
    $(".li-main-menu").mouseleave(function() {
      $(".open-submenu").removeClass("active");
	    $(".ul-submenu").slideUp();
    });
    $(".li-main-menu").click(function() {
	    $(".ul-submenu").slideToggle();
    }); 
  };




  
  /*----------------------------------------*\
    #MOBILE MENU FUNCTION
  \*----------------------------------------*/

  function mobile() {	
    $(".open-submenu").click(function() {
      $(this).toggleClass("active");  
      $(this).next("ul").slideToggle()
    });
  };
	
});