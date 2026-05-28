jQuery(document).ready(function(){

  /* BACK TO TOP */
  jQuery('.scroll-top .back-to-top').on( 'click', function (e) {
    e.preventDefault();
    jQuery( 'html, body' ).animate( { scrollTop: 0 }, 700 );
  });

  jQuery(window).scroll(function() {

    /* CHANGE THE BG-COLOR OF HEADER NAVIGATION ONLY FOR FRONTPAGE */
    if( jQuery(this).scrollTop() > 70 ){
      jQuery('body.home .rgnrfs-site-header').addClass('scrolled');
    }
    else {
      jQuery('body.home .rgnrfs-site-header').removeClass('scrolled');
    }

    /* SHOWS BACK TO TOP BUTTON */
    if( jQuery(this).scrollTop() > 220 ){
      jQuery('.scroll-top').addClass('show');
    }
    else { jQuery('.scroll-top').removeClass('show'); }

  });

});
