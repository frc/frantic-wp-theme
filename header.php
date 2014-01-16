<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:description" content="">
	<meta property="og:image" content="">
	<meta property="og:title" content="<?php bloginfo('name'); ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css">

	<!--[if (lt IE 9) & (!IEMobile)]>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/ie/nwmatcher-min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/ie/selectivizr-min.js"></script>
	<![endif]-->

	<!-- ICONS -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="shortcut icon" href="/favicon.png">

	<?php // if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="l-wrap">

	<div class="l-constrained">

		<header role="banner">
			<h1><?php bloginfo('name'); ?></h1>
		</header>

		<nav role="navigation">
			<ul class="nav-primary">
			<?php wp_nav_menu(
				array(
					'menu' => 'main',
					'container' => false,
					'items_wrap' => '%3$s'
				)
			); ?>
			</ul>
		</nav>

	</div>