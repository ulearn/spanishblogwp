<div class="hentry-inner">

  <div class="entry-wrapper grids">

    <?php get_template_part('content', 'meta'); ?>

    <div class="entry-content grid-10 clearfix">

      <?php

      $status = get_the_content();

      if( $status != '' ){
        echo "<h2 class='entry-title'>".$status."</h2>";
      }

      ?>
    </div>
    <span class="bottom-accent"></span>
  </div>
</div>