<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<?php 
				$programLogos = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1, 'orderby' => 'menu_order', 'order'=> 'ASC'));
				if ($programLogos->have_posts()){
                    $programLogoIndex = 0;
                    $aosDelay=0;
			?>
			<ul class="c-programs__nav">			
			<?php while ( $programLogos->have_posts() ) : $programLogos->the_post();

                if($programLogoIndex > 5){
                    $programLogoIndex = 0;
                }
                switch ($programLogoIndex) {
                    case 1:
                        $aosDelay = 50;
                        break;
                    case 2:
                        $aosDelay = 100;
                        break;
                    case 3:
                        $aosDelay = 150;
                        break;
                    case 4:
                        $aosDelay = 200;
                        break;
                    case 5:
                        $aosDelay = 250;
                        break;
                    default:
                        $aosDelay = 0;
                        break;
                }
            ?>
				<li data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>"><a href="#program-<?php echo get_the_id(); ?>" style="background-image:url('<?php the_field('logo'); ?>')"></a></li>
				<?php $programLogoIndex++; endwhile; ?>
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
					$programsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1, 'orderby' => 'menu_order','order'=> 'ASC'));
					if ($programsList->have_posts()){
						$programIndex = 0;
						$programClass = '';
                        $aosDelay=0;
				?>
				<?php while ( $programsList->have_posts() ) : $programsList->the_post();
					$programContent = false;
					$programLink = get_permalink();
					$programID = get_the_id(); 
					$programWebsite = esc_url(get_field('website')); 
					 
					if(have_rows('content', $programID)){
						$programContent = true;
					}
					if ($programIndex > 3) {
						$programIndex = 0;
					}
                    if ($programIndex == 2) {
                        $aosDelay = 200;
                    }
                    else {
                        $aosDelay = 0;
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
					<li id="program-<?php echo $programID; ?>" class="o-program <?php echo $programClass; ?>" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
						<a class="o-program__link <?php if($programContent){echo 'is-clickable" href="'.$programLink.'"';} ?>">
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--large"></span>
							<figure class="o-program__figure" style="background-image:url('<?php the_field('cover_image');?>')"></figure>
							<section class="o-program-meta">
								<div class="u-clear">
									<figure class="o-program__logo" style="background-image:url('<?php the_field('logo'); ?>')"></figure>
								</div>
								<section class="o-program-excerpt__wrap">
									<span class="o-subheading"><?php the_title(); ?></span>
									<div class="o-program__excerpt">
										<?php if($programContent){?>
											<span class="u-block"><?php echo substr(get_field('introduction'), 0, 200); ?> [...]</span>
											<div class="o-button">
												<span class="o-button__title">Explore</span>
												<i class="o-icon s--arrow-ltr"></i>
											</div>
										<?php } else {?>
											<span class="u-block"><?php the_field('introduction'); ?></span>
											<?php if ($programWebsite): ?>
												<div class="o-button js-program-website" data-link="<?php echo $programWebsite; ?>">
													<span class="o-button__title">Visit Website</span>
													<i class="o-icon s--arrow-ltr"></i>
												</div>
											<?php endif ?>
										<?php } ?>	
									</div>
									<span class="o-progam__monogram"><?php echo substr(get_the_title(),0,1) ?></span>
								</section>
							</section>
						</a>
					</li>
					<?php $programIndex++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>