(function ($) {
    'use strict';

    // :: Index of Plugins Active Code :: //
    
    // :: 1.0 Preloader Active Code
    // :: 2.0 Fullscreen Active Code
    // :: 3.0 Sticky Active Code
    // :: 4.0 Tooltip Active Code
    // :: 5.0 Nicescroll Active Code
    // :: 6.0 Owl Carousel Slider
    // :: 7.0 Search Btn Active Code
    // :: 8.0 Progress Bar Active Code
    // :: 9.0 CounterUp Active Code
    // :: 10.0 ScrollUp Active Code
    // :: 11.0 PreventDefault a Click
    // :: 12.0 wow Active Code    

    var $window = $(window);

    // :: 1.0 Preloader Active Code
        $window.on('load', function () {
            $('#preloader').fadeOut('slow', function () {
                $(this).remove();
            });
        });

    // :: 2.0 Fullscreen Active Code
        $window.on('resizeEnd', function () {
            $(".full_height").height($window.height());
        });

        $window.on('resize', function () {
            if (this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function () {
                $(this).trigger('resizeEnd');
            }, 300);
        }).trigger("resize");

    // :: 3.0 Sticky Active Code
        $("#stickyHeader").sticky({
            topSpacing: 0
        });

    // :: 4.0 Tooltip Active Code
        $('[data-toggle="tooltip"]').tooltip()

    // :: 5.0 Nicescroll Active Code
        $("body, textarea").niceScroll({
            cursorcolor: "#151515",
            cursorwidth: "6px",
            background: "#f0f0f0"
        });

    // :: 6.0 Owl Carousel Slider
        if ($.fn.owlCarousel) {

            var welcomeSlide = $('.hero-slides');

            $('.hero-slides').owlCarousel({
                items: 1,
                margin: 0,
                loop: true,
                nav: true,
                navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                dots: true,
                autoplay: true,
                autoplayTimeout: 10000,
                smartSpeed: 1000
            });

            welcomeSlide.on('translate.owl.carousel', function () {
                var slideLayer = $("[data-animation]");
                slideLayer.each(function () {
                    var anim_name = $(this).data('animation');
                    $(this).removeClass('animated ' + anim_name).css('opacity', '0');
                });
            });

            welcomeSlide.on('translated.owl.carousel', function () {
                var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
                slideLayer.each(function () {
                    var anim_name = $(this).data('animation');
                    $(this).addClass('animated ' + anim_name).css('opacity', '1');
                });
            });

            $("[data-delay]").each(function () {
                var anim_del = $(this).data('delay');
                $(this).css('animation-delay', anim_del);
            });

            $("[data-duration]").each(function () {
                var anim_dur = $(this).data('duration');
                $(this).css('animation-duration', anim_dur);
            });

            var dot = $('.hero-slides .owl-dot');
            dot.each(function () {
                var index = $(this).index() + 1;
                if (index < 10) {
                    $(this).html('0').append(index);
                } else {
                    $(this).html(index);
                }
            });

            $('.testimonials-slider').owlCarousel({
                items: 1,
                margin: 0,
                loop: true,
                nav: true,
                navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 1000
            });


        $('.especialistas').owlCarousel({
            center: false,
            margin: 15,
            loop: true,
            nav: false,
            dots: false,
            responsiveClass:true,
            rewindNav:true,
            autoplay: true,
            autoplayTimeout:5000, 
            rewindNav: true,
            transitionStyle: "fade",
            responsive:{
              0:{
                items:1
              },
              500:{
                items:2
              },
              1000:{
                items:4
              }
            }
        });

        $('.our-partners-logo').owlCarousel({
            center: false,
            margin: 0,
            loop: true,
            nav: false,
            dots: false,
            responsiveClass:true,
            rewindNav:true,
            autoplay: true,
            autoplayTimeout:1000, 
            rewindNav: true,
            transitionStyle: "fade",
            responsive:{
              0:{
                items:1
              },
              500:{
                items:2
              },
              1000:{
                items:4
              }
            }
        });




        }

    // :: 7.0 Search Btn Active Code
        $('#searchbtn').on('click', function () {
            $('body').toggleClass('search-form-on');
        })

    // :: 8.0 Progress Bar Active Code
        if ($.fn.barfiller) {
            $('#bar1').barfiller({
                tooltip: true,
                duration: 1000,
                barColor: '#2f88fd',
                animateOnResize: true
            });
            $('#bar2').barfiller({
                tooltip: true,
                duration: 1000,
                barColor: '#2f88fd',
                animateOnResize: true
            });
            $('#bar3').barfiller({
                tooltip: true,
                duration: 1000,
                barColor: '#2f88fd',
                animateOnResize: true
            });
            $('#bar4').barfiller({
                tooltip: true,
                duration: 1000,
                barColor: '#2f88fd',
                animateOnResize: true
            });
        }

    // :: 9.0 CounterUp Active Code
        if ($.fn.counterUp) {
            $('.counter').counterUp({
                delay: 10,
                time: 2000
            });
        }

    // :: 10.0 ScrollUp Active Code
        if ($.fn.scrollUp) {
            $.scrollUp({
                scrollSpeed: 1000,
                easingType: 'easeInOutQuart',
                scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
            });
        }

    // :: 11.0 PreventDefault a Click
        $("a[href='#']").on('click', function ($) {
            $.preventDefault();
        });

    // :: 12.0 wow Active Code
        if ($window.width() > 767) {
            new WOW().init();
        }

})(jQuery);

(function($) {
    $(document).ready(function(){
            //Exibe box de parceiros correspondetes em cada estado quando houver click.
        $('#map .state').click(function(){
            var estado = $(this).attr('data-state');
            var box_estado = '#box_'+estado;

            console.log('.state_'+estado+' .shape');

            // Reseta o estado e seu label para a cor padrão
            $('.state .label_icon_state').css({'fill': '#666'});
            $('.state .shape').css({'fill': '#ddd'});

            // Colore o estado selecionado
            $('#state_'+estado+' .label_icon_state').css({'fill': '#FFF'});
            $('#state_'+estado+' .shape').css({'fill': '#fd7132'});


            //Verifica se o cadastro de contato do estado existe
            if($('#box_'+estado).length == 0){
                console.log('Não existe');
            }else{
                $('.parca .estado').addClass('some');
                $('.parca .estado').css({'opacity': 0 , 'visibitity':'hidden'});

                $(box_estado).removeClass('some');
                $(box_estado).css({'opacity': 1 , 'visibitity':'visible'});
            }
        });

        $('#map .state').click(function(e){
            e.preventDefault();
        });

        //Change select responsive
        $('#seletory').change(function () {
            $('.parca .estado').css({'opacity': 0 , 'visibitity':'hidden'});
            $('#box_'+$(this).val()).css({'opacity': 1 , 'visibitity':'visible'});
        });
    });
})(jQuery);