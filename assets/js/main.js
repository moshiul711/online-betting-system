/*
* ----------------------------------------------------------------------------------------
    Author       : miniboss
    Template Name: Hamra - Personal Portfolio Template
    Tags: One Page, Creative Template, Portfolio, Personal
    Version      : 1.0
* ----------------------------------------------------------------------------------------
*/
    (function(){
        "use strict";
    // activate counter up
        $('.counter').counterUp({
            delay: 10,
            time: 4000
        });
    // activate parallax
    	$('.winner_area').parallax("50%", 0.3);
        $('.client_area').parallax("50%", 0.3);
    	$('.welcome-image-area').parallax("50%", 0.3);
        
        // activate mixItUp
        $('.portfolio_items').mixItUp();
	/*
        YTPlayer active
    */ 
        $( window ).on( "load", function(){
            jQuery("#P1").YTPlayer();
        });
    
    /*
    * -----------------------------------------------------------
    *  MAGNIFIC POPUP JS
    * -----------------------------------------------------------
    */
    var magnifPopup = function () {
        $('.popup').magnificPopup({
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-with-zoom',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function (openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    };
    // Call the functions 
    magnifPopup();
    /*
    * -----------------------------------------------------------
    *  Owl-carousel active
    * -----------------------------------------------------------
    */
    	$('.clients_says').owlCarousel({
            loop:true,
            autplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    /*------------smooth scroll---------------*/
  // Add smooth scrolling to all links
        $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

        // Store hash
          var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 1200, function(){
       
        // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
        });

    /*-------------add sticky class----------------*/
        $(window).on('scroll',function(){
            if($(this).scrollTop() > 50){

                $('.navigation_area').addClass('sticky');
            }
            else
            {
                $('.navigation_area').removeClass('sticky');
            }

        });

    /*
    * -------------------------------------------------------
    *  scroll to top 
    * -------------------------------------------------------
    */
        $('.scrolltotop').fadeOut(1000);
            $(window).on('scroll', function(){

            if($(this).scrollTop()>500){

                $('.scrolltotop').fadeIn(1000);
            }
            else
            {
                $('.scrolltotop').fadeOut(1000);
            }
         });
        $('.scrolltotop').on('click', function(){
        $('html,body').animate({scrollTop: 0}, 1000);
    });
        

    /*
    * -------------------------------------------------------
    *  responsive menu
    * -------------------------------------------------------
    */
        function mobileMenu(){
            var windwidth = $(window).width();
                if(windwidth < 768){
                $('.main_menu').hide();
                $('.mobile_menu').on('click',function(){
                    $('.main_menu').slideToggle("slow");
                });
                $('.main_menu .nav > li > a').on('click',function(){
                    $('.main_menu').hide();
                });
            }
        }
            mobileMenu();
                $(window).on('resize',function() {
                mobileMenu();
                $('.main_menu').hide();
            });

    /*-------------- typed custom----------*/
        Typed.new(".joyonto", {
            strings: ["i am steven.","Creative developer."],
            typeSpeed: 60,
            loop:true,
            backDelay: 1000
        });
    /*-------------Preloader active-------------*/
        jQuery(window).load(function() {
            $('.preloader').fadeOut(1000);
        });

})(jQuery);