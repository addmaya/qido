jQuery(document).ready(function($) {

	//menu
	$('.c-menu a').click(function() {
		$('.c-menu').find('.is-active').removeClass('is-active');
		$(this).addClass('is-active');
	});
	//lazy image
	$('.element').each(function() {
    	var me = $(this);
    	var thumb_url = me.data('thumb-url');
    	me.css('background-image', 'url(' + thumb_url + ')');
    });

    //bubbles
    var classes = ['t-cool', 't-warm', 't-passion', 't-romance'];
	$('.o-bubble').each(function(){
        $(this).addClass(classes[~~(Math.random()*classes.length)]);
    });

    //statistics
    var classes = ['t-banana', 't-berry', 't-ivy', 't-mango'];
	$('.o-statistic figure').each(function(){
        $(this).addClass(classes[~~(Math.random()*classes.length)]);
    });

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

	//page transitions
	var page = Barba.BaseView.extend({
	  namespace: 'page',
	  onEnter: function() {
	    alert('go');
	  }
	});
	page.init();

	var preloader = $('.c-loader');
	Barba.Pjax.start();
	var FadeTransition = Barba.BaseTransition.extend({
	  
	  start: function() {
	    preloader.removeClass('is-hidden');
	    Promise.all([this.newContainerLoading, this.fadeOut()]).then(this.fadeIn.bind(this));
	  },
	  fadeOut: function() {
	  	preloader.addClass('is-visible');
	    return $(this.oldContainer).promise();
	  },
	  fadeIn: function() {
	  	var transition = this;
	    var content = $(this.newContainer);

	    $("html, body").animate({ scrollTop: 0 }, 0);
	    
	    setTimeout(function(){
	    	$(this.oldContainer).hide();
	    	preloader.removeClass('is-visible').addClass('is-hidden');
	    	transition.done();
	    }, 1200);
	    
	  }
	});
	Barba.Pjax.getTransition = function() {return FadeTransition;};
});

