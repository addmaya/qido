<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="c-page-cover s--xshort">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image', 52);?>')"></figure>
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
		<section class="o-story s--wide">
			<section class="o-story__content">
				<div class="o-bio">
					<div class="o-bio__figure">
						<figure style="background-image:url('<?php the_field('logo');?>')"></figure>
						<?php Starkers_Utilities::get_template_parts(array('parts/shared/networks')); ?>
					</div>
					<div class="o-bio__story">
						<section class="u-wrap">
							<header>
								<h1 class="s--clear"><?php the_title(); ?></h1>
								<span class="o-subtitle s--profile">
									<?php
										$partnerCategories = get_the_terms(get_the_ID(), 'group');
										foreach ($partnerCategories as $partnerCategory) {
											echo $partnerCategory->name.' / ';
										}
										?>
								</span>
							</header>
							<section>
								<?php the_field('introduction'); ?>
							</section>
							<section>
								<h3 class="u-pb-m">Programs supported</h3>
								<?php 

								$posts = get_field('programs');

								if( $posts ): ?>
								    <ul class="c-programs__nav s--clear">
								    <?php foreach( $posts as $post): 
								    	if($programIndex > 5){
								    	    $programIndex = 0;
								    	}
								    	switch ($programIndex) {
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
								        <?php setup_postdata($post); ?>
								        <li class="u-third" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>"><a href="<?php echo get_permalink(); ?>" style="background-image:url('<?php the_field('logo'); ?>')"></a></li>
								    <?php $programIndex++; endforeach; ?>
								    </ul>
								    <?php wp_reset_postdata();?>
								<?php endif; ?>
							</section>
							<?php
							$partnerURL = get_field('website');
							if ($partnerURL ): ?>
								<div class="u-pt-m">
									<a target="_blank" href="<?php echo esc_url($partnerURL ); ?>" class="o-button">
										<i class="o-icon s--arrow-ltr"></i>
										<span class="o-button__title">Visit Website</span>
									</a>
								</div>
							<?php endif ?>
						</section>
					</div>
				</div>
			</section>
		</section>
	</div>
</section>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>