<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="o-section__tint"></div>
		<div class="u-box">
			<header class="o-section__header">
				<span class="o-section__title"><?php the_field('slogan'); ?></span>
				<p><?php the_field('mission'); ?></p>
			</header>		
		</div>
		<ul class="c-values">
			<?php if(have_rows('values') ):?>
				<?php 
					while( have_rows('values') ): the_row();
					$valueTitle = get_sub_field('value');
					$valueDescription = get_sub_field('description');
					$valueImage = get_sub_field('image');
				 ?>
				<li>
					<span class="o-subheading"><?php echo $valueTitle; ?></span>
					<figure data-thumb="<?php echo $valueImage; ?>"></figure>
				</li>
				<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>