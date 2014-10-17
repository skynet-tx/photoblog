<?php
function mytheme_enqueue_scripts() {
  // Add the main stylesheet.
  wp_enqueue_style( 'genericons', get_template_directory_uri() . '/resources/sass/css/style.css', array(), '3.03' );

   // register AngularJS
  wp_register_script('angular-core', get_template_directory_uri().'/js/core/angular.min.js', array(), null, false);
  wp_register_script('angular-core', get_template_directory_uri().'/js/core/angular-route.min.js', array("angular-core"), null, false);
  wp_register_script('angular-resource', get_template_directory_uri().'/js/core/angular-resource.min.js', array("angular-core"), null, false);
  wp_register_script('angular-route', get_template_directory_uri().'/js/core/angular-route.min.js', array("angular-core"), null, false);
  wp_register_script('angular-animate', get_template_directory_uri().'/js/core/angular-animate.min.js', array("angular-core"), null, false);
  wp_register_script('angular-loader', get_template_directory_uri().'/js/core/angular-loader.min.js', array("angular-core"), null, false);
  wp_register_script('angular-messages', get_template_directory_uri().'/js/core/angular-messages.min.js', array("angular-core"), null, false);
  wp_register_script('angular-touch', get_template_directory_uri().'/js/core/angular-touch.min.js', array("angular-core"), null, false);
  wp_register_script('angular-strap', get_template_directory_uri().'/js/thirdparty/angular-strap-2.1.1/angular-strap.min.js', array("angular-core"), null, false);
  wp_register_script('angular-strap.tpl', get_template_directory_uri().'/js/thirdparty/angular-strap-2.1.1/angular-strap.tpl.min.js', array("angular-core"), null, false);
  wp_register_script('toaster', get_template_directory_uri().'/js/thirdparty/AngularJS-Toaster/toaster.js', array("angular-core"), null, false);
  wp_register_script('angular-carousel', get_template_directory_uri().'/js/thirdparty/angular-carousel/dist/angular-carousel.min.js', array('angular-core'), null, false);

  //Lodash js
  wp_register_script('lodashjs', get_template_directory_uri().'/js/thirdparty/lodash.underscore.js', array(), null, false);

  // register our app.js, which has a dependency on angular-core
  wp_register_script('angular-app', get_template_directory_uri().'/js/app/app.js', array('angular-core'), null, false);
  wp_register_script('route-config', get_template_directory_uri().'/js/app/route-config.js', array('angular-core'), null, false);

  wp_register_script('getServices', get_template_directory_uri().'/js/app/services/getServices.js', array('angular-core'), null, false);
  wp_register_script('logger', get_template_directory_uri().'/js/app/services/logger.js', array('angular-core'), null, false);
  wp_register_script('bgShadow', get_template_directory_uri().'/js/app/services/bgShadow.js', array('angular-core'), null, false);


  wp_register_script('topMenu', get_template_directory_uri().'/js/app/topMenu.js', array('angular-core'), null, false);
  wp_register_script('HomeCtrl', get_template_directory_uri().'/js/app/home/HomeCtrl.js', array('angular-core'), null, false);

  // enqueue all scripts
  wp_enqueue_script('angular-core');
  wp_enqueue_script('angular-route');
  wp_enqueue_script('angular-resource');
  wp_enqueue_script('angular-animate');
  wp_enqueue_script('angular-loader');
  wp_enqueue_script('angular-messages');
  wp_enqueue_script('angular-touch');
  wp_enqueue_script('angular-strap');
  wp_enqueue_script('angular-strap.tpl');
  wp_enqueue_script('toaster');
  wp_enqueue_script('angular-carousel');
  wp_enqueue_script('angular-app');

  wp_enqueue_script('lodashjs');

  wp_enqueue_script('route-config');

  wp_enqueue_script('getServices');
  wp_enqueue_script('logger');
  wp_enqueue_script('bgShadow');

  wp_enqueue_script('topMenu');
  wp_enqueue_script('HomeCtrl');

  // we need to create a JavaScript variable to store our API endpoint...
   wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/wp-json/') ); // this is the API address of the JSON API plugin
  //... and useful information such as the theme directory and website url
  wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_template_directory_uri().'/', 'site' => get_bloginfo('wpurl')) );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;
?>
