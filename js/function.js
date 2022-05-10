(function ($) {

//----- Variáveis

    var $janela = $(window);

//----- Depois de carregar tudo

    // $janela.on('load', function () {
    //     $('#preloader').fadeOut('slow', function () {
    //         $(this).remove();
    //     });
    // });

//----- Ir até o local

	$('a[href*="#"]')
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	  // On-page links
	  if (
	    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	    && 
	    location.hostname == this.hostname
	  ) {
	    // Figure out element to scroll to
	    var target = $(this.hash);
	    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	    // Does a scroll target exist?
	    if (target.length) {
	      // Only prevent default if animation is actually gonna happen
	      event.preventDefault();
	      $('html, body').animate({
	        scrollTop: target.offset().top
	      }, 1000, function() {
	        // Callback after animation
	        // Must change focus!
	        var $target = $(target);
	        $target.focus();
	        if ($target.is(":focus")) { // Checking if the target was focused
	          return false;
	        } else {
	          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	          $target.focus(); // Set focus again
	        };
	      });
	    }
	  }
	});

//----- Menu

	$('.hamburguer-bt, .fundo_menu').click(function(){
		if( $(".hamburguer-bt").hasClass("ativo") ){

			$(".hamburguer-bt").removeClass("ativo");
			$(".fundo_menu").removeClass("ativo");
			$("#opt_menu").removeClass("ativo");

		}else{

			$(".hamburguer-bt").addClass("ativo");
			$(".fundo_menu").addClass("ativo");
			$("#opt_menu").addClass("ativo");
		}		
	});

	var window_top = $(window).scrollTop() + 1;
	if (window_top > 50) {
		$('header').addClass('drop');
		$('.spac').addClass('drop');
	} else {
		$('header').removeClass('drop');
		$('.spac').removeClass('drop');
	}
	$(window).scroll(function () {
		var window_top = $(window).scrollTop() + 1;
		if (window_top > 50) {
			$('header').addClass('drop');
			$('.spac').addClass('drop');
		} else {
			$('header').removeClass('drop');
			$('.spac').removeClass('drop');
		}
	});

//----- Menu da pagina

	var window_top = $(window).scrollTop() + 1;
	if (window_top > 355) {
		$('.barra-menu').addClass('fixa');
	} else {
		$('.barra-menu').removeClass('fixa');
	}
	$(window).scroll(function () {
		var window_top = $(window).scrollTop() + 1;
		if (window_top > 355) {
			$('.barra-menu').addClass('fixa');
		} else {
			$('.barra-menu').removeClass('fixa');
		}
	});

	$('.burguer-bt, .barra-menu a').click(function(){
		if( $(".btn-menu-lateral").hasClass("ativo") ){
			$(".btn-menu-lateral").removeClass("ativo");
			$(".barra-menu").removeClass("ativo");
		}else{
			$(".btn-menu-lateral").addClass("ativo");
			$(".barra-menu").addClass("ativo");
		}		
	});

//----- Carroseis


	var review = $('#banner');
	if (review.length) {
		review.owlCarousel({
			items: 1,
			loop: true,
			autoplay: false,
			dots: false,
			nav: true,
			margin: 40,
	    	animateOut: 'fadeOut',
			autoplayHoverPause: false,
			autoplayTimeout:15000
		});
	}

	var review = $('#case');
	if (review.length) {
		review.owlCarousel({
			loop: true,
			center: true,
			autoplay: false,
			dots: false,
			nav: false,
			margin: 00,
			
			responsive:{
				0:{
					items:1
				},
				676:{
					items:2
				},
				991:{
					items:4
				}
			}
		});
		$(".btnslide1").click(function(){
			$("#case .owl-prev").trigger("click");
		});
		$(".btnslide2").click(function(){
			$("#case .owl-next").trigger("click");
		});
	}
	var review = $('#jogos');
	if (review.length) {
		review.owlCarousel({
			
			loop: true,
			center: true,
			autoplay: true,
			dots: false,
			nav: false,
			margin: 0,
			
			autoplayTimeout:3000,
    		autoplayHoverPause:true,
			
			responsive:{
				0:{
					items:1
				},
				676:{
					items:3
				},
				991:{
					items:3
				}
			}
		});
		$(".btnslideServ").click(function(){
			$("#detalhe .owl-prev").trigger("click");
		});
		$(".btnslideServ2").click(function(){
			$("#detalhe .owl-next").trigger("click");
		});
	
}

//----- Contador

	if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

//----- Contato

	$('#opcao-menu b').click(function(){
		if( $(this).hasClass("ativo") ){}else{
			$('#opcao-menu b').removeClass("ativo");
			$(this).addClass("ativo");
		}
	});

	$("#btn-trabalhe").click(function(){
		$("#terreno, #fornecedor").css({"display":"none"});
		$("#trabalhe").fadeIn();
	});

	$("#btn-terreno").click(function(){
		$("#trabalhe, #fornecedor").css({"display":"none"});
		$("#terreno").fadeIn();
	});

	$("#btn-fornecedor").click(function(){
		$("#terreno, #trabalhe").css({"display":"none"});
		$("#fornecedor").fadeIn();
	});

//----- Enviar Currículo

	$('#curriculo-trabalhe').on('change', function() {
	  var fileName = "Currículo (DOC/PDF): "+$(this)[0].files[0].name;

	  $('.label-curriculo').html(fileName);
	});

//----- Video

	$('.play-video').click(function(){
		$(this).css({'display':'none'});
		$('#video-institucional iframe').fadeIn();
		src = $('#video-institucional iframe').attr('src');
		src = src + "?rel=0&autoplay=1";
		$('#video-institucional iframe').attr('src', src);
	});
//----- Regras

    $(".btn-valores").click(function() {
    	id = $(this).data("hast");
        $(id).find(".texto").find(".conteudoValores,.conteudoHabilidades,.conteudoResistencia,.conteudoPericia,.conteudoPericia,.conteudoArsenal,.conteudoInventario").fadeToggle();
        $(id).toggleClass("ativo");

    });
   
    
})(jQuery);

AOS.init({
        offset:false,
        duration: 1800
    });