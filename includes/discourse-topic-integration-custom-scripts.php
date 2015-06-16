<?php

function import_angularjs_core()
{
    wp_register_script('angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js', array(), null, false);
    wp_enqueue_script( 'angular-core' );
}

add_action( 'wp_enqueue_scripts', 'import_angularjs_core' );


function import_custom_plugin_scripts()
{
    wp_register_script( 'discourse-app', plugins_url( '/stuff/js/app.js', __FILE__ ), array(), null, true  );
    wp_enqueue_script( 'discourse-app' );
    wp_register_script( 'main-controller', plugins_url( '/stuff/js/controllers/MainController.js', __FILE__ ), array(), null, true  );
    wp_enqueue_script( 'main-controller' );
    wp_register_script( 'discourse-json', plugins_url( '/stuff/js/services/discourse.js', __FILE__ ), array(), null, true  );
    wp_enqueue_script( 'discourse-json' );
}

add_action( 'wp_enqueue_scripts', 'import_custom_plugin_scripts' );

?>
