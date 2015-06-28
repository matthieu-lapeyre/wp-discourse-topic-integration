<div class="discourse-topic-integration">
  <h1><?php echo $title; ?></h1>

  <?php
      foreach ($all_posts as $post) {
        echo '<h3>'. $post['username'] .'</h3>';
        $content = add_base_url_to_link_from_discourse($post['cooked'], $discourse_base_url);
        echo $content;
        echo '<hr/>';
      }
  ?>

  <?php echo '<a href="'.$discourse_base_url . '/t/'. $atts['topic_id'] .'">'; ?> <button> Join this discussion</button> </a>
</div>
