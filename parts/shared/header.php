<header class="c-page__header">
	<section class="u-wrap">
		<a href="<?php echo home_url();?>" class="c-logo"></a>
		<ul class="o-networks">
			<li><a target="_blank" href="#"><span class="o-icon s--search"></span></a></li>
			<li><a target="_blank" href="https://www.facebook.com/reachahand"><span class="o-icon s--fb"></span></a></li>
			<li><a target="_blank" href="https://twitter.com/reachahand"><span class="o-icon s--twitter"></span></a></li>
			<li><a target="_blank" href="https://www.instagram.com/reach_a_hand/"><span class="o-icon s--instagram"></span></a></li>
			<li><a target="_blank" href="https://www.youtube.com/channel/UCf06VA_E9ICZkFue5AjC2XQ"><span class="o-icon s--youtube"></span></a></li>
			<li><a target="_blank" href="https://soundcloud.com/reach-a-hand"><span class="o-icon s--soundcloud"></span></a></li>
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
				<a href="<?php echo home_url(); ?>" class="<?php echo setActiveClass('home'); ?>">
					<span class="o-menu-item__title">Home</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/about" class="<?php echo setActiveClass('about'); ?>">
					<span class="o-menu-item__title">About</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/impact" class="<?php echo setActiveClass('impact'); ?>">
					<span class="o-menu-item__title">Impact</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/programs" class="<?php echo setActiveClass('programs'); ?>">
					<span class="o-menu-item__title">Programs <span class="u-super">16</span></span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/team" class="<?php echo setActiveClass('team'); ?>">
					<span class="o-menu-item__title">Team</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/partners" class="<?php echo setActiveClass('partners'); ?>">
					<span class="o-menu-item__title">Partners</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/events" class="<?php echo setActiveClass('events'); ?>">
					<span class="o-menu-item__title">Events</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/blog" class="<?php echo setActiveClass('blog'); ?>">
					<span class="o-menu-item__title">Blog</span>
					<span class="o-menu-item__bullet"></span>
					<span class="o-menu-item__indicator"></span>
				</a>
			</li>
			<li class="o-menu-item">
				<a href="<?php echo home_url(); ?>/contact" class="<?php echo setActiveClass('contact'); ?>">
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
		if(is_page('impact')){echo 'impact';}
		if(is_page('programs')){echo 'programs';}
		if(is_page('team') || is_page('directors') || is_page('cultural-icons')){echo 'team';}
		if(is_page('partners')){echo 'partners';}
		if(is_page('events')){echo 'events';}
		if(is_page('blog')){echo 'blog';}
		if(is_page('contact')){echo 'contact';}
	?>">