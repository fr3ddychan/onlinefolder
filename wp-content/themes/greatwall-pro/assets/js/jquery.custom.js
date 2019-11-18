
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        /*-----------------------------------------------------------------------------------*/
        /*  Superfish Menu
        /*-----------------------------------------------------------------------------------*/
        // initialise plugin
        var example = $('.sf-menu').superfish({
            //add options here if required
            delay:       100,
            speed:       'fast',
            autoArrows:  false  
        }); 

        /*-----------------------------------------------------------------------------------*/
        /*  bxSlider
        /*-----------------------------------------------------------------------------------*/
        $('.bxslider').show().bxSlider({
            auto: true,
            preloadImages: 'all',
            pause: '6000',
            autoHover: true,
            adaptiveHeight: true,
            mode: 'fade',
            onSliderLoad: function(){ 
                $(".bxslider").css("display", "block");
                $(".bxslider").css("visibility", "visible");  
                $('#featured-slider .featured-slide .entry-header').fadeIn("100");
                $('#featured-slider .featured-slide .gradient').fadeIn("100");                       
            }
        });

        /* portfolioIsotope */
        var portfolioIsotope = function(){

        if ( $('.project-wrap').length ) {

          $('.project-wrap').each(function() {

            var self       = $(this);
            var filterNav  = self.find('.project-filter').find('a');

            var projectIsotope = function($selector){

              $selector.isotope({
                filter: '*',
                itemSelector: '.project-item',
                percentPosition: true,
                animationOptions: {
                    duration: 750,
                    easing: 'liniar',
                    queue: false,
                }
              });

            }

            self.children().find('.isotope-container').imagesLoaded( function() {
              projectIsotope(self.children().find('.isotope-container'));
            });

            $(window).load(function(){
              projectIsotope(self.children().find('.isotope-container'));
            });

            filterNav.click(function(){
                var selector = $(this).attr('data-filter');
                filterNav.removeClass('active');
                $(this).addClass('active');

                self.find('.isotope-container').isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'liniar',
                        queue: false,
                    }
                });

                return false;

            });

          });

        }

        }

        /* Waypoint */
        var progressBar = function() {
            $('.progress-bar').on('on-appear', function() {
                $(this).each(function() {
                    var percent = $(this).data('percent');

                    $(this).find('.progress-animate').animate({
                        "width": percent + '%'
                    },1000);

                    $(this).parent('.roll-progress').find('.perc').addClass('show').animate({
                        "width": percent + '%'
                    },1000);
                });
            });
        };

        var counter = function() {
            $('.roll-counter').on('on-appear', function() {
                $(this).find('.numb-count').each(function() {
                    var to = parseInt($(this).attr('data-to'));
                    $(this).countTo({
                        to: to,
                    });
                });
            }); //counter
        };        

        var detectViewport = function() {
            $('[data-waypoint-active="yes"]').waypoint(function() {
                $(this).trigger('on-appear');
            }, { offset: '90%', triggerOnce: true });

            $(window).on('load', function() {
                setTimeout(function() {
                    $.waypoints('refresh');
                }, 100);
            });
        };

        var removePreloader = function() {
            $('.preloader-wrap').css('opacity', 0);
            setTimeout(function(){$('.preloader-wrap').hide();}, 600);
        }           

        $(function() {
            portfolioIsotope();
            progressBar();
            counter();       
            detectViewport();   
            removePreloader();              
        });

        /*-----------------------------------------------------------------------------------*/
        /*  Slick Mobile Menu
        /*-----------------------------------------------------------------------------------*/
        $('#primary-menu').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label: 'Menu'            
        });   

        /*-----------------------------------------------------------------------------------*/
        /*  Back to Top
        /*-----------------------------------------------------------------------------------*/
        // hide #back-top first
        $("#back-top").hide();

        $(function () {
            // fade in #back-top
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').fadeIn('200');
                } else {
                    $('#back-top').fadeOut('200');
                }
            });

            // scroll body to 0px on click
            $('#back-top a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });                                     

        /*-----------------------------------------------------------------------------------*/
        /*  Mobile Menu & Search
        /*-----------------------------------------------------------------------------------*/

        /* Mobile Menu */
        $('.slicknav_btn').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').removeClass('active');
            $('.search-icon > .genericon-close').removeClass('active');

        });

        /* Mobile Search */
        $('.search-icon > .genericon-search').click(function(){

            $('.header-search').slideDown('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.slicknav_btn').removeClass('slicknav_open');
            $('.slicknav_nav').addClass('slicknav_hidden');
            $('.slicknav_nav').css('display','none');

        });

        $('.search-icon > .genericon-close').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.slicknav_btn').removeClass('slicknav_open');
            $('.slicknav_nav').addClass('slicknav_hidden');  
            $('.slicknav_nav').css('display','none');


        });          


    });

})(jQuery);