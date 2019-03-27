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
$author_id = get_the_author_meta( 'ID' );

//get avatar
$author_avatar = get_avatar( $author_id, 100, '', '', $args = array( 'class' => 'author-profile-image' ) );

//get author bio
$author_bio = get_the_author_meta( 'description' );

//get author website
$author_website = get_the_author_meta( 'user_url' );

//get number of posts by author
$author_post_count = count_user_posts($author_id);
?>

<?php get_template_part('template-parts/header'); ?>
    <div class="inner">
        <?php get_template_part('template-parts/site-nav'); ?>
        <div class="site-header-content">
            <?php if( $author_avatar ){ ?>
                <?php echo $author_avatar; ?>
            <?php } ?>
            <h1 class="site-title"><?php the_author(); ?></h1>
            <?php if( $author_bio ){ ?>
                <h2 class="author-bio"><?php echo $author_bio; ?></h2>
            <?php } ?>
            <div class="author-meta">
                <div class="author-stats">
                    <?php
                    if( $author_post_count > 1 ){
                        printf( esc_html__( '%d posts', 'geist' ), $author_post_count );
                    }else if( $author_post_count == 1 ){
                        printf( esc_html__( '%d post', 'geist' ), $author_post_count );
                    }else{
                        echo __( 'No posts', 'geist' );
                        printf( __( 'No posts', 'geist' ) );
                    }
                    ?>
                    <span class="bull">&bull;</span>
                </div>
                <?php if( $author_website ){ ?>
                    <a class="social-link social-link-wb" href="<?php echo $author_website; ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/website'); ?></a>
                <?php } ?>
                <a class="social-link social-link-rss" href="<?php bloginfo('rss_url'); ?>" target="_blank" rel="noopener"><?php get_template_part('template-parts/icons/rss'); ?></a>
            </div>
        </div>
    </div>
</header>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <div class="post-feed">
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