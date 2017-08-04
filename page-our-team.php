<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<div class="o-pop">
	<div class="u-table">
		<div class="u-cell">
			<div class="o-pop__box">
				<a href="#" class="o-pop__close">
					<span class="o-icon s--close"></span>
				</a>
				<div class="c-bubble-roof">
					<span class="o-bubble s--large"></span>
					<span class="o-bubble s--medium"></span>
					<span class="o-bubble s--small"></span>
					<span class="o-bubble s--xlarge"></span>
				</div>
				<div class="o-pop__content">
					<div class="o-bio">
						<div class="o-bio__figure">
							<figure></figure>
							<ul class="o-networks t-light">
								<li><a href="#"><span class="o-icon s--fb"></span></a></li>
								<li><a href="#"><span class="o-icon s--twitter"></span></a></li>
								<li><a href="#"><span class="o-icon s--instagram"></span></a></li>
							</ul>
						</div>
						<div class="o-bio__story">
							<section class="u-wrap">
								<header>
									<h1 class="s--clear">Faith Ainembabazi</h1>
									<span class="o-subtitle s--profile">Project Liaison Officer</span>
								</header>
								<p>Humphrey is a seasoned youth Sexual Reproductive Health and Rights (SRHR) advocate, leader, change agent and a presenter of a youth empowerment show on NBS Television, one of the leading local television stations in Uganda.</p>
								<p>By founding Reach A Hand, Uganda (RAHU), Humphrey has created a movement of young advocates through a youth led and youth serving platform of 14 core team members and 160 volunteers (growing per year) under the Peer Educators Academy who by the end of 2015, had helped to directly reach over 600,256 males and 346,125 females within schools, carried out over 5000 Focused Group Discussions in over 70 schools, reached over 800,881 youth out of school through dialogues and outreaches, and over 400,000 young people on social and online media  on SRHR, youth empowerment and related issues.</p>
								<p>Humphrey’s mission is to support  his peers  take control of their lives and present themselves in ways that inspires, impresses and spurs confidence in themselves and their peers under a platform where they have full opportunities to take part in the process of breaking barriers hindering  them from making informed choices in life regarding their SRHR.</p>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<ul class="c-team o-grid">
				<?php 
					$teamList = new WP_Query(array(
						'post_type'=>'staff',
						'posts_per_page'=>-1
						));
					if ($teamList->have_posts()){ 
						$staffIndex = 0;
						$aosDelay = 0;
				?>	
					<?php while ( $teamList->have_posts() ) : $teamList->the_post();
						if($staffIndex > 3){
							$staffIndex = 0;
						}
						switch ($staffIndex) {
							case 1:
								$aosDelay = 100;
								break;
							case 2:
								$aosDelay = 200;
								break;
							case 3:
								$aosDelay = 300;
								break;
							default:
								$aosDelay = 0;
								break;
						}
					?>
					<li data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>" class="o-grid__item">
						<a href="<?php the_permalink(); ?>" class="o-staff no-barba js-showBioPop">
							<figure style="background-image:url('<?php the_field('photo_full');?>')">
								
							</figure>
							<span class="o-bubble s--large"></span>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
							<span class="o-subheading s--profile"><?php the_title(); ?></span>
							<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
						</a>
					</li>
					<?php $staffIndex++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
			<footer class="o-section__footer">
				<a href="#" class="o-button">
					<i class="o-icon s--arrow-ltr"></i>
					<span class="o-button__title">Join the team</span>
				</a>
			</footer>
		</div>
	</section>
	<?php 
		$pageID = get_the_ID();
		$childPages = new WP_Query(array(
			'post_type'=>'page',
			'post_parent'=>138
			));
		if ($childPages->have_posts()){
			$pageIndex = 0;
			$aosDelay = 0;
	?>
	<section class="o-page__section">
		<div class="u-box">
			<ul class="o-program__group">
				<?php while ( $childPages->have_posts() ) : $childPages->the_post();
					if($pageIndex > 1){
						$pageIndex = 0;
					}
					if($pageIndex == 1){
						$aosDelay = 100;
					}
				?>
				<li class="o-program u-half s--clear" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
					<a class="o-program__link" href="<?php the_permalink(); ?>">
						<span class="o-bubble s--medium"></span>
						<span class="o-bubble s--large"></span>
						<figure class="o-program__figure" style="background-image:url('<?php the_field('cover_image');?>')"></figure>
						<section class="o-program-meta">
							<section class="o-program-excerpt__wrap">
								<span class="o-subheading"><?php the_title(); ?></span>
								<div class="o-program__excerpt">
									<span class="u-block"><?php echo substr(get_field('introduction'), 0, 200); ?> [...]</span>
									<div class="o-button">
										<span class="o-button__title">Explore</span>
										<i class="o-icon s--arrow-ltr"></i>
									</div>
								</div>
								<span class="o-progam__monogram"><?php echo substr(get_the_title(),0,1) ?></span>
							</section>
						</section>
					</a>
				</li>
				<?php $pageIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>		
			</ul>
		</div>
	</section>
	<?php } ?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>