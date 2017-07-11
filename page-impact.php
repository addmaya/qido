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
				?>
				<?php while ( $milestonesList->have_posts() ) : $milestonesList->the_post();  
					if ($milestoneIndex > 4) {
						$milestoneIndex = 0;
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
				<li class="o-milestone <?php echo $milestoneClass; ?>">
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
							<span class="o-line"></span>
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
				<h2 class="o-subheading">Fifteen Years Later</h2>
			</header>
			<div class="o-slider">
				<ul class="u-clear">
					<?php 
						$statisticsList = new WP_Query(array('post_type'=>'statistic', 'posts_per_page'=>-1));
						if ($statisticsList->have_posts()){
							$bubbleSizes = ['', 's--small', 's--medium'];
					?>
					<?php while ( $statisticsList->have_posts() ) : $statisticsList->the_post(); ?>
					<li class="o-statistic <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>">
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
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<?php } ?>
				</ul>
				<section class="a-center">
					<a href="" class="o-button">Donwload Annual Report 20016</a>
				</section>
			</div>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>