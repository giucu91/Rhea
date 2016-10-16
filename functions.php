<?php

function rhea_lite_setup() {   

	remove_theme_support( 'custom-background' );
	$args = array(
		'default-image' => get_stylesheet_directory_uri() . '/images/background-rhea.jpg',
	);
	add_theme_support( 'custom-header', $args );

	// Register new menu
	register_nav_menus(array(
        'homepage-top' => __('Homepage Top menu', 'rhea'),
    ));

    // Zerif Hooks
	require_once 'inc/hooks.php';

	// Hooks
	remove_action( 'zerif_primary_navigation', 'zerif_primary_navigation_function' );
	add_action( 'zerif_primary_navigation', 'rhea_primary_navigation_function' );
	remove_action( 'zerif_big_title_text', 'zerif_big_title_text_function' );
	add_action( 'zerif_big_title_text', 'rhea_big_title_text_function' );

}

add_action('after_setup_theme', 'rhea_lite_setup', 11 );



function rhea_slug_fonts_url() {
    $fonts_url = '';
     /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */

    $lato = _x( 'on', 'Lato font: on or off', 'rhea' );
    $homemade = _x( 'on', 'Homemade font: on or off', 'rhea' );
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $raleway = _x( 'on', 'Raleway font: on or off', 'rhea' );
    $roboto = _x( 'on', 'Roboto font: on or off', 'rhea' );

    $zerif_use_safe_font = get_theme_mod('zerif_use_safe_font');
    
    if ( ( 'off' !== $lato || 'off' !== $playfair || 'off' !== $homemade ) && isset($zerif_use_safe_font) && ($zerif_use_safe_font != 1) ) {
        $font_families = array();

        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:300,400,700,400italic,700italic';
        }
        if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:500,800,100,300,400';
        }
        if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto:400,100,300,700';
        }
        
        if ( 'off' !== $homemade ) {
            $font_families[] = 'Homemade Apple';
        }
         $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            // 'subset' => urlencode( 'latin,latin-ext' ),
        );
         $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
     return $fonts_url;
}

add_action( 'wp_enqueue_scripts', 'rhea_dequeue_styles', 11 );
function rhea_dequeue_styles() {
	wp_dequeue_style( 'zerif_font' );
	wp_dequeue_style( 'zerif_fontawesome' );
}

