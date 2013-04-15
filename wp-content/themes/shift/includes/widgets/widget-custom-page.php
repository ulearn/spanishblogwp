<?php
add_action('widgets_init', create_function('', 'return register_widget("stag_custom_page");'));

class stag_custom_page extends WP_Widget{
  function stag_custom_page(){
    $widget_ops = array('classname' => 'section-block', 'description' => __('Display content from an specific page.', 'stag'));
    $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'stag_custom_page');
    $this->WP_Widget('stag_custom_page', __('Custom Page', 'stag'), $widget_ops, $control_ops);
  }

  function widget($args, $instance){
    extract($args);

    // VARS FROM WIDGET SETTINGS
    $page = $instance['page'];

    echo $before_widget;

    $the_page = get_page($page);

    ?>

    <!-- BEGIN .hentry -->
    <article id="<?php echo $the_page->ID; ?>" class="">

        <?php

        echo $before_title.$the_page->post_title.$after_title;

        echo '<div class="entry-content">'.apply_filters('the_content', $the_page->post_content).'</div>';

        ?>

      <!-- END .hentry -->
    </article>

    <?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;

    // STRIP TAGS TO REMOVE HTML
    $instance['page'] = strip_tags($new_instance['page']);

    return $instance;
  }

  function form($instance){
    $defaults = array(
      /* Deafult options goes here */
      'page' => 0,
    );

    $instance = wp_parse_args((array) $instance, $defaults);

    /* HERE GOES THE FORM */
    ?>

    <p>
      <label for="<?php echo $this->get_field_id('page'); ?>"><?php _e('Select Page:', 'stag'); ?></label>

      <select id="<?php echo $this->get_field_id( 'page' ); ?>" name="<?php echo $this->get_field_name( 'page' ); ?>" class="widefat">
      <?php

        $args = array(
          'sort_order' => 'ASC',
          'sort_column' => 'post_title',
          );
        $pages = get_pages($args);

        foreach($pages as $paged){ ?>
          <option value="<?php echo $paged->ID; ?>" <?php if($instance['page'] == $paged->ID) echo "selected"; ?>><?php echo $paged->post_title; ?></option>
        <?php }

       ?>
     </select>
     <span class="description"><?php _e('This page will be used to display content.', 'stag'); ?></span>
    </p>

    <?php
  }
}

?>