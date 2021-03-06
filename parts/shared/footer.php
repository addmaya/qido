		<?php
			$pageTitle = get_the_title();
			$pagePermalink = get_permalink();
			$pageCoverImage = get_field('cover_image');
			$pageID = get_the_id();
			$postType = get_post_type();
			$postTypeObject = get_post_type_object($postType);
			$postTypeTitle = $postTypeObject->labels->singular_name;
		?>
		<?php if(!is_front_page() && !is_404() && !is_category() && !is_archive()){?>
		<section class="c-page__actions" data-aos="fade-up">
			<div class="u-box">
				<span class="o-line s--break"></span>
				<div class="u-clear">
					<div class="u-half">
						<section class="u-wrap">
							<span class="o-subtitle">Share this <?php echo $postTypeTitle; ?></span>
							<ul class="o-networks t-light">
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pagePermalink; ?>"><span class="o-icon s--facebook"></span></a></li>
								<li><a href="https://twitter.com/home?status=<?php echo $pagePermalink; ?>"><span class="o-icon s--twitter"></span></a></li>
								<li><a href="https://plus.google.com/share?url=<?php echo $pagePermalink; ?>"><span class="o-icon s--google_plus"></span></a></li>
								<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $pagePermalink; ?>&media=<?php echo $pageCoverImage; ?>&description=<?php echo $pageTitle; ?>"><span class="o-icon s--pinterest"></span></a></li>
								<li><a href="mailto:?&subject=<?php echo $pageTitle;?>&body=<?php echo $pagePermalink; ?>"><span class="o-icon s--mail"></span></a></li>
								<li><a target="_blank" href="whatsapp://send?text=<?php echo $pagePermalink; ?>" class="o-icon__wrap"><span class="o-icon s--whatsapp"></span></a></li>
							</ul>
						</section>
					</div>
					<?php if( ($postType != 'program') && ($postType != 'event') ){?>
						<div class="u-half">
							<section class="u-wrap">
								<span class="o-subtitle">More Stories</span>
								<?php $postsList = new WP_Query(array('post_type'=>'story', 'orderby'=>'rand', 'posts_per_page'=>4, 'post__not_in' => array($pageID))); ?>
								<?php if ( $postsList->have_posts() ) : ?>
									<ul class="o-list u-pt-s">
									<?php while ( $postsList->have_posts() ) : $postsList->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>" class="o-link">
												<i class="o-icon s--arrow-ltr"></i>
												<span class="o-link__title"><?php the_title(); ?></span>
											</a>
										</li>
									<?php endwhile; ?>
									</ul>
	 								<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</section>
						</div>
					<?php } ?>

					<?php if($postType == 'program'){?>
						<div class="u-half">
							<section class="u-wrap">
								<span class="o-subtitle">More Programs</span>
								<?php $postsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>4, 'post__not_in'=>array(get_the_id()))); ?>
								<?php if ( $postsList->have_posts() ) : ?>
									<ul class="o-list u-pt-s">
									<?php while ( $postsList->have_posts() ) : $postsList->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>" class="o-link">
												<i class="o-icon s--arrow-ltr"></i>
												<span class="o-link__title"><?php the_title(); ?></span>
											</a>
										</li>
									<?php endwhile; ?>
									</ul>
	 								<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</section>
						</div>
					<?php } ?>

					<?php if($postType == 'event'){?>
						<div class="u-half">
							<section class="u-wrap">
								<span class="o-subtitle">More Events</span>
								<?php $postsList = new WP_Query(array('posts_per_page'=>5, 'category_name' => 'events')); ?>
								<?php if ( $postsList->have_posts() ) : ?>
									<ul class="o-list u-pt-s">
									<?php while ( $postsList->have_posts() ) : $postsList->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>" class="o-link">
												<i class="o-icon s--arrow-ltr"></i>
												<span class="o-link__title"><?php the_title(); ?></span>
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
		<?php if (!is_404() && !is_tag() && !is_category() && !is_archive()): ?>
			<?php if (!is_single()) {?>
				<a href="<?php echo get_permalink($nextPageID); ?>" class="c-button-next">
					<span class="o-subtitle">Next</span>
					<span class="o-heading"><?php echo get_the_title($nextPageID); ?></span>
					<i class="o-icon s--arrow-ltr"></i>
					<figure style="background-image:url('<?php echo get_field('cover_image', $nextPageID); ?>')"></figure>
				</a>
			<?php } else {
				$nextPost = get_previous_post();
				$postCoverImageURL = get_field('cover_image');
				$nextPostImage = '';
				$nextPostLabel = '';
				
				switch ($postType) {
					case 'program':
						$nextPostImage = get_field('cover_image', $nextPost->ID);
						break;
					case 'staff':
						$nextPostImage = get_field('cover_image', 181);
						break;
					case 'cultural':
						$nextPostImage = get_field('cover_image', 766);
						break;
					case 'director':
						$nextPostImage = get_field('cover_image', 764);
						break;
					case 'partner':
						$nextPostImage = get_field('cover_image', 52);
						break;
					case 'event':
						$nextPostImage = get_field('cover_image', $nextPost->ID);
						break;
					default:
						$nextPostImage = $postCoverImageURL;
						break;
				}
			?>	
				<?php if($nextPost){?>
				<a href="<?php echo get_permalink($nextPost->ID); ?>" class="c-button-next">
					<span class="o-subtitle">Next <?php echo $postTypeTitle; ?></span>
					<span class="o-heading"><?php echo get_the_title($nextPost->ID); ?></span>
					<i class="o-icon s--arrow-ltr"></i>
					<figure style="background-image:url('<?php echo $nextPostImage; ?>')"></figure>
				</a>
				<?php } ?>
			<?php } ?>
		<?php endif ?>

		<footer class="c-page__footer">
			<div class="u-box">
				<section class="u-clear">
					<section class="u-fourth">
						<h2>Some of our Partners <span class="o-line"></span></h2>
						<ul class="c-partners">
							<?php $partnerList = new WP_Query(array('orderby'=>'rand', 'posts_per_page'=>6, 'post_type'=>'partner', 'meta_query'=> array(array('key'=>'logo', 'value'=>'', 'compare'=> '!=')))); ?>
							<?php if ( $partnerList->have_posts() ) : ?>
								<?php while ( $partnerList->have_posts() ) : $partnerList->the_post(); ?>
									<li class="u-third">
										<a href="<?php echo get_permalink(); ?>">
											<figure style="background-image:url('<?php echo get_field('logo');?>')"></figure>
										</a>
									</li>
								<?php endwhile; wp_reset_postdata(); ?>
							<?php endif; ?>
						</ul>
						<a href="<?php echo home_url(); ?>/partners" class="o-button js-showPartnerForm no-barba">
							<i class="o-icon s--arrow-ltr"></i>
							<span class="o-button__title">Partner with Us</span>
						</a>
					</section>
					<section class="u-fourth">
						<h2>Our programs <span class="o-line"></span></h2>
						<?php $programsList = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>-1)); ?>
						<?php if ( $programsList->have_posts() ) : ?>
							<ul class="c-programList">
							<?php while ( $programsList->have_posts() ) : $programsList->the_post(); ?>
								<li>
									<a href="<?php the_permalink(); ?>" class="o-link">
										<i class="o-icon s--arrow-ltr"></i>
										<span class="o-link__title"><?php the_title(); ?></span>
									</a>
								</li>
							<?php endwhile; wp_reset_postdata(); ?>
							</ul>
						<?php endif; ?>
					</section>
					<section class="u-fourth">
						<h2>Contact RAHU <span class="o-line"></span></h2>
						<ul class="o-list">
							<?php if(have_rows('telephones',20)): ?>
								<?php while(have_rows('telephones',20)): the_row();
									$telephone = get_sub_field('telephone');
									$niceTelephone = substr(chunk_split($telephone, 3, ' '), 0, -1);
								?>
								<li>
									<a href="tel:+<?php echo $telephone;?>" class="o-link">
										<i class="o-icon s--arrow-ltr"></i>
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
										<i class="o-icon s--arrow-ltr"></i>
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
								<a target="_blank" href="<?php the_field('google_map_link',20); ?>" class="o-link">
									<i class="o-icon s--arrow-ltr"></i>
									<span>Locate on Map</span>
								</a>
							</li>
						</ul>
					</section>
					<section class="u-fourth">
						<h2>Follow Reach A Hand <span class="o-line"></span></h2>
						<ul class="o-networks t-light s--medium">
							<li><a href="https://www.facebook.com/reachahand/" target="_blank"><span class="o-icon s--facebook"></span></a></li>
							<li><a href="https://twitter.com/reachahand" target="_blank"><span class="o-icon s--twitter"></span></a></li>
							<li><a href="https://www.instagram.com/reach_a_hand/" target="_blank"><span class="o-icon s--instagram"></span></a></li>
							<li><a href="https://www.youtube.com/user/REACHAHANDUGANDA" target="_blank"><span class="o-icon s--youtube"></span></a></li>
							<li><a href="https://soundcloud.com/reach-a-hand" target="_blank"><span class="o-icon s--soundcloud"></span></a></li>
						</ul>
						<h2>Subscribe for Updates <span class="o-line"></span></h2>
						<form action="https://reachahand.us9.list-manage.com/subscribe/post?u=dcafd1c1cc18e0435b20dd58f&amp;id=9f446f2cad" method="post" id="newsletter" name="mc-embedded-subscribe-form" class="c-form-newsletter" target="_blank" novalidate>
							<div class="o-input">
								<input type="email" placeholder="Your E-mail" name="EMAIL" class="required">
							</div>
							<button class="o-button">
								<span class="o-button__title">Get In</span>
								<i class="o-icon s--arrow-ltr"></i>
							</button>
						</form>
					</section>
				</section>
				<section class="c-sitemap">
					<ul>
						<li><a href="<?php echo home_url();?>">Home</a></li>
						<li><a href="<?php echo home_url();?>/about">About</a></li>
						<li><a href="<?php echo home_url();?>/impact">Impact</a></li>
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



