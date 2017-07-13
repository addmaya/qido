jQuery(document).ready(function($) {


	//variables
	var body = $('body');
	var pageLoader = $('.c-loader');
	var pageMenu = $('.c-page__menu');
	var pageOverlay = $('.c-page__overlay');
	var humberger = $('.c-humburger');

	//functions
	function updatePageTheme(cssClass){
		setTimeout(function(){
	    	body.removeClass();
			body.addClass(cssClass);
			body.addClass('is-booting');
	    }, 500); 
	}

	function toggleMenu(){
		humberger.toggleClass('is-open');
		body.toggleClass('u-oh');
		pageMenu.toggleClass('is-hidden').toggleClass('is-active');
		pageOverlay.toggleClass('is-visible');
	}
	
	//menu
	$('.o-menu a').click(function() {
		$('.o-menu').find('.is-active').removeClass('is-active');
		$(this).addClass('is-active');
	});
	$('.c-logo').click(function() {
		$('.o-menu').find('.is-active').removeClass('is-active');
		$('.o-menu a').first().addClass('is-active');
	});

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll > 250){
			$('.c-page__header').addClass('is-hidden');
			pageMenu.addClass('is-hidden');
			humberger.addClass('is-visible');
		}
		else {
			$('.c-page__header').removeClass('is-hidden');
			pageMenu.removeClass('is-hidden');
			humberger.removeClass('is-visible');
	   	}
	});

	$('.c-humburger').click(function(event) {
		event.preventDefault();
		toggleMenu();
	});

	$('.c-page__overlay').click(function() {
		toggleMenu();
	});

	//lazy image
	$('.element').each(function() {
    	var me = $(this);
    	var thumb_url = me.data('thumb-url');
    	me.css('background-image', 'url(' + thumb_url + ')');
    });


    //bubbles
    var bubbleThemes = ['t-cool', 't-warm', 't-passion', 't-romance'];
	function randomizeBubbleColors(){
		$('.o-bubble').each(function(){
	        $(this).addClass(bubbleThemes[~~(Math.random()*bubbleThemes.length)]);
	    });
	}
	function resetGridLayout(){
		var grid = $('.o-grid');    
		grid.isotope({
			 itemSelector: '.o-grid__item',
			 layoutMode: 'packery'
		});
	}

    //statistics
    var statThemes = ['t-banana', 't-berry', 't-ivy', 't-mango'];
	function randomizeStatBubbles(){
		$('.o-statistic__bubble').each(function(){
	        $(this).addClass(statThemes[~~(Math.random()*statThemes.length)]);
	    });
    }

    //scroll to hash
    $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
	    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	        if (target.length) {
	            $('html, body').animate({
	                scrollTop: target.offset().top
	            }, 1000);
	            e.preventDefault();
	        }
	    }
	});

	//page - home
	var pageHome = Barba.BaseView.extend({
	  namespace: 'home',
	  onEnter: function() {
	    updatePageTheme('t-mercury');
	    var homeSwiper = new Swiper ('#homeSwiper', {
	        loop: true,
	        speed: 800,
	        autoplay: 6000,
	        autoplayDisableOnInteraction:false,
	        pagination: '.swiper-pagination',
	        paginationClickable: true
	     });
	    $('.scene').parallax();
	  }
	});
	pageHome.init();

	//page - impact
	var pageImpact = Barba.BaseView.extend({
	  namespace: 'impact',
	  onEnter: function() {
	    updatePageTheme('t-jupiter');
	    resetGridLayout();
	  }
	});
	pageImpact.init();

	//page - programs
	var pagePrograms = Barba.BaseView.extend({
	  namespace: 'programs',
	  onEnter: function() {
	    updatePageTheme('t-mercury');
	  }
	});
	pagePrograms.init();

	//page - team
	var pageTeam = Barba.BaseView.extend({
	  namespace: 'team',
	  onEnter: function() {
	    updatePageTheme('t-earth');
	    resetGridLayout();
	  }
	});
	pageTeam.init();

	//page - partners
	var pagePartners = Barba.BaseView.extend({
	  namespace: 'partners',
	  onEnter: function() {
	    updatePageTheme('t-neptune');
	  }
	});
	pagePartners.init();

	//page - events
	var pageEvents = Barba.BaseView.extend({
	  namespace: 'events',
	  onEnter: function() {
	    updatePageTheme('t-venus');
	  }
	});
	pageEvents.init();

	//page - blog
	var pageBlog = Barba.BaseView.extend({
	  namespace: 'blog',
	  onEnter: function() {
	    updatePageTheme('t-mercury');
	  }
	});
	pageBlog.init();

	//page - contact
	var pageContact = Barba.BaseView.extend({
	  namespace: 'contact',
	  onEnter: function() {
	    updatePageTheme('t-neptune');
	  }
	});
	pageContact.init();

	//page transition
	Barba.Pjax.start();
	var FadeTransition = Barba.BaseTransition.extend({	  
	  start: function() {
	    pageLoader.removeClass('is-hidden');
	    pageMenu.find('.is-active').removeClass('is-active');
	    Promise.all([this.newContainerLoading, this.fadeOut()]).then(this.fadeIn.bind(this));
	  },
	  fadeOut: function() {
	  	pageLoader.addClass('is-visible');
	  	if(pageOverlay.hasClass('is-visible')){
	  		toggleMenu();
	  		pageMenu.removeClass('is-hidden');
	  	}
	    return $(this.oldContainer).promise();
	  },
	  fadeIn: function() {
	  	var transition = this;
	    var content = $(this.newContainer);	    
	    setTimeout(function(){
	    	$(this.oldContainer).hide();
	    	$('html, body').animate({ scrollTop: 0 }, 0);
	    	pageLoader.removeClass('is-visible').addClass('is-hidden');
	    	transition.done();
	    	AOS.init({
	    		duration: 750
	    	});
	    }, 800);
	    randomizeBubbleColors();
	    randomizeStatBubbles();

	  }
	});
	Barba.Pjax.getTransition = function() {return FadeTransition;};
	
	randomizeBubbleColors();
	randomizeStatBubbles();

	AOS.init({
		duration: 750
	});
});

