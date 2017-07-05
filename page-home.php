<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<section class="c-splash">
	<div class="u-box">
		<?php 
			$slidesList = new WP_Query(array('post_type'=>'slide', 'posts_per_page'=>1));
			if ($slidesList->have_posts()){
		?>
			<?php while ($slidesList->have_posts() ) : $slidesList->the_post();
				$slideTitle = get_the_title();
				$slideCaption = get_field('description');
				$slideButtonText = get_field('link_text');
				$slideButtonLink = get_field('link');
				$slideImage = get_field('image');
				$slideVideo = get_field('video');
			?>
			<div class="o-slide">
				<div class="o-slide__info">
					<section class="u-wrap">
						<h1><a href="<?php echo $slideButtonLink; ?>"><?php echo $slideTitle; ?></a></h1>
						<p><?php echo $slideCaption; ?></p>
						<a href="<?php echo $slideButtonLink; ?>" class="o-button">
							<div class="o-arrow">
								<i class="o-arrow__stem"></i>
								<i class="o-arrow__head"></i>
							</div>
							<span class="o-button__title"><?php echo $slideButtonText; ?></span>
						</a>
					</section>
				</div>
				<div class="o-slide__figure">
					<div class="u-table">
						<div class="u-cell">
							<figure>
								<span class="o-bubble s--small"></span>
								<span class="o-bubble s--medium"></span>
								<span class="o-bubble s--large"></span>
							</figure>
						</div>
					</div>
				</div>
				<span class="o-globe"></span>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php } ?>
	</div>
</section>
<section class="o-page__section u-pt-xl">
	<div class="u-box">
		<header class="o-section__header">
			<h2 class="o-heading">Touching youth for 6 years <br/>and counting</h2>
		</header>
		<div class="o-slider">
			<ul class="u-clear">
				<?php 
					$statisticsList = new WP_Query(array('post_type'=>'statistic', 'posts_per_page'=>-1));
					if ($statisticsList->have_posts()){
						$bubbleSizes = ['', 's--small', 's--medium'];
						$bubbleClasses = ['t-banana', 't-berry', 't-ivy', 't-mango'];
						$statisticIndex = 0;
				?>
				<?php while ( $statisticsList->have_posts() ) : $statisticsList->the_post(); ?>
				<li class="o-statistic <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>">
					<figure class="<?php echo $bubbleClasses[$statisticIndex]; ?>">
						<div class="u-table">
							<div class="u-cell">
								<i class="o-icon"></i>
								<span class="o-statistic__figure"><?php the_field('number'); ?></span>
							</div>
						</div>
					</figure>
					<p><?php the_field('description'); ?></p>
				</li>
				<?php $statisticIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
			<section class="a-center">
				<a href="<?php echo home_url(); ?>/story" class="o-button">
					<div class="o-arrow">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
					<span class="o-button__title">Our Story in Number</span>
				</a>
			</section>
		</div>
	</div>
</section>
<section class="o-page__section u-pb-m u-white">
	<div class="c-programs-tint"></div>
	<div class="u-box">
		<?php 
			$programsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1));
			if ($programsList->have_posts()){ 
				$programClass='';
				$programIndex = 0;
				$programsCount = $programsList->post_count;
		?>
		<header class="o-section__header">
			<span class="o-section__title"><a href="#">Our Programs</a></span>
			<span class="o-subtitle">Twelve</span>
		</header>
		<section class="u-pt-m">
			<div class="u-clear">			
				<?php while ( $programsList->have_posts() ) : $programsList->the_post(); 
					if($programIndex > 1){
						$programIndex = 0;
					}
					if($programIndex > 0){
						$programClass = 's--right';
					}
					else {
						$programClass = 's--left';
					}
				?>
					<div class="u-half">
						<section class="o-card <?php echo $programClass; ?>">
							<figure class="o-card__figure">
								<span class="o-card__logo" data-thumb="<?php the_field('logo'); ?>"></span>
							</figure>
							<section class="o-card__info">
								<p><?php the_field('introduction'); ?></p>
								<a href="<?php the_permalink(); ?>" class="o-button">
									<div class="o-arrow">
										<i class="o-arrow__stem"></i>
										<i class="o-arrow__head"></i>
									</div>
									<span class="o-button__title">Learn More</span>
								</a>
							</section>
							<span class="o-card__monogram">g</span>
						</section>
					</div>
				<?php $programIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
		</section>
		<footer class="o-section__footer">
			<span class="o-subtitle u-pb-m">8 of <?php echo $programsCount; ?></span>
			<a href="<?php echo home_url(); ?>/programs" class="o-button">
				<div class="o-arrow">
					<i class="o-arrow__stem"></i>
					<i class="o-arrow__head"></i>
				</div>
				<span class="o-button__title">See all programs</span>
			</a>
		</footer>
		<?php } ?>
	</div>
