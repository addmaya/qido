<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<?php 
				$boardList = new WP_Query(array('post_type'=>'cultural','posts_per_page'=>-1));
				if ($boardList->have_posts()){
					$directorIndex = 0;
					$aosDelay = 0;
			?>	
			<ul class="u-clear o-grid">
				<?php while ($boardList->have_posts()):$boardList->the_post();
					if($directorIndex > 3){
						$directorIndex = 0;
					}
					switch ($directorIndex) {
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
					<li class="o-grid__item o-director" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
						<a href="#" >
							<figure class="u-greyscale" style="background-image:url('<?php the_field('photo'); ?>')"></figure>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
						</a>
						<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
						<span class="o-subheading s--profile"><?php the_title(); ?></span>
					</li>
				<?php $directorIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php } ?>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>