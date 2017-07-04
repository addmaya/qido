<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
<?php 
	$partnerGroups = get_terms('group', array('orderby'=>'count', 'order'=>'DESC'));
	foreach ($partnerGroups as $partnerGroup): ?>
		<section class="o-page__section">
			<div class="o-section__tint"></div>
			<div class="u-box">
				<header class="o-section__header">
					<span class="o-section__title"><?php echo $partnerGroup->name; ?></span>
					<span class="o-subtitle"><?php echo strval($partnerGroup->count); ?></span>
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
					?>	
						<?php while ( $partnerList->have_posts() ) : $partnerList->the_post();  ?>
						<li class="o-partner">
							<a href="#">
								<figure class="o-partner__logo" style="background-image:url('<?php echo get_field('logo');?>')"></figure>
								<span></span>
							</a>
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
						<span class="o-button__title">Partner with Us</span>
					</a>
				</footer>
			</div>
		</section>
	<?php endforeach ?>
?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>