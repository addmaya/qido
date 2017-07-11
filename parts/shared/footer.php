		<?php
			$pageTitle = get_the_title();
			$pagePermalink = get_permalink();
			$pageCoverImage = get_field('cover_image');
			$pageID = get_the_id();
		?>
		<?php if(!is_front_page()){?>
		<section class="c-page__actions">
			<div class="u-box">
				<span class="o-line s--break"></span>
				<div class="u-clear">
					<div class="u-half">
						<section class="u-wrap">
							<span class="o-subtitle">Share this Page</span>
							<ul class="o-networks t-light">
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pagePermalink; ?>"><span class="o-icon s--fb"></span></a></li>
								<li><a href="https://twitter.com/home?status=<?php echo $pagePermalink; ?>"><span class="o-icon s--twitter"></span></a></li>
								<li><a href="https://plus.google.com/share?url=<?php echo $pagePermalink; ?>"><span class="o-icon s--googleplus"></span></a></li>
								<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $pagePermalink; ?>&media=<?php echo $pageCoverImage; ?>&description=<?php echo $pageTitle; ?>"><span class="o-icon s--pinterest"></span></a></li>
								<li><a href="mailto:?&subject=<?php echo $pageTitle;?>&body=<?php echo $pagePermalink; ?>"><span class="o-icon s--mail"></span></a></li>
								<li><a target="_blank" href="whatsapp://send?text=<?php echo $pagePermalink; ?>" class="o-icon__wrap"><span class="o-icon s--whatsapp"></span></a></li>
							</ul>
						</section>
					</div>
					<?php if(!is_page('programs')){?>
					<div class="u-half">
						<section class="u-wrap">
							<span class="o-subtitle">More for you</span>
							<?php $postsList = new WP_Query(array('orderby'=>'rand', 'posts_per_page'=>6, 'post__not_in' => array($pageID))); ?>
							<?php if ( $postsList->have_posts() ) : ?>
								<ul class="o-list u-pt-s">
								<?php while ( $postsList->have_posts() ) : $postsList->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>" class="o-link">
											<div class="o-arrow">
												<i class="o-arrow__stem"></i>
												<i class="o-arrow__head"></i>
											</div>
											<span><?php the_title(); ?></span>
										</a>
									</li>
								<?php endwhile; ?>
								</ul>
 								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</section>
					</div>
					<?php } else {?>
					<div class="u-half">
						<section class="u-wrap">
							<span class="o-subtitle">Explore Our Programs</span>
							<?php $postsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1)); ?>
							<?php if ( $postsList->have_posts() ) : ?>
								<ul class="o-list u-pt-s">
								<?php while ( $postsList->have_posts() ) : $postsList->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>" class="o-link">
											<div class="o-arrow">
												<i class="o-arrow__stem"></i>
												<i class="o-arrow__head"></i>
											</div>
											<span><?php the_title(); ?></span>
										</a>
									</li>
								<?php endwhile; ?>
								</ul>
 								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</section>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>
		<?php
			$pageList = array();
			foreach (get_pages('sort_column=menu_order&sort_order=asc') as $page) {
				$pageList[] += $page->ID;
			}
			$currentPage = array_search(get_the_ID(), $pageList);
			$nextPageID = $pageList[$currentPage+1];
			if(empty($nextPageID)){
				$nextPageID = get_option('page_on_front');
			}
		?>
		<a href="<?php echo get_permalink($nextPageID); ?>" class="c-button-next">
			<span class="o-subtitle">Next</span>
			<span class="o-heading"><?php echo get_the_title($nextPageID); ?></span>
			<div class="o-arrow">
				<i class="o-arrow__stem"></i>
				<i class="o-arrow__head"></i>
			</div>
			<figure style="background-image:url('<?php echo get_field('cover_image', $nextPageID); ?>')"></figure>
		</a>
		<footer class="c-page__footer">
			<div class="u-box">
				<section class="u-clear">
					<section class="u-40p">
						<h2>Some of our Partners <span class="o-line"></span></h2>
						<ul class="c-partners">
							<?php $partnerList = new WP_Query(array('orderby'=>'rand', 'posts_per_page'=>6, 'post_type'=>'partner')); ?>
							<?php if ( $partnerList->have_posts() ) : ?>
								<ul class="o-list u-pt-s">
								<?php while ( $partnerList->have_posts() ) : $partnerList->the_post(); ?>
									<li class="u-third"><a href="<?php echo get_permalink(); ?>"><figure style="background-image:url('<?php echo get_field('logo');?>')"></figure></a></li>
								<?php endwhile; ?>
								</ul>
 								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</ul>
						<a href="#" class="o-button">
							<div class="o-arrow">
								<i class="o-arrow__stem"></i>
								<i class="o-arrow__head"></i>
							</div>
							<span class="o-button__title">Partner with Us</span>
						</a>
					</section>
					<section class="u-30p">
						<h2>Contact RAHU <span class="o-line"></span></h2>
						<ul class="o-list">
							<?php if(have_rows('telephones',20)): ?>
								<?php while(have_rows('telephones',20)): the_row();
									$telephone = get_sub_field('telephone');
									$niceTelephone = substr(chunk_split($telephone, 3, ' '), 0, -1);
								?>
								<li>
									<a href="tel:+<?php echo $telephone;?>" class="o-link">
										<div class="o-arrow">
											<i class="o-arrow__stem"></i>
											<i class="o-arrow__head"></i>
										</div>
										<span>+ <?php echo $niceTelephone; ?></span>
									</a>
								</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
						<ul class="o-list">
							<?php if(have_rows('emails',20) ): ?>
								<?php while( have_rows('emails',20) ): the_row();
									$email = get_sub_field('email');
								?>
								<li>
									<a href="mailto:<?php echo $email;?>" class="o-link">
										<div class="o-arrow">
											<i class="o-arrow__stem"></i>
											<i class="o-arrow__head"></i>
										</div>
										<span><?php echo $email; ?></span>
									</a>
								</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
						<ul class="o-list">
							<li>
								<a href="#" class="u-block">
									<p class="u-pb-m"><?php the_field('address', 20); ?></p>
								</a>
								<a href="<?php the_field('google_map_link'); ?>" class="o-link">
									<div class="o-arrow">
										<i class="o-arrow__stem"></i>
										<i class="o-arrow__head"></i>
									</div>
									<span>Locate on Map</span>
								</a>
							</li>
						</ul>
					</section>
					<section class="u-30p">
						<h2>Follow the Conversation <span class="o-line"></span></h2>
						<ul class="o-networks t-light s--medium">
							<li><a href="https://www.facebook.com/reachahand/" target="_blank"><span class="o-icon s--fb"></span></a></li>
							<li><a href="https://twitter.com/reachahand" target="_blank"><span class="o-icon s--twitter"></span></a></li>
							<li><a href="https://www.instagram.com/reach_a_hand/" target="_blank"><span class="o-icon s--instagram"></span></a></li>
							<li><a href="https://www.youtube.com/user/REACHAHANDUGANDA" target="_blank"><span class="o-icon s--youtube"></span></a></li>
							<li><a href="https://soundcloud.com/reach-a-hand" target="_blank"><span class="o-icon s--soundcloud"></span></a></li>
						</ul>
						<form action="<?php the_permalink(); ?>" class="c-form-newsletter">
							<div class="o-input">
								<input type="text" placeholder="Your E-mail"/>
							</div>
							<button class="o-button">
								<div class="o-arrow">
									<i class="o-arrow__stem"></i>
									<i class="o-arrow__head"></i>
								</div>
								<span class="o-button__title">Subscribe</span>
							</button>
						</form>
					</section>
				</section>
				<section class="c-sitemap">
					<ul>
						<li><a href="<?php echo home_url();?>">Home</a></li>
						<li><a href="<?php echo home_url();?>/story">Story</a></li>
						<li><a href="<?php echo home_url();?>/programs">Programs</a></li>
						<li><a href="<?php echo home_url();?>/team">Team</a></li>
						<li><a href="<?php echo home_url();?>/partners">Partners</a></li>
						<li><a href="<?php echo home_url();?>/events">Events</a></li>
						<li><a href="<?php echo home_url();?>/blog">Blog</a></li>
						<li><a href="<?php echo home_url();?>/contact">Contact</a></li>
					</ul>
					<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?></p>
				</section>
			</div>
		</footer>
	</div>
</div>



