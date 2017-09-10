<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // w-mexico jquery version
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//code.jquery.com/jquery-2.2.4.min.js', false, null);
    wp_enqueue_script('jquery');

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/dist/what-input.min.js', array(), '5.0.1', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/vendor/foundation/js/foundation.min.js', array( 'jquery' ), '6.4.2', true );

    // w-mexico scripts
    wp_enqueue_script( 'validate', '//cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', array('jquery'), null, null );
    wp_enqueue_script( 'validate-msg-es', get_template_directory_uri(). '/assets/js/jquery.validate.messages_es.js', array('jquery', 'validate'), '1.1', null );

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

     // Register Motion-UI
    wp_enqueue_style( 'motion-ui', get_template_directory_uri() . '/vendor/motion-ui/dist/motion-ui.min.css', array(), '', 'all' );

	// Select which grid system you want to use (Foundation Grid by default)
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/vendor/foundation/css/foundation.min.css', array(), '6.4.2', 'all' );

    // w-mexico stylesheets
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null, 'all' );

    // Register main stylesheet
    wp_enqueue_style( 'site-style', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
