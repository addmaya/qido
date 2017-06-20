<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="u-box">
	<a href="<?php echo home_url();?>/programs" style="display:block; padding-top:1em"> < All Programs</a>
	<h2>Single <?php the_title(); ?></h2>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Cover Photo</h3>
				<p>Fance Title<br/>Brief introduction</p>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Program content</h3>
				<p>Text, Images, videos, impact, statistics, attachments, partners etc</p>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Footer</h3>
				<p>Share options, next page suggestions, contact info, search, newsletter signup</p>
			</section>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>