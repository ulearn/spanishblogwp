<div class="hentry-inner">

  <div class="entry-wrapper grids">

    <?php get_template_part('content', 'meta'); ?>

    <div class="entry-content grid-10 clearfix">

      <?php

        $quote = get_post_meta(get_the_ID(), '_stag_quote_quote', true);

        if($quote != ''){
          echo "<blockquote><p>$quote<br><cite>".get_the_title()."</cite></p></blockquote>";
        }else{?>
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'stag'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
        <?php
        }

        if(is_single()){
          the_content('Continue Reading', 'stag');
          wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'stag').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
        }

      ?>

    </div>
    <span class="bottom-accent"></span>
  </div>
</div>