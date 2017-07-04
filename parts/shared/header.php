<header class="c-page__header">
	<section class="u-wrap">
		<a href="<?php echo home_url();?>" class="c-logo"></a>
		<ul class="o-networks">
			<li><a href="#"><span class="o-icon s--search"></span></a></li>
			<li><a href="https://www.facebook.com/reachahand/" target="_blank"><span class="o-icon s--fb"></span></a></li>
			<li><a href="https://twitter.com/reachahand" target="_blank"><span class="o-icon s--twitter"></span></a></li>
			<li><a href="https://www.instagram.com/reach_a_hand/" target="_blank"><span class="o-icon s--instagram"></span></a></li>
			<li><a href="https://www.youtube.com/user/REACHAHANDUGANDA" target="_blank"><span class="o-icon s--youtube"></span></a></li>
			<li><a href="https://soundcloud.com/reach-a-hand" target="_blank"><span class="o-icon s--soundcloud"></span></a></li>
		</ul>
	</section>
</header>
<a href="#" class="c-humburger">
	<span class="o-line__1"></span>
	<span class="o-line__2"></span>
	<span class="o-line__3"></span>
</a>
<nav class="c-page__menu">
	<section class="u-wrap">
		<ul class="o-menu">
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>">
					<span class="o-menu-item__title">Home</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/story">
					<span class="o-menu-item__title">Story</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/programs">
					<span class="o-menu-item__title">Programs</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
				<ul class="o-submenu">
					<li class="o-submenu-item">
						<a href="#">Program 1</a>
						<a href="#">Program 2</a>
						<a href="#">Program 3</a>
						<a href="#">Program 4</a>
						<a href="#">Program 5</a>
						<a href="#">Program 6</a>
						<a href="#">Program 7</a>
						<a href="#">Program 8</a>
						<a href="#">Program 9</a>
						<a href="#">Program 10</a>
					</li>
				</ul>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/team">
					<span class="o-menu-item__title">Team</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/partners">
					<span class="o-menu-item__title">Partners</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/events">
					<span class="o-menu-item__title">Events</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/blog">
					<span class="o-menu-item__title">Blog</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item is-active">
				<a href="<?php echo home_url(); ?>/contact">
					<span class="o-menu-item__title">Contact</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
		</ul>
	</section>
</nav>
<div class="c-page__overlay"></div>
<div id="barba-wrapper" class="u-canvas">
	<div class="barba-container u-canvas" data-namespace="<?php
		if(is_front_page()){echo 'home';}
		if(is_page('story')){echo 'story';}
		if(is_page('programs')){echo 'programs';}
		if(is_page('team')){echo 'team';}
		if(is_page('partners')){echo 'partners';}
		if(is_page('events')){echo 'events';}
		if(is_page('blog')){echo 'blog';}
		if(is_page('contact')){echo 'contact';}
	?>">