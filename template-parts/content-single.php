<?php

$geist_categories = get_the_category();

//get name of first category
$geist_category_name = $geist_categories[0]->name;

//get category url
$geist_category_url = get_category_link( $geist_categories[0]->term_id );

?>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <article <?php !has_post_thumbnail() ? post_class('post-full no-image') : post_class('post-full'); ?>>

            <header class="post-full-header">
                <section class="post-full-meta">
                    <time class="post-full-meta-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                    <span class='date-divider'>/</span>
                    <a href='<?php echo esc_url( $geist_category_url ); ?>'><?php echo esc_html( $geist_category_name ); ?></a>
                </section>
                <?php the_title( '<h1 class="post-full-title">', '</h1>' ); ?>
            </header>

            <?php if ( has_post_thumbnail() ) { ?>
            <figure class="post-full-image">
                <?php the_post_thumbnail('full',array('class' => 'feature_image')); ?>
            </figure>
            <?php } ?>

            <section class="post-full-content">
                <div class="post-content">
                    <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geist' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>
            </section>

            <footer class="post-full-footer">
                <?php get_template_part('template-parts/byline-single'); ?>
            </footer>

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

<!-- Links to Previous/Next posts -->
<?php get_template_part('template-parts/post-nav'); ?>

<!-- Floating header which appears on-scroll -->
<?php get_template_part('template-parts/floating-header'); ?>