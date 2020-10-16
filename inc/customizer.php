<?php
/**
 * geist Theme Customizer
 *
 * @package geist
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function geist_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title',
			'render_callback' => 'geist_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'geist_customize_partial_blogdescription',
		) );
	}

	/**
	 * Social Profiles
	 */

	$wp_customize->add_section(
	    'geist_social',
	    array(
	        'title'     => 'Social Profiles',
	        'description' => __( 'Enter the URL to your account or profile for each service for the icon to appear in the header.', 'geist' ),
	        'priority'  => 200
	    )
	);

	$social_profiles = array(
		array(
			'title' => 'Facebook',
			'id' => 'facebook',
			'placeholder' => 'https://facebook.com/username'
		),
		array(
			'title' => 'Twitter',
			'id' => 'twitter',
			'placeholder' => 'https://twitter.com/username'
		),
		array(
			'title' => 'Instagram',
			'id' => 'instagram',
			'placeholder' => 'https://instagram.com/username'
		),
		array(
			'title' => 'YouTube',
			'id' => 'youtube',
			'placeholder' => 'https://youtube.com/username'
		),
		array(
			'title' => 'GitHub',
			'id' => 'github',
			'placeholder' => 'https://github.com/username'
		),
		array(
			'title' => 'LinkedIn',
			'id' => 'linkedin',
			'placeholder' => 'https://linkedin.com/in/username'
		)
	);

	foreach ( $social_profiles as $social_profile ) {

	    $wp_customize->add_setting(
	  		'geist_social_' . $social_profile['id'],
	  		array(
	  			'transport' => 'refresh',
	  			'sanitize_callback' => 'esc_url_raw'
	  		)
	  	);

	  	$wp_customize->add_control(
	  		'geist_social_' . $social_profile['id'],
	  		array(
	  			'section' => 'geist_social',
	  			'label' => $social_profile['title'],
	  			'type' => 'url',
	  			'input_attrs' => array(
	  	            'placeholder' => $social_profile['placeholder'],
	  	        )
	  		)
	  	);

	}

	/**
	 * Header Menu Color
	 */

	$wp_customize->add_setting( 'geist_header_menu_color' , array(
	    'default'     => '#FFF',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'geist_header_menu_color',
	        array(
	            'label'      => __( 'Header Menu Color', 'geist' ),
	            'section'    => 'colors',
	            'settings'   => 'geist_header_menu_color'
	        )
	    )
	);

	/**
	 * Header Image Overlay
	 */

	$wp_customize->add_setting( 'geist_header_image_overlay' , array(
	    'default'     => '0.18',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'geist_sanitize_header_image_overlay'
	) );

	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'geist_header_image_overlay',
	        array(
	        	'type'       => 'number',
	            'label'      => __( 'Image overlay', 'geist' ),
	            'description' => __( 'Adjust the opacity of the header image overlay. (ie: 0.18 is equal to 18%)', 'geist' ),
	            'section'    => 'header_image',
	            'settings'   => 'geist_header_image_overlay',
	            'priority'   => 1,
	            'input_attrs' => array(
	                    'min'   => 0,
	                    'max'   => 1,
	                    'step'  => 0.01,
	                    'placeholder' => '0.18'
	            ),
	        )
	    )
	);

	/**
	 * Dark Mode
	 */

	$wp_customize->add_section(
	    'geist_dark_mode',
	    array(
	        'title'     => 'Dark Mode',
	        'priority'  => 200
	    )
	);

	$wp_customize->add_setting( 'geist_dark_mode_toggle' , array(
	    'default'     => 'light',
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'geist_dark_mode_toggle',
	        array(
	            'label'      => __( 'Appearance', 'geist' ),
	            'description' => __( 'Dark (auto) will automatically adjust the appearance based on the users OS appearance/color preference.', 'geist' ),
	            'section'    => 'geist_dark_mode',
	            'settings'   => 'geist_dark_mode_toggle',
	            'type'    => 'radio',
	            'choices' => array(
                    'light' => 'Light',
                    'auto' => 'Dark (auto)',
                )
	        )
	    )
	);

}
add_action( 'customize_register', 'geist_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function geist_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function geist_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function geist_customize_preview_js() {
	wp_enqueue_script( 'geist-customizer', get_template_directory_uri() . '/built/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'geist_customize_preview_js' );

/**
 * Sanitize header image overlay value
 */
function geist_sanitize_header_image_overlay( $input ) {
	if( $input > 1 ){
		$input == 1;
	}else{
		return filter_var( $input, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
	}
}