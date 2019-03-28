<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package geist
 */

get_header();
?>

<header class="site-header outer">
    <div class="inner">
        <?php get_template_part('template-parts/site-nav'); ?>
    </div>
</header>

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content-single' );

endwhile; // End of the loop.
?>

<?php
get_footer();