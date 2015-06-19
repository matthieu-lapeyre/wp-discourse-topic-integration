<?php

add_shortcode( 'discourse', 'integrate_discourse_topic' );


function integrate_discourse_topic( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'topic' => 'attribute 1 default',
        'attr_2' => 'attribute 2 default',
        // ...etc
    ), $atts );

    $json_string = file_get_contents($atts['topic']);
    $parsed_json = json_decode($json_string, true);

    $title = $parsed_json['title'];
    $author = $parsed_json['details']['created_by']['username'];
    $content = $parsed_json['post_stream']['posts'][0]['cooked'];

    echo '<h1>'.$title.'</h1>';
    echo '<h2>'.$author.'</h2>';
    echo $content;

}

?>
