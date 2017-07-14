<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<section class="c-swiper">
	<div class="swiper-container" id="homeSwiper">
		<div class="swiper-wrapper">
		<?php 
			$slidesList = new WP_Query(array('post_type'=>'slide', 'posts_per_page'=>-1));
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
			<div class="swiper-slide">
				<a class="o-slide" href="<?php echo $slideButtonLink; ?>" data-depth="0.6">
					<div class="u-box">			
						<div class="o-slide__info">
							<section class="u-wrap">
								<h1 class="o-slide__title"><?php echo $slideTitle; ?></h1>
								<span class="o-slide__excerpt">
									<span class="u-block"><?php echo $slideCaption; ?></span>
									<div class="o-button">
										<span class="o-button__title"><?php echo $slideButtonText; ?></span>
										<i class="o-icon s--arrow-ltr"></i>
									</div>
								</span>
							</section>
						</div>
						<div class="o-slide__figure">
							<div class="u-table">
								<div class="u-cell">
									<figure style="background-image:url('<?php echo $slideImage; ?>')">
										<span class="o-bubble s--small"></span>
										<span class="o-bubble s--medium"></span>
										<span class="o-bubble s--large"></span>
									</figure>
								</div>
							</div>
						</div>
						<span class="o-globe"></span>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php } ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</section>
