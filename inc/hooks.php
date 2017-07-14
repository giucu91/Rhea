<?php

// Testimonials hooks
remove_action( 'zerif_testimonials_header_title', 'zerif_testimonials_header_title_function' );
add_action( 'zerif_testimonials_header_title', 'rhea_testimonials_header_title_function' );

function rhea_testimonials_header_title_function() {

	$zerif_testimonials_title = get_theme_mod('zerif_testimonials_title',__('Testimonials','rhea'));

	if( !empty($zerif_testimonials_title) ):

		echo '<h2>'.wp_kses_post( $zerif_testimonials_title ).'</h2>';

	elseif ( is_customize_preview() ):

		echo '<h2 class="zerif_hidden_if_not_customizer"></h2>';

	endif;

}


remove_action( 'zerif_testimonials_header_subtitle', 'zerif_testimonials_header_subtitle_function' );
add_action( 'zerif_testimonials_header_subtitle', 'rhea_testimonials_header_subtitle_function' );

function rhea_testimonials_header_subtitle_function() {

	$zerif_testimonials_subtitle = get_theme_mod('zerif_testimonials_subtitle');

	if( !empty($zerif_testimonials_subtitle) ):

		echo '<h6 class="section-legend">'.wp_kses_post( $zerif_testimonials_subtitle ).'</h6>';

	elseif ( is_customize_preview() ):

		echo '<h6 class="section-legend zerif_hidden_if_not_customizer"></h6>';

	endif;

}

function rhea_return_accent_color(){
	return '#2bb6b6';
}

function rhea_return_white(){
	return '#fff';
}

function rhea_return_black(){
	return '#23282d';
}

function rhea_return_title_color(){
	return '#404040';
}

function rhea_return_white_blue(){
	return '#f4f7f9';
}

function rhea_transparent_color() {
	return 'rgba( 255,255,255,0 )';
}

function rhea_return_grey(){
	return '#777';
}

add_filter( 'zerif_portofolio_box_underline_color_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_footer_socials_hover_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_footer_widgets_title_border_bottom_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_titles_bottomborder_color_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_links_color_hover_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_buttons_background_color_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_buttons_background_color_hover_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_ourteam_socials_hover_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_ribbonright_background_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_ribbonright_button_button_color_hover_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_ribbon_button_background_filter', 'rhea_return_accent_color' );
add_filter( 'zerif_contacus_button_background_filter', 'rhea_return_accent_color' );

add_filter( 'zerif_footer_socials_background_filter', 'rhea_return_white' );
add_filter( 'zerif_testimonials_background_filter', 'rhea_return_white' );
add_filter( 'zerif_ribbonright_text_color_filter', 'rhea_return_white' );
add_filter( 'zerif_ribbonright_button_background_hover_filter', 'rhea_return_white' );
add_filter( 'zerif_ribbonright_button_button_color_filter', 'rhea_return_white' );
add_filter( 'zerif_aboutus_background_filter', 'rhea_return_white' );
add_filter( 'zerif_contacus_background_filters', 'rhea_return_white' );

add_filter( 'zerif_footer_background_filter', 'rhea_return_black' );
add_filter( 'zerif_navbar_color_filter', 'rhea_return_black' );

add_filter( 'zerif_footer_widgets_title_filter', 'rhea_return_title_color' );
add_filter( 'zerif_testimonials_header_filter', 'rhea_return_title_color' );
add_filter( 'zerif_testimonials_author_filter', 'rhea_return_title_color' );
add_filter( 'zerif_contacus_header_filter', 'rhea_return_title_color' );

add_filter( 'zerif_ourteam_background_filter', 'rhea_return_white_blue' );
add_filter( 'zerif_testimonials_box_color', 'rhea_return_white_blue' );
add_filter( 'zerif_ribbon_background_filter', 'rhea_return_white_blue' );
add_filter( 'zerif_testimonials_box_color_filter', 'rhea_return_white_blue' );

add_filter( 'zerif_ribbonright_button_background_filter', 'rhea_transparent_color' );

add_filter( 'zerif_aboutus_title_color_filter', 'rhea_return_grey' );
add_filter( 'zerif_testimonials_text', 'rhea_return_grey' );