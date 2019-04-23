/* ------------------------------------------------------------

This is a development JS file which is built to a minified
production file in built/customizer.js

*/

/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header menu color
    wp.customize( 'geist_header_menu_color', function( value ) {
        value.bind( function( to ) {
            $( '.nav li a' ).css( 'color', to );
        } );
    });

    // Header Image Overlay
    wp.customize( 'geist_header_image_overlay', function( value ) {
        value.bind( function( to ) {
            $( '.site-header:before' ).css( 'background', 'rgba(0,0,0,' + to + ')' );
        } );
    });
} )( jQuery );
