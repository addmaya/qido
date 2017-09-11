<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ):
	$bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
?>
<section class="c-page-cover s--short">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image',181);?>')"></figure>
	<div class="u-table u-align__center">
		<div class="u-cell">
			<h1><?php echo single_tag_title( '', false ); ?></h1>
		</div>
	</div>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="u-box u-pt-l">
		<ul class="u-clear o-grid">
			<?php while ( have_posts() ) : the_post();?>
				<?php Starkers_Utilities::get_template_parts(array('parts/shared/post'));?>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>