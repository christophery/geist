<?php

$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 60, '', '', $args = array( 'class' => 'author-profile-image' ) );

$author_bio = get_the_author_meta('description');

$author_display_name = get_the_author_meta('display_name');

$author_url = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );

?>

<section class="author-card">
    <?php if( $author_avatar ){ ?>
        <?php echo $author_avatar; ?>
    <?php }else{ ?>
        <span class="avatar-wrapper"><?php get_template_part('template-parts/avatar'); ?></span>
    <?php } ?>
    <section class="author-card-content">
        <h4 class="author-card-name"><a href="<?php echo $author_url; ?>"><?php echo $author_display_name; ?></a></h4>
        <?php if( $author_bio ){ ?>
            <p><?php echo $author_bio; ?></p>
        <?php }else{ ?>
            <p>Read <a href="<?php echo $author_url; ?>">more posts</a> by this author.</p>
        <?php } ?>
    </section>
</section>
<div class="post-full-footer-right">
    <a class="author-card-button" href="<?php echo $author_url; ?>">Read More</a>
</div>