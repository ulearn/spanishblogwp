<?php get_header(); ?>
<?php /* Get author data */
    if(get_query_var('author_name')) :
    $curauth = get_userdatabylogin(get_query_var('author_name'));
    else :
    $curauth = get_userdata(get_query_var('author'));
    endif;
?>

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
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
            <h4 class="page-title"><?php printf(__('All posts in %s', 'stag'), single_cat_title('',false)); ?></h4>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <h4 class="page-title"><?php printf(__('All posts tagged %s', 'stag'), single_tag_title('',false)); ?></h4>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <h4 class="page-title"><?php _e('Archive for', 'stag') ?> <span><?php the_time('F jS, Y'); ?></span></h4>
         <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h4 class="page-title"><?php _e('Archive for', 'stag') ?> <span><?php the_time('F, Y'); ?></span></h4>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h4 class="page-title"><?php _e('Archive for', 'stag') ?> <span><?php the_time('Y'); ?></span></h4>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <h4 class="page-title"><?php _e('All posts by', 'stag') ?> <span><?php echo $curauth->display_name; ?></span></h4>
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h4 class="page-title"><?php _e('Blog Archives', 'stag') ?></h4>
        <?php } ?>
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
    <!-- END .container-wrap -->
</div>

<?php get_footer(); ?>