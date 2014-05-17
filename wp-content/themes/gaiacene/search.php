<?php 
/* 
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Gaiacene
 */
get_header(); ?>

<div class="blog">
    <div class="wrapper-footer">
        <section>
        	<?php if ( have_posts() ) : ?>
            <h1 class="filter-result"><?php printf( __( 'Search Results for: %s', 'gaiacene' ), '' . get_search_query() . '' ); ?></h1>
            <?php
            /* Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called loop-search.php and that will be used instead.
             */
             get_template_part( 'loop', 'search' );
            ?>
            <?php else : ?>
            
            <h1><?php _e( 'Nothing Found', 'dean' ); ?></h1>
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'dean' ); ?></p>
            
            <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
