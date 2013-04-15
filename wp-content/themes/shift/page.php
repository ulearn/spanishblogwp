<?php get_header(); ?>

<!-- BEGIN #primary.hfeed -->
<div id="primary" class='hfeed'>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php stag_page_before(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php get_template_part('content', 'background'); ?>

        <?php stag_page_start(); ?>

            <div class="hentry-inner">
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <div class="entry-content clearfix">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php stag_page_end(); ?>
        </article>
        <?php stag_page_after(); ?>

    <?php endwhile; ?>

    <?php endif; ?>

<!-- END #primary.hfeed -->
</div>

<?php get_footer() ?>