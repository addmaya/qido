<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<section class="c-page-cover">
	<figure class="c-page-cover__image" style="background-image:url('<?php echo $postCoverImage;?>')"></figure>
	<div class="u-table">
		<div class="u-cell">
			<h1 style="padding:3em 0 5em">404 / page not found</h1>
		</div>
	</div>
	<h1 style="padding:3em 0 5em">404 / page not found</h1>
</section>

<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>