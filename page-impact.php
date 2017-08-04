<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
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
						<figure class="o-milestone__figure" style="background-image: url('<?php the_field('cover_image'); ?>')"></figure>
						<span class="o-bubble s--large"></span>
						<section class="o-milestone__story">
							<span class="o-subtitle">
								<?php 
									$milestoneDate = new DateTime(get_field('date'));
									echo $milestoneDate->format('F Y');
								?>
							</span>
							<span class="o-subheading"><?php the_title(); ?></span>
							<p><?php the_field('description'); ?></p>
							
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
				<ul class="u-clear o-grid">
					<?php 
						$statisticsList = new WP_Query(array('post_type'=>'statistic', 'posts_per_page'=>-1));
						if ($statisticsList->have_posts()){
							$bubbleSizes = ['', 's--small', 's--medium'];
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
					<li class="o-statistic o-grid__item <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>" data-aos="zoom-in" data-aos-delay="<?php echo $aosDelay; ?>">
						<figure class="o-statistic__bubble">
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
			</div>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>