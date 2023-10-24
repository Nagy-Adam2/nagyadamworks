window.addEventListener('DOMContentLoaded', event => {


  /*----------------------------------------*\
    #NAVBAR SHRINK FUNCTION
  \*----------------------------------------*/

  var navbarShrink = function () {
    const navbarCollapsible = document.body.querySelector('#mainNav');
    if (!navbarCollapsible) {
      return;
    }
    if (window.scrollY === 0) {
      navbarCollapsible.classList.remove('navbar-shrink')
    } else {
      navbarCollapsible.classList.add('navbar-shrink')
    }
  };





  /*----------------------------------------*\
    #SHRINK THE NAVBAR
  \*----------------------------------------*/

  navbarShrink();





  /*----------------------------------------*\
    #SHRINK THE NAVBAR WHEN PAGE IS SCROLLED
  \*----------------------------------------*/

  document.addEventListener('scroll', navbarShrink);





  /*----------------------------------------*\
    #ACTIVE BOOTSTRAP SCROLLSPY ON THE
    MAIN NAV ELEMENT
  \*----------------------------------------*/

  const mainNav = document.body.querySelector('#mainNav');
  if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
      target: '#mainNav',
      offset: 74,
    });
  };





  /*----------------------------------------*\
    #COLLAPSE RESPONSIVE NAVBAR WHEN TOGGLE
    IS VISIBLE
  \*----------------------------------------*/

  const navbarToggler = document.body.querySelector('.navbar-toggler');
  const responsiveNavItems = [].slice.call(
    document.querySelectorAll('#navbarResponsive .nav-link')
  );
  responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener('click', () => {
      if (window.getComputedStyle(navbarToggler).display !== 'none') {
        navbarToggler.click();
      }
    });
  });





  /*----------------------------------------*\
    #COLLAPSE RESPONSIVE NAVBAR WHEN TOGGLE
    IS VISIBLE
  \*----------------------------------------*/
  
  new SimpleLightbox({
    elements: '#portfolio a.portfolio-box'
  });

});