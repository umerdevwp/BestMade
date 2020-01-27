<?php
/**
 * BestMade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Best_Made
 * @since 1.0.0
 */


if ( ! function_exists( 'bestmade_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bestmade_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		//load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		add_image_size( 'menu-item-list', 450, 500 );
		add_image_size( 'three-item-list', 670, 480, array( 'center', 'center' ) );
		add_image_size( 'two-item-list', 860, 700, array( 'center', 'center' ) );
		add_image_size( 'vertical-item-list', 320, 180, array( 'center', 'center' ) );
		add_image_size( 'block-item-list', 1200, 600, array( 'center', 'center' ) );
		add_image_size( 'detail-post-image', 1450, 600, true );
		add_image_size( 'more-item-image', 410, 310 );
		


		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'bestmade_setup' );



/**
 * Enqueue scripts and styles.
 */
function bestmade_css_styles() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	//wp_enqueue_style( 'bestmade-carousel', get_template_directory_uri() . '/css/slick.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	//wp_enqueue_style( 'bestmade-carousel-theme', get_template_directory_uri() . '/css/slick-theme.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'bestmade-site-styles', get_template_directory_uri() . '/css/site-styles.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'bestmade-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	
	
}
add_action( 'wp_enqueue_scripts', 'bestmade_css_styles' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */


function bestmade_js_scripts() {


	wp_enqueue_script( 'bestmade-html5shiv',  'http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6/html5shiv.min.js', array( 'html5shiv' ), '3.6', true);
	//wp_enqueue_script( 'bestmade-carousel-script',  get_template_directory_uri()  . '/js/slick.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'bestmade-carousel-scriptm',  get_template_directory_uri()  . '/js/multislider.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'bestmade-site-script',  get_template_directory_uri()  . '/assets/spree/frontend/site-scripts.js', array( 'jquery' ), '1.0', true);
	

}

add_action('wp_enqueue_scripts', 'bestmade_js_scripts', 999);


/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	  array_pop($excerpt);
	  $excerpt = implode(" ",$excerpt).'...';
	} else {
	  $excerpt = implode(" ",$excerpt);
	}	
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
  }

/**
 * Custom pagination tags for the theme.
 */
  function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}



if ( ! function_exists('custom_post_type') ) {

	// Register Custom Post Type
	function custom_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Products', 'Post Type General Name', 'bestmade' ),
			'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'bestmade' ),
			'menu_name'             => __( 'Products', 'bestmade' ),
			'name_admin_bar'        => __( 'Products', 'bestmade' ),
			'archives'              => __( 'Products Archives', 'bestmade' ),
			'attributes'            => __( 'Products Attributes', 'bestmade' ),
			'parent_item_colon'     => __( 'Parent Product:', 'bestmade' ),
			'all_items'             => __( 'All Products', 'bestmade' ),
			'add_new_item'          => __( 'Add New Product', 'bestmade' ),
			'add_new'               => __( 'Add New', 'bestmade' ),
			'new_item'              => __( 'New Product', 'bestmade' ),
			'edit_item'             => __( 'Edit Product', 'bestmade' ),
			'update_item'           => __( 'Update Product', 'bestmade' ),
			'view_item'             => __( 'View Product', 'bestmade' ),
			'view_items'            => __( 'View Products', 'bestmade' ),
			'search_items'          => __( 'Search Product', 'bestmade' ),
			'not_found'             => __( 'Not found', 'bestmade' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bestmade' ),
			'featured_image'        => __( 'Featured Image', 'bestmade' ),
			'set_featured_image'    => __( 'Set featured image', 'bestmade' ),
			'remove_featured_image' => __( 'Remove featured image', 'bestmade' ),
			'use_featured_image'    => __( 'Use as featured image', 'bestmade' ),
			'insert_into_item'      => __( 'Insert into product', 'bestmade' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bestmade' ),
			'items_list'            => __( 'Products list', 'bestmade' ),
			'items_list_navigation' => __( 'Products list navigation', 'bestmade' ),
			'filter_items_list'     => __( 'Filter products list', 'bestmade' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'bestmade' ),
			'description'           => __( 'Bestmade featured products list.', 'bestmade' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'revisions' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-tickets-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'product', $args );
	
	}
	add_action( 'init', 'custom_post_type', 0 );
	
	}


add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
add_filter( 'the_content', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Global Options',
		'menu_title'	=> 'Global Options',
		'menu_slug' 	=> 'theme-global-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
	
}
