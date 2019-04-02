<?php if ( get_header_image() ){ ?>

<style type="text/css">
.responsive-header-img {
    background-image: url(<?php esc_url( header_image() ); ?>);
}
@media(max-width: 1000px) {
    .responsive-header-img {
        background-image: url(<?php header_image(); ?>);
        background-image: -webkit-image-set(
                url(<?php esc_url( header_image() ); ?>) 1x,
                url(<?php esc_url( header_image() ); ?>) 2x
        );
        background-image: image-set(
                url(<?php esc_url( header_image() ); ?>) 1x,
                url(<?php esc_url( header_image() ); ?>) 2x
        );
    }
}
@media(max-width: 600px) {
    .responsive-header-img {
        background-image: url(<?php header_image(); ?>);
        background-image: -webkit-image-set(
                url(<?php esc_url( header_image() ); ?>) 1x,
                url(<?php esc_url( header_image() ); ?>) 2x
        );
        background-image: image-set(
                url(<?php esc_url( header_image() ); ?>) 1x,
                url(<?php esc_url( header_image() ); ?>) 2x
        );
    }
}
</style>
<header class="site-header outer responsive-header-img">

<?php }else{ ?>

<header class="site-header outer no-image">

<?php } ?>
