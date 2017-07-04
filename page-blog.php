<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header'));?>
<?php $featuredPosts = new WP_Query(array('posts_per_page'=>1)); ?>
<?php if ( $featuredPosts->have_posts() ) : ?>
	<?php while ( $featuredPosts->have_posts() ) : $featuredPosts->the_post(); ?>
	<section class="c-page-cover">
		<figure class="c-page-cover__image" style="background-image:url('<?php getPostThumbnail(); ?>')"></figure>
		<div class="u-table">
			<div class="u-cell u-relative">
				<span class="c-page-cover__title"></span>
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
			<p><?php the_excerpt(); ?></p>
			<a href="#" class="o-link">
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
					<li class="o-article u-half">
						<section class="u-wrap">
							<span class="o-bubble s--large"></span>
							<a href="" class="u-block">
								<figure class="o-article__figure">
									<div class="u-center">
										<i class="o-icon"></i>
									</div>
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<section class="o-article__brief">
								<a href="#" class="o-subheading">How we rocked share 101 for the annual festival</a>
								<p><a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever.
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
					<li class="o-article u-half">
						<section class="u-wrap">
							<span class="o-bubble s--medium"></span>
							<a href="" class="u-block">
								<figure class="o-article__figure">
									<div class="u-center">
										<i class="o-icon"></i>
									</div>
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<section class="o-article__brief">
								<a class="o-subheading">10 things you need for the camp this year.</a>
								<p><a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever.
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
					<li class="o-article u-full">
						<section class="u-wrap">
							<span class="o-bubble s--small"></span>
							<a href="" class="u-block">
								<figure class="o-article__figure">
									<div class="u-center">
										<i class="o-icon"></i>
									</div>
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<section class="o-article__brief">
								<a href="#" class="o-subheading">How we rocked share 101 for the annual festival</a>
								<p><a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever.
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
					<li class="o-article u-half">
						<section class="u-wrap">
							<span class="o-bubble s--large"></span>
							<a href="" class="u-block">
								<figure class="o-article__figure">
									<div class="u-center">
										<i class="o-icon"></i>
									</div>
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<section class="o-article__brief">
								<a href="#" class="o-subheading">How we rocked share 101 for the annual festival</a>
								<p><a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever.
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
					<li class="o-article u-half">
						<section class="u-wrap">
							<span class="o-bubble s--xsmall"></span>
							<a href="" class="u-block">
								<figure class="o-article__figure">
									<div class="u-center">
										<i class="o-icon"></i>
									</div>
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<section class="o-article__brief">
								<a class="o-subheading">10 things you need for the camp this year.</a>
								<p><a href="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever.
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
				</ul>
				<div class="a-center u-pt-l">
					<span class="o-subtitle u-pb-m">8/125</span>
					<a href="#" class="o-button">
						<div class="o-arrow">
							<i class="o-arrow__stem"></i>
							<i class="o-arrow__head"></i>
						</div>
						<span class="o-button__title">Show me More</span>
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
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<a class="o-subheading" href="#">What we learned for this year's IGD Conference. <i class="o-arrow"></i></a>
						</section>
					</li>
					<li class="o-article u-third">
						<section class="u-wrap">
							<span class="o-bubble s--medium"></span>
							<a href="#" class="u-block">
								<figure class="o-article__figure">
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<a class="o-subheading" href="#">What we learned for this year's IGD Conference. <i class="o-arrow"></i></a>
						</section>
					</li>
					<li class="o-article u-third">
						<section class="u-wrap">
							<span class="o-bubble s--small"></span>
							<a href="#" class="u-block">
								<figure class="o-article__figure">
									<span class="o-article__time o-subtitle">5 days Ago</span>
								</figure>
							</a>
							<a class="o-subheading" href="#">What we learned for this year's IGD Conference. <i class="o-arrow"></i></a>
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
				<a href="#" class="o-tag">Love <span>1</span></a>
				<a href="#" class="o-tag">Sex <span>12</span></a>
				<a href="#" class="o-tag">Relationships <span>45</span></a>
				<a href="#" class="o-tag">money <span>67</span></a>
				<a href="#" class="o-tag">events <span>900</span></a>
				<a href="#" class="o-tag">mtv <span>23</span></a>
				<a href="#" class="o-tag">shuga <span>80</span></a>
				<a href="#" class="o-tag">pregnancy <span>83</span></a>
				<a href="#" class="o-tag">camp <span>55</span></a>
				<a href="#" class="o-tag">academy <span>2</span></a>
				<a href="#" class="o-tag">health <span>4</span></a>
				<a href="#" class="o-tag">pregnancy <span>78</span></a>
				<a href="#" class="o-tag">SRHS <span>100</span></a>
				<a href="#" class="o-tag">condoms <span>144</span></a>
				<a href="#" class="o-tag">girls <span>19</span></a>
				<a href="#" class="o-tag">boys <span>4</span></a>
			</section>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>