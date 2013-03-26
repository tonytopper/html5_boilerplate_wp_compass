<?php

// ===================
// = UTILITY METHODS =
//TODO: These methods are redundant.  Remove them
// ===================
function show_sidebar_at($position) 
{ 
	return get_theme_mod('sidebar_'.$position); 
}
function show_search_form() 
{ 
	return get_theme_mod('show_search'); 
}
function show_footer_title() 
{ 
	return get_option('show_footer_title') == "1" ? true : false; 
}
function show_footer_meta() { 
	return get_option('show_footer_meta') == "1" ? true : false; 
}

// =========================
// = CUSTOM THEME SETTINGS =
// =========================
add_action( 'admin_menu', 'add_gcf_interface' );
function add_gcf_interface()
{
	add_theme_page( 'More Theme Options', 'More Theme Options', 'edit_themes', basename(__FILE__), 'editglobalcustomfields' );
}

add_action( 'customize_register', 'h5susy_customize_register' );
function h5susy_customize_register( $wp_customize ) {
	//Header settings
	$wp_customize->add_section( 'header_settings', array(
			'title'          => 'Header',
			'priority'       => 33,
	) );
	$wp_customize->add_setting( 'show_search', array(
			'default'     => false,
	) );
	$wp_customize->add_control( 'show_search', array(
			'label'    => __( 'Show search box' ),
			'section'  => 'header_settings',
			'type'     => 'checkbox',
	) );
	//Susy
	$wp_customize->add_section( 'susy_settings', array(
			'title'          => 'Susy',
			'priority'       => 35,
	) );
	$wp_customize->add_setting( 'use_grid' , array(
    'default'     => false,
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( 'use_grid', array(
    'label'    => __( 'Use Grid' ),
    'section'  => 'susy_settings',
    'type'     => 'checkbox',
	) );
	//Sidebar Settings
	$wp_customize->add_section( 'sidebar_settings', array(
			'title'          => 'Sidebar',
			'priority'       => 34,
	) );
	$wp_customize->add_setting( 'sidebar_left' , array(
			'default'     => false
	) );
	$wp_customize->add_setting( 'sidebar_right' , array(
			'default'     => false
	) );
	$wp_customize->add_setting( 'sidebar_footer' , array(
			'default'     => false
	) );
	$wp_customize->add_control( 'sidebar_left', array(
			'label'    => __( 'Left sidebar' ),
			'section'  => 'sidebar_settings',
			'type'     => 'checkbox'
	) );
	$wp_customize->add_control( 'sidebar_right', array(
			'label'    => __( 'Right sidebar' ),
			'section'  => 'sidebar_settings',
			'type'     => 'checkbox'
	) );
	$wp_customize->add_control( 'sidebar_footer', array(
			'label'    => __( 'Footer sidebar' ),
			'section'  => 'sidebar_settings',
			'type'     => 'checkbox'
	) );
}

function editglobalcustomfields()
{
	?>
	<style type="text/css" media="screen">
	
		#theme_options label { font-weight:bold; font-size: 13px; display: block; }
		#theme_options fieldset { border:solid 1px #ccc; padding: 0 10px; margin-top: 10px; margin-bottom: 20px;  }
		#theme_options fieldset legend { 
			padding: 0 10px; 
			font: italic 16px/20px Georgia,"Times New Roman","Bitstream Charter",Times,serif;
			color: #464646;
		}
		#theme_options .extra_info { display: block; font-size:11px; color:#999;}

		#options_general_site_information strong {
			display: block;
			margin-bottom: 10px;
		}
		#options_general_site_information .dev		input,
		#options_general_site_information .sidebars input { float: left; margin-right:5px; }
		#options_general_site_information .dev      label,
		#options_general_site_information .sidebars label {
			clear: right;
			display: block;
			margin-bottom: 10px;
		}
	</style>
	<div class='wrap'>
		<h2>Theme Options</h2>
  		<form method="post" action="options.php" id="theme_options">
	  	  	<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="company_name,site_credit,show_footer_title,show_footer_meta,custom_menus" />
			<?php wp_nonce_field('update-options') ?>


			<fieldset id="options_general_site_information" class="">
				<legend>General Site Information</legend>
				
				<p>
					<label for="company_name">Your company name</label>
					<input type="text" name="company_name" value="<?php echo htmlspecialchars(get_option('company_name')); ?>" id="company_name" size="40" />
				</p>

				<p>
					<label for="company_name">Site Credit</label>
					<input type="text" name="site_credit" value="<?php echo htmlspecialchars(get_option('site_credit')); ?>" id="site_credit" size="40" />
				</p>

			</fieldset>

			<fieldset id="options_footer" class="">
				<legend>Footer</legend>
				
				<p>
					<label for="show_footer_title">Show website title?</label>
					<select name="show_footer_title" id="show_footer_title">
						<?php if (show_footer_title()) : ?>
							<option value="1" selected="selected">Yes</option>
							<option value="0">No</option>
						<?php else : ?>
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						<?php endif; ?>
					</select>
				</p>
				
				<p>
					<label for="show_footer_meta">Show Meta Links?</label>
					<select name="show_footer_meta" id="show_footer_meta">
						<?php if (show_footer_meta()) : ?>
							<option value="1" selected="selected">Yes</option>
							<option value="0">No</option>
						<?php else : ?>
							<option value="1">Yes</option>
							<option value="0" selected="selected">No</option>
						<?php endif; ?>
					</select>
				</p>
				
				<p>
					<label for="custom_menus_to_include">Custom Menus to Include</label>
					<span class="extra_info">
						Place the titles of the custom menus in the following form field delimited by commas.  
						Menus will then be included in the theme footer.
					</span>
					<input type="text" name="custom_menus" value="<?php echo strip_tags(get_option('custom_menus')); ?>" id="custom_menus" size="40" />
					
				</p>
				
			</fieldset>

			<p><input type="submit" name="Submit" value="Update Options" /></p>

	  	</form>
	</div>
	<?php
}

