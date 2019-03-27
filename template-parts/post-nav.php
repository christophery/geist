<?php

$prevPost = get_previous_post();
$nextPost = get_next_post();

//get releated posts based on post category
$related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'posts_per_page' => 3,
        'post__not_in'   => array( $post->ID ),
        'orderby'        => 'rand' //random order
    )
);

?>

<aside class="read-next outer">
    <div class="inner">
        <div class="read-next-feed">
            <?php if( $related->have_posts() ) { ?>
                <article class="read-next-card">
                    <header class="read-next-card-header"
                        <?php if ( get_header_image() ){ ?>
                            style="background-image: url(<?php header_image(); ?>)
                        <?php } ?>
                    ">
                        <small class="read-next-card-header-sitetitle">&mdash; <?php echo get_bloginfo( 'name' ); ?> &mdash;</small>
                        <h3 class="read-next-card-header-title"><a href="<?php echo home_url(); ?>"><?php _e('Related Posts', 'geist'); ?></a></h3>
                    </header>
                    <div class="read-next-divider"><?php get_template_part('template-parts/icons/infinity'); ?></div>
                    <div class="read-next-card-content">
                        <ul>
                            <?php
                                //output related posts
                                while( $related->have_posts() ) {
                                    $related->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() .'</a> </li> ';
                                }
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <footer class="read-next-card-footer">
                        <a href="<?php echo home_url(); ?>"><?php _e('See all posts', 'geist'); ?> &#8594;</a>
                    </footer>
                </article>
            <?php } ?>

            <!-- {{!-- If there's a next post, display it using the same markup included from - partials/post-card.hbs --}} -->
            <?php
                //TODO: THIS NEEDS TO BE REFACTORED
                $nextPost = get_next_post();

                if($nextPost) {
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $nextPost->ID
                    );
                    $nextPost = get_posts($args);
                    foreach ($nextPost as $post) {
                        setup_postdata($post);

            ?>
                <?php get_template_part('template-parts/content'); ?>
            <?php
                        wp_reset_postdata();
                    } //end foreach
                } // end if
            ?>

            <!-- {{!-- If there's a previous post, display it using the same markup included from - partials/post-card.hbs --}} -->
            <?php
                //TODO: THIS NEEDS TO BE REFACTORED
                $prevPost = get_previous_post();

                if (!empty( $prevPost )) {
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $prevPost->ID
                    );
                    $prevPost = get_posts($args);
                    foreach ($prevPost as $post) {
                        setup_postdata($post);

            ?>
                <?php get_template_part('template-parts/content'); ?>
            <?php
                        wp_reset_postdata();
                    } //end foreach
                } // end if
            ?>

        </div>
    </div>
</aside>