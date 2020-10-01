<?php
/**
 * The template for displaying author pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geist
 */

get_header();

//get author ID
$geist_author_id = get_the_author_meta( 'ID' );

//get avatar
$geist_author_avatar = get_avatar( $geist_author_id, 100 );

//get author bio
$geist_author_bio = get_the_author_meta( 'description' );

//get author website
$geist_author_website = get_the_author_meta( 'user_url' );

//get number of posts by author
$geist_author_post_count = count_user_posts( $geist_author_id );
?>

<?php get_template_part('template-parts/header'); ?>
    <div class="inner">
        <?php get_template_part('template-parts/site-nav'); ?>
        <div class="site-header-content">
            <?php if( $geist_author_avatar ){ ?>
                <?php echo $geist_author_avatar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <?php } ?>
            <h1 class="site-title"><?php the_author(); ?></h1>
            <?php if( $geist_author_bio ){ ?>
                <h2 class="author-bio"><?php echo esc_html( $geist_author_bio ); ?></h2>
            <?php } ?>
            <div class="author-meta">
                <div class="author-stats">
                    <?php
                    if( $geist_author_post_count > 1 ){
                        /* translators: %d: number of posts, i.e. 5 posts  */
                        printf( esc_html__( '%d posts', 'geist' ), esc_html( $geist_author_post_count ) );
                    }else if( $geist_author_post_count == 1 ){
                        /* translators: %d: number of posts, i.e. 5 posts  */
                        printf( esc_html__( '%d post', 'geist' ), esc_html ( $geist_author_post_count ) );
                    }else{
                        esc_html_e( 'No posts', 'geist' );
                    }
                    ?>
                    <span class="bull">&bull;</span>
                </div>
                <?php if( $geist_author_website ){ ?>
                    <a class="social-link social-link-wb" href="<?php echo esc_url( $geist_author_website ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Go to the authors website', 'geist' ) ?>"><?php get_template_part('template-parts/icons/website'); ?></a>
                <?php } ?>
                <a class="social-link social-link-rss" href="<?php bloginfo('rss_url'); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Go to the authors RSS feed', 'geist' ) ?>"><?php get_template_part('template-parts/icons/rss'); ?></a>
            </div>
        </div>
    </div>
</header>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <div id="content" class="post-feed">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

            the_posts_navigation();
            ?>
        </div>

    </div>
</main>

<?php
get_footer();