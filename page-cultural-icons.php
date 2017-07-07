<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<?php 
				$boardList = new WP_Query(array('post_type'=>'cultural','posts_per_page'=>-1));
				if ($boardList->have_posts()){
			?>	
			<ul class="u-clear">
				<?php while ($boardList->have_posts()):$boardList->the_post();  ?>
					<li class="o-director">
						<a href="#" >
							<figure class="u-greyscale" style="background-image:url('<?php the_field('photo'); ?>')"></figure>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
						</a>
						<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
						<span class="o-subheading s--profile"><?php the_title(); ?></span>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php } ?>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>