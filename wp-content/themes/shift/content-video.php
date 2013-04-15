<div class="hentry-inner">

  <?php
    $embed = get_post_meta(get_the_ID(), '_stag_video_embed', true);
    if( !empty( $embed ) ){
      echo "<div class='the-video-player'>".stripslashes(htmlspecialchars_decode($embed))."</div>";
    } else {
      stag_video_player(get_the_ID());
    }
  ?>

  <div class="entry-wrapper grids">

    <?php get_template_part('content', 'meta'); ?>

    <div class="entry-content grid-10 clearfix">

      <?php if( is_single() ) { ?>

        <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php } else { ?>

        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'stag'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
      <?php } ?>

      <?php

        if(!is_singular()){
          if(get_the_excerpt() != '') echo "<p>".strip_shortcodes(get_the_excerpt())."</p>";
        }else{
          the_content('Continue Reading', 'stag');
          wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'stag').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
        }

      ?>
    </div>
    <span class="bottom-accent"></span>
  </div>
</div>