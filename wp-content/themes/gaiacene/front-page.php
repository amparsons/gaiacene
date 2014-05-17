<?php 
$result = '';
if ($_POST['email'] != '')
{
	include("inc/class.mailchimp.php");
	// in mailchimp this is held in account > api
	$api = new MCAPI('9a57b0f1f8d273e3e4714761728a0f47-us3');

	$merge_vars = array
	(
	 	'EMAIL' => $_POST['email'],
	);
	
	// in mailchimp this is held in the lists > settings > list settings and unique api
	$result = $api->listSubscribe('80928787d6', $_POST['email'], $merge_vars);
	
	$subscribeError = '';
	if ($api->errorCode)
	{
		$subscribeError = $api->errorMessage;
	}
}
get_header(); ?>

					<div class="intro">
                        <div class="wrapper">
                        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h1><?php the_field('introduction_title'); ?></h1>
                            <span class="border"></span>
                            <?php the_content(); ?>	
                        	<a class="button" href="<?php the_field('link_to_page'); ?>">Learn about us</a>
                        </div>
                    </div>
                    		
					<div id="whatwedo" class="wedo-strip">
                   	  <div class="wrapper-footer clearfix">
                            <h1><?php the_field('title'); ?></h1>
                            <span class="border"></span>
                            <?php the_field('description'); ?>
                    		<?php while(the_repeater_field('what_we_do_services')): ?>
                                <div class="col">
                                    <img src="<?php echo the_sub_field('icon'); ?>" alt="<?php echo the_sub_field('service_name'); ?>"/>
                                    <h2><?php echo the_sub_field('service_name'); ?></h2>
                                    <span class="border"></span>
                                    <?php echo the_sub_field('description'); ?> 
                                </div>
                            <?php  endwhile; ?>
                            <a class="button central" href="<?php the_field('see_everything_we_do_button_link'); ?>">See everything we do</a>
                        </div>
                    </div>
                </div>
                <div class="grey-strip">
                	<div class="wrapper-6col clearfix">
                        <h1><?php the_field('sustainable_title'); ?></h1>
						<span class="border"></span>
						<?php the_field('sustainable_description'); ?>
                		<a class="button central" href="<?php the_field('get_your_free_health_check_link'); ?>">Get your free diagnostic</a>
                    </div>
                </div>
                <?php endwhile; endif; ?>
                <div class="slider">
                	<div class="wrapper-7col">
                    	<h1>What our clients say</h1>
						<span class="border"></span>
                        <div class="cycle-slideshow" 
                            data-cycle-fx="scrollHorz" 
                            data-cycle-timeout="2000"
                            data-cycle-swipe="true"
                            data-cycle-slides="> div.slide"
                            data-cycle-prev=".prevControl"
							data-cycle-next=".nextControl"
                            data-cycle-pager=".cycle-pager">
                            <?php
								$args = array( 'post_type' => 'testimonial', 'posts_per_page' => -1);
                				$wp_query = new WP_Query($args);
                				while ( have_posts() ) : the_post();	
							?>
                            <div class="slide">
                                <p>“<?php echo get_the_content(); ?>”</p>
                                <span><?php the_title(); ?></span>
                          </div>
                          <?php endwhile; ?>
                          <?php wp_reset_query(); ?>
                          <div class=center>
                                <span class="prevControl"><img src="<?php bloginfo('template_directory'); ?>/img/left-slider-arrow.png" width="27" height="41" alt=""/></span>
                                <div class="cycle-pager"></div>
                                <span class="nextControl"><img src="<?php bloginfo('template_directory'); ?>/img/right-slider-arrow.png" width="27" height="41" alt=""/></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-feed">
                        <div class="wrapper">
                            <a href="https://twitter.com/Gaiacene"><img src="<?php bloginfo('template_directory'); ?>/img/twitter-icon.svg" alt="Follow Gaiacene"/></a>
                            <?php
                                require_once('Creare_Twitter.php');
                                $twitter = new Creare_Twitter();
                                
                                $tweets = $twitter->getLatestTweets();
                                foreach($tweets as $tweet){
                                    echo "<p>".$tweet['tweet']."</p>";	
                                }
                            ?>
                            <a class="button central" href="https://twitter.com/Gaiacene" target="_blank">Follow @gaiacene</a>
                        </div>
                </div>
                <div class="contact">
                	<div class="wrapper-6col clearfix">
                    	<?php if ($subscribeError !=='') 
						   {
							?>
							
							<?php
							}
							?>
							<?php if ($result == TRUE) { ?>
                               <div class="sentsubscribe">
                                <h1>Hurrah!<br>You are now subscribed.</h1>
                                <p>Thanks for signing up to our newsletter.</p>
                            </div>
							<?php
							}
							else
							{
						?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h1><?php echo the_field('stayintouch_title'); ?></h1>
                            <span class="border"></span>
                            <p><?php echo the_field('stayintouch_intro'); ?></p>
                        <?php endwhile; endif; ?>	
                        <form id="mailinglist" class="full-width-form" method="post" action="<?php the_permalink(); ?>" >
                            <input name="email" class="newsletter" type="email" placeholder="Email address" required/>
                            <input type="submit" value="Subcribe now">
                        </form>
                        <?php if ($subscribeError == TRUE) { ?><div class="errormsg"><p><?php echo $subscribeError; ?></p></div><?php } ?>
                        <p class="smallprint">* We will not share your details with anyone else</p>
                        <?php } ?>
                	</div>
                </div>       

<?php get_footer(); ?>
