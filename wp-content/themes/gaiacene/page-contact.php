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

$action = '';
if ((isset($_POST['fname'])) && ($_POST['username'] == ''))
{
	$msg = $_POST['message'];
	if ((strlen($msg) == strlen(strip_tags($msg))) && (strpos($msg,"http") === false) && (strpos($msg,"[url]") === false))
	{
	
		//Get template for email
		$textEmail = file_get_contents("wp-content/themes/gaiacene/emails/contact.txt");
		
		$textEmail = str_replace("|FNAME|",$_POST['fname'],$textEmail);
		$textEmail = str_replace("|LNAME|",$_POST['lname'],$textEmail);
		$textEmail = str_replace("|EMAIL|",$_POST['email'],$textEmail);
		$textEmail = str_replace("|COMPANY|",$_POST['company'],$textEmail);
		$textEmail = str_replace("|MESSAGE|",$_POST['message'],$textEmail);
			
		$to = "craig.white@gaiacene.com, annemarie@amparsons.co.uk";
		$subject = "Contact from your website Gaiacene";
		$headers = "From: craig.white@gaiacene.com"."\r\n"."X-Mailer: PHP/".phpversion();
		
		
		ini_set("sendmail_from", "craig.white@gaiacene.com ");
		mail($to,$subject,$textEmail,$headers);
		
		$action = 'sent';
		
	}
}

get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="intro">
            <?php if ($action == 'sent') { ?>
            <div class="wrapper-7col full-width clearfix">
            	<div class="sentmessage">
                	<h1>Your message has been sent</h1>
                    <span class="border"></span>
                    <p>Thank you for contacting us. We will get back you as soon as possible. If you would like to talk to us immediately please call one of the numbers below. Look forward to chatting with you.</p>
                </div>
			</div>
            <?php }  ?>
            <div class="wrapper-7col clearfix">
                <?php if ($action !== 'sent') { ?>
                <h1>Your message</h1>
                <span class="border"></span>
                <form class="contact" method="POST" action="">
                	 <input type="text" name="fname" value="" placeholder="First Name" />
                     <input class="last" name="lname"  type="text" value="" placeholder="Last Name" />
                     <input type="email" name="email" value="" placeholder="Email" />
                     <input class="last" name="company" type="text" value="" placeholder="Company" />
                     <textarea name="message" placeholder="Your Message"></textarea>
                     <input name="username" type="hidden" value="" />
                     <input type="submit" value="Send Message" />
                </form>
                <?php }  ?>
                <div class="col2 full-width">
                	<h3>Gaiacene North</h3>
                	<p>T: <?php the_field('gaiacene_north_telephone_number'); ?></p>
                    <p>E: <a href="mailto:<?php the_field('gaiacene_north_email_address'); ?>"><?php the_field('gaiacene_north_email_address'); ?></a></p>
                </div>
                <div class="col2 full-width">
                	<h3>Gaiacene South</h3>
                	<p>T: <?php the_field('gaiacene_south_telephone_number'); ?></p>
                    <p>E: <a href="mailto:<?php the_field('gaiacene_south_email_address'); ?>"><?php the_field('gaiacene_south_email_address'); ?></a></p>
                </div>
            </div>
            
            <div class="wrapper-6col full-width full-width-form">
                <h1><?php the_field('stay_in_contact_title'); ?></h1>
                <span class="border dark"></span>
                <?php if ($subscribeError !=='') 
				   {
					?>
					
					<?php
					}
					?>
					<?php if ($result == TRUE) { ?>
					 <div class="sentsubscribe">
                	<h1>Hurrah!<br>Hi. You are now subscribed.</h1>
                    <p>Thanks for signing up to our newsletter.</p>
                </div>
					<?php
					}
					else
					{
				?>

                <p class="smallmargin"><?php the_field('stay_in_contact_info'); ?></p>
                <form method="post" action="<?php the_permalink(); ?>" >
                    <input name="email" id="email"  type="email" placeholder="Email address" required/>
                    <input type="submit" value="Subscribe now">
                </form>
                <?php if ($subscribeError == TRUE) { ?><div class="errormsg"><p><?php echo $subscribeError; ?></p></div><?php } ?>
                <p class="smallprint">* We will not share your details with anyone else</p>
                <?php } ?>
            </div>
        </div>
	<?php endwhile; endif; ?> 
<?php get_footer(); ?>
