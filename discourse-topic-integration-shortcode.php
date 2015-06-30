<?php

add_shortcode( 'discourse', 'integrate_discourse_topic' );


function integrate_discourse_topic( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'topic_id' => '1',
        'type' => 'subject',
    ), $atts, 'discourse');

    $discourse_base_url = get_option('dti_discourse_base_url');

    $topic_data = get_discourse_data('topic', $a['topic_id']);
    $get_raw_content = $topic_data['post_stream']['posts'][0]['cooked'];

    $title = $topic_data['title'];
    $content = add_base_url_to_link_from_discourse($get_raw_content, $discourse_base_url);
    $author = $topic_data['details']['created_by']['username'];

    $author_data =  get_discourse_data('user', $author);
    $author_info = $author_data['user'];
    $author_avatar = $discourse_base_url . str_replace('{size}', '240', $author_info['avatar_template']);

    if ($a['type'] == 'subject') {
      $template_url = 'templates/topic_subject.php';
    } elseif ($a['type'] == 'full') {
      $all_posts = $topic_data['post_stream']['posts'];
      $template_url = 'templates/full_topic.php';
    } elseif ($a['type'] == 'reverse-full') {
      $all_posts = array_reverse($topic_data['post_stream']['posts']);
      $template_url = 'templates/full_topic.php';
    } elseif ($a['type'] == 'author-info') {
      $template_url = 'templates/author_info.php';
    } else {
        echo 'wrong type it should be either "subject", "author-info" "full" or "reverse-full"';
    }

    require_once($template_url);

}

function get_discourse_data($type, $id){

  $discourse_base_url = get_option('dti_discourse_base_url');

  if ($type == 'topic') {
    $content_url = $discourse_base_url . '/t/'. $id;
  } elseif ($type == 'user') {
    $content_url = $discourse_base_url . '/users/'. $id;
  } else {
      echo 'wrong type it should be either "topic" or "user"';
  }

  $json_url = $content_url.'.json';
  $json_string = file_get_contents($json_url);
  $parsed_json = json_decode($json_string, true);

  return $parsed_json;
}

function add_base_url_to_link_from_discourse($cooked, $base_url){

  $relative_image_path = 'src="/uploads';
  $absolute_image_path = 'src="'.$base_url.'/uploads';
  $new_content = str_replace($relative_image_path, $absolute_image_path, $cooked, $count);

  $relative_image_path = 'src="/images';
  $absolute_image_path = 'src="'.$base_url.'/images';
  $new_content = str_replace($relative_image_path, $absolute_image_path, $cooked, $count);

  $relative_user_avatar_path = 'src="/user_avatar';
  $absolute_user_avatar_path = 'src="'.$base_url.'/user_avatar';
  $new_content = str_replace($relative_user_avatar_path, $absolute_user_avatar_path, $new_content, $count);

  $relative_user_path = 'href="/users';
  $absolute_user_path = 'href="'.$base_url.'/users';
  $new_content = str_replace($relative_user_path, $absolute_user_path, $new_content, $count);

  return $new_content;
}

?>
