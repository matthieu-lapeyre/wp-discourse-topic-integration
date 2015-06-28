<div class="discourse-topic-integration">
  <h1><?php echo $title; ?></h1>
  <h2><?php echo $author; ?></h2>
  <?php echo '<img src="'.$author_avatar.'" >'; ?>
  <?php echo $content; ?>
  <hr/>
  <?php echo '<a href="'.$discourse_base_url . '/t/'. $atts['topic_id'] .'">'; ?> <button> Go to the discussion</button> </a>
</div>
