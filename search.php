<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _s
 */

get_header();
?>

<?php if ( have_posts() ) : ?>

	<!-- {!--Special header.hbs partial to generate the <header> tag--}} -->
	<?php get_template_part('template-parts/header'); ?>
	    <div class="inner">
	        <?php get_template_part('template-parts/site-nav'); ?>
	        <div class="site-header-content">
	        	<h1 class="site-title">
		        	<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for %s', '_s' ), '<span>' . get_search_query() . '</span>' );
					?>
	        	</h1>
	        </div>
	    </div>
	</header>

	<main id="site-main" class="site-main outer">
	    <div class="inner">
	        <div class="post-feed">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content');

				endwhile;

				the_posts_navigation();
				?>
	        </div>
	    </div>
	</main>

<?php endif; ?>

<?php
get_footer();
