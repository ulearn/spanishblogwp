<!-- BEGIN .entry-meta.entry-header -->
<aside class="grid-2 entry-meta entry-header">

    <?php
    $format = get_post_format();
    if(empty($format)) $format = 'standard';
    $link =  get_post_format_link($format);
    ?>
    <span class="published">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'stag'), get_the_title()); ?>"><i class="icon icon-date pull-left"></i> <?php the_time('M d, Y'); ?></a>
    </span>
    <div class="post-meta clearfix">

        <?php if(!empty($link)): ?>
        <span class="icon-wrap"><a href="<?php echo $link; ?>"><i class="icon icon-<?php echo $format; ?>"></i></a></span>
        <?php else: ?>
        <span class="icon-wrap"><i class="icon icon-<?php echo $format; ?>"></i></span>
        <?php endif; ?>

        <span class="comment-number"><?php comments_popup_link(__('0', 'stag'), __('1', 'stag'), __('%', 'stag'), '', '<del>0</del>'); ?></span>
        <span class="likes-number"><?php stag_likes(); ?></span>
    </div>

    <!-- END .entry-meta.entry-header -->
</aside>