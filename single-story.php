<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$postPermalink = get_permalink();
	$postCoverImage = get_field('cover_image');
	$postTitle = get_the_title();
	$postCoverImageCaption = get_field('featured_image_caption');
?>
<section class="c-page-cover s--xshort">
	<figure class="c-page-cover__image" style="background-image:url('<?php echo $postCoverImage;?>')"></figure>
</section>
<section class="c-page__content s--clear u-oh">
	<div class="c-bubble-roof">
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<div class="c-bubble-corridor">
		<span class="o-bubble s--xmedium"></span>
		<span class="o-bubble s--large"></span>
		<span class="o-bubble s--medium"></span>
		<span class="o-bubble s--small"></span>
		<span class="o-bubble s--xlarge"></span>
	</div>
	<section class="c-story">
		<header class="o-story__header">
			<div class="u-box o-story__title">
				<h1>
					<span class="u-block u-relative"><?php the_title(); ?>
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
			</div>
		</header>
		<figure class="o-story__figure">
			<div class="u-box">
				<img src="<?php echo $postCoverImage; ?>" alt="<?php echo $postTitle; ?>"/>
				<?php if ($postCoverImageCaption): ?>
					<?php echo $postCoverImageCaption; ?>
				<?php endif ?>
			</div>
		</figure>
		<section class="o-story__content">
			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/content') ); ?>
		</section>
		<?php $storyTags = get_the_tags(); if ($storyTags) {?>
		<section class="o-story__comments">
			<div class="u-box">
				<h3 class="comment-reply-title">Tagged as</h3>
				<?php foreach ($storyTags as $storyTag): ?>
					<a class="o-tag" href="<?php echo get_tag_link($storyTag->term_id); ?>"><?php  echo $storyTag->name; ?></a>
				<?php endforeach ?>	
			</div>
		</section>
		<?php } ?>
		<section class="o-story__comments">
			<div class="u-box">
				<h3 class="comment-reply-title">Your Reaction</h3>
				<?php getReactions(get_the_id()); ?>
			</div>
		</section>
		<section class="o-story__comments">
			<div class="u-box">
				<?php comments_template( '', true ); ?>
			</div>
		</section>
	</section>
</section>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>