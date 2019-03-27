<?php

$categories = get_the_category();

?>

<main id="site-main" class="site-main outer">
    <div class="inner">

        <article class="post-full
            <?php if ( has_post_thumbnail() == false ) { ?>
                no-image
            <?php } ?>
        ">

            <header class="post-full-header">
                <section class="post-full-meta">
                    <time class="post-full-meta-date" datetime="<?php echo get_the_date('F d, Y'); ?>"><?php echo get_the_date('F d, Y'); ?></time>
                    <?php
                    foreach($categories as $category){
                        //get category url
                        $category_url = get_category_link( $category->term_id );

                        //output category link + name
                        echo "<span class='date-divider'>/</span>";
                        echo "<a href='{$category_url}'>";
                        echo $category->name . ' ';
                        echo "</a>";
                    }
                    ?>
                </section>
                <h1 class="post-full-title"><?php echo get_the_title();?></h1>
            </header>

            <?php if ( has_post_thumbnail() ) { ?>
            <figure class="post-full-image">
                <?php the_post_thumbnail('medium_large',array('class' => 'feature_image')); ?>
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

<!-- {{!-- Links to Previous/Next posts --}} -->
<?php get_template_part('template-parts/post-nav'); ?>

<!-- {{!-- Floating header which appears on-scroll, included from includes/floating-header.hbs --}} -->
<?php get_template_part('template-parts/floating-header'); ?>