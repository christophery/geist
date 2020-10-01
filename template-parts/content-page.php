<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geist
 */

?>

<!-- The big featured header, it uses blog cover image as a BG if available -->
<header class="site-header outer">
    <div class="inner">
        <?php get_template_part('template-parts/site-nav'); ?>
    </div>
</header>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <article <?php !has_post_thumbnail() ? post_class('post-full no-image') : post_class('post-full'); ?>>

            <header class="post-full-header">
                <?php the_title( '<h1 class="post-full-title">', '</h1>' ); ?>
            </header>

            <?php if ( has_post_thumbnail() ) { ?>
            <figure class="post-full-image">
                <?php the_post_thumbnail('medium_large',array('class' => 'feature_image')); ?>
            </figure>
            <?php } ?>

            <section class="post-full-content">
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </section>

            <section class="post-full-comments">
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </section>

        </article>

    </div>
</main>