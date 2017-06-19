<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<div class="o-slider">
	<section class="c-page-cover">
		<figure class="c-page-cover__image"></figure>
		<div class="c-page-cover__title"></div>
		<div class="o-galaxy">
			<span class="o-planet s--small"></span>
			<span class="o-planet s--med"></span>
			<span class="o-planet s--large"></span>
		</div>
		<span class="c-page__title">Page Title</span>
	</section>
</div>
<div class="o-slider">
	<section class="o-page__info">
		<h1>Fancy Title</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mollis ullamcorper ligula at suscipit. Donec sollicitudin leo eget pulvinar tincidunt. Fusce id enim et lacus porta mattis. </p>
	</section>
</div>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<span class="o-title">Upcoming Events</span>
			<span class="o-figure">Eight</span>
			<div class="u-clear">
				<div class="u-third">
					<a href="#" class="o-ticket">
						<figure class="o-ticket__cover"></figure>
						<section>
							<div class="u-wrap u-clear">
								<section class="u-half">
									<span>Sep. 10. 2016</span>
								</section>
								<section class="u-half">
									<span>King's College Buddo, Masaka Road</span>
								</section>
							</div>
						</section>
					</a>
				</div>
			</div>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>