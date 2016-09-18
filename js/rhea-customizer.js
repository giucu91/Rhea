( function( $ ) {

	/**********************************************************************************
									Hero Section
	***********************************************************************************/

	wp.customize( 'zerif_bigtitle_show', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '#home' ).css( {
					'display': 'block'
				} );
				$('body').addClass('rhea-front-page');
			} else {
				$( '#home' ).css( {
					'display': 'none'
				} );
				$('body').removeClass('rhea-front-page');
			}
		} );
	} );

	wp.customize( 'rhea_description', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.intro-description' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.intro-description' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.intro-description' ).html( to );
		} );
	} );

	// Hero Left button label
	wp.customize( 'zerif_bigtitle_redbutton_label', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.hero-left-button' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.hero-left-button' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.hero-left-button' ).text( to );
		} );
	} );

	// Hero left button url
	wp.customize( 'zerif_bigtitle_redbutton_url', function( value ) {
		value.bind( function( to ) {
			$( '.hero-left-button' ).attr( 'href', to );
		} );
	} );

	// Hero right button label
	wp.customize( 'zerif_bigtitle_greenbutton_label', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.hero-right-button' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.hero-right-button' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.hero-right-button' ).text( to );
		} );
	} );

	// Hero right button url
	wp.customize( 'zerif_bigtitle_greenbutton_url', function( value ) {
		value.bind( function( to ) {
			$( '.hero-right-button' ).attr( 'href', to );
		} );
	} );


	/**********************************************************************************
									Top CTA Section
	***********************************************************************************/


	// Top CTA Section Title
	wp.customize( 'zerif_bottomribbon_text', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '#ribbon_bottom h2' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '#ribbon_bottom h2' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '#ribbon_bottom h2' ).text( to );
		} );
	} );

	// Top CTA Section Description
	wp.customize( 'rhea_top_cta_text', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '#ribbon_bottom .section-legend' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '#ribbon_bottom .section-legend' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '#ribbon_bottom .section-legend' ).html( to );
		} );
	} );

	// Top CTA Section Left button label
	wp.customize( 'zerif_bottomribbon_buttonlabel', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '#ribbon_bottom .left-button' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '#ribbon_bottom .left-button' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '#ribbon_bottom .left-button' ).text( to );
		} );
	} );

	// Top CTA Section left button url
	wp.customize( 'zerif_bottomribbon_buttonlink', function( value ) {
		value.bind( function( to ) {
			$( '#ribbon_bottom .left-button' ).attr( 'href', to );
		} );
	} );

	// Top CTA Section right button label
	wp.customize( 'rhea_second_button_label', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '#ribbon_bottom .right-button' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '#ribbon_bottom .right-button' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '#ribbon_bottom .right-button' ).text( to );
		} );
	} );

	// Top CTA Section right button url
	wp.customize( 'rhea_second_button_link', function( value ) {
		value.bind( function( to ) {
			$( '#ribbon_bottom .right-button' ).attr( 'href', to );
		} );
	} );


	/**********************************************************************************
									About us Section
	***********************************************************************************/


	wp.customize( 'rhea_about_us_left_title_highlight', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.about-us-left-title .colored' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.about-us-left-title .colored' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.about-us-left-title .colored' ).text( to );
		} );
	} );

	wp.customize( 'rhea_about_us_left_title', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.about-us-left-title .normal' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.about-us-left-title .normal' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.about-us-left-title .normal' ).text( to );
		} );
	} );

	wp.customize( 'rhea_about_us_left_side_description', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.about-us-left-description' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.about-us-left-description' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.about-us-left-description' ).html( to );
		} );
	} );


	/**********************************************************************************
									Clients Section
	***********************************************************************************/


	wp.customize( 'rhea_about_us_clients_title', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.custom-clients > h2' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.custom-clients > h2' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.custom-clients > h2' ).text( to );
		} );
	} );

	wp.customize( 'rhea_about_us_clients_description', function( value ) {
		value.bind( function( to ) {
			if ( to == '' ) {
				$( '.custom-clients > p' ).addClass( 'zerif_hidden_if_not_customizer' );
			}else{
				$( '.custom-clients > p' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			$( '.custom-clients > p' ).html( to );
		} );
	} );


	/**********************************************************************************
									Bottom CTA Section
	***********************************************************************************/



	/* zerif_ribbonright_buttonlabel */
	wp.customize( 'zerif_ribbonright_buttonlabel', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '#ribbon_right a.custom-button' ).removeClass( 'zerif_ribbon_btn_label_blank' );
				if ( ! $( '#ribbon_right a.custom-button' ).hasClass( 'zerif_ribbon_btn_label_blank' ) && ! $( '#ribbon_right a.red-btn' ).hasClass( 'zerif_ribbon_btn_link_blank' )  ) {
					$( '#ribbon_right a.custom-button' ).removeClass( 'zerif_hidden_if_not_customizer' );
					$( '#ribbon_right' ).removeClass( 'ribbon-without-button' );
				}
			}
			else {
				$( '#ribbon_right a.custom-button' ).addClass( 'zerif_hidden_if_not_customizer' );
				$( '#ribbon_right a.custom-button' ).addClass( 'zerif_ribbon_btn_label_blank' );
				$( '#ribbon_right' ).addClass( 'ribbon-without-button' );
			}
			$( '#ribbon_right a.custom-button' ).text( to );
		} );
	} );
	
	/* zerif_ribbonright_buttonlink */
	wp.customize( 'zerif_ribbonright_buttonlink', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '#ribbon_right a.custom-button' ).removeClass( 'zerif_ribbon_btn_link_blank' );
				if ( ! $( '#ribbon_right a.custom-button' ).hasClass( 'zerif_ribbon_btn_label_blank' ) && ! $( '#ribbon_right a.red-btn' ).hasClass( 'zerif_ribbon_btn_link_blank' ) ) {
					$( '#ribbon_right a.custom-button' ).removeClass( 'zerif_hidden_if_not_customizer' );
					$( '#ribbon_right' ).removeClass( 'ribbon-without-button' );
				}
			}
			else {
				$( '#ribbon_right a.custom-button' ).addClass( 'zerif_hidden_if_not_customizer' );
				$( '#ribbon_right a.custom-button' ).addClass( 'zerif_ribbon_btn_link_blank' );
				$( '#ribbon_right' ).addClass( 'ribbon-without-button' );
			}
			$( '#ribbon_right a.custom-button' ).attr( "href", to );
		} );
	} );


})( jQuery );