add_action( 'wp_enqueue_scripts', 'rhea_enqueue_styles' );
function rhea_enqueue_styles() {
	wp_enqueue_style('rhea_font', rhea_slug_fonts_url(), array(), null );
	wp_enqueue_style( 'rhea-fontawesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'zerif-lite-style', get_template_directory_uri() . '/style.css', array('zerif_bootstrap_style') );

	wp_enqueue_script( 'rhea-sticky-script', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'rhea-scripts', get_stylesheet_directory_uri() . '/js/rhea-scripts.js', array('jquery'), '1.0.0', true );
}

add_action('wp_head','rhea_lite_background');
function rhea_lite_background() {

	$header_image = get_header_image();
	$style = '<style>';
	if ( $header_image ) {
		$style .='body .rhea-header { background-image: url('.$header_image.'); }';

		$rhea_parallax_background = get_theme_mod( 'rhea_parallax_show' );
		if ( $rhea_parallax_background ) {
			$style .="body .rhea-header { background-attachment: fixed; }";
		}
	}

	$currentTheme = wp_get_theme();
	$currentThemeName = $currentTheme->parent();

	if ( $currentThemeName == 'Zerif PRO' ) {

		// [About us] Left Side
		$left_side_background = get_theme_mod( 'rhea_left_side_background_color', '#f4f7f9' );
		$left_side_title = get_theme_mod( 'rhea_left_side_title_color', '#404040' );
		$left_side_hightlight_background = get_theme_mod( 'rhea_left_side_highlight_background_color', '#2bb6b6' );
		$left_side_hightlight = get_theme_mod( 'rhea_left_side_highlight_color', '#FFFFFF' );
		$left_side_progressbar = get_theme_mod( 'rhea_left_side_progressbar_color', '#2bb6b6' );
		$left_side_description = get_theme_mod( 'rhea_left_side_description_color', '#777777' );

		if ( $left_side_background ) {
			$style .="body .about-us:before { background-color: {$left_side_background}; }";
		}
		if ( $left_side_title ) {
			$style .="body .left-about-us h2 span { color: {$left_side_title}; }";
		}
		if ( $left_side_hightlight_background ) {
			$style .="body .left-about-us h2 span.colored { background-color: {$left_side_hightlight_background}; }";
		}
		if ( $left_side_hightlight ) {
			$style .="body .left-about-us h2 span.colored { color: {$left_side_hightlight}; }";
		}
		if ( $left_side_progressbar ) {
			$style .="body .left-about-us .progress-bar { background-color: {$left_side_progressbar}; }";
		}
		if ( $left_side_description ) {
			$style .="body .about-us .left-about-us p { color: {$left_side_description}; }";
		}

		// [About us] Right Side
		$right_side_icon = get_theme_mod( 'rhea_right_side_icon_color', '#777777' );
		$right_side_description = get_theme_mod( 'rhea_right_side_description_color', '#777777' );
		$right_side_title = get_theme_mod( 'rhea_right_side_title_color', '#404040' );

		if ( $right_side_icon ) {
			$style .="body .about_us_box .icon-holder i { color: {$right_side_icon}; }";
		}
		if ( $right_side_description ) {
			$style .="body .about-us p { color: {$right_side_description}; }";
		}
		if ( $right_side_title ) {
			$style .="body .aboutus_titles h4 { color: {$right_side_title}; }";
		}

		// [Client' Section]
		$clients_title = get_theme_mod( 'rhea_clients_title_color', '#404040' );
		$clients_description = get_theme_mod( 'rhea_clients_description_color', '#777777' );

		if ( $clients_title ) {
			$style .="body .custom-clients h2 { color: {$clients_title}; }";
		}
		if ( $clients_description ) {
			$style .="body .custom-clients p { color: {$clients_description}; }";
		}

		$footer_widgets = get_theme_mod( 'rhea_footer_widgets_background', '#f4f7f9' );
		$footer_widgets_border = get_theme_mod( 'zerif_footer_widgets_title_border_bottom', '#2bb6b6' );
		$footer_widgets_title = get_theme_mod( 'zerif_footer_widgets_title', '#404040' );
		if ( $footer_widgets ) {
			$style .="body .footer-widget-wrap { background-color: {$footer_widgets} !important; }";
		}
		if ( $footer_widgets_title ) {
			$style .="body .footer-widget-wrap .widget .widget-title { color: {$footer_widgets_title} !important; }";
		}
		if ( $footer_widgets_border ) {
			$style .="body .widget .widget-title:before { background-color: {$footer_widgets_border} !important; }";
		}

		// General Colors
		$zerif_menu_item_color = get_theme_mod( 'zerif_menu_item_color', '#fff' );
		if( !empty($zerif_menu_item_color) ){
			$style.="body .navbar-inverse .navbar-nav>li>a, body .navbar-inverse .navbar-nav ul.sub-menu li a{
				color:".$zerif_menu_item_color.";
			}";
		}

		// Top CTA Section
		$rhea_top_cta_second_background = get_theme_mod( 'rhea_top_cta_second_button_background', 'rgba( 255,255,255,.0 )' );
		$rhea_top_cta_second_border = get_theme_mod( 'rhea_top_cta_second_button_border', '#2bb6b6' );
		$rhea_top_cta_second_text = get_theme_mod( 'rhea_top_cta_second_button_text', '#2bb6b6' );
		$rhea_top_cta_second_background_hover = get_theme_mod( 'rhea_top_cta_second_button_background_hover', '#2bb6b6' );
		$rhea_top_cta_second_text_hover = get_theme_mod( 'rhea_top_cta_second_button_text_hover', '#FFF' );

		if ( $rhea_top_cta_second_background ) {
			$style .="body .separator-one .outline-btn { background-color: {$rhea_top_cta_second_background} !important; }";
		}
		if ( $rhea_top_cta_second_border ) {
			$style .="body .separator-one .outline-btn { border-color: {$rhea_top_cta_second_border} !important; }";
		}
		if ( $rhea_top_cta_second_background_hover ) {
			$style .="body .separator-one .outline-btn:hover { background-color: {$rhea_top_cta_second_background_hover} !important;border-color: {$rhea_top_cta_second_background_hover} !important; }";
		}
		if ( $rhea_top_cta_second_text ) {
			$style .="body .separator-one .outline-btn { color: {$rhea_top_cta_second_text} !important; }";
		}
		if ( $rhea_top_cta_second_text_hover ) {
			$style .="body .separator-one .outline-btn:hover { color: {$rhea_top_cta_second_text_hover} !important; }";
		}

		// Bottom CTA Section
		$rhea_bottom_cta_border = get_theme_mod( 'rhea_bottom_cta_button_border', '#fff' );
		$rhea_bottom_cta_background = get_theme_mod( 'zerif_ribbonright_button_background_hover', '#fff' );

		if ( $rhea_bottom_cta_border ) {
			$style .="body .purchase-now .outline-btn { border-color: {$rhea_bottom_cta_border} !important; }";
		}
		if ( $rhea_bottom_cta_background ) {
			$style .="body .purchase-now .outline-btn:hover { border-color: {$rhea_bottom_cta_background} !important; }";
		}

	}
	$style .= '</style>';
	echo $style;

}

