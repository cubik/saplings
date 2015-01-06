<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'parallax', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'parallax' ) );

//* Add Image upload to WordPress Theme Customizer
add_action( 'customize_register', 'parallax_customizer' );
function parallax_customizer(){
	require_once( get_stylesheet_directory() . '/lib/customize.php' );
}

//* Include Section Image CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Saplings Child theme' );
define( 'CHILD_THEME_URL', 'http://www.chrisubik.com' );
define( 'CHILD_THEME_VERSION', '1.2' );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_scripts_styles' );
function parallax_enqueue_scripts_styles() {
  wp_enqueue_script( 'parallax-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'parallax-google-fonts', '//fonts.googleapis.com/css?family=Montserrat|Sorts+Mill+Goudy', array(), CHILD_THEME_VERSION );
}

//* Load Font Awesome
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 7 );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'parallax_secondary_menu_args' );
function parallax_secondary_menu_args( $args ){
	if( 'secondary' != $args['theme_location'] )
	return $args;

	$args['depth'] = 1;
	return $args;
}

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Add support for additional color styles
add_theme_support( 'genesis-style-selector', array(
	'parallax-pro-blue'   => __( 'Parallax Pro Blue', 'saplings' ),
	'parallax-pro-green'  => __( 'Parallax Pro Green', 'saplings' ),
	'parallax-pro-orange' => __( 'Parallax Pro Orange', 'saplings' ),
	'parallax-pro-pink'   => __( 'Parallax Pro Pink', 'saplings' ),
) );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 360,
	'height'          => 70,
	'header-selector' => '.site-title a',
	'header-text'     => false,
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'footer-widgets',
	'footer',
) );

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'parallax_author_box_gravatar' );
function parallax_author_box_gravatar( $size ) {
	return 176;
}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'parallax_comments_gravatar' );
function parallax_comments_gravatar( $args ) {
	$args['avatar_size'] = 120;
	return $args;
}

