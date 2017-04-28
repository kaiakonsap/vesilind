<?php


function Vesilind_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'Vesilind' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'Vesilind' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'Vesilind_widgets_init' );

function register_my_menu()
{
    register_nav_menu('header-menu', 'Header Menu');
}

add_action('init', 'register_my_menu');
add_theme_support('post-thumbnails');

function scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'extra', get_template_directory_uri() . '/screen.css' );
	wp_enqueue_style( 'sans', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700' );
  wp_enqueue_style( 'awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'mainfonts', 'https://fonts.googleapis.com/css?family=Oswald:200|Roboto:300' );
  wp_enqueue_style( 'carousel', get_template_directory_uri() . '/js/owl-carousel/assets/owl.carousel.css' );
  wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '1', true );

	wp_enqueue_style( 'colorboxcss', get_stylesheet_directory_uri() . '/js/colorbox/colorbox.css' );
// wp_enqueue_script( 'colorbox', get_stylesheet_directory_uri() . '/js/colorbox/jquery.colorbox-min.js', array( 'jquery' ) );
//wp_enqueue_style( 'featherlight',  '//cdn.rawgit.com/noelboss/featherlight/1.7.2/release/featherlight.min.css' );
// wp_enqueue_style( 'gallery', '///cdn.rawgit.com/noelboss/featherlight/1.7.2/release/featherlight.gallery.min.css' );

	wp_enqueue_script( 'func', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ) );
	wp_enqueue_script( 'featherlight', '//cdn.rawgit.com/noelboss/featherlight/1.7.2/release/featherlight.min.js', array( 'jquery' ), '1', true  );
	wp_enqueue_script( 'gallery',  '//cdn.rawgit.com/noelboss/featherlight/1.7.2/release/featherlight.gallery.min.js', array( 'jquery','featherlight' ), '1', true  );
wp_enqueue_script( 'colorfire', get_stylesheet_directory_uri() . '/js/colorfire.js', array( 'jquery','gallery' ), '1', true );
	}
add_action( 'wp_enqueue_scripts', 'scripts' );

$args = array(
  'width'         => 90,
  'height'        => 84,
  'default-image' => get_template_directory_uri() . '/images/logo.svg',
  );
add_theme_support( 'custom-header', $args );

function customize_register( $wp_customize ) {


  $wp_customize->add_section(
    'footer_setting_section',
    array(
      'title' => 'Jaluse sätted',
      'description' => 'Muuda siit jaluse tekste.',
      'priority' => 9999,
      )
    );

    //Add a setting
  $wp_customize->add_setting(
    'footer_text',
    array(
     'default' => '© 2016 vesilind.ee',
     'transport'   => 'postMessage'
     )
    );
    //Add control
  $wp_customize->add_control(
    'footer_text',
    array(
      'label' => 'Jaluse copyright',
      'section' => 'footer_setting_section',
      'type' => 'text',
      )
    );
		//Add a setting
	$wp_customize->add_setting(
		'footer_facebook',
		array(
		 'default' => 'https://www.facebook.com/Vesilind-267555669985320/?fref=ts',
		 'transport'   => 'postMessage'
		 )
		);
		//Add control
	$wp_customize->add_control(
		'footer_facebook',
		array(
			'label' => 'Facebooki url',
			'section' => 'footer_setting_section',
			'type' => 'text',
			)
		);

    }
add_action('customize_register', 'customize_register');
function childtheme_customizer_live_preview() {
  wp_enqueue_script(
    'customize_register',
    get_stylesheet_directory_uri().'/js/theme-customizer.js',
    array( 'jquery','customize-preview' ),
    '1.0',
    true
    );
}
add_action( 'customize_preview_init', 'childtheme_customizer_live_preview' );

function create_posttype() {

  register_post_type( 'portfolio',
    array(
      'labels' => array(
        'name' => __('Portfoolio', 'Vesilind'),
        'singular_name' => __('Töö', 'Vesilind'),
				'add_new' => __('Lisa uus töö', 'Vesilind'),
        ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('works', 'Vesilind')),
      'supports' => array(
        'title',
        'editor',
  'thumbnail'
        )
      )
    );
}
add_action( 'init', 'create_tax' );

function create_tax() {
  register_taxonomy(
    'portfolio_cat',
    'portfolio',
    array(
      'label' => __( 'Portfoolio kategooria', 'Vesilind' ),
      'rewrite' => array('slug' => __('portfolio-category', 'Vesilind')),
      'hierarchical' => true,
      )
    );
}


add_action( 'init', 'create_posttype' );