function rhea_widgets_init() {    

	register_sidebar(array(
        'name' => __('Progress Bar Section', 'rhea'),
        'id' => 'sidebar-progress-bar',
        'description' => 'This sidebar is used on Homepage in About us Section',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Right Section', 'rhea'),
        'id' => 'sidebar-right-aboutus',
        'description' => 'This sidebar is used on Homepage in About us Section',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    
}

add_action('widgets_init', 'rhea_widgets_init');

require_once 'inc/rhea_customizer.php';

function rhea_customize_preview_js() {
	wp_enqueue_script( 'rhea_customizer', get_stylesheet_directory_uri() . '/js/rhea-customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rhea_customize_preview_js' );


add_filter( 'customizer_widgets_section_args', 'rhea_change_sidebar_customizer_args' );

function rhea_change_sidebar_customizer_args( $section_args ) {

	$currentTheme = wp_get_theme();
	$currentThemeName = $currentTheme->parent();

	if ( $currentThemeName == 'Zerif PRO' ) {
		$panel_about = 'panel_6';
	}else{
		$panel_about = 'panel_about';
	}

	if ( $section_args['sidebar_id'] == 'sidebar-aboutus' ) {
		$section_args['title'] = 'Clients section';
		$section_args['panel'] = $panel_about;
	}elseif ( $section_args['sidebar_id'] == 'sidebar-progress-bar' || $section_args['sidebar_id'] == 'sidebar-right-aboutus' ) {
		$section_args['panel'] = $panel_about;
		$section_args['priority'] = 3;
	}

	return $section_args;

}

// Add extra body class
add_filter('body_class', 'rhea_add_extra_class');

function rhea_add_extra_class( $classes ) {

	$hero_section = get_theme_mod('zerif_bigtitle_show');
	if( is_front_page() && get_option( 'show_on_front' ) != 'page' && $hero_section != 1 ) {
		$classes[] = 'rhea-front-page';
	}

	return $classes;

}

// Widgets
require_once 'inc/widgets/features.widget.php';
require_once 'inc/widgets/about.widget.php';
require_once 'inc/widgets/hours.widget.php';
require_once 'inc/widgets/contact.widget.php';
require_once 'inc/widgets/progress-bar.widget.php';
require_once 'inc/widgets/icon-box.widget.php';
add_action('widgets_init', 'rhea_register_widgets');

function rhea_register_widgets() {
	register_widget('rhea_features_block');
	register_widget('Rhea_Progress_Bar');
	register_widget('Rhea_Icon_Box');
	register_widget('Rhea_About_Company');
	register_widget('Rhea_Hours');
	register_widget('Rhea_Contact_Company');
}

function rhea_load_custom_wp_admin_style() {
		
		wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'rhea-admin-style', get_stylesheet_directory_uri() . '/css/admin-style.css' );

        wp_enqueue_script( 'fontawesome-icons', get_stylesheet_directory_uri() . '/js/icons.js', false, '1.0.0' );
        wp_enqueue_script( 'jquery-ui-dialog' );
        wp_enqueue_script( 'fontawesome-script', get_stylesheet_directory_uri() . '/js/fontawesome.jquery.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'rhea_load_custom_wp_admin_style' );

add_action('admin_footer', 'rhea_add_html_to_admin_footer');
add_action('customize_controls_print_footer_scripts', 'rhea_add_html_to_admin_footer');
function rhea_add_html_to_admin_footer() { ?>
	<div id="fontawesome-popup">
		<div class="left-side">
			<label for="fontawesome-live-search">Search icon:</label>
			<input type="text" id="fontawesome-live-search">
			<ul class="filter-icons">
				<li data-filter="all" class="active">All Icons</li>
			</ul>
		</div>
		<div class="right-side">
		</div>
	</div>
<?php }

// Hooks functions

function rhea_primary_navigation_function() { ?>
	<nav class="navbar-inverse site-menu">
		<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'main-nav-list navbar-nav pull-right', 'fallback_cb' => 'zerif_wp_page_menu' )); ?>
	</nav>
<?php }

function rhea_big_title_text_function() {

	$zerif_bigtitle_title = get_theme_mod('zerif_bigtitle_title',__('<strong>Rhea</strong> is super awesome','rhea'));
	if( !empty($zerif_bigtitle_title) ):
		echo '<h1 class="intro-text">'.wp_kses_post( $zerif_bigtitle_title ).'</h1>';
	elseif ( isset( $wp_customize ) ):
		echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';
	endif;	

	$rhea_bigtitle_description = get_theme_mod('rhea_description',__('And is build on <u>Zerif Lite</u> the most popular one page theme from WordPress.org','rhea'));
	if( !empty($rhea_bigtitle_description) ):
		echo '<p class="intro-description">'.wp_kses_post( $rhea_bigtitle_description ).'</p>';
	elseif ( isset( $wp_customize ) ):
		echo '<p class="intro-description zerif_hidden_if_not_customizer"></p>';
	endif;
	
}