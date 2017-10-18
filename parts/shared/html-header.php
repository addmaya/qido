<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php wp_title('-', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<meta property="og:url" content="<?php echo get_permalink();?>"/>
		<meta property="og:site_name" content="<?php bloginfo('name');?>"/>
		<meta property="og:type" content="<?php 
			if (is_singular('story')) {
				echo 'article';
			} else {
				echo 'website';
			}
		 ?>" />
		<meta property="og:title" content="<?php
			$seoTitle = get_field('fancy_title');
			if (is_page()) {
				if ($seoTitle) {
					echo $seoTitle;
				} else {
					echo bloginfo('description');
				}
			} else {
				echo get_the_title();
			}
		?>"/>
		<meta property="og:description" content="<?php
			$seoSummary = get_field('introduction');
			$seoExcerpt = get_field('excerpt');

			if($seoSummary){
				echo $seoSummary;
			}
			else {
				if($seoExcerpt){
					echo $seoExcerpt;
				}
				else{
					echo bloginfo('description');
				}
			}
			?>"/>
		<meta property="og:image" content="<?php
			$seoImage = get_field('cover_image');
				
			if($seoImage){
				echo $seoImage;
				$seoImageID = getImageID($seoImage);
				$seoImageMeta = wp_get_attachment_metadata($seoImageID);
				$seoImageWidth = $seoImageMeta['width'];
				$seoImageHeight = $seoImageMeta['height'];
			}
			else {
				$seoImageWidth = 1280;
				$seoImageHeight = 902;
				echo get_stylesheet_directory_uri().'/images/dummy/fallback.jpg';
			}
			?>"/>
		<?php if ($seoImageWidth && $seoImageHeight): ?>
		<meta property="og:image:width" content="<?php echo $seoImageWidth; ?>">
		<meta property="og:image:height" content="<?php echo $seoImageHeight; ?>">
		<?php endif ?>


		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/js/vendors/aos.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/js/vendors/swiper.min.css" rel="stylesheet">
		
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/vendors.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/app.js"></script>
		<script>
			var ajaxURL="<?php echo admin_url('admin-ajax.php'); ?>";
		</script>
		<?php wp_head(); ?>
	</head>
	<body class="is-booting <?php
		if(is_page('blog') || is_page('programs') || is_front_page() || is_single() || is_tag() || is_category()){echo 't-mercury';}
		if(is_page('impact') || is_page('about')){echo 't-jupiter';}
		if(is_page('our-team') || is_page('advisory-board') || is_page('cultural-icons')){echo 't-earth';}
		if(is_page('events') || is_post_type_archive('event')){echo 't-venus';}
		if(is_page('partners') || is_page('contact')){echo 't-neptune';}
	?>">
	<div class="c-loader">
		<div class="u-cell">
			<span></span>
		</div>
	</div>
