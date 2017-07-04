<section class="c-page-cover">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image');?>')"></figure>
	<div class="u-table">
		<div class="u-cell">
			<span class="c-page-cover__title" style="background-image:url('<?php the_field('title_animation');?>')">
				<div class="o-bubble__group">
					<span class="o-bubble s--small"></span>
					<span class="o-bubble s--medium"></span>
				</div>
			</span>
		</div>
	</div>
</section>
<section class="c-page__info">
	<div class="u-wrap">
		<h1><?php the_field('fancy_title'); ?></h1>
		<p><?php the_field('introduction'); ?></p>
	</div>
</section>
<section class="c-page__title">
	<span><?php the_title();?></span>
</section>
