function writeCookie(name, value, days) {
    var date, expires;

    if (days) {
        date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');

    for (i = 0; i < ca.length; i++) {
        c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return '';
}

var deleteCookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

jQuery(document).ready(function($) {

	//variables
	var body = $('body');
	var pageLoader = $('.c-loader');
	var pageMenu = $('.c-page__menu');
	var pageOverlay = $('.c-page__overlay');
	var pageHeader = $('.c-page__header');
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

	function windowScroll(){
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			var pageNamespace = $('.barba-container').data('namespace');

			if(!(pageNamespace == 'single-post' || pageNamespace == 'calendar')){
				if (scroll > 250){
					pageHeader.addClass('is-hidden');
					pageMenu.addClass('is-hidden');
					humberger.addClass('is-visible');
				}
				else {
					pageHeader.removeClass('is-hidden');
					pageMenu.removeClass('is-hidden');
					humberger.removeClass('is-visible');
			   	}
		   	}
		   	else {
		   		if (scroll > 250){
					pageHeader.addClass('is-hidden');
				}
				else {
					pageHeader.removeClass('is-hidden');
			   	}
		   	}
		});
	}

	function renderSwiper(){
		var homeSwiper = new Swiper ('.o-swiper .swiper-container', {
		    loop: true,
		    speed: 800,
		    autoplay: 6000,
		    autoplayDisableOnInteraction:false,
		    pagination: '.swiper-pagination',
		    paginationClickable: true,
		    nextButton: '.swiper-button-next',
		    prevButton: '.swiper-button-prev'
		 });
	}

	function renderSwiper(){
		var swiperInstances = {};
		$(".o-swiper .swiper-container").each(function(index, element){
		    var $this = $(this);
		    $this.addClass("instance-" + index);
		    $this.find(".swiper-button-prev").addClass("btn-prev-" + index);
		    $this.find(".swiper-button-next").addClass("btn-next-" + index);
		     $this.find(".swiper-pagination").addClass("pagination-" + index);

		    swiperInstances[index] = new Swiper(".instance-" + index, {
		        loop: true,
		        speed: 800,
		        autoplay: 6000,
		        autoplayDisableOnInteraction:false,
		        pagination: '.pagination-'+index,
		        paginationClickable: true,
		        nextButton: ".btn-next-" + index,
		        prevButton: ".btn-prev-" + index
		    });
		});
	}

	function collapseHeader(){
		pageMenu.addClass('is-hidden');
		humberger.addClass('is-visible');
		pageHeader.find('.o-networks').addClass('is-invisible');
	}

	function submitContactForm(){
		var contactForm = $('#contactForm');
		var submitButton = contactForm.find('button .o-button__title');
		contactForm.ajaxForm({
		    beforeSend: function() { 
		        submitButton.html('Sending...');
		    },
		    success: function() {
		        contactForm.find('#contactFormAlert').html('Thank you. Your Request was sent');
		        submitButton.html('Send Message');
		        contactForm.each(function(){
		        	this.reset();
		        });
		    },
		    error: function(){
		    	contactForm.find('#contactFormAlert').html('Please try again');
		    	submitButton.html('Send Message');
		    },
		    resetForm: true
		});
	}

	function submitPartnerForm(){
		var contactForm = $('#partnerForm');
		var submitButton = contactForm.find('button .o-button__title');
		contactForm.ajaxForm({
		    beforeSend: function() { 
		        submitButton.html('Sending...');
		    },
		    success: function() {
		        contactForm.find('#partnerFormAlert').html('Thank you. Your Request was sent');
		        submitButton.html('Send');
		        contactForm.each(function(){
		        	this.reset();
		        });
		    },
		    error: function(){
		    	contactForm.find('#partnerFormAlert').html('Please try again');
		    	submitButton.html('Send');
		    },
		    resetForm: true
		});
	}

	function getStories(){
		$('#morestories').click(function(e) {
			e.preventDefault();

			var me = $(this);
			var postPerPage = 9;
			var storiesGrid = $('#storiesGrid');
			var offset = storiesGrid.find('li').length;
			var tailIndex = storiesGrid.find('li').last().attr('id');
			var category = me.data('category');

			$.ajax({
			   url: ajaxURL,
			   method: 'post',
			   dataType: 'json',
			   data: {action: 'getStories', offset: offset, postsPerPage: 9, tailIndex: tailIndex, category: category},
			   success: function(data){
			   	console.log(data.length);
			       if(data.length){
			       		storiesGrid.append(data);
					}
					else{
						$('html, body').animate({scrollTop: 0}, 500);
					}
			   } 
			});
		});
	}

	function getEducators(){
		$('#educatorsYear').on('change', function() {
			var me = $(this);
			var educatorsYear = me.val();

			$.ajax({
			   url: ajaxURL,
			   method: 'post',
			   dataType: 'json',
			   data: {action: 'getEducators', year: educatorsYear},
			   success: function(data){
			        $('#educatorsGrid').html(data);
			        loadDeferredImages($('#educatorsGrid').find('.js-defer'));
			   } 
			});
		});
	}

	//pop
	function initPop(){
		$('.o-pop__close').click(function(e) {
			e.preventDefault();
			closePop();
		});
		$('.o-pop').click(function() {
			closePop();
		});
		$('.o-pop .o-pop__box').click(function(e) {
			e.stopPropagation();
		});
		$('body').on('click', '.js-showBioPop', function(e){
			e.preventDefault();

			var me = $(this);
			var bioName = me.data('name');
			var bioTitle = me.data('title');
			var bioID = me.data('id');
			var bioType = me.data('type');
			var imageURL = me.find('figure').data('image-url');

			if (me.data('rounded') != '1') {
				$('#bioPhoto').addClass('s--rounded');
			}
			else {
				$('#bioPhoto').removeClass('s--rounded');
			}

			$('#bioName').html(bioName);
			$('#bioTitle').html(bioTitle);
			$('#bioPhoto').css('background-image', 'url(' + imageURL + ')');

			$.ajax({
			   url: ajaxURL,
			   method: 'post',
			   dataType: 'json',
			   data: {action: 'getBioContent', bioID: bioID, type: bioType},
			   success: function(data){
			        $('#bioContent').html(data);
			        openPop($('#bioPop'));
			   } 
			});
		});

		$('.js-showPartnerForm').click(function(e) {
			e.preventDefault();
			
			$('#partnerForm').each(function(){this.reset();});
			$('#partnerFormAlert').html('');
			
			openPop($('#partnerPop'));
		});


		$('.js-video').click(function(e) {
			e.preventDefault();
			var me = $(this);
			var videoPop = $('#videoPop');	
			var videoID = me.data('video-id');
			videoPop.find('.o-player').html('<iframe type=text/html src=https://www.youtube.com/embed/'+videoID+'?autoplay=1></iframe>');
			openPop(videoPop);
		});
	}
	function openPop(ele){
		$('body').addClass('u-oh');
		ele.show();
	}
	function closePop(){
		$('body').removeClass('u-oh');
		$('.o-pop').hide();
		$('.o-pop').find('.o-player').html('');
	}

	function showNewsletter(){
		$('.js-show-newsletter').click(function(e) {
			e.preventDefault();
			var email = $('.c-form-newsletter input');
			$('html, body').animate({
			    scrollTop: email.offset().top
			}, 1000);

			email.focus();
		});
	}

	function clickProgramLink(){
		$('.js-program-website').click(function() {
		  window.open($(this).data('link')); 
		  return false;
		});
	}

	//menu
	function updateMenu(){
		$('.o-menu a').click(function() {
			$('.o-menu').find('.is-active').removeClass('is-active');
			$(this).addClass('is-active');

		});
		$('.c-logo').click(function() {
			$('.o-menu').find('.is-active').removeClass('is-active');
			$('.o-menu a').first().addClass('is-active');
			pageMenu.removeClass('is-hidden');
		});
	}

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

	//load defered images

	function loadDeferredImages(obj){
        var me = $(this);
        var imageURL = me.data('image-url');

        obj.bind('inview', function (event, isInView) {
          if (isInView) {
            var me = $(this);
            var imageURL = me.data('image-url');

            if(imageURL){
                me.removeClass('js-defer');
                me.css('background-image', 'url(' + imageURL + ')');
                me.addClass('is-loaded');
            }
          }
        });
    }

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

	    $('.c-splash-team .u-col').matchHeight();
	  }
	});
	pageHome.init();

	//page - impact
	var pageImpact = Barba.BaseView.extend({
	  namespace: 'impact',
	  onEnter: function() {
	    updatePageTheme('t-jupiter');
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

	//page - single post
	var pageSinglePost = Barba.BaseView.extend({
	  namespace: 'single-post',
	  onEnter: function() {
	    updatePageTheme('t-mercury');
	    collapseHeader();

	    $('.o-block p').each(function() {
	        var $this = $(this);
	        if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
	            $this.remove();
	    });

	    function renderTweet(obj){
	    	if (obj.children().length == 0) {
	    		obj.each(function() {
	    		    var me = $(this);
	    		    var quoteContent = me.html();
	    		    var url = location.href;

	    		    var tweetContent = url+' '+quoteContent;

	    		    me.html('<a target="_blank" href="https://twitter.com/home?status='+tweetContent.substring(0, 140)+'" class="o-tweet">'+quoteContent+'</a>')
	    		});
	    	}
	    }
	    renderTweet($('.o-story__content blockquote p'));
	    


	    $('.o-imagelist li').matchHeight();

	    $('.o-reaction').on('click', '.is-reactive', function(e) {
	    	e.preventDefault();
	    	var me = $(this);
	    	var postID = me.data('id');
	    	var reactionTitle = me.data('reaction');
	    	var reactionCount = parseInt(me.find('.o-reaction__count').html());

	    	reactionCount++;

	    	me.find('.o-reaction__count').html(reactionCount);
	    	me.find('.o-reaction__add').html(reactionCount);
	    	me.removeClass('is-reactive');
	    	me.addClass('is-unreactive');

	    	writeCookie(reactionTitle+postID, reactionCount, 1);

	    	$.ajax({
	    	   url: ajaxURL,
	    	   method: 'post',
	    	   dataType: 'json',
	    	   data: {action: 'updatePostReaction', post_id: postID, reaction: reactionTitle, operation: 'increment'},
	    	});
	    });

	    $('.o-reaction').on('click', '.is-unreactive', function(e) {
	    	e.preventDefault();
	    	var me = $(this);
	    	var postID = me.data('id');
	    	var reactionTitle = me.data('reaction');
	    	var reactionCount = parseInt(me.find('.o-reaction__count').html());

	    	reactionCount--;

	    	me.find('.o-reaction__count').html(reactionCount);
	    	me.find('.o-reaction__add').html(reactionCount);
	    	me.removeClass('is-unreactive');
	    	me.addClass('is-reactive');

	    	deleteCookie(reactionTitle+postID);

	    	$.ajax({
	    	   url: ajaxURL,
	    	   method: 'post',
	    	   dataType: 'json',
	    	   data: {action: 'updatePostReaction', post_id: postID, reaction: reactionTitle, operation:'decrement'},
	    	});
	    });

	    $('.wp-caption').each(function() {
	    	var me = $(this);
	    	me.css({width: 'auto'});
	    });
	    
	    $('.o-story__content iframe').each(function() {
	    	var me = $(this);
	    	var parent = me.parent();

	    	if(!parent.hasClass('o-embed__content')){
	    		me.parent().addClass('iframe-container');
	    	}
	    });
	  },
	  onLeave: function(){
	  	humberger.removeClass('is-visible');
	  	pageHeader.find('.o-networks').removeClass('is-invisible');
	  }
	});
	pageSinglePost.init();

	//page - calendar
	var pageCalendar = Barba.BaseView.extend({
	  namespace: 'calendar',
	  onEnter: function() {
	    updatePageTheme('t-venus');
	    collapseHeader();
	  },
	  onLeave: function(){
	  	humberger.removeClass('is-visible');
	  	pageHeader.find('.o-networks').removeClass('is-invisible');
	  }
	});
	pageCalendar.init();

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
	    		duration: 700
	    	});
	    }, 800);
	    
	    boot();
	  }
	});
	Barba.Pjax.getTransition = function() {return FadeTransition;};
	
	function boot(){
		randomizeBubbleColors();
		randomizeStatBubbles();
		windowScroll();
		initPop();
		renderSwiper();
		resetGridLayout();
		submitContactForm();
		getStories();
		submitPartnerForm();
		showNewsletter();
		clickProgramLink();
		updateMenu();
		loadDeferredImages($('.js-defer'));
		getEducators();

		if(!('backgroundBlendMode' in document.body.style)) {
		  var html = document.getElementsByTagName("html")[0];
		  html.className = html.className + " no-blendmodes";
		}
	}

	boot();

	AOS.init({
		duration: 700
	});
});

