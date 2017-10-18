<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ):?>
<section class="c-page-cover s--short">
	<figure class="c-page-cover__image js-defer" data-image-url="<?php echo get_field('cover_image',195); ?>"></figure>
	<div class="u-table u-align__center">
		<div class="u-cell">
			<h1>Events Calendar</h1>
		</div>
	</div>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="u-box u-pt-l u-pb-l">
		<ul class="c-tickets o-grid">
			<?php while ( have_posts() ) : the_post();
				$eventDate = new DateTime(get_field('start_date_time'));
				$currentTime = time();
				$eventDateDifference = floor((strtotime(get_field('start_date_time')) - $currentTime)/60/60/24);
			?>
				<li class="o-article u-third o-grid__item">
					<section class="u-wrap">
						<span class="o-bubble s--medium"></span>
						<a class="o-ticket" href="<?php the_permalink(); ?>">
							<section class="o-ticket__figure">
								<i class="c-cut s--left"></i>
								<i class="c-cut s--right"></i>
								<span class="o-article__time o-subtitle"><?php if($eventDateDifference < 0){echo abs($eventDateDifference).' days ago';} else {echo $eventDateDifference.' days to';} ?></span>
								<figure class="js-defer" data-image-url="<?php echo get_field('cover_image'); ?>"></figure>
							</section>
							<div class="o-ticket-meta">
								<i class="c-cut s--left"></i>
								<i class="c-cut s--right"></i>	
								<i class="c-cut s--left__bottom"></i>
								<i class="c-cut s--right__bottom"></i>
								<div class="o-ticket-meta__date">
									<i class="o-line"></i>
									<span><?php echo $eventDate->format('j M Y'); ?></span>
								</div>
								<div class="o-ticket-meta__venue">
									<i class="o-line"></i>
									<span><?php the_field('venue'); ?></span>
								</div>
							</div>
							<span class="o-subheading">
								<span><?php the_title(); ?></span>
								<i class="o-icon s--arrow-ltr"></i>
							</span>
						</a>
					</section>
				</li>
			<?php endwhile; ?>
		</ul>
		<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
	</div>
</section>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>