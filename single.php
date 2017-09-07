<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$postPermalink = get_permalink();
	$postCoverImage = get_field('cover_image');
	$postTitle = get_the_title();
?>
<section class="c-page-cover s--short">
	<figure class="c-page-cover__image" style="background-image:url('<?php echo $postCoverImage;?>')"></figure>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="u-box">
		<section class="o-story">
			<h1 class="s--clear o-story__title">
				<span class="u-block"><?php the_title(); ?>
					<section>
						<span class="o-subtitle">Share This</span>
						<ul class="o-networks t-light">
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postPermalink; ?>"><span class="o-icon s--facebook"></span></a></li>
							<li><a href="https://twitter.com/home?status=<?php echo $postPermalink; ?>"><span class="o-icon s--twitter"></span></a></li>
							<li><a href="https://plus.google.com/share?url=<?php echo $postPermalink; ?>"><span class="o-icon s--google_plus"></span></a></li>
							<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $postPermalink; ?>&media=<?php echo $postCoverImage; ?>&description=<?php echo $postTitle; ?>"><span class="o-icon s--pinterest"></span></a></li>
							<li><a href="mailto:?&subject=<?php echo $postTitle;?>&body=<?php echo $postPermalink; ?>"><span class="o-icon s--mail"></span></a></li>
							<li><a target="_blank" href="whatsapp://send?text=<?php echo $postPermalink; ?>" class="o-icon__wrap"><span class="o-icon s--whatsapp"></span></a></li>
						</ul>
					</section>
				</span>
			</h1>
			<time class="o-subtitle" datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>
			<section class="o-story__content">
				<p><?php the_content(); ?></p>
			</section>
			<section class="o-story__comments">
				<?php getReactions(get_the_id()); ?>
			</section>
			<section class="o-story__comments">
				<?php comments_template( '', true ); ?>
			</section>
		</section>
	</div>
</section>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>