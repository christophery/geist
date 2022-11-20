   <!-- The footer at the very bottom of the screen -->
        <footer class="site-footer outer">
            <div class="site-footer-content inner">
                <section class="copyright"><a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a> &copy; <?php echo esc_html( date("Y") ); ?></section>
                <nav class="site-footer-nav">
                    <a href="<?php echo esc_url( home_url() ); ?>"><?php printf( esc_html__( 'Latest Posts', 'geist' ) ); ?></a>
                    <?php if ( get_theme_mod( 'geist_social_facebook') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_facebook') ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Facebook', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_twitter') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_twitter') ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Twitter', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_instagram') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_instagram') ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Instagram', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_youtube') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_youtube') ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'YouTube', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_github') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_github') ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'GitHub', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_mastodon') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_mastodon') ); ?>" target="_blank" rel="me"><?php esc_html_e( 'Mastodon', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_linkedin') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_linkedin') ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'LinkedIn', 'geist' ); ?></a>
                    <?php } ?>
                    <a href="<?php echo esc_url( __( 'https://chrisyee.ca/geist', 'geist' ) ); ?>" target="_blank" rel="noopener"><?php esc_attr_e( 'Geist by Chris Yee', 'geist' ); ?></a>
                </nav>
            </div>
        </footer>

    </div>

    <div id="search" class="search-overlay">
        <button class="search-overlay-close" aria-label="close search overlay"></button>
        <div class="search-overlay-content">
            <?php get_search_form(); ?>
        </div>
    </div>

    <?php wp_footer(); ?>

</body>
</html>