<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="c-page-cover s--xshort">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image', 138);?>')"></figure>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="u-box">
		<section class="o-story s--wide">
			<section class="o-story__content">
				<div class="o-bio">
					<div class="o-bio__figure">
						<figure class="s--color" style="background-image:url('<?php the_field('photo_full');?>')">
							<span class="o-bubble s--large"></span>
						</figure>
						<?php Starkers_Utilities::get_template_parts(array('parts/shared/networks')); ?>
					</div>
					<div class="o-bio__story">
						<section class="u-wrap">
							<header>
								<h1 class="s--clear"><?php the_title(); ?></h1>
								<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
							</header>
							<section>
								<p><?php the_content(); ?></p>
							</section>
						</section>
					</div>
				</div>
			</section>
		</section>
	</div>
</section>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>