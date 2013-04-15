<div class="hentry-inner">

  <div class="entry-wrapper grids">

    <?php get_template_part('content', 'meta'); ?>

    <div class="entry-content grid-10 clearfix">

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