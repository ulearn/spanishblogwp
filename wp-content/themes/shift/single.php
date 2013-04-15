<?php get_header(); ?>

<div id="primary" class='hfeed'>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

    <?php

    get_template_part('content', 'meta-footer');

    stag_comments_before();
    comments_template('', true);
    stag_comments_after();

    ?>

    <?php endwhile; ?>

    <?php endif; ?>

<!-- END #primary.hfeed -->
</div>

<?php get_footer() ?>