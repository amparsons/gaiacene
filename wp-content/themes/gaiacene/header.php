<?php
    $page_slug = '';
	if (is_page())
	{
		$page_slug = 'page-'.basename(get_permalink());
		
		if ($post->post_parent)
		{
			$page_slug.= ' parent-'.basename(get_permalink($post->post_parent));
		}
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
        <meta name="description" content="">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
        
        <link rel="shortcut icon" href="favicon.ico">
  		<!-- For third-generation iPad with high-resolution Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144-precomposed.png">
        <!-- For iPhone with high-resolution Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114-precomposed.png">
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72-precomposed.png">
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/selectivizr-min.js"></script>
        
        <script type="text/javascript" src="//use.typekit.net/htg8sls.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class($page_slug); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="mobileContainer"> 
            
			<div id="slidingMenu">
            	<div class="head"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/gaiacene-logo-mobile.svg" alt=""/></a></div>
				<div id="slidingMenuContent">
					<?php
                        wp_nav_menu(
                            array(
                            'menu'			=> 'main-menu',
                            'container'		=> '',
							'menu_class'	=> 'mobilemenu'
                        ));
                    ?>
				</div>
                <ul class="social-media-white">
                    <li><a href="https://twitter.com/Gaiacene" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/twitter-footer-icon.svg" alt="Gaiacene"/></a></li>
                    <li><a href="http://www.linkedin.com/company/gaiacene?trk=company_name" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin-footer-icon.svg" alt="Gaiacene"/></a></li>
                </ul>
          </div>
          
            <div id="page">

                <header>
                	<a href="javascript:void(0);" class="show-menu-button"></a>
                	<div class="wrapper clearfix">
                        <div class="header">
                        	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/gaiacene-logo.svg" alt=""/></a>
                            <nav>
								<?php
									wp_nav_menu(
										array(
										'menu'		 => 'main-menu',
										'container'  => ''
									));
                                ?>
                            </nav>
                        </div>
                    </div>
                    <div class="center-container">
                        <?php
							if (is_page( 'home' )) {
							?>
                            <div class="banner-info">
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                                <a class="down-arrow" href="#whatwedo"></a>
                        	</div>
                            <?php
							}
							elseif (is_page( 'about' )) {
							?>
                            	<div class="banner-info subpage">
                                    <h1><?php the_field('main_title_text'); ?></h1>
                                    <p><?php the_field('text_line_one'); ?></p>
                                    <p><?php the_field('text_line_two'); ?></p>
                                </div>
                            <?php
							}
							elseif (is_page( 'services' )) {
							?>
                            <div class="banner-info subpage">
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                        	</div>
                            <?php
							}
							elseif (is_page( 'experience' )) {
							?>
                            <div class="banner-info subpage">
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                        	</div>
                            <?php
							}
							elseif (is_page( 'journal' )) {
							?>
                            <div class="banner-info subpage">
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                        	</div>
                            <?php
							}
							elseif (is_page( 'contact' )) {
							?>
                            <div class="banner-info subpage">
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                        	</div>
                            <?php
							}
							elseif (is_page( 'terms-and-conditions' )) {
							?>
                            <div class="banner-info">
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                        	</div>
                            <?php
							}
							elseif (is_single()) {
							?>
                           
                            <?php
							}
							else {
							?>
                                <h1><?php the_field('main_title_text'); ?></h1>
                                <p><?php the_field('text_line_one'); ?></p>
                                <p><?php the_field('text_line_two'); ?></p>
                            <?php
							}
						?>
                        
                    </div>
                </header>

                <div class="pageContent" >
                	
                
          