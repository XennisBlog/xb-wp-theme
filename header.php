<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>

	<!-- Meta -->
	<meta charset="<?php bloginfo('charset'); ?>"
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<!-- Link -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', XB_THEME_NAME ); ?></a>

	<header class="site-header" <?php echo (is_home() ? 'id="home"' : ''); ?>>
		<nav>
			<?php wp_nav_menu(array(
				'menu_class' => 'nav-menu',
				'theme_location' => 'primary'
			) ); ?>
		</nav>
		<div class="site-branding">
			<div class="site-title-area">
				<span class="site-title"><?php bloginfo('name'); ?></span>
			</div>
		</div>
	</header><!-- .site-header -->

	<main id="content" class="site-content" role="main">