<?php 
/*
	Template Name: About 
*/
get_header(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="intro colour-first-para">
                <div class="wrapper-10col">
                    <h1><?php the_field('introduction_title'); ?></h1>
                    <span class="border"></span>
                    <?php the_content(); ?>	
                    <div class="columns">
                        <?php echo get_field('text_in_column_form'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
        
        <div id="whatwedo" class="wedo-strip aboutus">
                <div class="wrapper-10col clearfix" >
					<h1>Our people</h1>
					<span class="border"></span>
					<p>Gaiacene’s core team consists of professionals from a mix of complimentary disciplines including sustainability, CSR, evaluation, engagement and communications .  We blend our skills to shape strategy, approaches and projects and help you communicate effectively to secure your desired impact, maximise the return on your investment and achieve meaningful engagement and extensive exposure.</p>
                      
					<?php if(get_field('people')): ?>
						<?php while(has_sub_field('people')): ?>
							<div class="person">
                            	<img class="bio" src="<?php the_sub_field('profile_picture'); ?>" alt="<?php the_sub_field('name'); ?>"/>
								<h2><?php the_sub_field('name'); ?></h2>
								<p class="sub"><?php the_sub_field('job_title'); ?></p>
								<span class="border"></span>
								<p><?php the_sub_field('bio'); ?></p>
                              	<ul>
                                	<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/white-twitter-icon.svg" alt=""/></a></li>
                                	<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/white-linkedin-icon.svg" alt=""/></a></li>
                              </ul> 
                    		</div>
                      	<?php endwhile; ?>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
          
          <div class="intro">
            <div class="wrapper-6col full-width">
                <h1><?php echo get_field('who_we_worked_for_title'); ?></h1>
                <span class="border"></span>
                <p><?php echo get_field('who_we_worked_for_description'); ?></p>
            </div>
            <div class="wrapper-10col full-width">
            	<p class="client-list">
					<?php if(get_field('companies_worked_for')): ?>
                        <?php while(has_sub_field('companies_worked_for')): ?>
                            <span style="color:<?php the_sub_field('text_colour'); ?>"><?php the_sub_field('company_name'); ?></span>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </p>
            </div>
            
        	<div class="wrapper-footer">
                <ul class="client-logos">
                	<?php while(the_repeater_field('logos')): ?>
                    	<li><img src="<?php echo the_sub_field('client_logo'); ?>" alt="<?php echo the_sub_field('client_name'); ?>"/></li>
                    <?php  endwhile; ?>
                </ul>
            </div>
	
        </div>
       	       
<?php get_footer(); ?>
