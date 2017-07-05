<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<ul class="c-team">
				<?php 
					$teamList = new WP_Query(array(
						'post_type'=>'staff',
						'posts_per_page'=>-1
						));
					if ($teamList->have_posts()){ 
				?>	
					<?php while ( $teamList->have_posts() ) : $teamList->the_post();  ?>
					<li>
						<figure data-thumb="'<?php the_field('photo_full');?>">
							<span class="o-bubble s--large"></span>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
						</figure>
						<span class="o-subheading"><?php the_title(); ?></span>
						<span class="o-subtitle"><?php the_field('title'); ?></span>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
			<footer class="o-section__footer">
				<a href="#" class="o-button">
					<div class="o-arrow">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
					<span class="o-button__title">Join the team</span>
				</a>
			</footer>
		</div>
	</section>
	<section class="o-page__section">
		<div class="o-section__tint"></div>
		<div class="u-box">
			<?php 
				$boardList = new WP_Query(array('post_type'=>'director','posts_per_page'=>-1));
				if ($boardList->have_posts()){
					$boardCount =  $boardList->post_count;
			?>	
			<header class="o-section__header">
				<span class="o-section__title">Board of Directors</span>
				<span class="o-subtitle"><?php echo strval($boardCount); ?></span>
				<p><?php the_field('directors_introduction'); ?></p>
			</header>
			<ul class="u-clear">
				<?php while ($boardList->have_posts()):$boardList->the_post();  ?>
					<li class="o-partner">
						<a href="#">
							<figure class="o-partner__logo" data-thumb="<?php the_field('photo'); ?>"></figure>
							<span></span>
						</a>
						<span class="o-subheading"><?php the_title(); ?></span>
						<span class="o-subtitle"><?php the_field('title'); ?></span>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php } ?>
			<footer class="o-section__footer">
				<span class="o-subtitle u-pb-m">4 of <?php echo $boardCount; ?></span>
				<a href="#" class="o-button">
					<div class="o-arrow s--rtl">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
					<span class="o-button__title">Previous</span>
				</a>
				<a href="#" class="o-button">
					<div class="o-arrow">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
					<span class="o-button__title">Next</span>
				</a>
			</footer>
		</div>
	</section>
	<section class="o-page__section">
		<div class="o-section__tint"></div>
		<div class="u-box u-clear">
			<?php 
				$iconsList = new WP_Query(array('post_type'=>'cultural','posts_per_page'=>-1));
				if ($iconsList->have_posts()){
					$iconsCount =  $iconsList->post_count;
			?>	
			<header class="o-section__header s--left">
				<span class="o-section__title">Cultural Icons</span>
				<span class="o-subtitle"><?php echo strval($iconsCount); ?></span>
				<p><?php the_field('cultural_icons_introduction'); ?></p>
			</header>
			<ul class="u-70p">
				<?php while ($iconsList->have_posts()):$iconsList->the_post();  ?>
					<li class="o-partner u-third">
						<a href="#">
							<figure class="o-partner__logo" data-thumb="<?php echo the_field('photo'); ?>"></figure>
							<span></span>
						</a>
						<span class="o-subheading"><?php the_title(); ?></span>
						<span class="o-subtitle"><?php the_field('title'); ?></span>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php } ?>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>