<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<section class="c-swiper">
	<div class="swiper-container" id="homeSwiper">
		<div class="swiper-wrapper">
		<?php if( have_rows('slides') ): ?>
			<?php while( have_rows('slides') ): the_row(); 
				$slideTitle = get_sub_field('title');
				$slideCaption = get_sub_field('caption');
				$slideButtonText = get_sub_field('button_label');
				$slideButtonLink = get_sub_field('button_link');
				$slideImage = get_sub_field('image');
			?>	
			<div class="swiper-slide">
				<a class="o-slide" href="<?php echo $slideButtonLink; ?>" data-depth="0.6">
					<div class="u-box">			
						<div class="o-slide__info">
							<section>
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
		<?php endif; ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</section>
<section class="o-page__section u-pt-xl">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="u-box">
		<header class="o-section__header">
			<h2 class="o-heading" data-aos="fade-up" style="text-transform: none;">
				Changing Youth<br/>
				<?php 
					$rahuAge = new NumberFormatter("en", NumberFormatter::SPELLOUT);
					echo $rahuAge->format(date("Y") - 2009).' Years and counting';
				?><br/>
			</h2>
		</header>
		<div class="o-slider">
			<ul class="u-clear">
				<?php 
					$statistics = get_field('statistics', 170);
					$statisticsList = array_rand( $statistics, 4);

					$bubbleClasses = ['t-banana', 't-berry', 't-ivy', 't-mango'];
					$statisticIndex = 0;
					$aosDelay=0;
				?>

				<?php 
				 ?>
				<?php
					foreach( $statisticsList as $statistic ){
					
					$statIcon = $statistics[$statistic]['icon'];
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
				<li class="o-statistic" data-aos="zoom-in" data-aos-delay="<?php echo $aosDelay; ?>">
					<figure class="<?php echo $bubbleClasses[$statisticIndex]; ?>">
						<div class="u-table">
							<div class="u-cell">
								<?php if ($statIcon): ?>
									<span class="o-icon" style="background-image: url('<?php echo $statIcon; ?>')"></span>
								<?php endif ?>
								<span class="o-statistic__figure"><?php echo $statistics[$statistic]['number']; ?> <span class="o-statistic__unit"><?php echo $statistics[$statistic]['unit']; ?></span></span>
								<?php echo $statistics[$statistic]['description']; ?>
							</div>
						</div>
					</figure>
				</li>
				<?php $statisticIndex++; } ?>
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
			<span class="o-section__title"><a href="#">Featured Programs</a></span>
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
					$programContent = false;
					$programLink = get_permalink();
					$programWebsite = esc_url(get_field('website'));
					if(have_rows('content', $programID)){
						$programContent = true;
					}

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
						<a class="o-card <?php if(!$programContent){if(!$programWebsite){echo $programClass;}else{echo $programClass.' is-clickable';}}else{echo $programClass.' is-clickable';}; ?>" <?php if($programContent){echo 'href="'.$programLink.'"';} ?>>
							<figure class="o-card__figure" style="background-image:url('<?php the_field('cover_image');?>')">
								<span class="o-card__logo" style="background-image: url('<?php the_field('logo'); ?>')"></span>
							</figure>
							<?php if($programContent){?>
								<section class="o-card__info">
									<span class="u-block"><?php echo substr(get_field('introduction'), 0, 200); ?> [...]</span>
									<div class="o-button">
										<span class="o-button__title">Learn More</span>
										<i class="o-icon s--arrow-ltr"></i>
									</div>
								</section>
								<?php } else {?>
									<section class="o-card__info">
										<span class="u-block"><?php echo get_field('introduction'); ?></span>
									
									<?php if ($programWebsite): ?>
										<div class="o-button js-program-website" data-link="<?php echo $programWebsite; ?>">
											<span class="o-button__title">Visit Website</span>
											<i class="o-icon s--arrow-ltr"></i>
										</div>
									<?php endif ?>
									</section>
								<?php } ?>
							<span class="o-card__monogram">g</span>
						</a>
					</div>
				<?php $programIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
		</section>
		<footer class="o-section__footer">
			<a href="<?php echo home_url(); ?>/programs" class="o-button">
				<span class="o-button__title">See all <?php echo wp_count_posts('program')->publish; ?> Programs</span>
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
				$featuredStaff = new WP_Query(array('post_type'=>'staff', 'posts_per_page'=>1, 'orderby'=>'rand', 'meta_query'=> array(array('key'=>'quote', 'value'=>'', 'compare'=> '!='))));
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
						<blockquote><?php the_field('quote'); ?></blockquote>
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
			<p>Along side our partners, we provide constructive entertainment through parties and events, hold fun and educative youth camps and retreats as well as community and school outreaches.</p>
		</header>
		<section class="u-wrap">
			<ul class="u-clear">
				<?php $blogPosts = new WP_Query(array('post_type'=>'story', 'posts_per_page'=>5)); ?>
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
									<figure style="background-image:url('<?php echo getPostThumbnail(); ?>')">
										<div class="u-center">
											<i class="o-icon s--pen"></i>
										</div>
										<span class="o-article__time o-subtitle"><?php  echo getPostTime(); ?></span>
									</figure>
								</section>
								<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
								<section class="o-article__brief">
									<span class="o-subheading"><?php the_title(); ?></span>
									<section>
										<?php echo getPostExcerpt(150); ?>
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
				<a href="<?php echo home_url(); ?>/blog" class="o-button">
					<span class="o-button__title">Load More Stories</span>
					<i class="o-icon s--arrow-ltr"></i>
				</a>
			</div>
		</section>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>