<?php get_header(); ?>

<?php if(have_posts()): ?>

<div class="archive-title">
    <h2 class="page-title"><?php _e('Search Results for', 'stag') ?> <span><?php the_search_query(); ?></span></h2>
</div>

<!-- BEGIN #primary.hfeed -->
<div id="primary" class="hfeed" role="main">

    <?php while(have_posts()): the_post(); ?>

    <?php stag_post_before(); ?>
    <!-- BEGIN .hentry -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php get_template_part('content', 'background'); ?>

        <?php stag_post_start(); ?>

        <?php
            $format = get_post_format();
            get_template_part('content', $format);
        ?>

        <?php stag_post_end(); ?>
    <!-- END .hentry -->
    </article>
    <?php stag_post_after(); ?>

    <?php endwhile; ?>

    <!-- END #primary.hfeed -->
    </div>

    <?php
        global $wp_query;
        if($wp_query->max_num_pages > 1){ ?>
            <a href="#" id="load-more"><i class="icon icon-plus-big"></i></a>
        <?php } ?>

    <?php else: ?>

    <div class="hentry-inner entry-content">
        <h1 class="page-title"><?php _e('Your search did not match any entries', 'stag') ?></h1>

    <!-- BEGIN #post-0-->
    <div id="post-0">

        <!-- BEGIN .entry-content-->
        <div class="entry-content">
            <?php get_search_form(); ?>
            <p><?php _e('Suggestions:','stag') ?></p>
            <ul>
                <li><?php _e('Make sure all words are spelled correctly.', 'stag') ?></li>
                <li><?php _e('Try different keywords.', 'stag') ?></li>
                <li><?php _e('Try more general keywords.', 'stag') ?></li>
            </ul>
        <!-- END .entry-content-->
        </div>

    <!-- END #post-0-->
    </div>
    </div>

    <?php endif; ?>

<?php get_footer(); ?>