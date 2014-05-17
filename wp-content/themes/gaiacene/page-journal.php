<?php 
/*
	Template Name: Journal 
*/
get_header(); ?>
<div class="blog">
    <div class="wrapper-footer">
        <section>
            <?php 
				$is_first_post = 1;
				
				$pagenum = $wp_query->query_vars;
				$pagenum = $pagenum['paged'];
				
				if (empty($pagenum)) {
				$pagenum = 1;
				}
				query_posts("post_type=post&paged=$pagenum");
				?> 
				<?php if (have_posts()) :$count = 0; ?>

				<?php while (have_posts()) : the_post(); ?>
            <article>
                <a href="<?php the_permalink() ?>">
                    <?php 
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail('large');
						}
					?>
                    <h1><?php the_title() ?></h1>
                    <span><?php the_time('F jS Y'); ?></span>
                    <?php the_excerpt(); ?>
                    <span class="readmore">Continue Reading</span>
            	</a>
            </article>
            <?php $is_first_post = 0; endwhile; ?>
            <div class="navigation">
                <div class="buttonleft"><?php next_posts_link(__('Older', 'gaiacene')) ?></div>
                <div class="buttonright"><?php previous_posts_link(__('Newer', 'gaiacene')) ?></div>
            </div>
            <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
