<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header') ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="c-page-cover s--short">
	<figure class="c-page-cover__image" style="background-image:url('<?php the_field('cover_image');?>')"></figure>
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
	<div class="u-box">
		<section class="o-story s--wide">
			<header class="u-align__center">
				<h1 class="s--clear"><?php the_title(); ?></h1>
				<section class="c-event-meta">
					<ul>
						<li>
							<h4>Starts</h4>
							<span><?php
								$eventStartDate = new DateTime(get_field('start_date_time'));
								echo $eventStartDate->format('g:ia\,\ jS F Y');
							?></span>
						</li>
						<li>
							<h4>Ends</h4>
							<span><?php
								$eventEndDate = new DateTime(get_field('end_date'));
								echo $eventEndDate->format('g:ia\,\ jS F Y');
							?></span>
						</li>
						<li>
							<h4>Venue</h4>
							<span><?php the_field('venue') ?></span>
						</li>
						<li>
							<h4>Directions</h4>
							<a target="_blank" href="<?php the_field('google_map_link'); ?>" class="o-link"><i class="o-icon s--arrow-ltr"></i><span class="s--inline">View Map</span></a>
						</li>
						<li>
							<h4>On Twitter</h4>
							<a href="<?php
								$eventHashTag = get_field('hashtag');
								if(substr($eventHashTag, 0, 1) == '#'){
									$eventHashTag = substr($eventHashTag,1);
								}
								echo 'https://twitter.com/search?q='.$eventHashTag;
								
							?>" class="o-link" target="_blank"><i class="o-icon s--arrow-ltr"></i><span class="s--inline"><?php echo $eventHashTag; ?></span></a>
						</li>
					</ul>
				</section>
			</header>
			<?php 
				$posterClass = '';
				$poster = get_field('poster');
				$posterURL = '';

				if ($poster) {
					$posterURL = $poster['sizes']['large'];
					if($poster['width'] < $poster['height']){
						$posterClass = 's--portrait';
					}
					else {
						$posterClass = 's--landscape';
					}
				}
				else {
					$posterURL = get_field('cover_image');
					$posterClass = 's--landscape';
				}
			?>
			<section class="c-event__poster">
				<section class="u-wrap">
					<figure class="js-defer <?php echo $posterClass; ?>" data-image-url="<?php echo $posterURL; ?>"></figure>
				</section>
			</section>
		</section>
	</div>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/content') ); ?>
</section>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>