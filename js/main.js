jQuery(document).ready(function(){

  jQuery(window).scroll(function() {

    /* CHANGE THE BG-COLOR OF HEADER NAVIGATION ONLY FOR FRONTPAGE */
    if( jQuery(this).scrollTop() > 70 ){
      jQuery('body.home .rgnrfs-site-header').addClass('scrolled');
    }
    else {
      jQuery('body.home .rgnrfs-site-header').removeClass('scrolled');
    }

  });

});
