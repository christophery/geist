<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

$blog_name = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
?>

<nav class="site-nav">
    <div class="site-nav-left">
        <?php if( !is_home() ){ ?>
            <?php if( $custom_logo_id ){ ?>
                <a class="site-nav-logo" href="<?php echo home_url(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php echo $blog_name; ?>" /></a>
            <?php }else{ ?>
                <a class="site-nav-logo" href="<?php echo home_url(); ?>"><?php echo $blog_name; ?></a>
            <?php } ?>
        <?php } ?>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_class'     => 'nav',
            'depth'          => 1
        ) );
        ?>
    </div>
    <div class="site-nav-right">
        <div class="social-links">
            <?php if ( get_theme_mod( 'geist_social_facebook') ){ ?>
                <a class="social-link social-link-fb" href="<?php echo esc_url( get_theme_mod( 'geist_social_facebook') ); ?>" title="<?php _e( 'Facebook', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/facebook'); ?></a>
            <?php } ?>
            <?php if ( get_theme_mod( 'geist_social_twitter') ){ ?>
                <a class="social-link social-link-tw" href="<?php echo esc_url( get_theme_mod( 'geist_social_twitter') ); ?>" title="<?php _e( 'Twitter', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/twitter'); ?></a>
            <?php } ?>
        </div>
        <a class="rss-button" href="<?php bloginfo('rss_url'); ?>" title="RSS" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/rss'); ?></a>
    </div>
</nav>
