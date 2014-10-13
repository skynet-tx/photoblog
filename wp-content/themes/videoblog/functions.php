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
?>
