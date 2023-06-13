<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<?php $odin_colors_opts = get_option( 'odin_colors' ); ?>
	<?php $odin_fonts_opts = get_option( 'odin_fonts' ); ?>
	<style>
		:root{
			--background-color: <?php echo $odin_colors_opts['background_color']; ?>;
			--background-header-color: <?php echo $odin_colors_opts['background_header_color']; ?>;
			--background-footer-color: <?php echo $odin_colors_opts['background_footer_color']; ?>;
			--primary-color: <?php echo $odin_colors_opts['primary_color']; ?>;
			--primary-bold-color: <?php echo $odin_colors_opts['primary_bold_color']; ?>;
			--primary-light-color: <?php echo $odin_colors_opts['primary_light_color']; ?>;
			--secondary-color: <?php echo $odin_colors_opts['secondary_color']; ?>;
			--secondary-bold-color: <?php echo $odin_colors_opts['secondary_bold_color']; ?>;
			--secondary-light-color: <?php echo $odin_colors_opts['secondary_light_color']; ?>;
			--title-color: <?php echo $odin_colors_opts['title_color']; ?>;
			--text-color: <?php echo $odin_colors_opts['text_color']; ?>;
			--link-color: <?php echo $odin_colors_opts['link_color']; ?>;
			--link-hover-color: <?php echo $odin_colors_opts['link_hover_color']; ?>;
			--link-contrast-color: <?php echo $odin_colors_opts['link_contrast_color']; ?>;
			--link-contrast-hover-color: <?php echo $odin_colors_opts['link_contrast_hover_color']; ?>;
			--font-base: <?php echo $odin_fonts_opts['font_base']; ?>px;
			--font-title-h1: <?php echo $odin_fonts_opts['font_title_h1']; ?>px;
			--font-title-h2: <?php echo $odin_fonts_opts['font_title_h2']; ?>px;
			--font-title-h3: <?php echo $odin_fonts_opts['font_title_h3']; ?>px;
			--font-title-h4: <?php echo $odin_fonts_opts['font_title_h4']; ?>px;
			--font-title-h5: <?php echo $odin_fonts_opts['font_title_h5']; ?>px;
			--font-title-h6: <?php echo $odin_fonts_opts['font_title_h6']; ?>px;
			--font-small: <?php echo $odin_fonts_opts['font_small']; ?>px;
			--font-large: <?php echo $odin_fonts_opts['font_large']; ?>px;
		}
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} ?>
	
	<a id="skippy" class="sr-only sr-only-focusable" href="#content">
		<div class="container">
			<span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span>
		</div>
	</a>

	<header id="header" role="banner" class="d-none d-md-block py-3">
		<div class="container">
			<div class="row">
				<div class="col-3">
					<div class="page-header hidden-xs">
						<?php if(has_custom_logo()){ ?>
							<?php odin_the_custom_logo(); ?>
							<h1 class="site-title d-none">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<h2 class="site-description d-none"><?php bloginfo( 'description' ); ?></h2>
						<?php } else { ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php } ?>

						<?php if ( get_header_image() ) : ?>
							<div class="custom-header">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="d-flex col-9 align-items-center justify-content-end">
					<div id="main-navigation" class="navbar navbar-default">
						<nav class="nav gap-3" role="navigation">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'main-menu',
										'depth'          => 2,
										'container'      => false,
										'menu_class'     => 'nav gap-3',
										'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
										'walker'         => new Odin_Bootstrap_Nav_Walker()
									)
								);
							?>
							<?php $odin_contact_opts = get_option( 'odin_contact' ); ?>
							<a class="btn btn-primary btn-header" href="<?php echo $odin_contact_opts['odin_whatsapp']; ?>">
								Orçamento <ion-icon name="logo-whatsapp"></ion-icon>
							</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<header id="header-mobile" class="d-block d-md-none">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="page-header hidden-xs">
						<?php if(has_custom_logo()){ ?>
							<?php odin_the_custom_logo(); ?>
							<h1 class="site-title d-none">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<h2 class="site-description d-none"><?php bloginfo( 'description' ); ?></h2>
						<?php } else { ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php } ?>

						<?php if ( get_header_image() ) : ?>
							<div class="custom-header">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-6">
					<div id="main-navigation" class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
							<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'main-menu',
										'depth'          => 2,
										'container'      => false,
										'menu_class'     => 'nav navbar-nav',
										'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
										'walker'         => new Odin_Bootstrap_Nav_Walker()
									)
								);
							?>
							<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
								<label for="navbar-search" class="sr-only">
									<?php _e( 'Search:', 'odin' ); ?>
								</label>
								<div class="form-group">
									<input type="search" value="<?php echo get_search_query(); ?>" class="form-control" name="s" id="navbar-search" />
								</div>
								<button type="submit" class="btn btn-default"><?php _e( 'Search', 'odin' ); ?></button>
							</form>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>