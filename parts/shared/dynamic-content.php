<?php  if (have_rows('content')): 
	$blockCount = 0;
	$blockClass = '';
	$bubbleSizes = ['s--small', 's--medium', 's--large'];
?>
	<?php while(have_rows('content')): the_row();?>
		<?php if(get_row_layout() == 'section') {
				$sectionHeading = get_sub_field('heading');
				$sectionImage = get_sub_field('image');
				$sectionContent = get_sub_field('content');

				$blockCount++;

				if ($blockCount % 2 == 0) {
					$blockClass = 's--even';
				}
				else {
					$blockClass = 's--odd';
				}
			?>
			<?php if($sectionImage){?>
				<section data-aos="fade-up" class="o-block <?php echo $blockClass; ?>">
					<div class="o-block__text">
						<section class="u-wrap">
							<h2><?php echo $sectionHeading;?></h2>
							<p><?php echo $sectionContent; ?></p>
						</section>
					</div>
					<div class="o-block__figure">
						<figure style="background-image: url('<?php echo $sectionImage; ?>')">
							<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
						</figure>
					</div>
				</section>
			<?php } else { ?>
				<section data-aos="fade-up" class="o-block s--basic">
					<h2><?php echo $sectionHeading;?></h2>
					<p><?php echo $sectionContent; ?></p>
				</section>
			<?php } ?>
		<?php } ?>

		<?php if(get_row_layout() == 'slider'){?>
			<section data-aos="fade-up" class="o-block">
				<?php 
					$slideTitle = get_sub_field('title');
					$sliderDescription = get_sub_field('description');
				?>
				<?php if($slideTitle && $sliderDescription){?>
					<header>
						<h2><?php echo $slideTitle; ?></h2>
						<section><?php echo $sliderDescription; ?></section>
					</header>
				<?php } else { if($slideTitle || $sliderDescription){?>
					<header class="s--clear">
						<h2><?php echo $slideTitle; ?></h2>
						<section><?php echo $sliderDescription; ?></section>
					</header>
				<?php }  }?>
				<?php if(have_rows('images')): ?>
					<div class="o-swiper">
						<span class="o-bubble s--left <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
						<span class="o-bubble s--right <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
						<div class="swiper-container">
							<div class="swiper-wrapper">					
							<?php while(have_rows('images')):the_row();
								$slideImage = get_sub_field('image');
								$slideCaption = get_sub_field('caption');
							?>
								<div class="swiper-slide">
									<figure class="o-swiper__figure" style="background-image: url('<?php echo $slideImage; ?>');">
										<div class="o-swiper__caption">
											<figcaption><?php echo $slideCaption; ?></figcaption>
										</div>
									</figure>
								</div>
							<?php endwhile; ?>
							</div>
						</div>
						<div class="o-swiper__pagination">
							<div class="swiper-pagination"></div>
						</div>
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				<?php endif; ?>
			</section>
		<?php } ?>

		<?php if(get_row_layout() == 'quote') {
				$quoteBody = get_sub_field('big_quote');
				$quoteAuthor = get_sub_field('quote_author');
			?>
			<blockquote data-aos="fade-up" class="o-block o-quote">
				<p>"<?php echo $quoteBody; ?>"</p>
				<cite><?php echo $quoteAuthor; ?></cite>
			</blockquote>
		<?php } ?>

		<?php if(get_row_layout() == 'statistic'){?>
				<section data-aos="fade-up" class="o-block s--statistics">
					<?php 
						$statsTitle = get_sub_field('title');
						$statsDescription = get_sub_field('description');
					?>
					<?php if($statsTitle && $statsDescription){?>
						<header>
							<h2><?php echo $statsTitle; ?></h2>
							<section><?php echo $statsDescription; ?></section>
						</header>
					<?php } else { if($statsTitle || $statsDescription){?>
						<header class="s--clear">
							<h2><?php echo $statsTitle; ?></h2>
							<section><?php echo $statsDescription; ?></section>
						</header>
					<?php } }?>

					<?php if(have_rows('statistics')): ?>
						<ul class="u-clear u-align__center">
							<?php 
								$bubbleClasses = ['t-banana', 't-berry', 't-ivy', 't-mango'];
								$statisticIndex = 0;
								$aosDelay=0;
							?>
							<?php while(have_rows('statistics')):the_row(); 
								if($statisticIndex > 3){
								    $statisticIndex = 0;
								}
								switch ($statisticIndex) {
								    case 0:
								        $aosDelay = 0;
								        break;
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
							<li class="o-statistic" data-aos="zoom-in" data-aos-delay="<?php echo $aosDelay; ?>">
								<figure class="<?php echo $bubbleClasses[$statisticIndex]; ?>">
									<div class="u-table">
										<div class="u-cell">
											<span class="o-statistic__figure"><?php the_sub_field('number'); ?> <span class="o-statistic__unit"><?php the_sub_field('unit'); ?></span></span>
											<p><?php the_sub_field('description'); ?></p>
										</div>
									</div>
								</figure>
								<p><?php the_field('description'); ?></p>
							</li>
							<?php $statisticIndex++; endwhile; ?>
						</ul>
					<?php endif; ?>
				</section>
		<?php } ?>

		<?php if(get_row_layout() == 'document'){?>
			<section data-aos="fade-up" class="o-block">
				<?php 
					$docsTitle = get_sub_field('title');
					$docsDescription = get_sub_field('description');
				?>
				<?php if($docsTitle && $docsDescription){?>
					<header>
						<h2><?php echo $docsTitle; ?></h2>
						<section><?php echo $docsDescription; ?></section>
					</header>
				<?php } else { if($docsTitle || $docsDescription){?>
					<header class="s--clear">
						<h2><?php echo $docsTitle; ?></h2>
						<section><?php echo $docsDescription; ?></section>
					</header>
				<?php  }}?>
			
			<?php if(have_rows('documents')):
					$docsCount = count(get_sub_field('documents'));
			?>
				<ul class="o-documents">
					<?php while(have_rows('documents')):the_row();
						$docFile = get_sub_field('file');
						$docLabel = get_sub_field('label');
					?>
						<li>
							<span class="o-icon s--doc"></span>
							<a href="<?php echo $docFile; ?>" target="_blank">
								<p><?php echo $docLabel; ?></p>
								<span>View Doc</span>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			</section>
		<?php } ?>

		<?php if(get_row_layout() == 'image_list'){?>
			<section data-aos="fade-up" class="o-block s--imagelist">
				<?php 
					$listTitle = get_sub_field('list_title');
					$listDescription = get_sub_field('list_description');
				?>
					<?php if($listTitle && $list_description){?>
						<header>
							<h2><?php echo $listTitle; ?></h2>
							<section><?php echo $listDescription; ?></section>
						</header>
					<?php } else { ?>
						<header class="s--clear">
							<h2><?php echo $listTitle; ?></h2>
							<section><?php echo $listDescription; ?></section>
						</header>
					<?php  }?>
				<?php if(have_rows('list_items')): ?>
					<ul class="o-imagelist">
						<?php while(have_rows('list_items')):the_row();
							$listItemImage = get_sub_field('image');
							$listItemText = get_sub_field('text');
						?>
							<li>
								<section class="u-wrap">
									<figure style="background-image: url('<?php echo $listItemImage; ?>')">
										<span class="o-bubble <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
									</figure>
									<p><?php echo $listItemText; ?></p>
								</section>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</section>
		<?php } ?>

		<?php if(get_row_layout() == 'embed') {
				$embedTitle = get_sub_field('title');
				$embedDescription = get_sub_field('description');
				$embedFrame = get_sub_field('embed');
			?>
			<section data-aos="fade-up" class="o-block">
				<?php if($embedTitle && $embedDescription){?>
					<header>
						<h2><?php echo $embedTitle; ?></h2>
						<section><?php echo $embedDescription; ?></section>
					</header>
				<?php } else { ?>
					<header class="s--clear">
						<h2><?php echo $embedTitle; ?></h2>
						<section><?php echo $embedDescription; ?></section>
					</header>
				<?php  }?>
				<section class="o-embed">
					<span class="o-bubble s--left <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
					<span class="o-bubble s--right <?php echo $bubbleSizes[array_rand($bubbleSizes)]; ?>"></span>
					<section class="o-embed__content">
						<?php echo $embedFrame; ?>
					</section>
				</section>
			</section>
		<?php } ?>
	<?php endwhile; ?>
<?php endif; ?>