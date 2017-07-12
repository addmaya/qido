<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<ul class="c-team o-grid">
				<?php 
					$teamList = new WP_Query(array(
						'post_type'=>'staff',
						'posts_per_page'=>-1
						));
					if ($teamList->have_posts()){ 
						$staffIndex = 0;
						$aosDelay = 0;
				?>	
					<?php while ( $teamList->have_posts() ) : $teamList->the_post();
						if($staffIndex > 3){
							$staffIndex = 0;
						}
						switch ($staffIndex) {
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
					<li data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>" class="o-grid__item">
						<a href="<?php the_permalink(); ?>" class="o-staff">
							<figure style="background-image:url('<?php the_field('photo_full');?>')">
								
							</figure>
							<span class="o-bubble s--large"></span>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
							<span class="o-subheading s--profile"><?php the_title(); ?></span>
							<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
						</a>
					</li>
					<?php $staffIndex++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
			<footer class="o-section__footer">
				<a href="#" class="o-button">
					<i class="o-icon s--arrow-ltr"></i>
					<span class="o-button__title">Join the team</span>
				</a>
			</footer>
		</div>
	</section>
	<?php 
		$pageID = get_the_ID();
		$childPages = new WP_Query(array(
			'post_type'=>'page',
			'post_parent'=>138
			));
		if ($childPages->have_posts()){
			$pageIndex = 0;
			$aosDelay = 0;
	?>
	<section class="o-page__section">
		<div class="u-box">
			<ul class="o-program__group">
				<?php while ( $childPages->have_posts() ) : $childPages->the_post();
					if($pageIndex > 1){
						$pageIndex = 0;
					}
					if($pageIndex == 1){
						$aosDelay = 100;
					}
				?>
				<li class="o-program u-half s--clear" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
					<div class="u-clear u-relative">
						<span class="o-bubble s--medium"></span>
						<span class="o-bubble s--large"></span>
						<figure class="o-program__figure" style="background-image:url('<?php the_field('cover_image')?>')"></figure>
						<section class="o-program__info">
							<section>
								<span class="o-subheading"><?php the_title(); ?></span>
								<div class="o-program__summary">
									<p><?php the_field('introduction'); ?></p>
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
				<?php $pageIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>		
			</ul>
		</div>
	</section>
	<?php } ?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>