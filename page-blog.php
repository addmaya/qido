<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<?php $featuredPosts = new WP_Query(array('post_type'=>'story', 'posts_per_page'=>1)); ?>
<?php if ( $featuredPosts->have_posts() ) : ?>
	<?php while ( $featuredPosts->have_posts() ) : $featuredPosts->the_post(); ?>
	<section class="c-page-cover">
		<figure class="c-page-cover__image" style="background-image:url('<?php echo getPostThumbnail(); ?>')"></figure>
		<div class="u-table">
			<div class="u-cell u-relative">
				<span class="c-page-cover__title" style="background-image:url('<?php the_field('title_animation', 135);?>')"></span>
				<span class="o-bubble s--small"></span>
				<span class="o-bubble s--medium"></span>
			</div>
		</div>
	</section>
	<section class="c-page__info">
		<a class="u-wrap" href="<?php the_permalink(); ?>">
			<h1>
				<?php the_title(); ?>
				<span class="o-subtitle"><?php echo getPostTime(); ?></span>
			</h1>
			<span class="u-block"><?php echo getPostExcerpt(186); ?></span>
			<div class="o-link">
				<i class="o-icon s--arrow-ltr"></i>
				<span>Read On</span>
			</div>
		</a>
	</section>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
<section class="c-page__title">
	<span><?php the_title(); ?></span>
</section>
<section>
	<section class="o-page__section">
		<div class="u-box">
			<!-- <section class="a-right">
				<div class="o-select">
					<select name="" id="">
						<option value="">All Topics</option>
						<option value="">Camp</option>
						<option value="">HIV AIDS</option>
					</select>
					<span class="o-select__arrow">
						<i class="o-arrow__head"></i>
					</span>
				</div>
				<div class="o-select">
					<select name="" id="">
						<option value="">All Years</option>
						<option value="">2014</option>
						<option value="">2013</option>
						<option value="">2012</option>
						<option value="">2011</option>
						<option value="">2010</option>
					</select>
					<span class="o-select__arrow">
						<i class="o-arrow__head"></i>
					</span>
				</div>
			</section> -->
			<section class="u-wrap u-pdb-clear is-morphus">
				<ul class="u-clear u-relative" id="storiesGrid">
					<?php $blogPosts = new WP_Query(array('post_type'=>'story', 'posts_per_page'=>9, 'offset'=>-1)); ?>
					<?php if ($blogPosts->have_posts() ) : ?>
						<?php 
							$postIndex = 0;
							$postClass = '';
							$bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
							$aosDelay = 0;
							
							while ( $blogPosts->have_posts() ) : $blogPosts->the_post(); 
							
							if ($postIndex > 2) {
								$postIndex = 0;
							}

							if ($postIndex == 1){
								$aosDelay = 200;
							}
							else {
								$aosDelay = 0;
							}

							if($postIndex == 2){
								$postClass = 'u-full';
							} else {
								$postClass = 'u-half';
							}
							
							$postPermalink = get_permalink();
						?>
							<li id="<?php echo $postIndex; ?>" class="o-article <?php echo $postClass; ?>" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
								<a class="u-wrap o-article__link" href="<?php the_permalink(); ?>">
									<section class="o-article__figure">
										<figure class="js-defer" data-image-url="<?php echo getPostThumbnail(); ?>">
											<div class="u-center">
												<i class="o-icon s--pen"></i>
											</div>
											<span class="o-article__time o-subtitle"><?php  echo getPostTime(); ?></span>
										</figure>
									</section>
									<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
									<section class="o-article__brief">
										<span class="o-subheading"><?php the_title(); ?></span>
										<section>
											<?php echo getPostExcerpt(150); ?>
											<span class="o-link">
												<i class="o-icon s--arrow-ltr"></i>
											</span>
										</section>
									</section>
								</a>
							</li>
						<?php $postIndex ++; endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</ul>
				<div class="a-center u-pt-l">
					<a href="#" class="o-button" class="js-moreStories" id="morestories">
						<i class="o-icon s--refresh"></i>
						<span class="o-button__title">More Stories</span>
					</a>
				</div>
			</section>
		</div>
	</section>
	<section class="o-page__section">
		<div class="o-section__tint s--full"></div>
		<div class="u-box">
			<header class="a-center">
				<span class="o-section__title">Find by topic</span>
			</header>
			<section>
				<?php $tagList = get_terms('post_tag',array('hide_empty'=>true)); if ($tagList) {?>
				<?php foreach ($tagList as $postTag): 
					if($postTag->count > 1){
				?>
					<a href="<?php echo get_tag_link($postTag->term_id); ?>" class="o-tag"><?php  echo $postTag->name; ?> <span><?php  echo $postTag->count; ?></span></a>
				<?php } endforeach ?>
				<?php } ?>
			</section>
		</div>
	</section>
	<section class="o-page-section">
		<div class="u-box">
			<div class="o-box c-opportunities" data-aos="fade-up">
				<div class="u-table">
					<div class="u-cell" class="o-button">
						<p>Let's work together.</p>
						<a class="o-button" href="<?php echo home_url(); ?>/category/opportunities" >
							<i class="o-icon s--arrow-ltr"></i>
							<span class="o-button__title">Find Opportunities</span>
						</a>
						<a class="o-button js-showPartnerForm no-barba">
							<i class="o-icon s--arrow-ltr"></i>
							<span class="o-button__title">Partner with us</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>