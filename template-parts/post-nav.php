<?php

$prevPost = get_previous_post();
$nextPost = get_next_post();

?>

<aside class="read-next outer">
    <div class="inner">
        <div class="read-next-feed">
            <article class="read-next-card">
                <header class="read-next-card-header"
                    <?php if ( get_header_image() ){ ?>
                        style="background-image: url(<?php header_image(); ?>)
                    <?php } ?>
                ">
                    <small class="read-next-card-header-sitetitle">&mdash; <?php echo get_bloginfo( 'name' ); ?> &mdash;</small>
                    <h3 class="read-next-card-header-title"><a href="<?php echo home_url(); ?>"><?php _e('Latest Posts', 'geist'); ?></a></h3>
                </header>
                <div class="read-next-divider"><?php get_template_part('template-parts/icons/infinity'); ?></div>
                <div class="read-next-card-content">
                    <ul>
                        <?php
                            $args = array(
                                'numberposts' => 3,
                            );

                            $recent_posts = wp_get_recent_posts( $args );
                            foreach( $recent_posts as $recent ){
                                echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                            }
                            wp_reset_query();
                        ?>
                    </ul>
                </div>
                <footer class="read-next-card-footer">
                    <a href="<?php echo home_url(); ?>"><?php _e('See all posts', 'geist'); ?> →</a>
                </footer>
            </article>

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