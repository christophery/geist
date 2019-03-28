   <!-- {{!-- The footer at the very bottom of the screen --}} -->
        <footer class="site-footer outer">
            <div class="site-footer-content inner">
                <section class="copyright"><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a> &copy; <?php echo date("Y"); ?></section>
                <nav class="site-footer-nav">
                    <a href="<?php echo home_url(); ?>">Latest Posts</a>
                    <?php if ( get_theme_mod( 'geist_social_facebook') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_facebook') ); ?>" target="_blank" rel="noopener"><?php _e( 'Facebook', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_twitter') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_facebook') ); ?>" target="_blank" rel="noopener"><?php _e( 'Twitter', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_instagram') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_instagram') ); ?>" target="_blank" rel="noopener"><?php _e( 'Instagram', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_youtube') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_youtube') ); ?>" target="_blank" rel="noopener"><?php _e( 'YouTube', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_github') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_github') ); ?>" target="_blank" rel="noopener"><?php _e( 'GitHub', 'geist' ); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'geist_social_linkedin') ){ ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'geist_social_linkedin') ); ?>" target="_blank" rel="noopener"><?php _e( 'LinkedIn', 'geist' ); ?></a>
                    <?php } ?>
                    <a href="<?php echo esc_url( __( 'https://chrisyee.ca', 'geist' ) ); ?>" target="_blank" rel="noopener">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Geist by Chris Yee', 'geist' ), 'WordPress' );
                        ?>
                    </a>
                </nav>
            </div>
        </footer>

    </div>

    <?php wp_footer(); ?>

</body>
</html>