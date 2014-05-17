<?php 
/*
	Template Name: Experience 
*/
get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="intro colour-first-para purple">
            <div class="wrapper-10col">
                <h1><?php the_field('introduction_title'); ?></h1>
                <span class="border"></span>
                <?php the_content(); ?>	
             </div>
             <div class="wrapper-12col clearfix">
             <?php
					$args = array( 'post_type' => 'project', 'posts_per_page' => -1);
					$wp_query = new WP_Query($args);
					while ( have_posts() ) : the_post();	
				?>
                <div class="col3 full-width">
           	    	<?php 
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail('thumbnail');
						}
					?>
                    <h1><span><?php the_title(); ?></span></h1> 
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
             </div>
             <div class="wrapper-10col">
                <div class="secondsection">
                    <h1><?php the_field('who_we’ve_worked_with_title'); ?></h1>
                    <span class="border"></span>
                    <div class="wrapper-6col ">
                        <?php the_field('who_we’ve_worked_with_description'); ?>
                    </div>
                </div>
			</div>
            <div class="wrapper-footer">
                <ul class="client-logos">
                	<?php while(the_repeater_field('client_logos')): ?>
                    	<li><img src="<?php echo the_sub_field('logo'); ?>" alt="<?php echo the_sub_field('client_name'); ?>"/></li>
                    <?php  endwhile; ?>
                </ul>
            </div>
        </div>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
