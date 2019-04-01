<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package geist
 */

get_header();

$geist_custom_logo_id = get_theme_mod( 'custom_logo' );
$geist_image = wp_get_attachment_image_src( $geist_custom_logo_id , 'full' );

$geist_blog_name = get_bloginfo( 'name' );

$geist_author_url = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );

?>
    <div class="site-wrapper">

        <header class="site-header outer <?php if ( get_header_image() ){ ?>" style="background-image: url(<?php echo esc_html( header_image() ); ?>)<?php }else{ ?>no-image<?php } ?>">
            <div class="inner">
                <nav class="site-nav-center">
                    <?php if( $geist_custom_logo_id ){ ?>
                        <a class="site-nav-logo" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( $geist_image[0] ); ?>" alt="<?php echo esc_html( $geist_blog_name ); ?>" /></a>
                    <?php }else{ ?>
                        <a class="site-nav-logo" href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( $geist_blog_name ); ?></a>
                    <?php } ?>
                </nav>
            </div>
        </header>

        <main id="site-main" class="site-main outer">
            <div class="inner">

                <section class="error-message">
                    <h1 class="error-code"><?php esc_html_e( '404', 'geist' ); ?></h1>
                    <p class="error-description"><?php esc_html_e( 'Page not found', 'geist' ); ?></p>
                    <a class="error-link" href="<?php echo esc_url home_url() ); ?>">Go to the front page &#x2192;</a>
                </section>
            </div>
        </main>

        <aside class="outer">
            <div class="inner">
                <div class="post-feed">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'ignore_sticky_posts' => true
                    );

                    $latest_posts = new WP_Query( $args );

                    if( $latest_posts->have_posts() ) {
                        while( $latest_posts->have_posts() ) {
                            $latest_posts->the_post();

    						//get author avatar
    						$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 30, '', '', $args = array( 'class' => 'author-profile-image' ) );

                            ?>
			        	<article <?php !has_post_thumbnail() ? post_class('post-card no-image') : post_class('post-card'); ?>>


			        	    <?php if ( has_post_thumbnail() ) { ?>
			        	    <a class="post-card-image-link" href="<?php the_permalink(); ?>">
			        	        <?php the_post_thumbnail('medium_large',array('class' => 'post-card-image')); ?>
			        	    </a>
			        	    <?php } ?>

			        	    <div class="post-card-content">

			        	        <a class="post-card-content-link" href="<?php the_permalink(); ?>">

			        	            <header class="post-card-header">
			        	                <span class="post-card-tags"><?php echo esc_html( $category_name ); ?></span>
			        	                <h2 class="post-card-title"><?php echo esc_html( get_the_title() ); ?></h2>
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
			        	                        <a href="<?php echo esc_url( $geist_author_url ); ?>" class="static-avatar">
                                                    <?php echo esc_html( $author_avatar ); ?>
                                                </a>
			        	                    <?php }else{ ?>
			        	                        <a href="<?php echo esc_url( $geist_author_url ); ?>" class="static-avatar author-profile-image"><?php get_template_part('template-parts/icons/avatar'); ?></a>
			        	                    <?php } ?>
			        	                </li>
			        	            </ul>

			        	            <?php if( geist_estimated_reading_time() ){ ?>
        	                            <span class="reading-time"><?php echo esc_html( geist_estimated_reading_time() ); ?></span>
        	                        <?php } ?>

			        	        </footer>

			        	    </div><!-- {{!--/.post-card-content--}} -->

			        	</article>
			            		<?php
			            	}
			            }
			            wp_reset_query();
			        ?>
                </div>
            </div>
        </aside>

    </div>
<?php
get_footer();
