<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package geist
 */

$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 30, '', '', $args = array( 'class' => 'author-profile-image' ) );

//get categories
$categories = get_the_category();

//get name of first category
$category_name = $categories[0]->name;
?>

<article class="post-card
    <?php if ( has_post_thumbnail() == false ) { ?>
        no-image
    <?php } ?>
">

    <?php if ( has_post_thumbnail() ) { ?>
    <a class="post-card-image-link" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium_large',array('class' => 'post-card-image')); ?>
    </a>
    <?php } ?>

    <div class="post-card-content">

        <a class="post-card-content-link" href="<?php the_permalink(); ?>">

            <header class="post-card-header">
                <span class="post-card-tags"><?php echo $category_name; ?></span>
                <h2 class="post-card-title"><?php echo get_the_title(); ?></h2>
            </header>

            <section class="post-card-excerpt">
                <p><?php the_excerpt(); ?></p>
            </section>

        </a>

        <footer class="post-card-meta">

            <ul class="author-list">
                <li class="author-list-item">

                    <div class="author-name-tooltip">
                    	<?php the_author(); ?>
                    </div>

                    <?php if( $author_avatar ){ ?>
                        <?php echo $author_avatar; ?>
                    <?php }else{ ?>
                        <a href="{{url}}" class="static-avatar author-profile-image"><?php get_template_part('template-parts/icons/avatar'); ?></a>
                    <?php } ?>
                </li>
            </ul>

            <span class="reading-time"><?php echo geist_estimated_reading_time(); ?></span>

        </footer>

    </div><!-- {{!--/.post-card-content--}} -->

</article>