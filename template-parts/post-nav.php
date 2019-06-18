<?php

//get related posts based on post category
$geist_related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'posts_per_page' => 3,
        'post__not_in'   => array( $post->ID ),
        'ignore_sticky_posts' => true,
        'has_password'   => false, //exclude password protected posts
        'orderby'        => 'rand' //random order
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
                <article class="read-next-card"
                    <?php if ( get_header_image() ){ ?>
                            style="background-image: url(<?php header_image(); ?>)
                    <?php } ?>
                ">
                    <header class="read-next-card-header">
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

            <!-- Display next post -->
            <?php
                if( geist_next_post() ){
                    geist_next_post();
                }
            ?>

            <!-- Display previous post -->
            <?php
                if( geist_prev_post() ){
                    geist_prev_post();
                }
            ?>
        </div>
    </div>
</aside>