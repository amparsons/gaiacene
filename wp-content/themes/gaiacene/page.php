<?php get_header(); ?>

        <div class="intropage">
              <div class="wrapper-10col">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <span class="border"></span>
                    <p class="subtext"><?php the_field('sub_text'); ?></p>
                    <span class="border spacer"></span>
                    <?php the_content(); ?>	
                    <?php endwhile; endif; ?>
              </div>
          </div>

<?php get_footer(); ?>
