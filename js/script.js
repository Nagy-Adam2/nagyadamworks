$(document).ready(function() {
	
  const menu = $(".menu");

  $(window).resize(function() {
    $(".menu-toggle").removeClass("active");
	  window.location.reload();
    if($(window).innerWidth() > 576) {
      menu.show();
	} else {
	  menu.hide();
	}
  });

  $(".menu-toggle").click(function() {	  
    menu.slideToggle();
	$(this).toggleClass("active");
  });

  const fluid = function() {	  
    if ($(window).innerWidth() > 992) {
      desktop();
    } else {
      mobile();
    }	
  };
  
  fluid();
  
  $(window).resize(fluid);
  
  function desktop() {
    $(".li-main-menu1").mouseenter(function() {
      $(".open-submenu1").addClass("active");
	    $(".ul-submenu1").slideDown();
      $(".open-submenu1").children(".arrow").addClass("up").removeClass("down");
    }); 
    $(".li-main-menu1").mouseleave(function() {
      $(".open-submenu1").removeClass("active");
	    $(".ul-submenu1").slideUp();
      $(".open-submenu1").children(".arrow").addClass("down").removeClass("up");
    });
    $(".li-main-menu2").mouseenter(function() {
      $(".open-submenu2").addClass("active");
	    $(".ul-submenu2").slideDown();
      $(".open-submenu2").children(".arrow").addClass("up").removeClass("down");
    });
    $(".li-main-menu2").mouseleave(function() {
      $(".open-submenu2").removeClass("active");
	    $(".ul-submenu2").slideUp();
      $(".open-submenu2").children(".arrow").addClass("down").removeClass("up");
    });
    $(".li-main-menu1").click(function() {
	    $(".ul-submenu1").slideToggle();
      $(".open-submenu1").children(".arrow").toggleClass("down up");
    }); 
  };

  function mobile() {	  
    $(".open-submenu1").click(function() {
      $(this).toggleClass("active");
      $(this).next("ul").slideToggle();
      $(this).children(".arrow").toggleClass("down up");
    }); 
    $(".open-submenu2").click(function() {
      $(this).toggleClass("active");
      $(this).next("ul").slideToggle();
      $(this).children(".arrow").toggleClass("down up");
    });	
  };

  $(function () {
	setInterval(function(){
			
	$("#carousel ul").animate({marginleft:"-800px"},800, function(){
	  $("#carousel ul li:last").after($("#carousel ul li:first"));
	  $(this).css("margin-left","0");
	});
			
	},3000);
  });
	
});