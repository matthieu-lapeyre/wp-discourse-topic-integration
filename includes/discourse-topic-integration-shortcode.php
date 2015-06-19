<?php

add_shortcode( 'discourse', 'integrate_discourse_topic' );


function integrate_discourse_topic( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'topic_id' => '1',
    ), $atts );

    $discourse_base_url = get_option('dti_discourse_base_url');
    $topic_url = $discourse_base_url . '/t/'. $atts['topic_id'];
    $topic_json_url = $topic_url.'.json';

    $json_string = file_get_contents($topic_json_url);
    $parsed_json = json_decode($json_string, true);
    $get_raw_content = $parsed_json['post_stream']['posts'][0]['cooked'];
    $get_topic_url =  $parsed_json['post_stream']['posts'][0]['cooked'];

    $relative_image_path = 'src="/uploads';
    $absolute_image_path = 'src="'.$discourse_base_url.'/uploads';

    $content = str_replace($relative_image_path, $absolute_image_path, $get_raw_content, $count);

    $file = fopen("users.txt", "a+");
    file_put_contents("users.txt", $content);
    fclose($file);


    $title = $parsed_json['title'];
    $author = $parsed_json['details']['created_by']['username'];



    echo '<h1>'.$title.'</h1>';
    echo '<h2>'.$author.'</h2>';
    echo $content;
    echo '<a href="'.$topic_url.'"> <button> Go to the discussion</button> </a>';

}

?>
