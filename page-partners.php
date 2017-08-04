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
							<figure class="s--mtv"></figure>
							<ul class="o-networks t-light">
								<li><a href="#"><span class="o-icon s--fb"></span></a></li>
								<li><a href="#"><span class="o-icon s--twitter"></span></a></li>
								<li><a href="#"><span class="o-icon s--instagram"></span></a></li>
								<li><a href="#"><span class="o-icon s--web"></span></a></li>
							</ul>
						</div>
						<div class="o-bio__story">
							<section class="u-wrap">
								<header>
									<h1 class="s--clear">MTV</h1>
									<span class="o-subtitle s--profile">Corporate Partner</span>
								</header>
								<p>MTV (originally an initialism of Music Television) is an American cable and satellite television channel owned by Viacom Media Networks (a division of Viacom) and headquartered in New York City. Launched on August 1, 1981,[2] the channel originally aired music videos as guided by television personalities known as "video jockeys" (VJs).[3]</p>
								<section>
									<h2 class="o-subheading">Programs Supported</h2>
									<?php 
										$programLogos = new WP_Query(array('post_type'=>'program', 'posts_per_page'=>4));
										if ($programLogos->have_posts()){
						                    $programLogoIndex = 0;
						                    $aosDelay=0;
									?>
									<ul class="c-programs__nav">			
									<?php while ( $programLogos->have_posts() ) : $programLogos->the_post();

						                if($programLogoIndex > 5){
						                    $programLogoIndex = 0;
						                }
						                switch ($programLogoIndex) {
						                    case 1:
						                        $aosDelay = 50;
						                        break;
						                    case 2:
						                        $aosDelay = 100;
						                        break;
						                    case 3:
						                        $aosDelay = 150;
						                        break;
						                    case 4:
						                        $aosDelay = 200;
						                        break;
						                    case 5:
						                        $aosDelay = 250;
						                        break;
						                    default:
						                        $aosDelay = 0;
						                        break;
						                }
						            ?>
										<li data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>"><a href="<?php echo get_permalink(); ?>" style="background-image:url('<?php the_field('logo'); ?>')"></a></li>
										<?php $programLogoIndex++; endwhile; ?>
										<?php wp_reset_postdata(); ?>
									<?php } ?>
									</ul>
								</section>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="c-page__content">
<?php 
	$partnerGroups = get_terms('group', array('orderby'=>'count', 'order'=>'DESC'));
	foreach ($partnerGroups as $partnerGroup): ?>
		<section class="o-page__section" data-aos="fade-up">
			<div class="o-section__tint"></div>
			<div class="u-box">
				<header class="o-section__header">
					<span class="o-section__title"><?php echo $partnerGroup->name; ?> Partners</span>
					<span class="o-subtitle">
						<?php 
							$partnerGroupCount = new NumberFormatter("en", NumberFormatter::SPELLOUT);
							echo $partnerGroupCount->format($partnerGroup->count);
						?>
					</span>
					<p><?php echo $partnerGroup->description; ?></p>
				</header>
				<ul class="u-clear">
					<?php 
						$partnerList = new WP_Query(array(
							'post_type'=>'partner',
							'posts_per_page'=>-1,
							'tax_query'=>array(
									array(
										'taxonomy'=>'group',
										'field'=>'name',
										'terms'=>$partnerGroup->name
									)
								)
							));
						if ($partnerList->have_posts()){
							$partnerIndex = 0;
							$aosDelay = 0;
					?>	
						<?php while ( $partnerList->have_posts() ) : $partnerList->the_post();  
							if($partnerIndex > 3){
								$partnerIndex = 0;
							}
							switch ($partnerIndex) {
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
						<li class="o-partner" data-aos="fade-up" data-aos-delay="<?php echo $aosDelay; ?>">
							<a href="<?php the_permalink(); ?>" class="o-partner__link no-barba js-showBioPop">
								<figure class="o-partner__logo" style="background-image:url('<?php echo get_field('logo');?>')">
									<div class="u-table">
										<div class="u-cell">
											<span>View Partner Profile</span>
										</div>
									</div>
								</figure>
							</a>
						</li>
						<?php $partnerIndex++; endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php } ?>
				</ul>
				<footer class="o-section__footer">
					<a href="#" class="o-button">
						<i class="o-icon s--arrow-ltr"></i>
						<span class="o-button__title">Partner with Us</span>
					</a>
				</footer>
			</div>
		</section>
	<?php endforeach ?>
?>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>