<section class="o-page__section u-pt-xl">
	<div class="u-box">
		<header class="o-section__header">
			<h2 class="o-heading" data-aos="fade-up">Touching youth for 6 years <br/>and counting</h2>
		</header>
		<div class="o-slider">
			<ul class="u-clear">
				<?php 
					$statisticsList = new WP_Query(array('post_type'=>'statistic', 'posts_per_page'=>4, 'orderby'=>'rand'));
					if ($statisticsList->have_posts()){
						$bubbleSizes = ['', 's--small', 's--medium'];
						$bubbleClasses = ['t-banana', 't-berry', 't-ivy', 't-mango'];
						$statisticIndex = 0;
						$aosDelay=0;
				?>
				<?php while ( $statisticsList->have_posts() ) : $statisticsList->the_post(); 
					if($statisticIndex > 3){
					    $statisticIndex = 0;
					}
					switch ($statisticIndex) {
					    case 0:
					        $aosDelay = 0;
					        break;
					    case 1:
					        $aosDelay = 100;
					        break;
					    case 2:
					        $aosDelay = 200;
					        break;
					    case 3:
					        $aosDelay = 300;
					        break;
					    default:
					        $aosDelay = 0;
					        break;
					}
				?>
				<li class="o-statistic <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>" data-aos="zoom-in" data-aos-delay="<?php echo $aosDelay; ?>">
					<figure class="<?php echo $bubbleClasses[$statisticIndex]; ?>">
						<div class="u-table">
							<div class="u-cell">
								<i class="o-icon" style="background-image:url('<?php the_field('icon'); ?>')"></i>
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
					
					<span class="o-button__title">Our Story in Number</span>
					<i class="o-icon s--arrow-ltr"></i>
				</a>
			</section>
		</div>
	</div>
</section>
<section class="o-page__section u-pb-m u-white" data-aos="fade-up">
	<div class="c-programs-tint"></div>
	<div class="u-box">
		<?php 
			$programsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>2, 'orderby'=>'rand'));
			if ($programsList->have_posts()){ 
				$programClass='';
				$programIndex = 0;
				$aosDelay = 0;
		?>
		<header class="o-section__header">
			<span class="o-section__title"><a href="#">Our Programs</a></span>
			<span class="o-subtitle">
				<?php 
					$programsCount = new NumberFormatter("en", NumberFormatter::SPELLOUT);
					echo $programsCount->format(wp_count_posts('program')->publish);
				?>
			</span>
		</header>
		<section class="u-pt-m">
			<div class="u-clear">			
				<?php while ( $programsList->have_posts() ) : $programsList->the_post(); 
					if($programIndex > 1){
						$programIndex = 0;
					}
					if($programIndex > 0){
						$programClass = 's--right';
						$aosDelay = 100;
					}
					else {
						$programClass = 's--left';
						$aosDelay = 0;
					}
				?>
					<div class="u-half" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay;?>">
						<a class="o-card <?php echo $programClass; ?>" href="<?php the_permalink(); ?>">
							<figure class="o-card__figure" style="background-image:url('<?php the_field('cover_image');?>')">
								<span class="o-card__logo" style="background-image: url('<?php the_field('logo'); ?>')"></span>
							</figure>
							<section class="o-card__info">
								<span class="u-block"><?php the_field('introduction'); ?></span>
								<div class="o-button">
									<span class="o-button__title">Explore</span>
									<i class="o-icon s--arrow-ltr"></i>
								</div>
							</section>
							<span class="o-card__monogram">g</span>
						</a>
					</div>
				<?php $programIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
		</section>
		<footer class="o-section__footer">
			<span class="o-subtitle u-pb-m">8 of <?php echo wp_count_posts('program')->publish; ?></span>
			<a href="<?php echo home_url(); ?>/programs" class="o-button">
				<span class="o-button__title">See all programs</span>
				<i class="o-icon s--arrow-ltr"></i>
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
			<a class="u-40p u-col c-splash-team__link" href="<?php echo home_url(); ?>/team">
				<figure class="c-splash-team__figure" style="background-image:url('<?php the_field('photo_full');?>')"></figure>
				<span class="o-bubble s--large" data-aos="zoom-in" data-aos-delay="0"></span>
				<span class="o-bubble s--medium" data-aos="zoom-in" data-aos-delay="50"></span>
				<span class="o-bubble s--small" data-aos="zoom-in" data-aos-delay="75"></span>
			</a>
			<div class="u-60p u-col" >
				<section class="u-wrap">
					<a href="<?php echo home_url(); ?>/team" class="u-block c-splash-team__link">
						<blockquote><q>"<?php the_field('quote'); ?>"</q></blockquote>
						<span class="o-subheading s--profile"><?php the_title(); ?></span>
						<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
					</a>
					<?php if(have_rows('pod',181) ): ?>
						<?php while( have_rows('pod',181) ): the_row();
							$podID = get_sub_field('link');
							$podLabel = get_sub_field('label');
							$podCoverImage = get_field('cover_image', $podID); 
						?>
						<a href="<?php echo home_url(); ?>/team" class="o-imagelink">
							<div class="o-imagelink__figure" style="background-image:url('<?php echo $podCoverImage; ?>')"></div>
							<div class="a-center">
								<span class="o-button">
									<span class="o-button__title"><?php echo $podLabel; ?></span>
									<i class="o-icon s--arrow-ltr"></i>
								</span>
							</div>
						</a>
						<?php endwhile; ?>
					<?php endif; ?>
				</section>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
</section>
<section class="o-page__section u-mt-l" data-aos="fade-up">
	<div class="o-section__tint s--full" style="height:98%"></div>
	<div class="u-box">
		<header class="o-section__header">
			<span class="o-section__title">What's Happening @RAHU</span>
			<p>We hold events, throw parties and do alot Corporate parnters are how RAHU works in partnership with other organizations with similar mission, as well as communities to enhance synergies, sustainability and ownership of programs</p>
		</header>
		<section class="u-wrap">
			<ul class="u-clear">
				<?php $blogPosts = new WP_Query(array('posts_per_page'=>5)); ?>
				<?php if ($blogPosts->have_posts() ) : ?>
					<?php 
						$postIndex = 0;
						$postClass = '';
						$bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
						$aosDelay = 0;
						
						while ( $blogPosts->have_posts() ) : $blogPosts->the_post(); 
						
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
				<a href="<?php echo home_url(); ?>/blog" class="o-button">
					<span class="o-button__title">Load More Stories</span>
					<i class="o-icon s--arrow-ltr"></i>
				</a>
			</div>
		</section>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>