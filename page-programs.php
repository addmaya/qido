<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<?php 
				$programLogos = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1));
				if ($programLogos->have_posts()){ 
			?>
			<ul class="c-programs__nav">			
			<?php while ( $programLogos->have_posts() ) : $programLogos->the_post();  ?>
				<li><a href="#program-<?php echo get_the_id(); ?>" style="background-image:url('<?php the_field('logo'); ?>')"></a></li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php } ?>
			</ul>
		</div>
	</section>
</section>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<ul class="u-clear">
				<?php 
					$programsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1));
					if ($programsList->have_posts()){
						$programIndex = 0;
						$programClass = '';
				?>
				<?php while ( $programsList->have_posts() ) : $programsList->the_post();  
					if ($programIndex > 3) {
						$programIndex = 0;
					}
					switch ($programIndex) {
						case 0:
							$programClass = 'u-full s--right';
							break;
						case 1:
							$programClass = 'u-half s--small';
							break;
						case 2:
							$programClass = 'u-half s--small';
							break;
						case 3:
							$programClass = 'u-full s--left';
							break;
						default:
							break;
					}
				?>
					<li id="program-<?php echo get_the_id(); ?>" class="o-program <?php echo $programClass; ?>">
						<div class="u-clear u-relative">
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--large"></span>
							<figure class="o-program__figure" style="background-image:url('<?php the_field('cover_image');?>')"></figure>
							<section class="o-program__info">
								<div class="u-clear">
									<figure class="o-program__logo" style="background-image:url('<?php the_field('logo'); ?>')"></figure>
								</div>
								<section>
									<span class="o-subheading"><?php the_title(); ?></span>
									<div class="o-program__summary">
										<p><?php echo substr(get_field('introduction'), 0, 200); ?> [...]</p>
										<a href="<?php the_permalink(); ?>" class="o-button">
											<i class="o-icon s--arrow-ltr"></i>
											<span class="o-button__title">Explore</span>
										</a>
									</div>
									<span class="o-progam__monogram"><?php echo substr(get_the_title(),0,1) ?></span>
								</section>
							</section>
						</div>
					</li>
					<?php $programIndex++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>