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
			$right_ribbon = 'zerif_rightbribbon_section';
		}else{
			$hero_panel = 'panel_big_title';
			$focus_panel = 'sidebar-widgets-sidebar-ourfocus';
			$hero_text_section = 'zerif_bigtitle_section';
			$bottom_button_ribbon = 'zerif_bottomribbon_section';
			$about_us_section = 'zerif_aboutus_main_section';
			$clients_section = 'zerif_aboutus_main_section';
			$right_ribbon = 'zerif_rightribbon_section';
		}

		

		$wp_customize->remove_section( 'zerif_parallax_section' );
		$wp_customize->get_section('header_image')->panel = $hero_panel;
		$wp_customize->get_section('header_image')->title = esc_html__( 'Background Image', 'rhea' );
		$wp_customize->get_section('header_image')->priority = 2;

		// Change customize panels' title
		$wp_customize->get_panel($hero_panel)->title = esc_html__("Hero Section", 'rhea');
		

		// Our focus section
		$our_focus_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-ourfocus' );
		if ( ! empty( $our_focus_section ) ) {
			$our_focus_section->title = esc_html__( 'Features Section', 'rhea' );
		}

		$wp_customize->add_setting( 'rhea_parallax_show', array(
			'sanitize_callback' => 'zerif_sanitize_checkbox',
			'default' => 1,
		));

		$wp_customize->add_control( 'rhea_parallax_show', array(
			'type' 		=> 'checkbox',
			'label' 	=> esc_html__('Use parallax effect?','rhea'),
			'section' 	=> 'header_image',
			'priority'	=> 1,
		));
		
		// Hero Section
		if ( $currentThemeName == 'Zerif PRO' ) {
			$wp_customize->get_setting('zerif_bigtitle_title')->default = esc_html__('RHEA IS SUPER AWESOME','rhea');
		}else{
			$wp_customize->get_setting('zerif_bigtitle_title_2')->default = esc_html__('RHEA IS SUPER AWESOME','rhea');
		}

		// Left Button
		if ( $currentThemeName == 'Zerif PRO' ) {
			$wp_customize->get_setting('zerif_bigtitle_redbutton_label')->default = esc_html__('Explore','rhea');
			$wp_customize->get_control('zerif_bigtitle_redbutton_label')->label = esc_html__('Left Button Label','rhea');
		}else{
			$wp_customize->get_setting('zerif_bigtitle_redbutton_label_2')->default = esc_html__('Explore','rhea');
			$wp_customize->get_control('zerif_bigtitle_redbutton_label_2')->label = esc_html__('Left Button Label','rhea');
		}
		

		$wp_customize->get_setting('zerif_bigtitle_redbutton_url')->default = esc_url('#focus');
		$wp_customize->get_control('zerif_bigtitle_redbutton_url')->label = esc_html__('Left Button URL','rhea');

		// Right Button
		$wp_customize->get_setting('zerif_bigtitle_greenbutton_label')->default = esc_html__('See Pro Version','rhea');
		$wp_customize->get_control('zerif_bigtitle_greenbutton_label')->label = esc_html__('Right Button Label','rhea');

		$wp_customize->get_setting('zerif_bigtitle_greenbutton_url')->default = esc_url('#focus');
		$wp_customize->get_control('zerif_bigtitle_greenbutton_url')->label = esc_html__('Right Button URL','rhea');

		

		$wp_customize->add_setting( 'rhea_description', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default' => esc_html__('And is build on <u>Zerif Lite</u> the most popular one page theme from WordPress.org','rhea'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_description', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Description', 'rhea' ),
			'section' => $hero_text_section,
			'priority' => 2
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_description', array(
			'selector' => 'header#home .intro-description',
		) );

		$wp_customize->remove_section( 'zerif_aboutus_feat1_section' );
		$wp_customize->remove_section( 'zerif_aboutus_feat2_section' );
		$wp_customize->remove_section( 'zerif_aboutus_feat3_section' );
		$wp_customize->remove_section( 'zerif_aboutus_feat4_section' );

		// $wp_customize->remove_panel('panel_ribbons');

		if ( $currentThemeName != 'Zerif PRO' ) {

			$wp_customize->get_section($bottom_button_ribbon)->panel = 'zerif_frontpage_sections_panel';
			$wp_customize->get_section($bottom_button_ribbon)->title = esc_html__('Top CTA Section', 'rhea');
			$wp_customize->get_section($bottom_button_ribbon)->priority = 31;

			$wp_customize->get_section($right_ribbon)->panel = 'zerif_frontpage_sections_panel';
			$wp_customize->get_section($right_ribbon)->title = esc_html__('Bottom CTA Section', 'rhea');
			$wp_customize->get_section($right_ribbon)->priority = 34;

		}

		// Top CTA sections
		// Section Title
		if ( $wp_customize->get_control('zerif_bottomribbon_text') ) {

			$wp_customize->get_control('zerif_bottomribbon_text')->label = esc_html__('Title','rhea');
			$wp_customize->selective_refresh->add_partial( 'zerif_bottomribbon_text', array(
				'selector' => '#ribbon_bottom .section-header .dark-text',
			) );

		}
		
		if ( $wp_customize->get_control('zerif_bottomribbon_buttonlabel') ) {

			$wp_customize->selective_refresh->add_partial( 'zerif_bottomribbon_buttonlabel', array(
				'selector' => '#ribbon_bottom .button-container .fill-button',
			) );

		}

		// Subtitle Section
		$wp_customize->add_setting( 'rhea_top_cta_text', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'default' => esc_html__('We love to work with startups because they are as passionate as we are about their products.','rhea'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'rhea_top_cta_text', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Description', 'rhea' ),
			'section' => $bottom_button_ribbon,
			'priority' => 1
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_top_cta_text', array(
			'selector' => '#ribbon_bottom .section-header .section-legend',
		) );

		/* button label */
		$wp_customize->add_setting( 'rhea_second_button_label', array(
			'sanitize_callback' => 'zerif_sanitize_input',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'rhea_second_button_label', array(
			'label'    => esc_html__( 'Second button label', 'rhea' ),
			'section'  => $bottom_button_ribbon,
			'priority'    => 4,
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_second_button_label', array(
			'selector' => '#ribbon_bottom .button-container .outline-btn',
		) );

		/* button link */
		$wp_customize->add_setting( 'rhea_second_button_link', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'rhea_second_button_link', array(
			'label'    => esc_html__( 'Second button link', 'rhea' ),
			'section'  => $bottom_button_ribbon,
			'priority'    => 5,
		));

		// Bottom CTA
		if ( $wp_customize->get_control('zerif_ribbonright_text') ) {

			$wp_customize->selective_refresh->add_partial( 'zerif_ribbonright_text', array(
				'selector' => '#ribbon_right h3.white-text',
			) );

		}

		if ( $wp_customize->get_control('zerif_ribbonright_buttonlabel') ) {

			$wp_customize->selective_refresh->add_partial( 'zerif_ribbonright_buttonlabel', array(
				'selector' => '#ribbon_right a.outline-btn',
			) );

		}

		// Latest News
		if ( $wp_customize->get_control('zerif_latestnews_title') ) {

			$wp_customize->selective_refresh->add_partial( 'zerif_latestnews_title', array(
				'selector' => '#latestnews .section-header .dark-text',
			) );

		}

		if ( $wp_customize->get_control('zerif_latestnews_subtitle') ) {

			$wp_customize->selective_refresh->add_partial( 'zerif_latestnews_subtitle', array(
				'selector' => '#latestnews .section-header .section-legend',
			) );

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
			'default'	=> esc_html__( 'We do', 'rhea' ),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'rhea_about_us_left_title', array(
			'label'    => esc_html__( 'Left Title', 'rhea' ),
			'section'  => $about_us_section,
			'priority'    => 1,
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_about_us_left_title', array(
			'selector' => '#aboutus .about-us-left-title .normal',
		) );

		$wp_customize->add_setting( 'rhea_about_us_left_title_highlight', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default'	=> esc_html__( 'big things', 'rhea' ),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'rhea_about_us_left_title_highlight', array(
			'label'    => esc_html__( 'Left title highlighted', 'rhea' ),
			'section'  => $about_us_section,
			'priority'    => 5,
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_about_us_left_title_highlight', array(
			'selector' => '#aboutus .about-us-left-title .colored',
		) );

		$wp_customize->add_setting( 'rhea_about_us_left_side_description', array( 
			'sanitize_callback' => 'zerif_sanitize_text', 
			'default' => esc_html__('We love to work with startups because they are as passionate as we are about their products. Whether you need a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.','rhea'),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'rhea_about_us_left_side_description', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Left Side Description', 'rhea' ),
			'section' => $about_us_section,
			'priority' => 10
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_about_us_left_side_description', array(
			'selector' => '#aboutus .about-us-left-description',
		) );

		$wp_customize->add_setting( 'rhea_about_us_clients_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default'	=> esc_html__( 'OUR HAPPY CLIENTS', 'rhea' ),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'rhea_about_us_clients_title', array(
			'label'    => esc_html__( 'Clients Title', 'rhea' ),
			'section'  => $clients_section,
			'priority'    => 15,
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_about_us_clients_title', array(
			'selector' => '.clients .custom-clients > h2',
		) );

		$wp_customize->add_setting( 'rhea_about_us_clients_description', array( 
			'sanitize_callback' => 'zerif_sanitize_text', 
			'default' => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.','rhea'),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'rhea_about_us_clients_description', array(
			'type'    => 'textarea',
			'label'   => esc_html__( 'Clients Description', 'rhea' ),
			'section' => $clients_section,
			'priority' => 20
		));
		$wp_customize->selective_refresh->add_partial( 'rhea_about_us_clients_description', array(
			'selector' => '.clients .custom-clients > p',
		) );
		
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

		$wp_customize->remove_setting('zerif_contactus_email');
		$wp_customize->remove_control('zerif_contactus_email');

		$wp_customize->remove_setting('zerif_contactus_button_label');
		$wp_customize->remove_control('zerif_contactus_button_label');

		// Change PRO defaults
		if ( $currentThemeName == 'Zerif PRO' ) {

			// Features Section
			$wp_customize->add_setting( 'zerif_ourfocus_box_icon_color', array(
	            'default' => '#2bb6b6',
	            'transport' => 'postMessage',
	            'sanitize_callback' => 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zerif_ourfocus_box_icon_color', array(
	            'label'      => esc_html__( 'Box icon color', 'rhea' ),
	            'section'    => 'zerif_ourfocus_colors_section',
	            'priority'   => 2
	        ) ) );
	        $wp_customize->get_control('zerif_ourfocus_1box')->label = esc_html__( 'Box Background', 'rhea' );

	        $wp_customize->remove_setting('zerif_ourfocus_2box');
			$wp_customize->remove_control('zerif_ourfocus_2box');
			$wp_customize->remove_setting('zerif_ourfocus_3box');
			$wp_customize->remove_control('zerif_ourfocus_3box');
			$wp_customize->remove_setting('zerif_ourfocus_4box');
			$wp_customize->remove_control('zerif_ourfocus_4box');

			// About US
			$wp_customize->remove_section( 'zerif_aboutus_feature1_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feature2_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feature3_section' );
			$wp_customize->remove_section( 'zerif_aboutus_feature4_section' );
			// Colors
			$wp_customize->add_setting( 'rhea_left_side_headline', array(
	        	'sanitize_callback' => 'sanitize_text_field'
	        	) );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_left_side_headline', array(
				'section'  	=> 'zerif_aboutus_colors_section',
				'label'		=> esc_html__( 'Left Side Colors', 'rhea' ),
				'priority'	=> 1,
	        ) ) );
            $wp_customize->add_setting( 'rhea_left_side_background_color', array(
	            'default' 			=> '#f4f7f9',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_left_side_background_color', array(
					'label'      	=> esc_html__( 'Background Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Title Text Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Highlight Text Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Highlight Background Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Description Text Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Progres Bar Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_left_side_progressbar_color',
					'priority'		=> 1,
				) ) 
			);
			$wp_customize->add_setting( 'rhea_right_side_headline', array(
	        	'sanitize_callback' => 'sanitize_text_field'
	        	) );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_right_side_headline', array(
				'section'  	=> 'zerif_aboutus_colors_section',
				'label'		=> esc_html__( 'Right Side Colors', 'rhea' ),
				'priority'	=> 2,
	        ) ) );
	        $wp_customize->get_control('zerif_aboutus_background')->priority = 3;
			$wp_customize->get_setting('zerif_aboutus_background')->default = '#FFFFFF';
			$wp_customize->add_setting( 'rhea_right_side_icon_color', array(
	            'default' 			=> '#777',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_right_side_icon_color', array(
					'label'      	=> esc_html__( 'Icon Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Title Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Subtitle & Description Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_right_side_description_color',
					'priority'		=> 3,
				) ) 
			);
			$wp_customize->remove_setting('zerif_aboutus_number_color');
			$wp_customize->remove_control('zerif_aboutus_number_color');
			$wp_customize->add_setting( 'rhea_clients_headline', array(
	        	'sanitize_callback' => 'sanitize_text_field'
	        	) );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_clients_headline', array(
				'section'  	=> 'zerif_aboutus_colors_section',
				'label'		=> esc_html__( 'Clients Section', 'rhea' ),
				'priority'	=> 4,
	        ) ) );
	        $wp_customize->remove_control('zerif_aboutus_clients_color');
			$wp_customize->remove_setting('zerif_aboutus_clients_color');
			$wp_customize->add_setting( 'rhea_clients_title_color', array(
	            'default' 			=> '#404040',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_clients_title_color', array(
					'label'      	=> esc_html__( 'Title Color', 'rhea' ),
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
					'label'      	=> esc_html__( 'Description Color', 'rhea' ),
					'section'    	=> 'zerif_aboutus_colors_section',
					'settings'   	=> 'rhea_clients_description_color',
					'priority'		=> 5,
				) ) 
			);


			// Ribbons
			$wp_customize->add_panel( 'panel_top_cta', array(
	            'priority' => 33,
	            'capability' => 'edit_theme_options',
	            'theme_supports' => '',
	            'title' => esc_html__( 'Top CTA Section', 'rhea' )
	        ) );
	        $wp_customize->add_section( 'rhea_color_top_cta' , array(
	            'title'       => esc_html__( 'Colors', 'rhea' ),
	            'priority'    => 2,
	            'panel' => 'panel_top_cta'
	        ));
	        $wp_customize->get_section('zerif_bottombribbon_section')->panel = 'panel_top_cta';
	        $wp_customize->get_section('zerif_bottombribbon_section')->title = esc_html__('Content','rhea');
	        // Colors
	        $wp_customize->add_setting( 'rhea_first_button_top_cta', array(
	        	'sanitize_callback' => 'sanitize_text_field'
	        	) );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_first_button_top_cta', array(
				'section'  	=> 'rhea_color_top_cta',
				'label'		=> esc_html__( 'First Button Colors', 'rhea' ),
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
	        $wp_customize->add_setting( 'rhea_second_button_top_cta', array(
	        	'sanitize_callback' => 'sanitize_text_field'
	        	) );
	        $wp_customize->add_control( new Rhea_Content_Control( $wp_customize, 'rhea_second_button_top_cta', array(
				'section'  	=> 'rhea_color_top_cta',
				'label'		=> esc_html__( 'Second Button Colors', 'rhea' ),
				'priority'	=> 10,
	        ) ) );
	        $wp_customize->add_setting( 'rhea_top_cta_second_button_border', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_border', array(
					'label'      	=> esc_html__( 'Border Color', 'rhea' ),
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
	            'label'    => esc_html__( 'Background Color', 'rhea' ),
	            'palette' => true,
	            'section'  => 'rhea_color_top_cta',
	            'priority'   => 12
	        ) ) );
	        $wp_customize->add_setting( 'rhea_top_cta_second_button_background_hover', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_background_hover', array(
					'label'      	=> esc_html__( 'Background Color on hover', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'priority'		=> 13,
				) ) 
			);
			$wp_customize->add_setting( 'rhea_top_cta_second_button_text', array(
	            'default' 			=> '#2bb6b6',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_text', array(
					'label'      	=> esc_html__( 'Text Color', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'priority'		=> 14,
				) ) 
			);
			$wp_customize->add_setting( 'rhea_top_cta_second_button_text_hover', array(
	            'default' 			=> '#FFF',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_top_cta_second_button_text_hover', array(
					'label'      	=> esc_html__( 'Text Color on hover', 'rhea' ),
					'section'    	=> 'rhea_color_top_cta',
					'priority'		=> 15,
				) ) 
			);

			// Bottom Ribbon
			$wp_customize->add_section( 'rhea_color_bottom_cta' , array(
	            'title'       => esc_html__( 'Colors', 'rhea' ),
	            'priority'    => 2,
	            'panel' => 'panel_9'
	        ));
	        $wp_customize->get_control('zerif_ribbonright_background')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_control('zerif_ribbonright_text_color')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_control('zerif_ribbonright_button_background')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_control('zerif_ribbonright_button_background_hover')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_control('zerif_ribbonright_button_button_color')->section = 'rhea_color_bottom_cta';
	        $wp_customize->get_control('zerif_ribbonright_button_button_color_hover')->section = 'rhea_color_bottom_cta';

			// Footer
			$wp_customize->remove_setting('zerif_footer_socials_background');
			$wp_customize->remove_control('zerif_footer_socials_background');
			
			$wp_customize->remove_setting('zerif_footer_text_color');
			$wp_customize->remove_control('zerif_footer_text_color');
			$wp_customize->remove_setting('zerif_footer_text_color_hover');
			$wp_customize->remove_control('zerif_footer_text_color_hover');

			$wp_customize->add_setting( 'rhea_footer_widgets_background', array(
	            'default' 			=> '#f4f7f9',
	            'sanitize_callback'	=> 'sanitize_hex_color'
	        ) );
	        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rhea_footer_widgets_background', array(
					'label'      	=> esc_html__( 'Footer Widgets Background Color', 'rhea' ),
					'section'    	=> 'zerif_footer_color_section',
					'settings'   	=> 'rhea_footer_widgets_background',
					'priority'		=> 6,
				) ) 
			);

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

			// Testimonials
			$wp_customize->remove_setting('zerif_testimonials_quote');
			$wp_customize->remove_control('zerif_testimonials_quote');

			// Bottom CTA Section
			$wp_customize->get_panel('panel_9')->title = esc_html__('Bottom CTA Section','rhea');
			$wp_customize->get_section('zerif_rightbribbon_section')->title = esc_html__('Content','rhea');
			$wp_customize->add_section( 'rhea_color_bottom_cta' , array(
	            'title'       => esc_html__( 'Colors', 'rhea' ),
	            'priority'    => 2,
	            'panel' => 'panel_9'
	        ));

		}


		// Upsell
		if ( $wp_customize->get_control('zerif_theme_info_main_control') ) {
			$wp_customize->get_control('zerif_theme_info_main_control')->button_url = esc_url_raw( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/?ref=7987&campaign=customizer' );
		}

		if ( $wp_customize->get_control('zerif_theme_info_colors_section_control') ) {
			$wp_customize->get_control('zerif_theme_info_colors_section_control')->button_url = esc_url_raw( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/?ref=7987&campaign=customizer' );
		}

		if ( $wp_customize->get_control('zerif_theme_info_header_section_control') ) {
			$wp_customize->get_control('zerif_theme_info_header_section_control')->button_url = esc_url_raw( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/?ref=7987&campaign=customizer' );
		}

		if ( $wp_customize->get_section('zerif-upsell-frontpage-sections') ) {
			$wp_customize->get_section('zerif-upsell-frontpage-sections')->button_url = esc_url( 'https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/?ref=7987' );
		}

	}
}