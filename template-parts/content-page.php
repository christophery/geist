<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geist
 */

?>

<!-- {{!-- The big featured header, it uses blog cover image as a BG if available --}} -->
<header class="site-header outer">
    <div class="inner">
        <?php get_template_part('template-parts/site-nav'); ?>
    </div>
</header>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <article class="post-full
            <?php if ( has_post_thumbnail() == false ) { ?>
                no-image
            <?php } ?>
        ">

            <header class="post-full-header">
                <h1 class="post-full-title"><?php echo get_the_title();?></h1>
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

        </article>

    </div>
</main>