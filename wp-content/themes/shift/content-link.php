<div class="hentry-inner">

  <div class="entry-wrapper grids">

    <?php get_template_part('content', 'meta'); ?>

    <div class="entry-content grid-10 clearfix">

      <?php

      $link = get_post_meta( get_the_ID(), '_stag_link_url', true );

      if( $link != '' ){
        echo "<h2 class='entry-title'><a href=".$link.">".get_the_title()."</a></h2>";
      }

      if(is_singular()){
        the_content('Continue Reading', 'stag');
        wp_link_pages(array('before' => '<p class="linked-pages"><strong>'.__('Pages:', 'stag').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
      }

      ?>
    </div>
    <span class="bottom-accent"></span>
  </div>
</div>