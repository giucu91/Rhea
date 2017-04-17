<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
<![endif]-->

<?php

if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function zerif_old_render_title() {
?>
<title><?php wp_title( '-', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'zerif_old_render_title' );
endif;

wp_head(); ?>
<?php zerif_bottom_head_trigger(); ?>
</head>

<?php if(isset($_POST['scrollPosition'])): ?>

	<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

	<body <?php body_class(); ?> >

<?php endif; 
	
	zerif_top_body_trigger();
	global $wp_customize;
	
	/* Preloader */

	if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ): 
 
		$zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');
		
		if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
			echo '<div class="preloader">';
				echo '<div class="loader">';
					echo '<div class="loader-inner"><div></div><div></div><div></div></div>';
				echo '</div>';
			echo '</div>';
		endif;	

	endif; ?>

<?php if ( has_nav_menu('homepage-top') ) { ?>
	<div class="full-navigation">
		<nav>
			<?php wp_nav_menu( array('theme_location' => 'homepage-top', 'container' => false, 'menu_class' => 'main-nav-list' )); ?>
		</nav>
	</div>
<?php } ?>


<header class="holder-header" id="sticky-header">
	<div class="container">
		<div class="text-left col-md-3 col-sm-3 col-xs-6">
			<?php
				$zerif_logo = get_theme_mod('zerif_logo');
				if(isset($zerif_logo) && $zerif_logo != ""):
					echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
						echo '<img src="'.esc_url( $zerif_logo ).'" alt="'.esc_attr( get_bloginfo('title') ).'">';
					echo '</a>';
				else:
					echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
						if( file_exists(get_stylesheet_directory()."/images/logo.png")):
							echo '<img src="'.get_stylesheet_directory_uri().'/images/logo.png" alt="'.esc_attr( get_bloginfo('title') ).'">';
						else:
							echo '<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.esc_attr( get_bloginfo('title') ).'">';
						endif;
					echo '</a>';
				endif;
			?>
		</div>
		<div class="rhea-primary-menu col-md-9 col-sm-9 col-xs-6">
			<div class="mobile-menu-burger">
				<div class="">
					<div class="burger-menu-icon">
					  	<span></span>
					  	<span></span>
					  	<span></span>
					  	<span></span>
					  	<span></span>
					  	<span></span>
					</div>
				</div>
			</div>

			<?php zerif_primary_navigation_trigger(); ?>

		</div>
		
	</div>
</header>

<div id="mobilebgfix">
	<div class="mobile-bg-fix-img-wrap">
		<div class="mobile-bg-fix-img"></div>
	</div>
	<div class="mobile-bg-fix-whole-site">


