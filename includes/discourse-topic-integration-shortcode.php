<?php

add_shortcode( 'discourse', 'integrate_discourse_topic' );


function integrate_discourse_topic( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'attr_1' => 'attribute 1 default',
        'attr_2' => 'attribute 2 default',
        // ...etc
    ), $atts );

    // Trick from https://themeavenue.net/using-html-shortcode-function/
    /* Turn on buffering */
    	ob_start(); ?>

      <div ng-app="DiscourseApp">
        <div class="main" ng-controller="MainController">
            <h1>{{ project_name }}</h1>
            <h2> {{author}}</h2>
            <div ng-bind-html="topic_content | sanitize"></div>
        </div>
      </div>

    	<?php
    	/* Get the buffered content into a var */
    	$sc = ob_get_contents();

    	/* Clean buffer */
    	ob_end_clean();

    	/* Return the content as usual */
    	return $sc;

}

?>