</section>
<section class="o-page__section u-pt-xl">
	<div class="u-box">
		<div class="u-clear c-splash-team">
			<?php 
				$featuredStaff = new WP_Query(array('post_type'=>'staff', 'posts_per_page'=>1));
				while ( $featuredStaff->have_posts() ) : $featuredStaff->the_post(); 
			?>
			<div class="u-40p">
				<figure data-thumb="<?php the_field('photo_medium'); ?>">
					<span class="o-bubble s--large"></span>
					<span class="o-bubble s--medium"></span>
					<span class="o-bubble s--small"></span>
				</figure>
			</div>
			<div class="u-60p">
				<section class="u-wrap">
					<blockquote><q>"<?php the_field('quote'); ?>"</q></blockquote>
					<span class="o-subheading"><?php the_title(); ?></span>
					<span class="o-subtitle"><?php the_field('title'); ?></span>
					<a href="<?php echo home_url(); ?>/team" class="o-imagelink">
						<div class="o-imagelink__figure"></div>
						<div class="a-center">
							<span class="o-button">
								<div class="o-arrow">
									<i class="o-arrow__stem"></i>
									<i class="o-arrow__head"></i>
								</div>
								<span class="o-button__title">Meet the Team</span>
							</span>
						</div>
					</a>
					<a href="<?php echo home_url(); ?>/team" class="o-imagelink">
						<div class="o-imagelink__figure"></div>
						<div class="a-center">
							<span class="o-button">
								<div class="o-arrow">
									<i class="o-arrow__stem"></i>
									<i class="o-arrow__head"></i>
								</div>
								<span class="o-button__title">See our Board</span>
							</span>
						</div>
					</a>
				</section>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
</section>
<section class="o-page__section u-mt-l">
	<div class="o-section__tint s--full" style="height:98%"></div>
	<div class="u-box">
		<header class="o-section__header">
			<span class="o-section__title">What's Happening @RAHU</span>
			<p>We hold events, throw parties and do alot Corporate parnters are how RAHU works in partnership with other organizations with similar mission, as well as communities to enhance synergies, sustainability and ownership of programs</p>
		</header>
		<section class="u-wrap">
			<ul class="u-clear">
				<?php $blogPosts = new WP_Query(array('posts_per_page'=>4)); ?>
				<?php if ($blogPosts->have_posts() ) : ?>
					<?php 
						$postIndex = 0;
						$postClass = '';
						$bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
						
						while ( $blogPosts->have_posts() ) : $blogPosts->the_post(); 						
						$postPermalink = get_permalink();
					?>
						<li class="o-article u-half">
							<section class="u-wrap">
								<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
								<a href="" class="u-block">
									<figure class="o-article__figure" style="background-image:url('<?php getPostThumbnail(); ?>')">
										<div class="u-center">
											<i class="o-icon"></i>
										</div>
										<span class="o-article__time o-subtitle"><?php  getPostTime(); ?></span>
									</figure>
								</a>
								<section class="o-article__brief">
									<a href="<?php echo $postPermalink; ?>" class="o-subheading"><?php the_title(); ?></a>
									<p><a href="<?php echo $postPermalink; ?>"><?php getPostExcerpt(136); ?>
										<span class="o-link">
											<i class="o-arrow">
												<i class="o-arrow__stem"></i>
												<i class="o-arrow__head"></i>
											</i>
										</span>
									</a></p>
								</section>
							</section>
						</li>
					<?php $postIndex ++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</ul>
			<div class="a-center u-pt-l">
				<span class="o-subtitle u-pb-m">8 of 125</span>
				<a href="<?php echo home_url(); ?>/blog" class="o-button">
					<div class="o-arrow">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
					<span class="o-button__title">Show me more</span>
				</a>
			</div>
		</section>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>