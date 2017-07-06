<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<?php $featuredPosts = new WP_Query(array('posts_per_page'=>1)); ?>
<?php if ( $featuredPosts->have_posts() ) : ?>
	<?php while ( $featuredPosts->have_posts() ) : $featuredPosts->the_post(); ?>
	<section class="c-page-cover">
		<figure class="c-page-cover__image" style="background-image:url('<?php getPostThumbnail(); ?>')"></figure>
		<div class="u-table">
			<div class="u-cell u-relative">
				<span class="c-page-cover__title" style="background-image:url('<?php the_field('title_animation', 135);?>')"></span>
				<span class="o-bubble s--small"></span>
				<span class="o-bubble s--medium"></span>
			</div>
		</div>
	</section>
	<section class="c-page__info">
		<div class="u-wrap">
			<h1><?php the_title(); ?>
				<span class="o-subtitle"><?php getPostTime(); ?></span>
			</h1>
			<p><?php getPostExcerpt(186); ?></p>
			<a href="<?php the_permalink(); ?>" class="o-link">
				<div class="o-arrow">
					<i class="o-arrow__stem"></i>
					<i class="o-arrow__head"></i>
				</div>
				<span>Read On</span>
			</a>
		</div>
	</section>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
<section class="c-page__title">
	<span><?php the_title(); ?></span>
</section>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<section class="a-right">
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
			</section>
			<section class="u-wrap u-pdb-clear">
				<ul class="u-clear">
					<?php $blogPosts = new WP_Query(array('posts_per_page'=>6)); ?>
					<?php if ($blogPosts->have_posts() ) : ?>
						<?php 
							$postIndex = 0;
							$postClass = '';
							$bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large'];
							
							while ( $blogPosts->have_posts() ) : $blogPosts->the_post(); 
							
							if ($postIndex > 2) {
								$postIndex = 0;
							}

							if($postIndex == 2){
								$postClass = 'u-full';
							} else {
								$postClass = 'u-half';
							}
							
							$postPermalink = get_permalink();
						?>
							<li id="<?php echo $postIndex; ?>" class="o-article <?php echo $postClass; ?>">
								<section class="u-wrap">
									<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
									<a href="" class="u-block">
										<figure class="o-article__figure" style="background-image:url('<?php getPostThumbnail(); ?>')">
											<div class="u-center">
												<i class="o-icon s--pen"></i>
											</div>
											<span class="o-article__time o-subtitle"><?php  getPostTime(); ?></span>
										</figure>
									</a>
									<section class="o-article__brief">
										<a href="<?php echo $postPermalink; ?>" class="o-subheading"><?php the_title(); ?></a>
										<p><a href="<?php echo $postPermalink; ?>"><?php getPostExcerpt(136); ?>
											<span class="o-link">
												<i class="o-arrow">
													<i class="o-arrow__stem"></i>
													<i class="o-arrow__head"></i>
												</i>
											</span>
										</a></p>
									</section>
								</section>
							</li>
						<?php $postIndex ++; endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</ul>
				<div class="a-center u-pt-l">
					<span class="o-subtitle u-pb-m">8/125</span>
					<a href="#" class="o-button">
						<div class="o-arrow">
							<i class="o-arrow__stem"></i>
							<i class="o-arrow__head"></i>
						</div>
						<span class="o-button__title">Load More Stories</span>
					</a>
				</div>
			</section>
		</div>
	</section>
	<section class="o-page__section">
		<div class="o-section__tint"></div>
		<div class="u-box">
			<header class="a-center">
				<span class="o-section__title">Sauti Plus Corner</span>
			</header>
			<section>
				<ul class="u-clear">
					<li class="o-article u-third">
						<section class="u-wrap">
							<span class="o-bubble s--large"></span>
							<a href="#" class="u-block">
								<figure class="o-article__figure">
									
								</figure>
							</a>
							<a class="o-subheading" href="#">What we learned for this year's IGD Conference. <i class="o-arrow"></i></a>
							<span class="o-subtitle">5 days Ago</span>
						</section>
					</li>
					<li class="o-article u-third">
						<section class="u-wrap">
							<span class="o-bubble s--medium"></span>
							<a href="#" class="u-block">
								<figure class="o-article__figure"></figure>
							</a>
							<a class="o-subheading" href="#">What we learned for this year's IGD Conference. <i class="o-arrow"></i></a>
							<span class="o-subtitle">5 days Ago</span>
						</section>
					</li>
					<li class="o-article u-third">
						<section class="u-wrap">
							<span class="o-bubble s--small"></span>
							<a href="#" class="u-block">
								<figure class="o-article__figure"></figure>
							</a>
							<a class="o-subheading" href="#">What we learned for this year's IGD Conference. <i class="o-arrow"></i></a>
							<span class="o-subtitle">5 days Ago</span>
						</section>
					</li>
				</ul>
			</section>
			<footer class="a-center u-pt-m">
				<a href="#" class="o-button">
					<div class="o-arrow">
						<i class="o-arrow__stem"></i>
						<i class="o-arrow__head"></i>
					</div>
					<span class="o-button__title">Visit Sauti Plus</span>
				</a>
			</footer>
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
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>