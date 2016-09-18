<?php

if( !function_exists( 'rhea_lite_customizer' ) ) {
	add_action( 'customize_register', 'rhea_lite_customizer', 9999999 );
	function rhea_lite_customizer( $wp_customize ) {

		class Rhea_Content_Control extends WP_Customize_Control {
	        public function render_content() {
	            echo '<h3>'.esc_html( $this->label ).'</h3>';
	        }
	    }

		$currentTheme = wp_get_theme();
		$currentThemeName = $currentTheme->parent();

		if ( $currentThemeName == 'Zerif PRO' ) {
			$hero_panel = 'panel_3';
			$focus_panel = 'panel_4';
			$hero_text_section = 'zerif_bigtitle_texts_section';
			$bottom_button_ribbon = 'zerif_bottombribbon_section';
			$about_us_section = 'zerif_aboutus_texts_section';
			$clients_section = 'zerif_aboutus_clients_title_section';
		}else{
			$hero_panel = 'panel_big_title';
			$focus_panel = 'panel_ourfocus';
			$hero_text_section = 'zerif_bigtitle_section';
			$bottom_button_ribbon = 'zerif_bottomribbon_section';
			$about_us_section = 'zerif_aboutus_main_section';
			$clients_section = 'zerif_aboutus_main_section';
		}

		$wp_customize->remove_section( 'zerif_parallax_section' );
		$wp_customize->get_section('header_image')->panel = $hero_panel;
		$wp_customize->get_section('header_image')->title = 'Background Image';
		$wp_customize->get_section('header_image')->priority = 2;

		// Change customize panels' title
		$wp_customize->get_panel($hero_panel)->title = "Hero Section";
		$wp_customize->get_panel($focus_panel)->title  = "Features Section";

		$wp_customize->add_setting( 'rhea_parallax_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
			'default' => 1,
		));

		$wp_customize->add_control( 'rhea_parallax_show', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Use parallax effect?','rhea'),
			'section' 	=> 'header_image',
			'priority'	=> 1,
		));
		
		// Hero Section
		$wp_customize->get_setting('zerif_bigtitle_title')->default = __('RHEA IS SUPER AWESOME','rhea');

		// Left Button
		$wp_customize->get_setting('zerif_bigtitle_redbutton_label')->default = __('Explore','rhea');
		$wp_customize->get_control('zerif_bigtitle_redbutton_label')->label = __('Left Button Label','rhea');

		$wp_customize->get_setting('zerif_bigtitle_redbutton_url')->default = __('#focus','rhea');
		$wp_customize->get_control('zerif_bigtitle_redbutton_url')->label = __('Left Button URL','rhea');

		// Right Button
		$wp_customize->get_setting('zerif_bigtitle_greenbutton_label')->default = __('See Pro Version','rhea');
		$wp_customize->get_control('zerif_bigtitle_greenbutton_label')->label = __('Right Button Label','rhea');

		$wp_customize->get_setting('zerif_bigtitle_greenbutton_url')->default = __('#focus','rhea');
		$wp_customize->get_control('zerif_bigtitle_greenbutton_url')->label = __('Right Button URL','rhea');

		

		$wp_customize->add_setting( 'rhea_description', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default' => __('And is build on <u>Zerif Lite</u> the most popular one page theme from WordPress.org','rhea'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_description', array(
			'type'    => 'textarea',
			'label'   => __( 'Description', 'rhea' ),
			'section' => $hero_text_section,
			'priority' => 2
		));

		// Change PRO defaults
		if ( $currentThemeName == 'Zerif PRO' ) {
			$wp_customize->get_setting('zerif_bigtitle_1button_background_color')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_bigtitle_1button_background_color_hover')->default = '#fff';
			$wp_customize->get_setting('zerif_bigtitle_1button_color')->default = '#fff';
			$wp_customize->get_setting('zerif_bigtitle_1button_color_hover')->default = '#2bb6b6';

			$wp_customize->get_setting('zerif_bigtitle_2button_background_color')->default = 'rgba( 255,255,255,0 )';
			$wp_customize->get_setting('zerif_bigtitle_2button_background_color_hover')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_bigtitle_2button_color')->default = '#fff';
			$wp_customize->get_setting('zerif_bigtitle_2button_color_hover')->default = '#fff';

			// Features Section

			$wp_customize->add_setting( 'zerif_ourfocus_box_icon_color', array(
	            'default' => '#2bb6b6',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zerif_ourfocus_box_icon_color', array(
	            'label'      => __( 'Box icon color', 'rhea' ),
	            'section'    => 'zerif_ourfocus_colors_section',
	            'priority'   => 2
	        ) ) );

			$wp_customize->get_control('zerif_ourfocus_1box')->label = __( 'Box Background', 'rhea' );
			$wp_customize->get_setting('zerif_ourfocus_1box')->default = '#f4f7f9';

			$wp_customize->get_setting('zerif_ourfocus_box_title_color')->default = '#8496a2';
			$wp_customize->get_setting('zerif_ourfocus_box_text_color')->default = '#8496a2';

			$wp_customize->remove_setting('zerif_ourfocus_2box');
			$wp_customize->remove_control('zerif_ourfocus_2box');
			$wp_customize->remove_setting('zerif_ourfocus_3box');
			$wp_customize->remove_control('zerif_ourfocus_3box');
			$wp_customize->remove_setting('zerif_ourfocus_4box');
			$wp_customize->remove_control('zerif_ourfocus_4box');

		}

		// About us Section
		if ( $currentThemeName == 'Zerif PRO' ) {
			$wp_customize->remove_section( 'zerif_aboutus_feature1_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feature2_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feature3_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feature4_section' );

			// Colors
			$wp_customize->add_setting( 'rhea_left_side_headline' );

	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_left_side_headline', array(
				'section'  	=> 'zerif_aboutus_colors_section',
				'label'		=> __( 'Left Side Colors', 'rhea' ),
				'priority'	=> 1,
	        ) ) );

            $wp_customize->add_setting( 'rhea_left_side_background_color', array(
	            'default' 			=> '#f4f7f9',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_background_color', array(
					'label'      	=> __( 'Background Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_background_color',
					'priority'		=> 1,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_left_side_title_color', array(
	            'default' 			=> '#404040',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_title_color', array(
					'label'      	=> __( 'Title Text Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_title_color',
					'priority'		=> 1,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_left_side_highlight_color', array(
	            'default' 			=> '#FFFFFF',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_highlight_color', array(
					'label'      	=> __( 'Highlight Text Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_highlight_color',
					'priority'		=> 1,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_left_side_highlight_background_color', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_highlight_background_color', array(
					'label'      	=> __( 'Highlight Background Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_highlight_background_color',
					'priority'		=> 1,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_left_side_description_color', array(
	            'default' 			=> '#777777',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_description_color', array(
					'label'      	=> __( 'Description Text Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_description_color',
					'priority'		=> 1,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_left_side_progressbar_color', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_progressbar_color', array(
					'label'      	=> __( 'Progres Bar Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_progressbar_color',
					'priority'		=> 1,
				) ) 
			);


			$wp_customize->add_setting( 'rhea_right_side_headline' );

	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_right_side_headline', array(
				'section'  	=> 'zerif_aboutus_colors_section',
				'label'		=> __( 'Right Side Colors', 'rhea' ),
				'priority'	=> 2,
	        ) ) );

	        $wp_customize->get_control('zerif_aboutus_background')->priority = 3;
			$wp_customize->get_setting('zerif_aboutus_background')->default = '#FFFFFF';

			$wp_customize->add_setting( 'rhea_right_side_icon_color', array(
	            'default' 			=> '#777',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_right_side_icon_color', array(
					'label'      	=> __( 'Icon Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_right_side_icon_color',
					'priority'		=> 3,
				) ) 
			);

			$wp_customize->remove_setting('zerif_aboutus_title_color');
			$wp_customize->remove_control('zerif_aboutus_title_color');

			$wp_customize->add_setting( 'rhea_right_side_title_color', array(
	            'default' 			=> '#404040',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_right_side_title_color', array(
					'label'      	=> __( 'Title Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_right_side_title_color',
					'priority'		=> 3,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_right_side_description_color', array(
	            'default' 			=> '#777777',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_right_side_description_color', array(
					'label'      	=> __( 'Subtitle & Description Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_right_side_description_color',
					'priority'		=> 3,
				) ) 
			);

			$wp_customize->remove_setting('zerif_aboutus_number_color');
			$wp_customize->remove_control('zerif_aboutus_number_color');

			$wp_customize->add_setting( 'rhea_clients_headline' );

	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_clients_headline', array(
				'section'  	=> 'zerif_aboutus_colors_section',
				'label'		=> __( 'Clients Section', 'rhea' ),
				'priority'	=> 4,
	        ) ) );

	        $wp_customize->remove_control('zerif_aboutus_clients_color');
			$wp_customize->remove_setting('zerif_aboutus_clients_color');

			$wp_customize->add_setting( 'rhea_clients_title_color', array(
	            'default' 			=> '#404040',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_clients_title_color', array(
					'label'      	=> __( 'Title Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_clients_title_color',
					'priority'		=> 5,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_clients_description_color', array(
	            'default' 			=> '#777777',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_clients_description_color', array(
					'label'      	=> __( 'Description Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_clients_description_color',
					'priority'		=> 5,
				) ) 
			);

		}else{
			$wp_customize->remove_section( 'zerif_aboutus_feat1_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feat2_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feat3_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feat4_section' );
		}
		

		// Ribbons
		if ( $currentThemeName == 'Zerif PRO' ) {

			$wp_customize->add_panel( 'panel_top_cta', array(
	            'priority' => 33,
	            'capability' => 'edit_theme_options',
	            'theme_supports' => '',
	            'title' => __( 'Top CTA Section', 'rhea' )
	        ) );

	        $wp_customize->add_section( 'rhea_color_top_cta' , array(
	            'title'       => __( 'Colors', 'rhea' ),
	            'priority'    => 2,
	            'panel' => 'panel_top_cta'
	        ));

	        $wp_customize->get_section('zerif_bottombribbon_section')->panel = 'panel_top_cta';
	        $wp_customize->get_section('zerif_bottombribbon_section')->title = __('Content','rhea');

	        // Colors
	        $wp_customize->add_setting( 'rhea_first_button_top_cta' );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_first_button_top_cta', array(
				'section'  	=> 'rhea_color_top_cta',
				'label'		=> __( 'First Button Colors', 'rhea' ),
				'priority'	=> 5,
	        ) ) );
	        $wp_customize->get_control('zerif_ribbon_background')->section = 'rhea_color_top_cta';
	        $wp_customize->get_setting('zerif_ribbon_background')->default = '#f4f7f9';

	        $wp_customize->remove_control('zerif_ribbon_text_color');
	        $wp_customize->remove_setting('zerif_ribbon_text_color');

	        $wp_customize->get_control('zerif_ribbon_button_background')->section = 'rhea_color_top_cta';
	        $wp_customize->get_setting('zerif_ribbon_button_background')->default = '#2bb6b6';

	        $wp_customize->get_control('zerif_ribbon_button_background_hover')->section = 'rhea_color_top_cta';
	        $wp_customize->get_setting('zerif_ribbon_button_background_hover')->default = '#fff';

	        $wp_customize->get_control('zerif_ribbon_button_button_color')->section = 'rhea_color_top_cta';
	        $wp_customize->get_setting('zerif_ribbon_button_button_color')->default = '#fff';

	        $wp_customize->get_control('zerif_ribbon_button_button_color_hover')->section = 'rhea_color_top_cta';
	        $wp_customize->get_setting('zerif_ribbon_button_button_color_hover')->default = '#2bb6b6';

	        $wp_customize->add_setting( 'rhea_second_button_top_cta' );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_second_button_top_cta', array(
				'section'  	=> 'rhea_color_top_cta',
				'label'		=> __( 'Second Button Colors', 'rhea' ),
				'priority'	=> 10,
	        ) ) );

	        $wp_customize->add_setting( 'rhea_top_cta_second_button_border', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_border', array(
					'label'      	=> __( 'Border Color', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'settings'   	=> 'rhea_top_cta_second_button_border',
					'priority'		=> 11,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_top_cta_second_button_background', array(
	            'default' => 'rgba( 255,255,255,.0 )' ,
	            'sanitize_callback' => 'zerif_sanitize_rgba'
	        ) );

	        $wp_customize->add_control( new Zerif_Customize_Alpha_Color_Control( $wp_customize, 'rhea_top_cta_second_button_background', array(
	            'label'    => __( 'Background Color', 'rhea' ),
	            'palette' => true,
	            'section'  => 'rhea_color_top_cta',
	            'priority'   => 12
	        ) ) );

	        $wp_customize->add_setting( 'rhea_top_cta_second_button_background_hover', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_background_hover', array(
					'label'      	=> __( 'Background Color on hover', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'priority'		=> 13,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_top_cta_second_button_text', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_text', array(
					'label'      	=> __( 'Text Color', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'priority'		=> 14,
				) ) 
			);

			$wp_customize->add_setting( 'rhea_top_cta_second_button_text_hover', array(
	            'default' 			=> '#FFF',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_text_hover', array(
					'label'      	=> __( 'Text Color on hover', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'priority'		=> 15,
				) ) 
			);

		}else{
			$wp_customize->remove_panel('panel_ribbons');

			$wp_customize->get_section('zerif_bottomribbon_section')->panel = '';
			$wp_customize->get_section('zerif_bottomribbon_section')->title = 'Top CTA Section';
			$wp_customize->get_section('zerif_bottomribbon_section')->priority = 33;

			// Top CTA sections
			// Section Title
			$wp_customize->get_control('zerif_bottomribbon_text')->label = __('Title','rhea');
		}
		

		// Subtitle Section
		$wp_customize->add_setting( 'rhea_top_cta_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default' => __('We love to work with startups because they are as passionate as we are about their products.','rhea'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_top_cta_text', array(
			'type'    => 'textarea',
			'label'   => __( 'Description', 'rhea' ),
			'section' => $bottom_button_ribbon,
			'priority' => 1
		));

		/* button label */
		$wp_customize->add_setting( 'rhea_second_button_label', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'rhea_second_button_label', array(
			'label'    => __( 'Second button label', 'rhea' ),
			'section'  => $bottom_button_ribbon,
			'priority'    => 4,
		));

		/* button link */
		$wp_customize->add_setting( 'rhea_second_button_link', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'rhea_second_button_link', array(
			'label'    => __( 'Second button link', 'rhea' ),
			'section'  => $bottom_button_ribbon,
			'priority'    => 5,
		));

		if ( $currentThemeName != 'Zerif PRO' ) {
			$wp_customize->get_section('zerif_rightribbon_section')->panel = '';
			$wp_customize->get_section('zerif_rightribbon_section')->title = 'Bottom CTA Section';
			$wp_customize->get_section('zerif_rightribbon_section')->priority = 36;

			// About us Section
			$wp_customize->get_section('zerif_aboutus_main_section')->title = 'Content';
		}
		
		$wp_customize->remove_setting('zerif_aboutus_title');
		$wp_customize->remove_control('zerif_aboutus_title');
		$wp_customize->remove_setting('zerif_aboutus_subtitle');
		$wp_customize->remove_control('zerif_aboutus_subtitle');
		$wp_customize->remove_setting('zerif_aboutus_biglefttitle');
		$wp_customize->remove_control('zerif_aboutus_biglefttitle');
		$wp_customize->remove_setting('zerif_aboutus_text');
		$wp_customize->remove_control('zerif_aboutus_text');

		$wp_customize->add_setting( 'rhea_about_us_left_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default'	=> __( 'We do', 'rhea' ),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_about_us_left_title', array(
			'label'    => __( 'Left Title', 'rhea' ),
			'section'  => $about_us_section,
			'priority'    => 1,
		));

		$wp_customize->add_setting( 'rhea_about_us_left_title_highlight', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default'	=> __( 'big things', 'rhea' ),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_about_us_left_title_highlight', array(
			'label'    => __( 'Left title highlighted', 'rhea' ),
			'section'  => $about_us_section,
			'priority'    => 5,
		));

		$wp_customize->add_setting( 'rhea_about_us_left_side_description', array( 
			'sanitize_callback' => 'zerif_sanitize_text', 
			'default' => __('We love to work with startups because they are as passionate as we are about their products. Whether you need a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.','rhea'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_about_us_left_side_description', array(
			'type'    => 'textarea',
			'label'   => __( 'Left Side Description', 'rhea' ),
			'section' => $about_us_section,
			'priority' => 10
		));

		$wp_customize->add_setting( 'rhea_about_us_clients_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default'	=> __( 'OUR HAPPY CLIENTS', 'rhea' ),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_about_us_clients_title', array(
			'label'    => __( 'Clients Title', 'rhea' ),
			'section'  => $clients_section,
			'priority'    => 15,
		));

		$wp_customize->add_setting( 'rhea_about_us_clients_description', array( 
			'sanitize_callback' => 'zerif_sanitize_text', 
			'default' => __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.','rhea'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_about_us_clients_description', array(
			'type'    => 'textarea',
			'label'   => __( 'Clients Description', 'rhea' ),
			'section' => $clients_section,
			'priority' => 20
		));
		
		// Remove Footer Fields
		$wp_customize->remove_section('zerif_general_footer_section');
		
		$wp_customize->remove_setting('zerif_address_icon');
		$wp_customize->remove_control('zerif_address_icon');

		$wp_customize->remove_setting('zerif_address');
		$wp_customize->remove_control('zerif_address');

		$wp_customize->remove_setting('zerif_phone_icon');
		$wp_customize->remove_control('zerif_phone_icon');

		$wp_customize->remove_setting('zerif_phone');
		$wp_customize->remove_control('zerif_phone');

		$wp_customize->remove_setting('zerif_email_icon');
		$wp_customize->remove_control('zerif_email_icon');

		$wp_customize->remove_setting('zerif_email');
		$wp_customize->remove_control('zerif_email');


		// PRO
		if ( $currentThemeName == 'Zerif PRO' ) {
			$wp_customize->get_setting('zerif_portofolio_box_underline_color')->default = '#2bb6b6';

			// Footer
			$wp_customize->get_setting('zerif_footer_background')->default = 'rgb(35, 40, 45)';

			$wp_customize->remove_setting('zerif_footer_socials_background');
			$wp_customize->remove_control('zerif_footer_socials_background');
			
			$wp_customize->remove_setting('zerif_footer_text_color');
			$wp_customize->remove_control('zerif_footer_text_color');

			$wp_customize->remove_setting('zerif_footer_text_color_hover');
			$wp_customize->remove_control('zerif_footer_text_color_hover');

			$wp_customize->get_setting('zerif_footer_socials')->default = '#fff';
			$wp_customize->get_setting('zerif_footer_socials_hover')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_footer_widgets_title')->default = '#404040';
			$wp_customize->get_setting('zerif_footer_widgets_title_border_bottom')->default = '#2bb6b6';

			$wp_customize->add_setting( 'rhea_footer_widgets_background', array(
	            'default' 			=> '#f4f7f9',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_footer_widgets_background', array(
					'label'      	=> __( 'Footer Widgets Background Color', 'rhea' ),
					'section'    	=> 'zerif_footer_color_section',
					'settings'   	=> 'rhea_footer_widgets_background',
					'priority'		=> 6,
				) ) 
			);

			// General Colors
			$wp_customize->get_setting('zerif_menu_item_color')->default = '#fff';
			$wp_customize->get_setting('zerif_menu_item_hover_color')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_titles_bottomborder_color')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_links_color_hover')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_navbar_color')->default = 'rgb(35, 40, 45)';

			// Buttons
			$wp_customize->get_setting('zerif_buttons_background_color')->default = '#2bb6b6';
			$wp_customize->get_setting('zerif_buttons_background_color_hover')->default = '#2bb6b6';

			// Our Team 
			$wp_customize->remove_setting('zerif_ourteam_1box');
			$wp_customize->remove_control('zerif_ourteam_1box');

			$wp_customize->remove_setting('zerif_ourteam_2box');
			$wp_customize->remove_control('zerif_ourteam_2box');

			$wp_customize->remove_setting('zerif_ourteam_3box');
			$wp_customize->remove_control('zerif_ourteam_3box');

			$wp_customize->remove_setting('zerif_ourteam_4box');
			$wp_customize->remove_control('zerif_ourteam_4box');

			$wp_customize->remove_setting('zerif_ourteam_text');
			$wp_customize->remove_control('zerif_ourteam_text');

			$wp_customize->remove_setting('zerif_ourteam_hover_background');
			$wp_customize->remove_control('zerif_ourteam_hover_background');

			$wp_customize->get_setting('zerif_ourteam_background')->default = '#f4f7f9';
			$wp_customize->get_setting('zerif_ourteam_socials_hover')->default = '#2bb6b6';

			// Testimonials
			$wp_customize->get_setting('zerif_testimonials_background')->default = '#fff';
			$wp_customize->get_setting('zerif_testimonials_header')->default = '#404040';
			$wp_customize->get_setting('zerif_testimonials_text')->default = '#777777';
			$wp_customize->get_setting('zerif_testimonials_author')->default = '#404040';
			$wp_customize->get_setting('zerif_testimonials_box_color')->default = '#f4f7f9';

			$wp_customize->remove_setting('zerif_testimonials_quote');
			$wp_customize->remove_control('zerif_testimonials_quote');

			// Clients
			$wp_customize->remove_setting('zerif_aboutus_clients_title_text');
			$wp_customize->remove_control('zerif_aboutus_clients_title_text');

			// Bottom CTA Section
			$wp_customize->get_panel('panel_9')->title = __('Bottom CTA Section','rhea');
			$wp_customize->get_section('zerif_rightbribbon_section')->title = __('Content','rhea');

			$wp_customize->add_section( 'rhea_color_bottom_cta' , array(
	            'title'       => __( 'Colors', 'rhea' ),
	            'priority'    => 2,
	            'panel' => 'panel_9'
	        ));

	        $wp_customize->get_control('zerif_ribbonright_background')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_setting('zerif_ribbonright_background')->default = '#2bb6b6';

	        $wp_customize->get_control('zerif_ribbonright_text_color')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_setting('zerif_ribbonright_text_color')->default = '#fff';

	        $wp_customize->get_control('zerif_ribbonright_button_background')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_setting('zerif_ribbonright_button_background')->default = 'rgba(255,255,255,.0)';

	        $wp_customize->get_control('zerif_ribbonright_button_background_hover')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_setting('zerif_ribbonright_button_background_hover')->default = '#fff';

	        $wp_customize->get_control('zerif_ribbonright_button_button_color')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_setting('zerif_ribbonright_button_button_color')->default = '#fff';

	        $wp_customize->get_control('zerif_ribbonright_button_button_color_hover')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_setting('zerif_ribbonright_button_button_color_hover')->default = '#2bb6b6';

	        $wp_customize->add_setting( 'rhea_bottom_cta_button_border', array(
	            'default' 			=> '#FFF',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );

	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_bottom_cta_button_border', array(
					'label'      	=> __( 'Border Color', 'rhea' ),
					'section'    	=> 'rhea_color_bottom_cta',
					'priority'		=> 14,
				) ) 
			);

		}
		


	}
}