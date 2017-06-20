<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<header>
				<span class="o-title">Blog Posts</span>
				<div class="o-select">
					<select name="" id="">
						<option value="">All Topics</option>
						<option value="">Camp</option>
						<option value="">HIV AIDS</option>
					</select>
				</div>
				<div class="o-select">
					<select name="" id="">
						<option value="">All Years</option>
						<option value="">Camp</option>
						<option value="">HIV AIDS</option>
					</select>
				</div>
			</header>
			<section class="o-articles">
				<ul>
					<li class="o-article">
						<span class="o-bubble"></span>
						<figure>
							<span class="o-icon"></span>
							<span>5 days Ago</span>
						</figure>
						<a>How we rocked share 101 for the annual festival</a>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever. <span class="o-arrow"></span></p>
					</li>
				</ul>
				<a href="#" class="o-button">
					<span class="o-arrow"></span>
					<span class="o-button__title">Load more posts</span>
				</a>
			</section>
		</div>
	</section>
	<section class="o-page__section">
		<div class="u-box">
			<span>Sauti Plus Corner</span>
			<section>
				<ul>
					<li class="u-third">
						<figure>
							<span>5 days aog</span>
						</figure>
						<a>What we learned for this year's IGD Conference. <span class="o-arrow"></span></a>
					</li>
				</ul>
			</section>
			<a href="#" class="o-button">
				<span class="o-arrow"></span>
				<span class="o-button__title">Visit Sauti Plus</span>
			</a>
		</div>
	</section>
	<section class="o-page__section">
		<div class="u-box">
			<span>Find by Topic</span>
			<section>
				<a href="#"><span>Love</span><span>23</span></a>
			</section>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>