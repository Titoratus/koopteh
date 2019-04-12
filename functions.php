<?php
/**
 * koopteh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package koopteh
 */

if ( ! function_exists( 'koopteh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function koopteh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on koopteh, use a find and replace
		 * to change 'koopteh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'koopteh', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'koopteh' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'koopteh_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'koopteh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function koopteh_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'koopteh_content_width', 640 );
}
add_action( 'after_setup_theme', 'koopteh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function koopteh_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'koopteh' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'koopteh' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'koopteh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function koopteh_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'koopteh_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Включение Рубрик для страниц
function enable_cat_for_pages() {
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page'); 
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of your theme functions.php file 
add_action( 'init', 'enable_cat_for_pages' );

remove_action( 'wp_head', 'wp_resource_hints', 1);
remove_action( 'wp_head', 'feed_links', 2);
remove_action( 'wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'wp_generator');
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

function gutenberg_boilerplate_block() {
    wp_register_script(
        'gutenberg-boilerplate-es5-step01',
        plugins_url( 'step-01/block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );

    register_block_type( 'gutenberg-boilerplate-es5/hello-world-step-01', array(
        'editor_script' => 'gutenberg-boilerplate-es5-step01',
    ) );
}
add_action( 'init', 'gutenberg_boilerplate_block' );

// Специальности
function create_post_type() {
  register_post_type( 'speciality',
    array(
      'labels' => array(
        'name' => __( 'Специальности' ),
        'singular_name' => __( 'Специальность' ),
        'add_new' => 'Добавить новую'
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-book-alt',
      'supports' => array('title', 'custom-fields')
    )
  );
}
add_action( 'init', 'create_post_type' );

// Доп. поля в "Настройках"
function my_more_options() {
	add_settings_field('comp_vk', 'ВКонтакте', 'display_vk', 'general');
	register_setting('general', 'comp_vk');
	add_settings_field('org_addr', 'Адрес техникума', 'display_addr', 'general');
	register_setting('general', 'org_addr');
	add_settings_field('org_date', 'Дата создания образовательной организации', 'display_date', 'general');
	register_setting('general', 'org_date');
	add_settings_field('org_uch', 'Учредитель', 'display_uch', 'general');
	register_setting('general', 'org_uch');	
	add_settings_field('org_uch_addr', 'Адрес учредителя', 'display_uch_addr', 'general');
	register_setting('general', 'org_uch_addr');
	add_settings_field('org_tels', 'Контактные телефоны', 'display_tels', 'general');
	register_setting('general', 'org_tels');
	add_settings_field('org_email', 'Электронная почта', 'display_emails', 'general');
	register_setting('general', 'org_email');	
	add_settings_field('org_site', 'Адрес сайта учредителя', 'display_site', 'general');
	register_setting('general', 'org_site');		
	add_settings_field('org_workTime', 'График работы техникума', 'display_workTime', 'general');
	register_setting('general', 'org_workTime');		
	add_settings_field('org_fax', 'Факс техникума', 'display_fax', 'general');
	register_setting('general', 'org_fax');		
}

add_action('admin_init', 'my_more_options');

function display_vk() {
	echo "<input type='text' name='comp_vk' autocomplete='off' value='".esc_attr(get_option('comp_vk'))."'>";
}

function display_addr() {
	echo "<input type='text' style='width: 500px' name='org_addr' autocomplete='off' value='".esc_attr(get_option('org_addr'))."'>";
}

function display_date() {
	echo "<input type='text' name='org_date' autocomplete='off' value='".esc_attr(get_option('org_date'))."'>";
}

function display_uch() {
	echo "<input type='text' style='width: 500px' name='org_uch' autocomplete='off' value='".esc_attr(get_option('org_uch'))."'>";
}

function display_uch_addr() {
	echo "<input type='text' style='width: 500px' name='org_uch_addr' autocomplete='off' value='".esc_attr(get_option('org_uch_addr'))."'>";
}

function display_tels() {
	echo "<textarea name='org_tels' style='width: 500px' rows='3'>".esc_attr(get_option('org_tels'))."</textarea>";
}

function display_emails() {
	echo "<input type='text' name='org_email' autocomplete='off' value='".esc_attr(get_option('org_email'))."'>";
}

function display_site() {
	echo "<input type='text' name='org_site' autocomplete='off' value='".esc_attr(get_option('org_site'))."'>";
}

function display_workTime() {
	echo "<textarea name='org_workTime' style='width: 500px' rows='3'>".esc_attr(get_option('org_workTime'))."</textarea>";
}

function display_fax() {
	echo "<input type='text' name='org_fax' autocomplete='off' value='".esc_attr(get_option('org_fax'))."'>";
}

// Excerpt
add_filter('excerpt_more', function($more) {
	return '...';
});
add_filter( 'excerpt_length', function(){
	return 22;
});
remove_filter( 'the_excerpt', 'wpautop' );

// Фотогалерея
function create_my_gallery() {
  register_post_type( 'gallery',
    array(
      'labels' => array(
        'name' => __( 'Галерея' ),
        'singular_name' => __( 'Галерея' ),
        'add_new' => 'Добавить альбом',
        'add_new_item' => 'Добавить альбом',
      ),
      'public' => true,
      'has_archive' => false,
      'menu_icon' => 'dashicons-format-gallery',
      'supports' => array('title', 'custom-fields'),
			//'rewrite' => array('slug' => 'gallery/%gallery%')
    )
  );
}
add_action( 'init', 'create_my_gallery' );

// Видео
function create_video() {
  register_post_type( 'video',
    array(
      'labels' => array(
        'name' => __( 'Видео' ),
        'singular_name' => __( 'Видео' ),
        'add_new' => 'Добавить видео',
        'add_new_item' => 'Добавить видео',
      ),
      'public' => true,
      'has_archive' => false,
      'menu_icon' => 'dashicons-editor-video',
      'supports' => array('title', 'custom-fields')
    )
  );
}
add_action( 'init', 'create_video' );

// function wpa_gallery_post_link( $post_link, $id = 0 ){
//     $post = get_post($id);  
//     if ( is_object( $post ) ){
//         $terms = wp_get_object_terms( $post->ID, 'gallery' );
//         if( $terms ){
//             return str_replace( '%gallery%' , $terms[0]->slug , $post_link );
//         }
//     }
//     return $post_link;  
// }
// add_filter( 'post_type_link', 'wpa_gallery_post_link', 1, 3 );

// Полезные ссылки
function create_links() {
  register_post_type( 'useful_links',
    array(
      'labels' => array(
        'name' => __( 'Ссылки' ),
        'singular_name' => __( 'Ссылка' ),
        'add_new' => 'Добавить ссылку',
        'add_new_item' => 'Добавить ссылку',
      ),
      'public' => true,
      'has_archive' => false,
      'menu_icon' => 'dashicons-admin-links',
      'supports' => array('title', 'custom-fields')
    )
  );
}
add_action( 'init', 'create_links' );

function override_tinymce_option($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_tinymce_option');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );