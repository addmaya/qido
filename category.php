<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ):?>
<section class="c-page-cover s--short">
	<figure class="c-page-cover__image js-defer" data-image-url="<?php echo get_field('cover_image',168); ?>"></figure>
	<div class="u-table u-align__center">
		<div class="u-cell">
			<h1><?php echo single_cat_title( '', false ); ?></h1>
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
		<div class="o-pagination u-align__center u-pt-l">
		    <?php
		    global $wp_query;
		    
		    $big = 999999999;
		    
		    echo paginate_links( array(
		        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		        'format' => '?paged=%#%',
		        'current' => max( 1, get_query_var('paged') ),
		        'total' => $wp_query->max_num_pages
		    ) );
		    ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>