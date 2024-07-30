<?php
define( 'THEME_URL', get_stylesheet_directory() );
define ( 'CORE', THEME_URL . "/core" );
require_once( CORE . "/init.php" );

if ( !isset($content_width) ) {
	$content_width = 620;
}

if ( !function_exists('wp_theme_setup') ) {
	function wp_theme_setup() {

		/* textdomain */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'wp', $language_folder );
		/* link RSS len <head> **/
		add_theme_support( 'automatic-feed-links' );

		/* Theme post thumbnail */
		add_theme_support( 'post-thumbnails' );

		/* Post Format */
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		) );

		/* Theme title-tag */
		add_theme_support( 'title-tag' );

		/* Theme menu */
		register_nav_menus( array(
	    	'primary-menu' => __( 'Primary Menu', 'text_domain' ),
	    	'footer-menu'  => __( 'Footer Menu', 'text_domain' ),
	    	'contact-menu'  => __( 'Contact Menu', 'text_domain' ),
		) );

		/* sidebar */
		$sidebarThumbnail = array(
			'name' => __('Image sidebar', 'wp'),
			'id' => 'thumbnail-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'thumbnail-sidebar',
		);
		register_sidebar( $sidebarThumbnail );
		
		$sidebar = array(
			'name' => __('Main Sidebar', 'wp'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		);
		register_sidebar( $sidebar );

	}
	add_action( 'init', 'wp_theme_setup' );
}

remove_action( 'wp_head', '_wp_render_title_tag', 1 );


/*--------
TEMPLATE FUNCTIONS */
if (!function_exists('wp_header')) {
	function wp_header() { ?>
		<div class="site-name">
			<?php
				global $tp_options;

				if( $tp_options['logo-on'] == 0 ) :
			?>
				<?php
					if ( is_home() ) {
						printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
						get_bloginfo('url'),
						get_bloginfo('description'),
						get_bloginfo('sitename') );
					} else {
						printf( '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
						get_bloginfo('url'),
						get_bloginfo('description'),
						get_bloginfo('sitename') );
					}
				?>

			<?php
				else :
			?>
				<img src="<?php echo $tp_options['logo-image']['url']; ?>" />
		<?php endif; ?>
		</div>
		<div class="site-description"><?php bloginfo('description'); ?></div><?php
	}
}

/**
*menu
**/
if ( !function_exists('wp_menu') ) {
	function wp_menu($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu,
			'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
		);
		wp_nav_menu( $menu );
	}
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}

/**
*pagination
**/
if ( !function_exists('wp_pagination') ) {
	function wp_pagination() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return '';
		} ?>
		<nav class="pagination" role="navigation">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="next"><?php next_posts_link( __('Next', 'wp') ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="prev"><?php previous_posts_link( __('Previous', 'wp') ); ?></div>
			<?php endif; ?>
		</nav>
	<?php }
}

/**
*thumbnail
**/
if ( !function_exists('wp_thumbnail') ) {
	function wp_thumbnail($size) {
		if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image') ) : ?>
		<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
	<?php endif; ?>
	<?php }
}

/**
*wp_entry_header = title post
**/
if ( !function_exists('wp_entry_header') ) {
	function wp_entry_header() { ?>
		<?php if ( is_single() ) : ?>
			<!-- <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1> -->
			<h2 class="entry-title"><?php the_title(); ?></h2>
		<?php else : ?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
		<?php endif; ?>
	<?php }
}

/**
*wp_entry_meta = get posts
**/
if ( !function_exists('wp_entry_meta') ) {
	function wp_entry_meta() { ?>
		<?php if ( !is_page() ) : ?>
			<div class="entry-meta">
			<?php
				printf( __('<span class="author">Posted by %1$s', 'wp'),
				get_the_author() );

				printf( __('<span class="date-published"> at %1$s', 'wp'),
				get_the_date() );

				printf( __('<span class="category"> in %1$s ', 'wp'),
				get_the_category_list( ',' ) );

				if ( comments_open() ) :
					echo '<span class="meta-reply">';
						comments_popup_link(
							__('Leave a comment', 'wp'),
							__('One comment', 'wp'),
							__('% comments', 'wp'),
							__('Read all comments', 'wp')
							);
					echo '</span>';
				endif;
			?>
			</div>
		<?php endif; ?>
	<?php }
}

/**
*wp_entry_content = post/page
**/
if ( !function_exists('wp_entry_content') ) {
	function wp_entry_content() {
		if( !is_single() && !is_page() ) {
			the_excerpt();
		} else {
			the_content();

			/* Phan trang trong single */
			$link_pages = array(
				'before' => __('<p>Page: ', 'wp'),
				'after' => '</p>',
				'nextpagelink' => __('Next Page', 'wp'),
				'previouspagelink' => __('Previous Page', 'wp')
			);
			wp_link_pages( $link_pages );
		}
	}
}

// function wp_readmore() {
// 	return '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'.__('...[Read More]', 'wp').'</a>';
// }
// add_filter('excerpt_more', 'wp_readmore');


/**
*wp_entry_tag = show tag
**/
if ( !function_exists('wp_entry_tag') ) {
	function wp_entry_tag() {
		if ( has_tag() ) :
			echo '<div class="entry-tag">';
			printf( __('Tagged in %1$s', 'wp'), get_the_tag_list( '', ',' ) );
			echo '</div>';
		endif;
	}
}
/*=====import style.css=====*/
function wp_style() {
	wp_register_style( 'style', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('style');

	wp_register_style( 'common-style', get_template_directory_uri() . "/common/css/common.css", 'all' );
	wp_enqueue_style('common-style');

	wp_register_style( 'main-style', get_template_directory_uri() . "/common/css/style.css", 'all' );
	wp_enqueue_style('main-style');


	wp_register_script( 'jquery-3-script', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js", array('jquery') );
	wp_enqueue_script('jquery-3-script');
	wp_register_script( 'main-script', get_template_directory_uri() . "/common/js/common.js", array('jquery') );
	wp_enqueue_script('main-script');
	
}
add_action('wp_enqueue_scripts', 'wp_style');

function nd_dosth_theme_setup() {
    add_theme_support( 'title-tag' );  
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'nd_dosth_theme_setup');

function remove_core_updates (){ 
	global $wp_version ; return ( object ) array ( 'last_checked' => time (), 'version_checked' => $wp_version ,); 
} 
add_filter ( 'pre_site_transient_update_core' , 'remove_core_updates' ); 
add_filter ( 'pre_site_transient_update_plugins' , 'remove_core_updates' ); 
add_filter ( 'pre_site_transient_update_themes' , 'remove_core_updates' );


// Custom Post Type

add_action('init', 'create_post_type');
function create_post_type()
{
	//------------------------------------------
	// Clients
	//------------------------------------------
	$clients = 'clients';
	register_post_type($clients,
		array(
			'labels' => array(
				'name'          => __('Our Clients'),
				'singular_name' => __('clients'), 
			),
			'public'        => true,
			'menu_position' => 5,
			'rewrite'       => array('with_front' => true),
			'supports'      => array('title', 'editor', 'thumbnail')
		)
	);

}


