<?php 
/*
	Template Name: Services 
*/
get_header(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="intro">
            <div class="wrapper-10col">
                <h1><?php the_field('introduction_title'); ?></h1>
                <span class="border"></span>
                <?php the_content(); ?>
            </div>
            <div class="wrapper-footer ">
           	  <img class="diagram" src="<?php the_field('service_diagram'); ?>" alt="Gaiacene services"/>
                <?php wp_reset_query(); ?>
				<?php while(the_repeater_field('service_list')): ?>         
                <div class="service">
                    <img src="<?php echo the_sub_field('service_icon'); ?>" alt="icon"/>
					<h2><?php echo the_sub_field('service_list_title'); ?></h2>
                    <ul>
                        <?php while(the_repeater_field('bullet_points')): ?> 
                        <li><?php echo the_sub_field('bullet'); ?></li>
                        <?php  endwhile; ?>
                    </ul>
			  </div>
              <?php  endwhile; ?>
            </div>
        </div>
        <?php endwhile; endif; ?>
<?php get_footer(); ?>
