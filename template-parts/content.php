<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geist
 */

$geist_author_avatar = get_avatar( get_the_author_meta( 'ID' ), 30 );

$geist_author_url = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );

//get categories
$geist_categories = get_the_category();

//get name of first category
if( $geist_categories ){
    $geist_category_name = $geist_categories[0]->name;
}
?>

<article <?php !has_post_thumbnail() ? post_class('post-card no-image') : post_class('post-card'); ?>>

    <?php if ( has_post_thumbnail() ) { ?>
    <a class="post-card-image-link" href="<?php esc_url( the_permalink() ); ?>" aria-label="<?php printf( esc_html__( 'Read more about %s', 'geist' ), get_the_title() ); ?>">
        <?php the_post_thumbnail('medium_large',array('class' => 'post-card-image')); ?>
    </a>
    <?php } ?>

    <div class="post-card-content">

        <a class="post-card-content-link" href="<?php the_permalink(); ?>" aria-label="<?php printf( esc_html__( 'Read more about %s', 'geist' ), get_the_title() ); ?>">

            <header class="post-card-header">
                <?php if( $geist_categories ){ ?>
                    <span class="post-card-tags"><?php echo esc_html( $geist_category_name ); ?></span>
                <?php } ?>
                <?php the_title( '<h2 class="post-card-title">', '</h2>' ); ?>
            </header>

            <section class="post-card-excerpt">
                <?php esc_html( the_excerpt() ); ?>
            </section>

        </a>

        <footer class="post-card-meta">

            <ul class="author-list">
                <li class="author-list-item">

                    <div class="author-name-tooltip">
                    	<?php esc_html( the_author() ); ?>
                    </div>

                    <?php if( $geist_author_avatar ){ ?>
                        <a href="<?php echo esc_url( $geist_author_url ); ?>" class="static-avatar" aria-label="<?php printf( esc_html__( 'Read more posts by %s', 'geist' ), get_the_author() ); ?>">
                            <?php echo $geist_author_avatar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </a>
                    <?php } ?>
                </li>
            </ul>

            <?php if( geist_estimated_reading_time() ){ ?>
                <span class="reading-time"><?php echo esc_html( geist_estimated_reading_time() ); ?></span>
            <?php } ?>

        </footer>

    </div><!-- .post-card-content -->

</article>