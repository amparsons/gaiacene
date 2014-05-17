<?php
// Define global path variables
define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));

function my_scripts_method()
{
	// Load for all pages
	wp_deregister_script('jquery');
   	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
   	wp_enqueue_script('jquery');
	
	wp_enqueue_script('mobilemenu', get_template_directory_uri().'/js/vendor/menu_nav.js', array('jquery'), '1.0', true);
	wp_enqueue_script('slider', get_template_directory_uri().'/js/vendor/jquery.cycle2.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('swipe', get_template_directory_uri().'/js/vendor/jquery.cycle2.swipe.min.js', array('jquery'), '1.0', true);
	
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts_method');


// truncate function
function truncate($string, $limit, $break=" ", $pad="...")
{
	// Remove any formatting first
	$string = strip_tags($string);
	// return with no change if string is shorter than $limit
	if(strlen($string) <= $limit) return $string;
	// is $break present between $limit and the end of the string?
	if(false !== ($breakpoint = strpos($string, $break, $limit)))
	{
		if($breakpoint < strlen($string) - 1)
		{
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	}
	return $string;
}

// search blog posts only
if ( ! is_admin() ) {
	function SearchFilter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts','SearchFilter');
}

// Remove width and height from images
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// adds menus to the appearance tab in the admin area
register_nav_menu( 'primary', 'Primary Menu');

// add featured image support
add_theme_support( 'post-thumbnails' ); 
add_image_size('person', 142, 142, TRUE);
add_image_size('homeservice', 3999, 126, TRUE);
add_image_size('serviceicon', 40, 40, TRUE);
add_image_size('diagram', 9999, 542, TRUE);

add_image_size('clientlogo', 280, 150, TRUE);

/* Custom post types */
add_action('init', 'feature_init');
function feature_init() 
{
	//Default arguments
	$args = array
	(
		'public' 					=> true,
		'publicly_queryable'	=> true,
		'show_ui' 			    => true, 
		'query_var' 			=> true,
		'rewrite' 			    => true,
		'capability_type' 	    => 'post',
		'has_archive' 		    => true, 
		'hierarchical' 		    => false,
		'menu_position' 		=> NULL,
	);
	
	/* ----------------------------------------------------
	Testimonial
	---------------------------------------------------- */
	
	$labels = array
	(
		'name' 				 	=> 'Testimonial',
		'singular_name' 		=> 'Testimonial',
		'add_new' 			    => _x('Add New', 'Testimonial'),
		'add_new_item' 		=> 'Add New Testimonial',
		'edit_item' 			    => 'Edit Testimonial',
		'new_item' 			=> 'New Testimonial',
		'view_item' 			=> 'View Testimonial',
		'search_items' 		=> 'Search Testimonial',
		'not_found' 			=> 'No Testimonial found',
		'not_found_in_trash'   => 'No Testimonial found in Trash',
		'parent_item_colon' 	 => '',
		'menu_name' 			     => 'Testimonials'
	);
	
	$args['labels'] 			    = $labels;
	$args['supports'] 		    = array('title','editor','thumbnail');
	$args['rewrite']		        = array('slug' => 'Testimonial');
	$args['menu_icon']		    = get_bloginfo('template_directory').'/img/projects.png';
	$args['show_in_menu']	= true;
	$args['has_archive']	    = true;
	
	register_post_type('testimonial', $args);
	
	/* ----------------------------------------------------
	Testimonial
	---------------------------------------------------- */
	
	$labels = array
	(
		'name' 				 	=> 'Project',
		'singular_name' 		=> 'Project',
		'add_new' 			    => _x('Add New', 'Project'),
		'add_new_item' 		=> 'Add New Project',
		'edit_item' 			    => 'Edit Project',
		'new_item' 			=> 'New Project',
		'view_item' 			=> 'View Project',
		'search_items' 		=> 'Search Projects',
		'not_found' 			=> 'No Projects found',
		'not_found_in_trash'   => 'No Projects found in Trash',
		'parent_item_colon' 	 => '',
		'menu_name' 			     => 'Projects'
	);
	
	$args['labels'] 			    = $labels;
	$args['supports'] 		    = array('title','editor','thumbnail');
	$args['rewrite']		        = array('slug' => 'Project');
	$args['menu_icon']		    = get_bloginfo('template_directory').'/img/testimonial.png';
	$args['show_in_menu']	= true;
	$args['has_archive']	    = true;
	
	register_post_type('project', $args);
}


?>