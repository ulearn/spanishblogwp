<?php get_header(); ?>
<!-- BEGIN .container-wrap -->
<div class="container-wrap">

    <?php
    $archive = '';
    if(have_posts()):

        if( is_category() ){ $archive = 'cat='. get_query_var('cat'); }
        elseif( is_tag() ){ $archive = 'tag_id='. get_query_var('tag_id'); }
        elseif( is_day() ){ $archive = 'year='. get_the_time('Y') .'&monthnum='. get_the_time('n') .'&day='. get_the_time('j'); }
        elseif( is_month() ){ $archive = 'year='. get_the_time('Y') .'&monthnum='. get_the_time('n'); }
        elseif( is_year() ){ $archive = 'year='. get_the_time('Y'); }
        elseif( is_author() ){ $archive = 'author='. get_query_var('author'); }
        elseif( $format = get_post_format() ){ $archive = 'post-format-'. $format; }

    ?>
    <div class="archive-title">
        <h4 class="page-title">
            <?php _e('Archives: ', 'stag'); ?>
            <span><?php echo $format; ?><?php _e(' Posts', 'stag'); ?></span>
        </h4>
        <span class="accent-color format-<?php echo $format; ?>"><i class="icon icon-<?php echo $format; ?>"></i></span>
    </div>

    <!-- BEGIN #primary.hfeed -->
    <div id="primary" class="hfeed">

        <?php while(have_posts()): the_post(); ?>

        <?php stag_post_before(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php get_template_part('content', 'background'); ?>

        <?php stag_post_start(); ?>

        <?php
            $format = get_post_format();
            get_template_part('content', $format);
        ?>

        <?php stag_post_end(); ?>

        </article>

        <?php stag_post_after(); ?>

        <?php endwhile; ?>

        <!-- END #primary.hfeed -->
        </div>

        <?php
        global $wp_query;
        if( $wp_query->max_num_pages > 1 ) { ?>

            <a href="#" id="load-more" rel="<?php echo $archive; ?>"><i class="icon icon-plus-big"></i></a>
        <?php }

        ?>

        <?php endif; ?>
    <!-- END .container-wrap -->
</div>

<?php get_footer(); ?>