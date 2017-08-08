<?php $bubbleSizes = ['s--xsmall', 's--small', 's--medium', 's--large']; ?>
<li class="o-article u-half" data-aos="fade-up">
	<a class="u-wrap o-article__link" href="<?php the_permalink(); ?>">
		<section class="o-article__figure">
			<figure style="background-image:url('<?php getPostThumbnail(); ?>')">
				<div class="u-center">
					<i class="o-icon s--pen"></i>
				</div>
				<span class="o-article__time o-subtitle"><?php  getPostTime(); ?></span>
			</figure>
		</section>
		<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
		<section class="o-article__brief">
			<span class="o-subheading"><?php the_title(); ?></span>
			<section>
				<?php getPostExcerpt(136); ?>
				<span class="o-link">
					<i class="o-icon s--arrow-ltr"></i>
				</span>
			</section>
		</section>
	</a>
</li>