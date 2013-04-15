<?php get_header(); ?>

<!-- BEGIN #primary.hfeed -->
<div id="primary" class="hfeed" role="main">

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

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
    $pagination = stag_get_option('general_pagination_option');
    if($pagination == 'load-more'){
        if($wp_query->max_num_pages > 1){ ?>
            <a href="#" id="load-more"><i class="icon icon-plus-big"></i></a>
        <?php } ?>
    <?php }else{ ?>
        <!-- BEGIN .navigation .page-navigation -->
        <div class="navigation page-navigation home">
            <div class="nav-next">
                <?php next_posts_link('<i class="icon icon-arrow-left"></i>'); ?>
            </div>
            <div class="nav-previous">
                <?php previous_posts_link('<i class="icon icon-arrow-right"></i>') ?>
            </div>
        <!-- END .navigation .page-navigation -->
        </div>
    <?php } ?>

    <?php endif; ?>

<?php get_footer(); ?>