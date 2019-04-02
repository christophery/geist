<?php

//get releated posts based on post category
$geist_related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'posts_per_page' => 3,
        'post__not_in'   => array( $post->ID ),
        'orderby'        => 'rand' //random order
    )
);

//get next post
$geist_get_next_post = get_next_post();

$geist_next_post = new WP_Query(
    array(
        'posts_per_page' => 1,
        'post__in' => array( $geist_get_next_post->ID ),
        'ignore_sticky_posts' => true
    )
);

//get previous post
$geist_get_prev_post = get_previous_post();

// echo '<pre>';
// print_r($geist_get_prev_post);
// echo '</pre>';

$geist_prev_post = new WP_Query(
    array(
        'posts_per_page' => 1,
        'post__in' => array( $geist_get_prev_post->ID ),
        'ignore_sticky_posts' => true
    )
);

//get categories
$geist_categories = get_the_category();

//get name of first category
$geist_category_name = $geist_categories[0]->name;

//get category url
$geist_category_url = get_category_link( $geist_categories[0]->term_id );

//get number of posts in category
$geist_category_num_posts = $geist_categories[0]->category_count;

?>

<aside class="read-next outer">
    <div class="inner">
        <div class="read-next-feed">
            <?php if( $geist_related->have_posts() ) { ?>
                <article class="read-next-card">
                    <header class="read-next-card-header"
                        <?php if ( get_header_image() ){ ?>
                            style="background-image: url(<?php header_image(); ?>)
                        <?php } ?>
                    ">
                        <small class="read-next-card-header-sitetitle">&mdash; <?php echo esc_html( get_bloginfo( 'name' ) ); ?> &mdash;</small>
                        <h3 class="read-next-card-header-title"><a href="<?php echo esc_url( $geist_category_url ); ?>"><?php echo esc_html( $geist_category_name ); ?></a></h3>
                    </header>
                    <div class="read-next-divider"><?php get_template_part('template-parts/icons/infinity'); ?></div>
                    <div class="read-next-card-content">
                        <ul>
                            <?php
                                //output related posts
                                while( $geist_related->have_posts() ) {
                                    $geist_related->the_post();
                                    echo '<li><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) .'</a> </li> ';
                                }
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <footer class="read-next-card-footer">
                        <a href="<?php echo esc_url( $geist_category_url ); ?>">
                            <?php
                                printf(
                                    /* translators: %d: number of posts, i.e. 5 posts  */
                                    esc_html__( 'See all %d posts.', 'geist' ),
                                    esc_html( $geist_category_num_posts )
                                );
                            ?> &#8594;
                        </a>
                    </footer>
                </article>
            <?php } ?>

            <!-- {{!-- If there's a next post, display it using the same markup included from - partials/post-card.hbs --}} -->

            <?php
            if( $geist_next_post->have_posts() ) {
                //output related posts
                while( $geist_next_post->have_posts() ) {
                    $geist_next_post->the_post();

                    get_template_part('template-parts/content');
                }
                wp_reset_postdata();
            }
            ?>

            <!-- {{!-- If there's a previous post, display it using the same markup included from - partials/post-card.hbs --}} -->
            <?php
            if( $geist_prev_post->have_posts() ) {
                //output related posts
                while( $geist_prev_post->have_posts() ) {
                    $geist_prev_post->the_post();

                    get_template_part('template-parts/content');
                }
                wp_reset_postdata();
            }
            ?>

        </div>
    </div>
</aside>