// =======================
// = SET UP THE SIDEBARS =
// =======================
add_action( 'widgets_init', 'h5susy_sidebar' );
function h5susy_sidebar() 
{
	if (get_theme_mod('sidebar_left')) {
		register_sidebar(array(
				'id' => 'left-sidebar',
			'name' => __('Left sidebar')
		));
	}
	if (get_theme_mod('sidebar_right')) {
		register_sidebar(array(
				'id' => 'right-sidebar',
			'name' => __('Right sidebar')
		));
	}
	if (get_theme_mod('sidebar_footer')) {
		register_sidebar(array(
				'id' => 'footer-sidebar',
			'name' => __('Footer sidebar')
		));
	}
}

// ===================================
// = ADD NEW CLASSES TO body_class() =
// ===================================
function h5susy_body_class_filter($classes) 
{
	$columns = 1;
	if(get_theme_mod('sidebar_left')) { $columns++; $classes[] = "left-column"; }
	if(get_theme_mod('sidebar_right')) { $columns++; $classes[] = "right-column";  }
	
	if($columns == 1){ $classes[] = "one-column"; }
	if($columns == 2){ $classes[] = "two-column"; }
	if($columns == 3){ $classes[] = "three-column"; }
	
	if(get_theme_mod('use_grid')) { 
		$classes[] = "grid"; 
	}
	 
	return $classes;
}
add_filter( 'body_class', 'h5susy_body_class_filter' );

// ============
// = TWEAK WP =
// ============
if (function_exists( 'add_theme_support' )) {
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('automatic-feed-links');
	register_nav_menus(
  		array(
  		  'primary_navigation' => 'Primary Navigation',
  		  'utility_navigation' => 'Utility Navigation'
  		)
  	);
}

// Load jQuery & Modernizr
if (!is_admin()) {

	wp_deregister_script('jquery');
	wp_register_script('jquery', "http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js", array(), '1.4.4');
	wp_enqueue_script('jquery');

	wp_deregister_script( 'modernizr' ); // get rid of any native Modernizr
	wp_register_script( 'modernizr', get_bloginfo('template_directory') . '/js/modernizr.js', array(), '1.6' );
	wp_enqueue_script( 'modernizr' );
}

// Clean up the <head>
function removeHeadLinks()
{
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
}
add_action('init', 'removeHeadLinks');

?>