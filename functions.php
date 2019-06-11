<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function remove_parent_widgets(){
	// Unregister some of the Parent sidebars
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'herocanvas' );
	unregister_sidebar( 'statichero' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11 );

function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );

	// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Add Font Awesome
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.8.2/css/fontawesome.css' );

	// Home Page
	if ( is_home() ) {
		wp_enqueue_style( 'carousel-styles', get_stylesheet_directory_uri() . '/css/canvas/swiper.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'carousel-scripts', get_stylesheet_directory_uri() . '/js/canvas/jquery.owlcarousel.js', array(), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'carousel-custom-scripts', get_stylesheet_directory_uri() . '/js/canvas/functions.js', array(), $the_theme->get( 'Version' ), true );
	}
}

function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

add_action( 'after_setup_theme', 'custom_image_sizes' );
function custom_image_sizes() {
	add_image_size( 'carousel-small', 200, 150 ); 
	add_image_size( 'carousel-large', 820, 560, true );
	add_image_size( 'home-page-icon', 85, 85, true );
}


if ( ! function_exists('home_page_carousel') ) {

	// Register Custom Post Type
	function home_page_carousel() {

		$labels = array(
			'name'                  => _x( 'Slides', 'Post Type General Name', 'understrap-child' ),
			'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'understrap-child' ),
			'menu_name'             => __( 'Carousels (Large)', 'understrap-child' ),
			'name_admin_bar'        => __( 'Carousels (Large)', 'understrap-child' ),
			'archives'              => __( 'Item Archives', 'understrap-child' ),
			'attributes'            => __( 'Item Attributes', 'understrap-child' ),
			'parent_item_colon'     => __( 'Parent Item:', 'understrap-child' ),
			'all_items'             => __( 'All Items', 'understrap-child' ),
			'add_new_item'          => __( 'Add New Item', 'understrap-child' ),
			'add_new'               => __( 'Add New', 'understrap-child' ),
			'new_item'              => __( 'New Item', 'understrap-child' ),
			'edit_item'             => __( 'Edit Item', 'understrap-child' ),
			'update_item'           => __( 'Update Item', 'understrap-child' ),
			'view_item'             => __( 'View Item', 'understrap-child' ),
			'view_items'            => __( 'View Items', 'understrap-child' ),
			'search_items'          => __( 'Search Item', 'understrap-child' ),
			'not_found'             => __( 'Not found', 'understrap-child' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'understrap-child' ),
			'featured_image'        => __( 'Carousel Image', 'understrap-child' ),
			'set_featured_image'    => __( 'Set Carousel Image', 'understrap-child' ),
			'remove_featured_image' => __( 'Remove Carousel Image', 'understrap-child' ),
			'use_featured_image'    => __( 'Use as Carousel Image', 'understrap-child' ),
			'insert_into_item'      => __( 'Insert into item', 'understrap-child' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'understrap-child' ),
			'items_list'            => __( 'Items list', 'understrap-child' ),
			'items_list_navigation' => __( 'Items list navigation', 'understrap-child' ),
			'filter_items_list'     => __( 'Filter items list', 'understrap-child' ),
		);
		$args = array(
			'label'                 => __( 'Slide', 'understrap-child' ),
			'description'           => __( 'Carousels Large', 'understrap-child' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-slides',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'home_page_carousel', $args );
	}

	add_action( 'init', 'home_page_carousel', 0 );

}

if ( ! function_exists('carousel_small') ) {

	// Register Custom Post Type
	function carousel_small() {

		$labels = array(
			'name'                  => _x( 'Slides', 'Post Type General Name', 'understrap-child' ),
			'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'understrap-child' ),
			'menu_name'             => __( 'Carousels (Small)', 'understrap-child' ),
			'name_admin_bar'        => __( 'Carousels (Small)', 'understrap-child' ),
			'archives'              => __( 'Item Archives', 'understrap-child' ),
			'attributes'            => __( 'Item Attributes', 'understrap-child' ),
			'parent_item_colon'     => __( 'Parent Item:', 'understrap-child' ),
			'all_items'             => __( 'All Items', 'understrap-child' ),
			'add_new_item'          => __( 'Add New Item', 'understrap-child' ),
			'add_new'               => __( 'Add New', 'understrap-child' ),
			'new_item'              => __( 'New Item', 'understrap-child' ),
			'edit_item'             => __( 'Edit Item', 'understrap-child' ),
			'update_item'           => __( 'Update Item', 'understrap-child' ),
			'view_item'             => __( 'View Item', 'understrap-child' ),
			'view_items'            => __( 'View Items', 'understrap-child' ),
			'search_items'          => __( 'Search Item', 'understrap-child' ),
			'not_found'             => __( 'Not found', 'understrap-child' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'understrap-child' ),
			'featured_image'        => __( 'Carousel Image', 'understrap-child' ),
			'set_featured_image'    => __( 'Set Carousel Image', 'understrap-child' ),
			'remove_featured_image' => __( 'Remove Carousel Image', 'understrap-child' ),
			'use_featured_image'    => __( 'Use as Carousel Image', 'understrap-child' ),
			'insert_into_item'      => __( 'Insert into item', 'understrap-child' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'understrap-child' ),
			'items_list'            => __( 'Items list', 'understrap-child' ),
			'items_list_navigation' => __( 'Items list navigation', 'understrap-child' ),
			'filter_items_list'     => __( 'Filter items list', 'understrap-child' ),
		);
		$args = array(
			'label'                 => __( 'Small Slide', 'understrap-child' ),
			'description'           => __( 'Carousels Small', 'understrap-child' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-slides',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'carousel_small', $args );
	}

	add_action( 'init', 'carousel_small', 0 );

}

function register_pre_nav_menu() {
	register_nav_menu('pre-nav-menu',__( 'Pre-Header Navigation' ));
}
add_action( 'init', 'register_pre_nav_menu' );

function register_pre_nav_social_menu() {
	register_nav_menu('pre-nav-social-menu',__( 'Pre-Header Social Menu' ));
}
add_action( 'init', 'register_pre_nav_social_menu' );

function understrap_site_info() { ?>
	<div class="container footer-copy">
		<div class="row align-items-center">
			<div class="col">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logo.png" alt="">
				<p>Wellman Dynamics Corporation LLC. &copy;<?php echo date('Y'); ?>. All rights reserved</p>
			</div>
		</div>
	</div>
	
<?php }

add_action( 'widgets_init', 'custom_widgets_init' );

if ( ! function_exists( 'custom_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function custom_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Under Home Slider', 'understrap' ),
				'id'            => 'under-home-slider',
				'description'   => __( 'Area just under the Home Page Slideshow', 'understrap' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
} // endif function_exists( 'custom_widgets_init' ).


// Custom Widget
if(!class_exists('HomePageWidget')) {

	class HomePageWidget extends WP_Widget {

		/**
		* Sets up the widgets name etc
		*/
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'home_page_widget',
				'description' => '3 Columns just under the Slider',
			);
			parent::__construct( 'home_page_widget', 'Home Page Widget', $widget_ops );
		}

		/**
		* Outputs the content of the widget
		*
		* @param array $args
		* @param array $instance
		*/
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			// widget ID with prefix for use in ACF API functions
			$widget_id = 'widget_' . $args['widget_id'];

			$icon = get_field( 'icon_image', $widget_id ) ? get_field( 'icon_image', $widget_id ) : '';
			$title = get_field( 'title', $widget_id ) ? get_field( 'title', $widget_id ) : '';
			$text = get_field( 'text', $widget_id ) ? get_field( 'text', $widget_id ) : '';
			$btn_text = get_field( 'button_text', $widget_id );
			$btn_link = get_field( 'button_url', $widget_id ) ? get_field( 'button_url', $widget_id ) : '#';

			echo '<div class="col">';
			echo $args['before_widget'];
			if( !empty($icon) ): ?>
				<div class="image">
					<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
				</div>

			<?php endif;

			echo '<div class="content">';
			if ( $title ) {
				echo $args['before_title'] . esc_html($title) . $args['after_title'];
			}
			echo '<p>';
			the_field( 'text', $widget_id );
			echo '</p>';

			if($btn_text) {
				echo '<button href="' . esc_url($btn_link) . '">' . esc_html($btn_text) . '</button>';
			}
			echo '</div>';

			echo $args['after_widget'];
			echo '</div>';

		}

		/**
		* Outputs the options form on admin
		*
		* @param array $instance The widget options
		*/
		public function form( $instance ) {
			// outputs the options form on admin
		}

		/**
		* Processing widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*
		* @return array
		*/
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
		}

	}

}


$image = get_field('icon_image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif;

/**
 * Register our CTA Widget
 */
function register_home_page_widget() {
	register_widget( 'HomePageWidget' );
}
add_action( 'widgets_init', 'register_home_page_widget' );
