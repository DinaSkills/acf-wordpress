/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 *
 * @version 1.0
 */

( function( $ ) {
	var $body, $window, $sidebar, adminbarOffset, top = false,
	    bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
	    topOffset = 0, bodyHeight, sidebarHeight, resizeTimer,
		secondary, button;

	// Mobile Main Menu.
    $('#menu-main-wrap').hide();
    $('#menu-main-close').hide();
	$('#menu-main-toggle').on( 'click', function () {
		$('#menu-main-wrap').slideToggle('fast');
		$('#menu-main-toggle').addClass('hide');
		$('#menu-main-close').addClass('show');
                $('.sticky-wrap').addClass('scroll');
               
    });

    $('#menu-main-close').on( 'click', function () {
		$('#menu-main-wrap').slideToggle('fast');
		$('#menu-main-toggle').removeClass('hide');
		$('#menu-main-close').removeClass('show');
                $('.sticky-wrap').removeClass('scroll');
    });

    $('#menu-main-close-bottom').on( 'click', function () {
		$('#menu-main-wrap').slideToggle('fast');
		$('#menu-main-toggle').removeClass('hide');
		$('#menu-main-close').removeClass('show');
                
               
    });

    // Subscribe Widget Area
    $('.lightbox-btn').on( 'click', function () {
		$('.lightbox').fadeIn('slow');
    });
    $('.lightbox-close').on( 'click', function () {
		$('.lightbox').fadeOut('slow');
    });

     


	/*// Initialize Featured Content slider for the slider widget.
	$(window).load(function() {
	    jQuery('.flexslider').flexslider({
	    animation: "fade", //String: Select your animation type, "fade" or "slide"
	    slideshow: true, //Boolean: Animate slider automatically
	    animationLoop: true,
	    prevText: "<span>Previous</span>", //String: Set the text for the "previous" directionNav item
		nextText: "<span>Next</span>",
	    touch: true //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
	  });
	});*/

	//Smooth Scroll to top Button
	// browser window scroll (in pixels) after which the "back to top" link is shown
	/*var offset = 500,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 100,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('is-visible') : $back_to_top.removeClass('is-visible');
	});*/
 
         //Get the button
//Get the button
var mybutton = document.getElementById("myBtn");

 if ( $('#toc-menu').length){
 var n = document.getElementById("toc-menu");
 var sticky = n.offsetTop;
    }
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction();if ( $('#toc-menu').length )deFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function deFunction() {
  if (window.pageYOffset >= sticky) {
    n.classList.add("st")
  } else {
    n.classList.remove("st");
  }
}

    
    $back_to_top = $('.up');
    scroll_top_duration = 700,
	//smooth scroll to top
	$back_to_top.on('click', function(event){
          
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});



// Menu //
	// Add dropdown toggle that display child menu items.
	$( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

	// Toggle buttons and submenu items with active children menu items.
	$( '.current-menu-ancestor > button' ).addClass( 'toggle-on' );
	$( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

	$( '.dropdown-toggle' ).click( function( e ) {
		var _this = $( this );
		e.preventDefault();
		_this.toggleClass( 'toggle-on' );
		_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
		_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
	} );

	secondary = $( '#secondary' );
	button = $( '.site-branding' ).find( '.secondary-toggle' );

	

    
 // Scroll Top + Fix-position Main Menu.
	var StickyElement = function(node){
	var doc = $(document),
      fixed = false,
     // anchor = node.find('.sticky-anchor'),
      content = node.find('.sticky-content');
       var anchor = $('.sticky-anchor');
	var onScroll = function(e){
    var docTop = doc.scrollTop(),
        anchorTop = anchor.offset().top;

    if(docTop > anchorTop){
      if(!fixed){
        anchor.height(content.outerHeight());
        content.addClass('fixed');
        $('body').addClass('nav-is-fixed');
        fixed = true;
      }
    }  else   {
      if(fixed){
        anchor.height(0);
        content.removeClass('fixed');
        $('body').removeClass('nav-is-fixed');
        fixed = false;
      }
    }
  	};
  	$(window).on('scroll', onScroll);
	};

	var demo = new StickyElement($('.stick'));
      

} )( jQuery );





var items = document.querySelectorAll(".accordion .h3");

function toggleAccordion(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));


/* Stars function*/
(function ( $ ) { 
var starWidth = 18;

$.fn.stars = function() {
  return $(this).each(function() {
    $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * starWidth));
  });
}
$(document).ready(function() {
  $('span.stars').stars();
});
}( jQuery ));

(function ( $ ) { 
    var b = $( '.progress-bar-rating' );
 b.click(function(){   
   
    	var $this = $(this).parent().parent().parent().find('.progress-rating');
    	if ( $this.is(':visible') ) {    		
    		$('.wrapper-rating .progress-bar-rating').find('span').removeClass('arrow-up').addClass('arrow-down');
    		$this.fadeOut();
    	}
    	else{
    		$('.wrapper-rating .progress-bar-rating').find('span').removeClass('arrow-down').addClass('arrow-up');
    		$this.fadeIn();
    	}
    });


}( jQuery ));

(function ( $ ) { 
    var b = $( '.progress' );
 b.click(function(){   
   
    	var $this = $(this).parent().find('.requirements');
    	if ( $this.is(':visible') ) {    		
    		$(this).find('span').removeClass('arrow-up').addClass('arrow-down');
    		$this.fadeOut();
    	}
    	else{
    		$(this).find('span').removeClass('arrow-down').addClass('arrow-up');
    		$this.fadeIn();
    	}
    });


}( jQuery ));

function closeFunction() {
        var x = document.getElementById("menu-toc");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    } 
    
 const sections = document.querySelectorAll('[data-anchor]');
  const nav = document.querySelectorAll('nav ul li');
 
  window.addEventListener('scroll', ()=> {
  let currentPosition= '';
 
  sections.forEach( section =>{
   const sectionTop= section.offsetTop;
const sectionHeight= section.clientHeight;
  if(pageYOffset >= (sectionTop - 10)){
	/*console.log(sectionTop - sectionHeight);
	  currentPosition = section.getAttribute('id');*/
          currentPosition = section.getAttribute('data-anchor');
  } });
nav.forEach( li =>{
	li.classList.remove('active');
	if(li.classList.contains(currentPosition)){
		
		li.classList.add('active');
	}
});


	/*document.getElementsByClassName('nav-menu')[0].scrollLeft = 0;*/
	var menus = document.getElementsByClassName('nav-menu__item');
	for (var i = 0; i < menus.length; i++) {
		if (menus[i].classList.contains('active')) {
                   
			document.getElementsByClassName('horizontal-nav-menu')[0].scrollLeft = menus[i].offsetLeft;
			/*var el = menus[i].scrollIntoView({block: "start", behavior: "smooth"});*/
		}

	}
 
  });


  

 const scrollContainer = [];
  scrollContainer[0] = document.querySelector(".horizontal-nav-menu");
   /*console.log(scrollContainer[0]);*/
  scrollContainer.forEach(element => {
    element.addEventListener('wheel', (event) => {		
      event.preventDefault();
      element.scrollLeft += event.deltaY < 0 ? -100 : 100;
    });
  });