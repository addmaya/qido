<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<div class="o-pop" id="videoPop">
	<div class="u-table">
		<div class="u-cell">
			<div class="o-pop__box">
				<a href="#" class="o-pop__close">
					<span class="o-icon s--close"></span>
				</a>
				<div class="c-bubble-roof">
					<span class="o-bubble s--large"></span>
					<span class="o-bubble s--medium"></span>
					<span class="o-bubble s--small"></span>
					<span class="o-bubble s--xlarge"></span>
				</div>
				<div class="o-pop__content">
					<div class="o-player"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box u-relative">
			<span class="c-milestones__line"></span>
			<ul class="u-clear">
				<?php 
					$milestonesList = new WP_Query(array('post_type'=>'milestone', 'posts_per_page'=>-1, 'order'=>'ASC'));
					if ($milestonesList->have_posts()){
						$milestoneIndex = 0;
						$milestoneClass = '';
						$aosDelay = 0;
				?>
				<?php while ( $milestonesList->have_posts() ) : $milestonesList->the_post();  

					$milestoneDate = new DateTime(get_field('date'));
					$milestoneVideo = get_field('video',false, false);
					$milestoneVideoThumb = get_field('video_thumb');

					if ($milestoneIndex > 4) {
						$milestoneIndex = 0;
					}
					if ($milestoneIndex ==1) {
						$aosDelay = 200;
					}
					else{
						$aosDelay = 0;
					}
					switch ($milestoneIndex) {
						case 0:
							$milestoneClass = 'u-left';
							break;
						case 1:
							$milestoneClass = 'u-right';
							break;
						case 2:
							$milestoneClass = 'u-left';
							break;
						case 3:
							$milestoneClass = 'u-right';
							break;
						case 4:
							$milestoneClass = 'u-full';
							break;
						default:
							break;
					}
				?>
				<li class="o-milestone <?php echo $milestoneClass; ?>" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
					<section class="u-wrap">
						<?php if (!$milestoneVideo){ ?>
							<figure class="o-milestone__figure js-defer" data-image-url="<?php the_field('cover_image'); ?>"></figure>
						<?php } else {
						?>
							<a class="u-block js-video" data-video-id="<?php echo getYoutubeID($milestoneVideo); ?>">
								<figure class="o-milestone__figure js-defer" data-image-url="<?php echo get_post_meta(get_the_ID(), 'video_thumb', true); ?>">
									<div class="o-playButton">
										<span class="o-icon s--play"></span>
									</div>
								</figure>
								
							</a>
						<?php } ?>
						
						<span class="o-bubble s--large"></span>
						<section class="o-milestone__story">
							<span class="o-subtitle"><?php echo $milestoneDate->format('F Y');?></span>
							<span class="o-subheading"><?php the_title(); ?></span>
							<?php the_field('description'); ?>
						</section>
						<div class="u-clear">
							<span class="o-line" data-aos="fade-up"></span>
						</div>
					</section>
				</li>
				<?php $milestoneIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
		</div>
	</section>
	<section class="o-page__section">
		<div class="u-box">
			<header class="o-section__header">
				<span class="o-subtitle"><?php echo date("Y"); ?></span>
				<h2 class="o-heading">
					<?php 
						$rahuAge = new NumberFormatter("en", NumberFormatter::SPELLOUT);
						echo $rahuAge->format(date("Y") - 2009).' Years later';
					?>

				</h2>
			</header>
			<div class="o-slider">
				<ul class="u-clear">
					<?php 
						$statisticsList = get_field('statistics', 170);
						if (have_rows('statistics',170)){
							$bubbleClasses = ['t-banana', 't-berry', 't-ivy', 't-mango'];
							$statisticIndex = 0;
							$bubbleSizes = ['', 's--medium'];
							$aosDelay=0;
					?>
					<?php while (have_rows('statistics',170)):the_row();
						$statIcon = get_sub_field('icon');
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
										<span class="o-icon js-defer" data-image-url="<?php echo $statIcon; ?>"></span>
									<?php endif ?>
									<span class="o-statistic__figure"><?php the_sub_field('number'); ?> <span class="o-statistic__unit"><?php the_sub_field('unit'); ?></span></span>
									<?php the_sub_field('description'); ?>
								</div>
							</div>
						</figure>
						<p><?php the_field('description'); ?></p>
					</li>
					<?php $statisticIndex++; endwhile; ?>
					<?php } ?>
				</ul>
			</div>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>