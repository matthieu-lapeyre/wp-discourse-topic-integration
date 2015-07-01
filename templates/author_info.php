<div class="discourse-topic-integration">
  <div class="author-info">

    <h2><?php echo $author; ?></h2>
    <?php echo '<img class="discourse-avatar" src="'.$author_avatar.'" >'; ?>

    <?php
    if( isset($author_info['bio_cooked'])){
      echo $author_info['bio_cooked'];
    }else{
      echo 'no bio available';
    }
    ?>
    <br/>
    <?php echo '<a href="'.$discourse_base_url . '/users/'. $author_info['username'] .'">'; ?> <button> Go to profil</button> </a>

  </div>
</div>
