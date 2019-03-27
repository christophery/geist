<?php
/**
 * The template for displaying author pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geist
 */

get_header();

$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 100, '', '', $args = array( 'class' => 'author-profile-image' ) );

$author_bio = get_the_author_meta( 'description' );
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
                <!-- {{#if location}}
                    <div class="author-location">{{location}} <span class="bull">&bull;</span></div>
                {{/if}} -->
                <!-- <div class="author-stats">
                    {{plural ../pagination.total empty='No posts' singular='% post' plural='% posts'}} <span class="bull">&bull;</span>
                </div> -->
                <!-- {{#if website}}
                    <a class="social-link social-link-wb" href="{{website}}" target="_blank" rel="noopener">{{> "icons/website"}}</a>
                {{/if}}
                {{#if twitter}}
                    <a class="social-link social-link-tw" href="{{twitter_url}}" target="_blank" rel="noopener">{{> "icons/twitter"}}</a>
                {{/if}}
                {{#if facebook}}
                    <a class="social-link social-link-fb" href="{{facebook_url}}" target="_blank" rel="noopener">{{> "icons/facebook"}}</a>
                {{/if}} -->
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