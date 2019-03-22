<?php

$post_title = get_the_title();
$post_url = get_the_permalink();

?>

<div class="floating-header">
    <div class="floating-header-logo">
        <a href="{{@site.url}}">
            <?php if ( get_header_image() ){ ?>
                <img src="<?php header_image(); ?>" alt="<?php echo get_bloginfo( 'name' ); ?> icon" />
            <?php } ?>
            <span><?php echo get_bloginfo( 'name' ); ?></span>
        </a>
    </div>
    <span class="floating-header-divider">&mdash;</span>
    <div class="floating-header-title"><?php echo get_the_title(); ?></div>
    <div class="floating-header-share">
        <div class="floating-header-share-label">Share this <?php get_template_part('template-parts/icons/point'); ?></div>
        <a class="floating-header-share-tw" href="https://twitter.com/share?text=<?php echo $post_title; ?>&amp;url=<?php echo $post_url; ?>"
            onclick="window.open(this.href, 'share-twitter', 'width=550,height=235');return false;">
            <?php get_template_part('template-parts/icons/twitter'); ?>
        </a>
        <a class="floating-header-share-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
            onclick="window.open(this.href, 'share-facebook','width=580,height=296');return false;">
            <?php get_template_part('template-parts/icons/facebook'); ?>
        </a>
    </div>
    <!-- <progress id="reading-progress" class="progress" value="0">
        <div class="progress-container">
            <span class="progress-bar"></span>
        </div>
    </progress> -->
</div>
