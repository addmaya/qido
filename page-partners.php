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
				<h3>Corporate Partners</h3>
				<p>Introductory Text</p>
				<p>Grid of all partners. For each partner: logo, website <a href="<?php echo home_url(); ?>/partner/partner">Partner details</a></p>
				<br/>
				<a href="">Become a Corporate Partner</a>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content s--rahu">
				<h3>Strategic Partners</h3>
				<p>Introductory Text</p>
				<p>Grid of all partners. For each partner: logo, website <a href="<?php echo home_url(); ?>/partner/partner">Partner details</a></p>
				<br/>
				<a href="">Become a Strategic Partner</a>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content s--rahu">
				<h3>Implementing Partners</h3>
				<p>Introductory Text</p>
				<p>Grid of all partners. For each partner: logo, website <a href="<?php echo home_url(); ?>/partner/partner">Partner details</a></p>
				<br/>
				<a href="">Become an Implementing Partner</a>
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