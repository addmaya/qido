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
									<h1 class="s--clear">Omukungu Joseph Kigozi</h1>
									<span class="o-subtitle s--profile">Chairperson</span>
								</header>
								<p>Joseph is a seasoned youth Sexual Reproductive Health and Rights (SRHR) advocate, leader, change agent and a presenter of a youth empowerment show on NBS Television, one of the leading local television stations in Uganda.</p>
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
			<?php 
				$boardList = new WP_Query(array('post_type'=>'director','posts_per_page'=>-1));
				if ($boardList->have_posts()){
					$directorIndex = 0;
					$aosDelay = 0;
			?>	
			<ul class="u-clear o-grid">
				<?php while ($boardList->have_posts()):$boardList->the_post();
					if($directorIndex > 3){
						$directorIndex = 0;
					}
					switch ($directorIndex) {
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
					<li class="o-director o-grid__item" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
						<a href="#" class="js-showBioPop no-barba">
							<figure style="background-image:url('<?php the_field('photo'); ?>')"></figure>
							<span class="o-bubble s--medium"></span>
							<span class="o-bubble s--small"></span>
							<section class="o-director__info">
								<span class="o-subheading s--profile"><?php the_title(); ?></span>
								<span class="o-subtitle s--profile"><?php the_field('title'); ?></span>
							</section>
						</a>
					</li>
				<?php $directorIndex++; endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<?php } ?>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>