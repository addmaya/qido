<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ):?>
<section class="c-page-cover s--short">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image',195);?>')"></figure>
	<div class="u-table u-align__center">
		<div class="u-cell">
			<h1>Events Calendar</h1>
		</div>
	</div>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="u-box u-pt-l">
		<ul class="u-clear">
			<?php while ( have_posts() ) : the_post();?>
				<?php Starkers_Utilities::get_template_parts(array('parts/shared/post'));?>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>