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
	        'description' => 'Enter the URL to your account or profile for each service for the icon to appear in the header.',
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
	  			'sanitize_callback' => 'geist_sanitize_uri'
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
	wp_enqueue_script( 'geist-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'geist_customize_preview_js' );


/**
 * Sanitize URIs
 */

function geist_sanitize_uri($uri){
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}