<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<?php $featuredEvents = new WP_Query(array('posts_per_page'=>1, 'category_name' => 'events')); ?>
<?php if ( $featuredEvents->have_posts() ) : ?>
	<?php while ( $featuredEvents->have_posts() ) : $featuredEvents->the_post(); ?>
	<section class="c-page-cover">
		<figure class="c-page-cover__image" style="background-image:url('<?php getPostThumbnail(); ?>')"></figure>
		<div class="u-table">
			<div class="u-cell u-relative">
				<span class="c-page-cover__title" style="background-image:url('<?php the_field('title_animation', 195);?>')"></span>
				<span class="o-bubble s--small"></span>
				<span class="o-bubble s--medium"></span>
			</div>
		</div>
	</section>
	<section class="c-page__info">
		<a class="u-wrap" href="<?php the_permalink(); ?>">
			<h1><?php the_title(); ?>
				<span class="o-subtitle"><?php getPostTime(); ?></span>
			</h1>
			<span class="u-block"><?php getPostExcerpt(186); ?></span>
			<div class="o-link">
				<i class="o-icon s--arrow-ltr"></i>
				<span>Read On</span>
			</div>
		</a>
	</section>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
<section class="c-page__title">
	<span><?php the_title(); ?></span>
</section>
<section class="c-page__content">
	<?php
		$currentDate = date('Ymd');
		$eventsList = new WP_Query(array(
			'post_type'=>'event',
            'posts_per_page'=>-1
		));
		$eventsCount = $eventsList->post_count;
		if ($eventsList->have_posts()){ 
	?>
		<section class="o-page__section">
			<div class="o-section__tint"></div>
			<div class="u-box">
				<header class="a-center">
					<span class="o-section__title"> Events Calendar</span>
				</header>
				<section>
					<ul class="u-clear">
						<?php while ( $eventsList->have_posts() ) : $eventsList->the_post();
							$eventDate = new DateTime(get_field('start_date_time'));
							$currentTime = time();
							$eventDateDifference = floor((strtotime(get_field('start_date_time')) - $currentTime)/60/60/24);
						?>
						<li class="o-article u-third">
							<section class="u-wrap">
								<span class="o-bubble s--medium"></span>
								<a class="o-ticket" href="<?php the_permalink(); ?>">
									<section class="o-ticket__figure">
										<i class="c-cut s--left"></i>
										<i class="c-cut s--right"></i>
										<span class="o-article__time o-subtitle"><?php if($eventDateDifference < 0){echo abs($eventDateDifference).' days ago';} else {echo $eventDateDifference.' days to';} ?></span>
										<figure style="background-image: url('<?php the_field('cover_image');?>')"></figure>
									</section>
									<div class="o-ticket__info">
										<i class="c-cut s--left"></i>
										<i class="c-cut s--right"></i>	
										<i class="c-cut s--left__bottom"></i>
										<i class="c-cut s--right__bottom"></i>
										<div class="u-half">
											<i class="o-line"></i>
											<span><?php echo $eventDate->format('j M Y'); ?></span>
										</div>
										<div class="u-half">
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
						<?php wp_reset_postdata(); ?>
					</ul>
				</section>
				<div class="a-center u-pt-m">
					<a href="#" class="o-button">
						<i class="o-icon s--arrow-ltr"></i>
						<span class="o-button__title">See Full Calendar</span>
					</a>
				</div>
			</div>
		</section>
	<?php } ?>
	<section class="o-page__section">
		<div class="o-section__tint s--full"></div>
		<div class="u-box">
			<header class="a-center u-clear">
				<span class="o-section__title u-left">Relieve Past Events</span>
				<div class="o-select u-right">
					<select name="" id="">
						<option value="">All Topics</option>
						<option value="">Camp</option>
						<option value="">HIV AIDS</option>
					</select>
					<span class="o-select__arrow">
						<i class="o-arrow__head"></i>
					</span>
				</div>
				<div class="o-select u-right">
					<select name="" id="">
						<option value="">All Years</option>
						<option value="">2014</option>
						<option value="">2013</option>
						<option value="">2012</option>
						<option value="">2011</option>
						<option value="">2010</option>
					</select>
					<span class="o-select__arrow">
						<i class="o-arrow__head"></i>
					</span>
				</div>
			</header>
			<section class="u-wrap">
				<ul class="u-clear">
					<?php $eventPosts = new WP_Query(array('posts_per_page'=>5, 'category_name' => 'events')); ?>
					<?php if ($eventPosts->have_posts() ) : ?>
						<?php 
							$postIndex = 0;
							$bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
							$aosDelay = 0;
						
							while ( $eventPosts->have_posts() ) : $eventPosts->the_post();

							if ($postIndex > 2) {
								$postIndex = 0;
							}

							if ($postIndex == 1){
								$aosDelay = 200;
							}
							else {
								$aosDelay = 0;
							}

							if($postIndex == 2){
								$postClass = 'u-full';
							} else {
								$postClass = 'u-half';
							}

							$postPermalink = get_permalink();
						?>
							<li id="<?php echo $postIndex; ?>" class="o-article <?php echo $postClass; ?>" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
								<a class="u-wrap o-article__link" href="<?php the_permalink(); ?>">
									<section class="o-article__figure">
										<figure style="background-image:url('<?php getPostThumbnail(); ?>')">
											<div class="u-center">
												<i class="o-icon s--pen"></i>
											</div>
											<span class="o-article__time o-subtitle"><?php  getPostTime(); ?></span>
										</figure>
									</section>
									<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
									<section class="o-article__brief">
										<span class="o-subheading"><?php the_title(); ?></span>
										<section>
											<?php getPostExcerpt(136); ?>
											<span class="o-link">
												<i class="o-icon s--arrow-ltr"></i>
											</span>
										</section>
									</section>
								</a>
							</li>
						<?php $postIndex ++; endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</ul>
				<div class="a-center u-pt-l">
					<span class="o-subtitle u-pb-m">8 of 125</span>
					<a href="#" class="o-button">
						<i class="o-icon s--arrow-ltr"></i>
						<span class="o-button__title">Show me more</span>
					</a>
				</div>
			</section>
		</div>
	</section>
	<?php 
		$programsList = new WP_Query(array(
			'post_type'=>'program',
			'posts_per_page'=>2,
			'tax_query'=>array(
					array(
						'taxonomy'=>'kind',
						'field'=>'name',
						'terms'=>'event'
					)
				)
			));
		if ($programsList->have_posts()){
	?>
	<section class="o-page__section">
		<div class="u-box">
			<ul class="u-clear u-wrap">
				<?php while ( $programsList->have_posts() ) : $programsList->the_post();  ?>
				<li id="program-<?php echo get_the_id(); ?>" class="o-program u-half s--small">
					<div class="u-clear u-relative">
						<span class="o-bubble s--medium"></span>
						<span class="o-bubble s--large"></span>
						<figure class="o-program__figure" style="background-image:url('<?php the_field('cover_image')?>')"></figure>
						<section class="o-program__info">
							<div class="u-clear">
								<figure class="o-program__logo" style="background-image: url('<?php the_field('logo'); ?>')"></figure>
							</div>
							<section>
								<span class="o-subheading"><?php the_title(); ?></span>
								<div class="o-program__summary">
									<p><?php echo substr(get_field('introduction'), 0, 200); ?> [...]</p>
									<a href="<?php the_permalink(); ?>" class="o-button">
										<i class="o-icon s--arrow-ltr"></i>
										<span class="o-button__title">Learn More</span>
									</a>
								</div>
								<span class="o-progam__monogram"><?php echo substr(get_the_title(),0,1) ?></span>
							</section>
						</section>
					</div>
				</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>			
			</ul>
		</div>
	</section>
	<?php } ?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>