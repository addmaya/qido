<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/dynamic-content') ); ?>	
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>n