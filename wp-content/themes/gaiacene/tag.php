<?php
/* 
/**
 * The template for displaying Tag Results pages.
 *
 * @package WordPress
 * @subpackage Gaiacene
 */
get_header(); ?>

<div class="blog">
    <div class="wrapper-footer">
        <section>
        	<h1 class="filter-result"><?php printf( __( 'Tag: %s', 'gaiacene' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
            <?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo '<div class="archive-meta">' . $category_description . '</div>';
	
			/* Run the loop for the category page to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-category.php and that will be used instead.
			 */
			get_template_part( 'loop', 'category' );
			?>
        </section>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
