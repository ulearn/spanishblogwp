<?php

add_action('add_meta_boxes', 'stag_metabox_page_colors');

function stag_metabox_page_colors(){

  $meta_box = array(
    'id' => 'stag-metabox-page-colors',
    'title' => __('Page Color Scheme Settings', 'stag'),
    'description' => __('Here you can customize color scheme of this page, upload a background pattern or image.', 'stag'),
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('Background Pattern', 'stag'),
        'desc' => __('Choose background pattern for this page.', 'stag'),
        'id' => '_stag_custom_pattern',
        'type' => 'file',
        'std' => ''
        ),
      array(
        'name' => __('Background Pattern Repeat', 'stag'),
        'desc' => __('Choose background pattern for this page.', 'stag'),
        'id' => '_stag_custom_pattern_repeat',
        'type' => 'radio',
        'std' => 'repeat',
        'options' => array(
          'repeat' => __('Repeat', 'stag'),
          'repeat-x' => __('Repeat Horizontally', 'stag'),
          'repeat-y' => __('Repeat Vertically', 'stag')
          )
        ),
      array(
        'name' => __('Background Image', 'stag'),
        'desc' => __('Choose background image for this post.', 'stag'),
        'id' => '_stag_custom_background',
        'type' => 'file',
        'std' => ''
        ),
      array(
        'name' => __('Background Image Opacity', 'stag'),
        'desc' => __('Choose background image opacity for this post e.g. 50 for 50% opacity. This will override the default opacity, which is 5%.', 'stag'),
        'id' => '_stag_custom_background_opacity',
        'type' => 'text',
        'std' => ''
        ),
      array(
        'name' => __('Background Color', 'stag'),
        'desc' => __('Choose background color for this page.', 'stag'),
        'id' => '_stag_page_background',
        'type' => 'color',
        'std' => '#ffffff',
        'val' => '#ffffff'
        ),
      array(
        'name' => __('Text Color', 'stag'),
        'desc' => __('Choose text color for this page.', 'stag'),
        'id' => '_stag_page_color',
        'type' => 'color',
        'std' => '#565656',
        'val' => '#565656'
        ),
      array(
        'name' => __('Link Color', 'stag'),
        'desc' => __('Choose link color for this page.', 'stag'),
        'id' => '_stag_page_link',
        'type' => 'color',
        'std' => '#c84941',
        'val' => '#c84941'
        ),
      )
    );
  stag_add_meta_box($meta_box);
}


function stag_custom_page_colors_output($content){

  $output = "/* Custom Page Colors */\n";

  $posts = get_posts( array(
      'numberposts' => -1,
      'post_type' => 'page')
  );

  if( empty($posts) ) return $content;

  foreach($posts as $post){
    $postid = $post->ID;
    $bg = get_post_meta($postid, '_stag_page_background', true);
    $text = get_post_meta($postid, '_stag_page_color', true);
    $link = get_post_meta($postid, '_stag_page_link', true);

    $pattern = get_post_meta($postid, '_stag_custom_pattern', true);
    $repeat = get_post_meta($postid, '_stag_custom_pattern_repeat', true);

    if(!empty($pattern)){
      $output .= "\n\n#post-$postid .custom-background{";
      $output .= "background-image: url({$pattern});";
      $output .= "background-repeat: {$repeat};";
      $output .= "}";
    }

    if($bg == '' && $text == '' && $link == '') continue;

    $output .= "\n#post-$postid{";
    if(!empty($bg)) $output .= 'background-color: '. $bg .';';
    if(!empty($text)) $output .= 'color: '. $text .';';
    $output .= "}\n";

    if(!empty($link)) $output .= "#post-$postid a{color: $link;}\n";
    if(!empty($text)) $output .= "#post-$postid .ui-tabs-anchor{color: $text!important;}\n";
    if(!empty($bg)) $output .= ".page-id-$postid .stag-toggle span.ui-icon:before{color: $bg;}\n";
    if(!empty($text)) $output .= ".page-id-$postid .stag-toggle .ui-state-active span.ui-icon:before{color: $text;}\n";
    if(!empty($bg) && !empty($text)) $output .= ".page-id-$postid .accent-background{ background: $bg; color: $text;}\n";
    if(!empty($bg) && !empty($text)) $output .= ".page-id-$postid .accent-color{ color: $text;}\n";
  }

  foreach($posts as $post){
    $postid = $post->ID;
    $pattern = get_post_meta($postid, '_stag_custom_pattern', true);

    if(!empty($pattern)){
      $size = getimagesize($pattern);
      $width = $size[0]/2;
      $height = $size[1]/2;

      $output .= "\n.retina #post-$postid .custom-background{ ";
      $output .= "background-size: {$width}px {$height}px ;";
      $output .= " }";
    }
  }

  $content .= $output."\n\n";
  return $content;
}
add_action( 'stag_custom_styles', 'stag_custom_page_colors_output', 20);

?>