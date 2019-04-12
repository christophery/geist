<?php
$geist_custom_logo_id = get_theme_mod( 'custom_logo' );
$geist_image = wp_get_attachment_image_src( $geist_custom_logo_id , 'full' );

$geist_blog_name = get_bloginfo( 'name' );
?>

<nav class="site-nav">
    <div class="site-nav-left">
        <?php if( !is_home() ){ ?>
            <?php if( $geist_custom_logo_id ){ ?>
                <a class="site-nav-logo" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( $geist_image[0] ); ?>" alt="<?php echo esc_html( $geist_blog_name ); ?>" /></a>
            <?php }else{ ?>
                <a class="site-nav-logo" href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( $geist_blog_name ); ?></a>
            <?php } ?>
        <?php } ?>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'nav',
            'depth'          => 1
        ) );
        ?>
    </div>
    <div class="site-nav-right">
        <div class="social-links">
            <?php if ( get_theme_mod( 'geist_social_facebook') ){ ?>
                <a class="social-link social-link-fb" href="<?php echo esc_url( get_theme_mod( 'geist_social_facebook') ); ?>" title="<?php esc_html_e( 'Facebook', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/facebook'); ?></a>
            <?php } ?>
            <?php if ( get_theme_mod( 'geist_social_twitter') ){ ?>
                <a class="social-link social-link-tw" href="<?php echo esc_url( get_theme_mod( 'geist_social_twitter') ); ?>" title="<?php esc_html_e( 'Twitter', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/twitter'); ?></a>
            <?php } ?>
            <?php if ( get_theme_mod( 'geist_social_instagram') ){ ?>
                <a class="social-link social-link-instagram" href="<?php echo esc_url( get_theme_mod( 'geist_social_instagram') ); ?>" title="<?php esc_html_e( 'Instagram', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/instagram'); ?></a>
            <?php } ?>
            <?php if ( get_theme_mod( 'geist_social_youtube') ){ ?>
                <a class="social-link social-link-youtube" href="<?php echo esc_url( get_theme_mod( 'geist_social_youtube') ); ?>" title="<?php esc_html_e( 'YouTube', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/youtube'); ?></a>
            <?php } ?>
            <?php if ( get_theme_mod( 'geist_social_github') ){ ?>
                <a class="social-link social-link-github" href="<?php echo esc_url( get_theme_mod( 'geist_social_github') ); ?>" title="<?php esc_html_e( 'GitHub', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/github'); ?></a>
            <?php } ?>
            <?php if ( get_theme_mod( 'geist_social_linkedin') ){ ?>
                <a class="social-link social-link-linkedin" href="<?php echo esc_url( get_theme_mod( 'geist_social_linkedin') ); ?>" title="<?php esc_html_e( 'LinkedIn', 'geist' ); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/linkedin'); ?></a>
            <?php } ?>
        </div>
        <a class="rss-button" href="<?php esc_url( bloginfo('rss_url') ); ?>" title="RSS" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/rss'); ?></a>
        <button class="search-button"><?php esc_html_e( 'Search', 'geist' ); ?></button>
    </div>
</nav>
