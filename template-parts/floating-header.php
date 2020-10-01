<?php

$geist_post_title = get_the_title();
$geist_post_url = get_the_permalink();

?>

<div class="floating-header">
    <div class="floating-header-logo">
        <a href="<?php echo esc_url( home_url() ); ?>">
            <?php if ( get_header_image() ){ ?>
                <img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_html( get_bloginfo( 'name' ) ); ?> icon" />
            <?php } ?>
            <span><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
        </a>
    </div>
    <span class="floating-header-divider">&mdash;</span>
    <?php the_title( '<div class="floating-header-title">', '</div>' ); ?>
    <div class="floating-header-share">
        <div class="floating-header-share-label"><?php printf( esc_html__( 'Share this', 'geist' ) ); ?> <?php get_template_part('template-parts/icons/point'); ?></div>
        <a class="floating-header-share-tw" href="https://twitter.com/share?text=<?php echo esc_html( $geist_post_title ); ?>&amp;url=<?php echo esc_url( $geist_post_url ); ?>"
            onclick="window.open(this.href, 'share-twitter', 'width=550,height=235');return false;">
            <?php get_template_part('template-parts/icons/twitter'); ?>
        </a>
        <a class="floating-header-share-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $geist_post_url ); ?>"
            onclick="window.open(this.href, 'share-facebook','width=580,height=296');return false;">
            <?php get_template_part('template-parts/icons/facebook'); ?>
        </a>
    </div>
    <progress id="reading-progress" class="progress" value="0">
        <div class="progress-container">
            <span class="progress-bar"></span>
        </div>
    </progress>
</div>
