<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
			
		<!-- css + javascript -->
		<?php wp_enqueue_script("jquery"); ?>
		<?php wp_register_script( "masonry", get_template_directory_uri() . "/js/jquery.masonry.min.js" ); ?>
		<?php wp_enqueue_script( "masonry" ); ?>
		<?php wp_register_script( "menu", get_template_directory_uri() . "/js/menu.js" ); ?>
		<?php wp_enqueue_script( "menu" ); ?>
		<?php wp_head(); ?>
		<script>
		!function(){
			// configure legacy, retina, touch requirements @ conditionizr.com
			conditionizr()
		}()
		</script>
	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper">
			<header id="masthead" class="site-header" role="banner">
				<a href="/"><img id="nav-logo" src="<?php echo get_template_directory_uri() . '/images/logo-matt-ferrin.svg';?>" height="44" alt="Matt Ferrin" /></a>
				<nav id="site-navigation" class="nav main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-menu' ) ); ?>
          <a class="email-icon" href="mailto:ferrin@gmail.com"></a>
				</nav>
			</header>
