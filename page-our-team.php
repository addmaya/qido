<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/bio'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<ul class="c-team o-grid">
				<?php 
					$teamList = new WP_Query(array(
						'post_type'=>'staff',
						'posts_per_page'=>-1,
						'orderby' => 'menu_order',
						'order'=> 'ASC'
						));
					if ($teamList->have_posts()){ 
						$staffIndex = 0;
						$aosDelay = 0;
				?>	
					<?php while ( $teamList->have_posts() ) : $teamList->the_post();
						$staffLink = '';	
						$staffBio = get_the_content();

						if(strlen($staffBio) > 2){
							$staffLink = 'href="'.get_permalink().'" class="o-staff no-barba js-showBioPop is-clickable"';
						} else{
							$staffLink = 'class="o-staff"';
						}

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
						<a <?php echo $staffLink; ?> data-title="<?php the_field('title'); ?>" data-name="<?php the_title(); ?>" data-id="<?php the_id(); ?>">
							<figure class="js-defer" data-image-url="<?php the_field('photo_full'); ?>"></figure>
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
				<a href="<?php echo home_url(); ?>/category/opportunities" class="o-button">
					<i class="o-icon s--arrow-ltr"></i>
					<span class="o-button__title">Find Opportunities with RAHU</span>
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
					<a class="o-program__link is-clickable" href="<?php the_permalink(); ?>">
						<span class="o-bubble s--medium"></span>
						<span class="o-bubble s--large"></span>
						<figure class="o-program__figure js-defer" data-image-url="<?php the_field('cover_image');?>"></figure>
						<section class="o-program-meta">
							<section class="o-program-excerpt__wrap">
								<span class="o-subheading"><?php the_title(); ?></span>
								<div class="o-program__excerpt">
									<span class="u-block"><?php echo substr(get_field('introduction'), 0, 200); ?> [...]</span>
									<div class="o-button">
										<span class="o-button__title">Explore</span>
										<i class="o-icon s--arrow-ltr"></i>
									</div>
								</div>
								<span class="o-progam__monogram"><?php echo substr(get_the_title(),0,1) ?></span>
							</section>
						</section>
					</a>
				</li>
				<?php $pageIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>		
			</ul>
		</div>
	</section>
	<?php } ?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>