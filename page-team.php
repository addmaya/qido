<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="u-box">
	<h2><?php the_title(); ?></h2>
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
				<h3>Grid of all Staff</h3>
				<p>For each: Photo, Name, Title, <span class="s--rahu">Bio, Social Handles.</span> <a href="<?php echo home_url(); ?>/staff/staff">Read Bio</a></p>
				<a href="">Join Team</a>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content s--rahu">
				<h3>Carousel of all Board Members</h3>
				<p>Introductory text</p>
				<p>For each: Photo, Name, Title, Bio, Social Handles. <a href="<?php echo home_url(); ?>/director/director">Read Bio</a></p>
			</section>
		</div>
	</div>
	<div class="o-section u-table">
		<div class="u-cell">
			<section class="o-section__content s--rahu">
				<h3>Grid of all Cultural Icons</h3>
				<p>Introductory text</p>
				<p>For each: Photo, Name, Title, Bio, Social Handles</p>
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