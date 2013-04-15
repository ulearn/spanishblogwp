<!--BEGIN .navigation .page-navigation -->
<div class="navigation page-navigation">
    <div class="post-metas">
        <span class="author"><?php _e('By ', 'stag') ?><?php the_author_posts_link(); ?></span>
        <span class="divider">/</span>
        <span class="entry-categories"><?php _e('In Category ', 'stag') ?> <?php the_category(', ') ?></span>

        <?php if(has_tag()): ?>
        <span class="post-tags">
            <span class="divider">/</span>
            <?php the_tags('<span>Tags&nbsp;&nbsp;</span><span class="the-tag">', '</span><span class="the-tag">', '</span>'); ?>
        </span>
        <?php endif; ?>
    </div>

    <div class="left-right-nav">
        <span class="nav-prev"><?php previous_post_link('%link', '<i class="icon icon-arrow-left"></i>') ?></span>
        <span class="nav-next"><?php next_post_link('%link', '<i class="icon icon-arrow-right"></i>') ?></span>
    </div>

<!--END .navigation .page-navigation -->
</div>