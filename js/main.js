jQuery(function($) {'use strict';
	
	$('.navbar-collapse ul li a').on('click', function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 1000);
		return false;
	});
	$(window).scroll(function(event) {
                            Scroll();
                          });
                          // User define function
                          function Scroll() {
                            var contentTop      =   [];
                            var contentBottom   =   [];
                            var winTop      =   $(window).scrollTop();
                            var rangeTop    =   200;
                            var rangeBottom =   500;
                            $('.navbar-collapse').find('.scroll a').each(function(){
                              contentTop.push( $( $(this).attr('data') ).offset().top);
                              contentBottom.push( $( $(this).attr('data') ).offset().top + $( $(this).attr('data') ).height() );
                            })
                            $.each( contentTop, function(i){
                              if ( winTop > contentTop[i] - rangeTop ){
                                $('.navbar-collapse li.scroll')
                                .removeClass('active')
                                .eq(i).addClass('active');      
                              }
                            })
                            
                          };

	$('#tohash').on('click', function(){
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});

	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Slider
	$(document).ready(function() {
		var time = 7; // time in seconds

	 	var $progressBar,
	      $bar, 
	      $elem, 
	      isPause, 
	      tick,
	      percentTime;
	 
	    //Init the carousel
	    $("#main-slider").find('.owl-carousel').owlCarousel({
	      slideSpeed : 500,
	      paginationSpeed : 500,
	      singleItem : true,
	      navigation : true,
	       rtl:true,
	       
			navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
			],
	      afterInit : progressBar,
	      afterMove : moved,
	      startDragging : pauseOnDragging,
	      //autoHeight : true,
	      transitionStyle : "fadeUp"
	    });
	 
	    //Init progressBar where elem is $("#owl-demo")
	    function progressBar(elem){
	      $elem = elem;
	      //build progress bar elements
	      buildProgressBar();
	      //start counting
	      start();
	    }
	 
	    //create div#progressBar and div#bar then append to $(".owl-carousel")
	    function buildProgressBar(){
	      $progressBar = $("<div>",{
	        id:"progressBar"
	      });
	      $bar = $("<div>",{
	        id:"bar"
	      });
	      $progressBar.append($bar).appendTo($elem);
	    }
	 
	    function start() {
	      //reset timer
	      percentTime = 0;
	      isPause = false;
	      //run interval every 0.01 second
	      tick = setInterval(interval, 10);
	    };
	 
	    function interval() {
	      if(isPause === false){
	        percentTime += 1 / time;
	        $bar.css({
	           width: percentTime+"%"
	         });
	        //if percentTime is equal or greater than 100
	        if(percentTime >= 100){
	          //slide to next item 
	          $elem.trigger('owl.next')
	        }
	      }
	    }
	 
	    //pause while dragging 
	    function pauseOnDragging(){
	      isPause = true;
	    }
	 
	    //moved callback
	    function moved(){
	      //clear interval
	      clearTimeout(tick);
	      //start again
	      start();
	    }
	});

	//Initiat WOW JS
	new WOW().init();
	//smoothScroll
	smoothScroll.init();

	// portfolio filter
	
	
	

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
		});
	});


	$.fn.animateNumbers = function(stop, commas, duration, ease) {
			return this.each(function() {
				var $this = $(this);
				var start = parseInt($this.text().replace(/,/g, ""));
				commas = (commas === undefined) ? true : commas;
				$({value: start}).animate({value: stop}, {
					duration: duration == undefined ? 1000 : duration,
					easing: ease == undefined ? "swing" : ease,
					step: function() {
						$this.text(Math.floor(this.value));
						if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
					},
					complete: function() {
						if (parseInt($this.text()) !== stop) {
							$this.text(stop);
							if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
						}
					}
				});
			});
		};

		$('.animated-number').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
			var $this = $(this);
			if (visible) {
				$this.animateNumbers($this.data('digit'), false, $this.data('duration')); 
				$this.unbind('inview');
			}
		});
		if (($(window).width()<500)){
			$(".side-serv").owlCarousel({ 
			        items:1,  
			         rtl:true, 
			        navigation : false,
			        autoPlay: true,
			        pagination: false,
			        autoPlaySpeed: 1000,
			        autoPlayTimeout: 1000,
			        autoplayHoverPause: true,
			            navigationText: [
			            '<i class="fa fa-chevron-left" style="float:left;margin-top:-250px;z-index:50000;margin-left:-10px"></i>'+'<i class="fa fa-chevron-right" style="float:right;margin-top:-250px;z-index:50000;margin-right:-10px"></i>'+
			            "<ul class='list-inline text-center' style='margin-top:50px'><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['prev'];?></button></li><li class='inline-item'><button class='btn btn-primary'><?php echo $lang['next'];?></button></li><ul>"
			            

			            ],
			});
		}
		var width_im=$('.pt-item-image').width();
		  
		  $('.pt-item-image').css('height',width_im);
		$( window ).resize(function() {
		  $('.portfolio-filter >li>a').each(function(){
		  	if (($(window).width()<900) && ($(this).text().length>15)) {
		  		$(this).css('font-size','12px');
		  	} else{
		  		$(this).css('font-size','15px');
		  	}
		  	
		  });
		  var width_im=$('.pt-item-image').width();
		  
		  $('.pt-item-image').css('height',width_im);
		});

});