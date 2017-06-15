<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="u-box">
	<h2><?php the_title(); ?></h2>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Cover Photo</h3>
				<p>Fancy Title<br/>Brief introduction</p>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content s--rahu">
				<h3>Logos of all programs</h3>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Program 1</h3>
				<p>Logo, Title, Introduction</p>
				<a href="<?php echo home_url();?>/programs/program">Learn more</a>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Program 2</h3>
				<p>Logo, Title, Introduction</p>
				<a href="<?php echo home_url();?>/programs/program">Learn more</a>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Program 3</h3>
				<p>Logo, Title, Introduction</p>
				<a href="<?php echo home_url();?>/programs/program">Learn more</a>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content">
				<h3>Program ..... n</h3>
				<p>Logo, Title, Introduction</p>
				<a href="<?php echo home_url();?>/programs/program">Learn more</a>
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
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>