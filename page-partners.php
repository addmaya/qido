<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/bio'));?>
<section class="c-page__content">
<?php 
	$partnerGroups = get_terms('group', array('orderby'=>'count', 'order'=>'DESC'));
	foreach ($partnerGroups as $partnerGroup): ?>
		<section class="o-page__section" data-aos="fade-up">
			<div class="o-section__tint"></div>
			<div class="u-box">
				<header class="o-section__header">
					<span class="o-section__title"><?php echo $partnerGroup->name; ?> Partners</span>
					<span class="o-subtitle">
						<?php 
							$partnerGroupCount = new NumberFormatter("en", NumberFormatter::SPELLOUT);
							echo $partnerGroupCount->format($partnerGroup->count);
						?>
					</span>
					<p><?php echo $partnerGroup->description; ?></p>
				</header>
				<ul class="u-clear">
					<?php 
						$partnerList = new WP_Query(array(
							'post_type'=>'partner',
							'posts_per_page'=>-1,
							'tax_query'=>array(
									array(
										'taxonomy'=>'group',
										'field'=>'name',
										'terms'=>$partnerGroup->name
									)
								)
							));
						if ($partnerList->have_posts()){
							$partnerIndex = 0;
							$aosDelay = 0;
					?>	
						<?php while ( $partnerList->have_posts() ) : $partnerList->the_post();  
							if($partnerIndex > 3){
								$partnerIndex = 0;
							}
							switch ($partnerIndex) {
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
						<li class="o-partner" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
							<a href="<?php the_permalink(); ?>" class="o-partner__link no-barba js-showBioPop" data-title="<?php echo $partnerGroup->name.' Partner'; ?>" data-name="<?php the_title(); ?>" data-id="<?php the_id(); ?>">
								<figure class="o-partner__logo" data-image="<?php the_field('logo'); ?>" style="background-image:url('<?php echo get_field('logo');?>')">
									<div class="u-table">
										<div class="u-cell">
											<span>View Partner Profile</span>
										</div>
									</div>
								</figure>
							</a>
						</li>
						<?php $partnerIndex++; endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php } ?>
				</ul>
				<footer class="o-section__footer">
					<a href="#" class="o-button js-showPartnerForm">
						<i class="o-icon s--arrow-ltr"></i>
						<span class="o-button__title">Partner with Us</span>
					</a>
				</footer>
			</div>
		</section>
	<?php endforeach ?>
?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>