//* Add support for 2-column footer widgets
add_theme_support( 'genesis-footer-widgets', 1 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Relocate after entry widget
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );
add_action( 'genesis_after_entry', 'genesis_after_entry_widget_area', 5 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-section-1',
	'name'        => __( 'Home Section 1', 'parallax' ),
	'description' => __( 'This is the home section 1 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-2',
	'name'        => __( 'Home Section 2', 'parallax' ),
	'description' => __( 'This is the home section 2 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-3',
	'name'        => __( 'Home Section 3', 'parallax' ),
	'description' => __( 'This is the home section 3 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-4',
	'name'        => __( 'Home Section 4', 'parallax' ),
	'description' => __( 'This is the home section 4 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-5',
	'name'        => __( 'Home Section 5', 'parallax' ),
	'description' => __( 'This is the home section 5 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-6',
	'name'        => __( 'Home Section 6', 'parallax' ),
	'description' => __( 'This is the home section 6 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-7',
	'name'        => __( 'Home Section 7', 'parallax' ),
	'description' => __( 'This is the home section 7 section.', 'saplings' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-section-8',
	'name'        => __( 'Home Section 8', 'parallax' ),
	'description' => __( 'This is the home section 8 section.', 'saplings' ),
) );

//* Chris Ubik's customizations

//* Clean <HEAD>
	//* Remove rsd link
	remove_action( 'wp_head', 'rsd_link' );
	//* Remove Windows Live Writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	//* Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	//* Remove previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	//* Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	//* Remove links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	//* Remove WP version
	remove_action( 'wp_head', 'wp_generator' );

// Remove Primary Sidebar
    unregister_sidebar( 'sidebar' );

//* Use jQuery Google API
  function cu_modify_jquery() {
  	if (!is_admin()) {
  		//* comment out the next two lines to load the local copy of jQuery
  		wp_deregister_script('jquery');
  		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', '1.11.0', '', true );
  		wp_enqueue_script('jquery');
  	}
  }
  add_action('init', 'cu_modify_jquery');

//* Customize the credits
add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
function sp_footer_creds_text() {
	echo '<div class="creds"><p>';
	echo 'Copyright &copy; ';
	echo date('Y');
	echo ' &middot; <a href="http://www.saplings.org">Saplings, Inc.</a> &middot; a Georgia registered, IRS-approved, tax exempt 501-c-3 organization ';
	echo ' &middot; website design by <a href="http://www.chrisubik.com">Chris Ubik</a> ';
	echo '</p></div>';
}

/* Change the login page */
function sp_login_logo() { ?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/P_cafe_logo_02@2x.png);
      background-size: 125px auto;
      height: 125px;
      width: 320px;
    }
  </style>
<?php }

add_action( 'login_enqueue_scripts', 'sp_login_logo' );

// Replace logo URL
    function sp_login_logo_url() {
      return home_url();
    }
    add_filter( 'login_headerurl', 'sp_login_logo_url' );

    function sp_login_logo_url_title() {
      return 'Saplings, Inc.';
    }
    add_filter( 'login_headertitle', 'sp_login_logo_url_title' );

/* Change the order of the Simple Social Icons, Change SSI to FontAwesome */
add_filter( 'simple_social_default_profiles', 'custom_simple_social_default_profiles' );
function custom_simple_social_default_profiles() {
	$glyphs = array(
		'dribbble'		=> '&#xf17d;',
		'email'			=> '&#xf0e0;',
		'facebook'		=> '&#xf09a;',
		'flickr'		=> '&#xf16e;',
		'gplus'			=> '&#xf0d5;',
		'instagram' 	=> '&#xf16d;',
		'linkedin'		=> '&#xf0e1;',
		'pinterest'		=> '&#xf0d2;',
		'tumblr'		=> '&#xf173;',
		'twitter'		=> '&#xf099;',
		'vimeo'			=> '&#xf194;',
		'youtube'		=> '&#xf167;',
		);

	$profiles = array(
		'dribbble' => array(
			'label'   => __( 'Dribbble URI', 'ssiw' ),
			'pattern' => '<li class="social-dribbble"><a href="%s" %s>' . $glyphs['dribbble'] . '</a></li>',
		),
		'email' => array(
			'label'   => __( 'Email URI', 'ssiw' ),
			'pattern' => '<li class="social-email"><a href="%s" %s>' . $glyphs['email'] . '</a></li>',
		),
		'linkedin' => array(
			'label'   => __( 'Linkedin URI', 'ssiw' ),
			'pattern' => '<li class="social-linkedin"><a href="%s" %s>' . $glyphs['linkedin'] . '</a></li>',
		),
		'twitter' => array(
			'label'   => __( 'Twitter URI', 'ssiw' ),
			'pattern' => '<li class="social-twitter"><a href="%s" %s>' . $glyphs['twitter'] . '</a></li>',
		),
		'gplus' => array(
			'label'   => __( 'Google+ URI', 'ssiw' ),
			'pattern' => '<li class="social-gplus"><a href="%s" %s>' . $glyphs['gplus'] . '</a></li>',
		),
		'flickr' => array(
			'label'   => __( 'Flickr URI', 'ssiw' ),
			'pattern' => '<li class="social-flickr"><a href="%s" %s>' . $glyphs['flickr'] . '</a></li>',
		),
		'instagram' => array(
			'label'   => __( 'Instagram URI', 'ssiw' ),
			'pattern' => '<li class="social-instagram"><a href="%s" %s>' . $glyphs['instagram'] . '</a></li>',
		),
		'facebook' => array(
			'label'   => __( 'Facebook URI', 'ssiw' ),
			'pattern' => '<li class="social-facebook"><a href="%s" %s>' . $glyphs['facebook'] . '</a></li>',
		),
		'pinterest' => array(
			'label'   => __( 'Pinterest URI', 'ssiw' ),
			'pattern' => '<li class="social-pinterest"><a href="%s" %s>' . $glyphs['pinterest'] . '</a></li>',
		),
		'tumblr' => array(
			'label'   => __( 'Tumblr URI', 'ssiw' ),
			'pattern' => '<li class="social-tumblr"><a href="%s" %s>' . $glyphs['tumblr'] . '</a></li>',
		),
		'vimeo' => array(
			'label'   => __( 'Vimeo URI', 'ssiw' ),
			'pattern' => '<li class="social-vimeo"><a href="%s" %s>' . $glyphs['vimeo'] . '</a></li>',
		),
		'youtube' => array(
			'label'   => __( 'YouTube URI', 'ssiw' ),
			'pattern' => '<li class="social-youtube"><a href="%s" %s>' . $glyphs['youtube'] . '</a></li>',
		),
  );
	return $profiles;
}
