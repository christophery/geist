   <!-- {{!-- The footer at the very bottom of the screen --}} -->
        <footer class="site-footer outer">
            <div class="site-footer-content inner">
                <section class="copyright"><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a> &copy; <?php echo date("Y"); ?></section>
                <nav class="site-footer-nav">
                    <a href="<?php echo home_url(); ?>">Latest Posts</a>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'geist' ) ); ?>" target="_blank" rel="noopener">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Powered by %s', 'geist' ), 'WordPress' );
                        ?>
                    </a>
                </nav>
            </div>
        </footer>

    </div>

    <?php wp_footer(); ?>

</body>
</html>