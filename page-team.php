<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<ul class="c-team">
				<?php 
					$teamList = new WP_Query(array(
						'post_type'=>'staff',
						'posts_per_page'=>-1
						));
					if ($teamList->have_posts()){ 
				?>	
					<?php while ( $teamList->have_posts() ) : $teamList->the_post();  ?>
					<li>
						<figure style="background-image:url('<?php the_field('photo_full');?>')">
							<span class="o-bubble s--large"></span>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
						</figure>
						<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
						<span class="o-subheading s--profile"><?php the_title(); ?></span>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
			<footer class="o-section__footer">
				<a href="#" class="o-button">
					<div class="o-arrow">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
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
	?>
	<section class="o-page__section">
		<div class="u-box">
			<ul class="o-program__group">
				<?php while ( $childPages->have_posts() ) : $childPages->the_post();  ?>
				<li class="o-program u-half s--clear">
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
										<div class="o-arrow">
											<i class="o-arrow__stem"></i>
											<i class="o-arrow__head"></i>
										</div>
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