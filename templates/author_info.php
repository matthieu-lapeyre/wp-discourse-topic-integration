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




<!--
"username": "Matthieu",
"uploaded_avatar_id": 275,
"avatar_template": "/user_avatar/forum.poppy-project.org/matthieu/{size}/275_1.png",
"name": "Matthieu Lapeyre",
"email": "matthieulapeyre@gmail.com",
"last_posted_at": "2015-06-28T11:05:48.065Z",
"last_seen_at": "2015-06-28T19:18:41.082Z",
"bio_raw": "You can easily add a description about you in your account preference !",
"bio_cooked": "<p>You can easily add a description about you in your account preference !</p>",
"created_at": "2014-01-30T14:09:35.414Z",
"website": "http://www.poppy-project.org", -->
