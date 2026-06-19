jQuery(document).ready(function(){


    /* DESKTOP & MOBILE NAVIGATION */
    const $openBtn    = jQuery('.navbar-toggler');
    const $closeBtn   = jQuery('#close-mobile-nav');
    const $mobileMenu = jQuery('#mobile-nav');

    function toggleSidebarMenu(isOpen){
      $openBtn.attr('aria-expanded', isOpen);
      $mobileMenu.attr('aria-hidden', !isOpen);
      jQuery('body').toggleClass('show-mobile-nav', isOpen);

      if( isOpen ){
        setTimeout(() => $closeBtn.focus(), 100); // FIRSTLY MOVE FOCUS TO THE CLOSE BUTTON INSIDE THE MENU
      } else {
        $openBtn.focus(); // MOVE FOCUS BACK TO THE HAMBURGER BUTTON WHEN MENU IS CLOSED
      }
    }

    // SHOW MOBILE NAV
    $openBtn.on('click', function(){
      toggleSidebarMenu(true);
    });

    // CLOSE MOBILE NAV
    $closeBtn.on('click', function(){
      toggleSidebarMenu(false);
    });

    // MENU TOGGLER BTN(ANGLE-UP/DOWN) FOR MOBILE MENU
    jQuery('#mobile-nav .rgnrfs-menu-toggler').on('click', function(e){
      e.preventDefault();
      var $this = jQuery( this ),
          $children = $this.children(),
          icon_name = $this.data('toggler-icon'),
          add_class    = "fa-angle-up",
          remove_class = "fa-angle-down";

      // TOGGLER ICON
      if( $children.hasClass( remove_class ) ){
        $children.removeClass( remove_class ).addClass( add_class );
      } else{
        $children.removeClass( add_class ).addClass( remove_class );
      }

      $this.parent().next().slideToggle( 'fast' );
    });

    // TOGGLE DROPDOWN MENU USING KEYBOARD(FOR DESKTOP)
    jQuery('#desktop-header a.dropdown-toggle').on('focus', function() {
      var $this = jQuery(this);
      $this.closest('.dropdown').addClass('show');
      $this.attr('aria-expanded', 'true');
    });

    jQuery('#desktop-header li.dropdown').on('focusout', function(e){
      var $this = jQuery(this);
      var nextFocus = e.relatedTarget; // ELEMENT RECEIVING FOCUS

      // RETURN IF THE NEW FOCUSED ELEMENT IS INSIDE THIS DROPDOWN
      if( nextFocus && $this.has(nextFocus).length > 0 ){
        return;
      }

      // CLOSE THIS DROPDOWN & NESTED-DROPDOWNS
      $this.closest('.dropdown').removeClass('show');
      $this.find('.dropdown-toggle').attr('aria-expanded', 'false');
    });

    // TOGGLE DROPDOWN MENU USING KEYBOARD(FOR MOBILE)
    jQuery('#mobile-nav a.dropdown-toggle').on('focus', function() {
      var $this = jQuery(this);
      $this.closest('.dropdown').addClass('show');
      $this.attr('aria-expanded', 'true');

      if( $this.is(':focus-visible') ){
        $this.find('.rgnrfs-menu-toggler').click();
      }
    });

    jQuery('#mobile-nav li.dropdown').on('focusout', function(e){
      var $this = jQuery(this);
      var nextFocus = e.relatedTarget; // ELEMENT RECEIVING FOCUS
      const dropdownToggler = $this.find('.rgnrfs-menu-toggler');

      // RETURN IF THE NEW FOCUSED ELEMENT IS INSIDE THIS DROPDOWN
      if(nextFocus && $this.has(nextFocus).length > 0) {
        return;
      }

      var $openAnchors = $this.find('.dropdown-toggle[aria-expanded="true"]');

      // CHECK IF THE CURRENT <li> CONTAINS OPEN PARENT ANCHOR
      var $parentAnchor = $this.children('.dropdown-toggle[aria-expanded="true"]');
      var $allOpenAnchors = $openAnchors.add($parentAnchor);

      // CLOSE THIS DROPDOWN & NESTED-DROPDOWNS
      $this.closest('.dropdown').removeClass('show');
      $this.find('.dropdown-toggle').attr('aria-expanded', 'false');

      // TRIGGER CLICK-EVENT FROM BOTTOM TO TOP(NESTED-MENUS ARE CLOSED BEFORE THE PARENT)
      jQuery($allOpenAnchors.get().reverse()).each(function() {
        var $spanToggler = jQuery(this).find('.rgnrfs-menu-toggler');

        if($spanToggler.length){;
          $spanToggler.trigger('click');
        }
      });

    });

    /* KEEP THE FOCUS INSIDE THE MOBILE MENU */
    $mobileMenu.on('keydown', function(e) {
      if (e.key !== 'Tab') return;

      // FIND ALL FOCUSABLE ELEMENTS INSIDE THE MENU
      const $focusableElements = $mobileMenu.find('button, [href]');
      const $firstElement = $focusableElements.first();
      const $lastElement = $focusableElements.last();

      // Tab (Forward)
      if (document.activeElement === $lastElement[0]) {
        e.preventDefault();
        $firstElement.focus();
      }
    });

    /* DESKTOP & MOBILE NAVIGATION ENDS */

  /* BACK TO TOP */
  jQuery('.scroll-top .back-to-top').on( 'click', function (e) {
    e.preventDefault();
    jQuery( 'html, body' ).animate( { scrollTop: 0 }, 700 );
  });

  jQuery(window).scroll(function() {

    /* CHANGE THE BG-COLOR OF HEADER NAVIGATION ONLY FOR FRONTPAGE */
    if( jQuery(this).scrollTop() > 70 ){
      jQuery('body.rgnrfs-transparent-navbar .rgnrfs-site-header').addClass('scrolled');
    }
    else {
      jQuery('body.rgnrfs-transparent-navbar .rgnrfs-site-header').removeClass('scrolled');
    }

    /* SHOWS BACK TO TOP BUTTON */
    if( jQuery(this).scrollTop() > 220 ){
      jQuery('.scroll-top').addClass('show');
    }
    else { jQuery('.scroll-top').removeClass('show'); }

  });

  /* SHOW SEARCH MODAL */
  jQuery('.nav-search').on( 'click', function( e ){
    e.preventDefault();
    jQuery('#search-modal').show()
    jQuery('.search-field input.search-input').focus();
  });

  /* CLOSE SEARCHMODAL */
  jQuery('[data-dismiss~=rgnrfs-modal]').on( 'click', function(e){
    jQuery('.rgnrfs-modal').hide();
  });

  /* CLOSE SEARCH MODAL WHEN Esc key is pressed */
  jQuery(document).on('keydown',function(e) {
    if( e.keyCode == 27){ jQuery('.rgnrfs-modal').hide(); }
  });

  /* INITIATIVES PAGE SLICK SLIDER */
  jQuery('.initiatives-page-slider').slick({
    dots: true,
    speed: 500,
    arrows: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 3000
  });

});
