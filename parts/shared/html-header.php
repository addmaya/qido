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
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/vendors.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/app.js"></script>
		<?php wp_head(); ?>
	</head>
	<body class="is-booting <?php
		if(is_page('blog') || is_page('programs') || is_page('about')){echo 't-mercury';}
		if(is_page('impact') || is_front_page()){echo 't-jupiter';}
		if(is_page('team') || is_page('directors') || is_page('cultural-icons')){echo 't-earth';}
		if(is_page('events')){echo 't-venus';}
		if(is_page('partners') || is_page('contact')){echo 't-neptune';}
	?>">
	<div class="c-loader">
		<div class="u-cell">
			<span></span>
		</div>
	</div>
