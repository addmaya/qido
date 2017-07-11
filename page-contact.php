<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box s--small u-bkg__lightBlue">
			<section class="u-wrap">
				<section class="u-clear">
					<section class="u-third" data-aos="fade-up">
						<h2>Address</h2>
						<a href="<?php the_field('google_map_link'); ?>" class="u-block">
							<p class="u-pb-m"><?php the_field('address'); ?></p>
							<div class="o-button">
								<div class="o-arrow">
									<i class="o-arrow__stem"></i>
									<i class="o-arrow__head"></i>
								</div>
								<span class="o-button__title">Locate on Map</span>
							</div>
						</a>
					</section>
					<section class="u-third" data-aos="fade-up" data-aos-delay="100">
						<h2>Phone</h2>
						<ul class="o-list">
							<?php if( have_rows('telephones') ): ?>
								<?php while( have_rows('telephones') ): the_row();
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
					</section>
					<section class="u-third" data-aos="fade-up" data-aos-delay="200">
						<h2>Mail</h2>
						<ul class="o-list">
							<?php if( have_rows('emails') ): ?>
								<?php while( have_rows('emails') ): the_row();
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
					</section>
				</section>
				<span class="o-line s--break"></span>
				<section>
					<div class="u-clear">
						<section class="u-half" data-aos="fade-up">
							<h2>Follow the conversation</h2>
							<ul class="o-networks t-light s--medium">
								<li><a href="https://www.facebook.com/reachahand/" target="_blank"><span class="o-icon s--fb"></span></a></li>
								<li><a href="https://twitter.com/reachahand" target="_blank"><span class="o-icon s--twitter"></span></a></li>
								<li><a href="https://www.instagram.com/reach_a_hand/" target="_blank"><span class="o-icon s--instagram"></span></a></li>
								<li><a href="https://www.youtube.com/user/REACHAHANDUGANDA" target="_blank"><span class="o-icon s--youtube"></span></a></li>
								<li><a href="https://soundcloud.com/reach-a-hand" target="_blank"><span class="o-icon s--soundcloud"></span></a></li>
							</ul>
						</section>
						<section class="u-half" data-aos="fade-up" data-aos-delay="100">
							<h2>Get Updates</h2>
							<ul class="o-networks t-light s--medium">
								<li><a href="#"><span class="o-icon s--rss"></span></a></li>
								<li><a href="#"><span class="o-icon s--mail"></span></a></li>
							</ul>
						</section>
					</div>
				</section>
				<span class="o-line s--break"></span>
				<section data-aos="fade-up">
					<div class="o-tabs">
						<div class="o-tabs__nav">
							<h2>
								<a href="#">Write to Us</a>
							</h2>
						</div>
						<div class="o-tabs__content">
							<section>
								<p>Need to asks us anything? Send us a message below, we'll get back to you within 24 hours.</p>
								<form action="<?php echo get_admin_url();?>admin-post.php" method="post" class="u-clear u-pt-m">
									<div class="u-hide">
										<input type="hidden" name="action" value="submitContact"/>
										<?php wp_nonce_field('form_nonce_key','form_nonce');?>
									</div>
									<div class="u-third">
										<div class="o-input">
											<input type="text" placeholder="Your Name" name="userName">
											<span></span>
										</div>
									</div>
									<div class="u-third">
										<div class="o-input">
											<input type="email" placeholder="E-mail" name="userEmail">
											<span></span>
										</div>
									</div>
									<div class="u-third">
										<div class="o-input">
											<input type="number" placeholder="Telephone" name="userTelephone">
											<span></span>
										</div>
									</div>
									<div class="u-left u-full">
										<div class="o-input">
											<textarea cols="30" rows="10" placeholder="Message" name="userMessage"></textarea>
											<span></span>
										</div>
									</div>
									<button class="o-button">
										<div class="o-arrow">
											<i class="o-arrow__stem"></i>
											<i class="o-arrow__head"></i>
										</div>
										<span class="o-button__title">Send Message</span>
									</button>
								</form>
							</section>
						</div>
					</div>
				</section>
			</section>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>