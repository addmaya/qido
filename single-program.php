<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<section class="c-page-cover s--medium">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image');?>')"></figure>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="c-bubble-corridor">
		<span class="o-bubble s--xmedium"></span>
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="u-box">
		<header class="c-program__header">
			<figure style="background-image:url('<?php the_field('logo'); ?>')"></figure>
			<p><?php the_field('introduction'); ?></p>
			<?php
			$programURL = get_field('website');
			if ($programURL ): ?>
				<div class="u-pt-m">
					<a target="_blank" href="<?php echo esc_url($programURL ); ?>" class="o-button">
						<i class="o-icon s--arrow-ltr"></i>
						<span class="o-button__title">Visit Website</span>
					</a>
				</div>
			<?php endif ?>
		</header>
		<span class="o-line s--hidden"></span>
	</div>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/content') ); ?>
	<?php
		$programPartners = get_field('partners');
		if($programPartners): 
	 ?>
		<section class="o-page__section" data-aos="fade-up">
			<div class="o-section__tint"></div>
			<div class="u-box">
				<header class="o-section__header">
					<span class="o-section__title">Program Partners</span>
				</header>
				<ul class="u-clear">
					<?php foreach ($programPartners as $post):?>
						<?php setup_postdata($post ); ?>
							<li class="o-partner" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
								<a href="<?php the_permalink(); ?>" class="o-partner__link">
									<figure class="o-partner__logo" style="background-image:url('<?php echo get_field('logo');?>')">
										<div class="u-table">
											<div class="u-cell">
												<span>View Partner Profile</span>
											</div>
										</div>
									</figure>
								</a>
							</li>
					<?php endforeach; ?>
				</ul>
				<?php wp_reset_postdata();?>
				<footer class="o-section__footer">
					<a href="#" class="o-button">
						<i class="o-icon s--arrow-ltr"></i>
						<span class="o-button__title">Partner with Us</span>
					</a>
				</footer>
			</div>
		</section>
	<?php endif; ?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>
