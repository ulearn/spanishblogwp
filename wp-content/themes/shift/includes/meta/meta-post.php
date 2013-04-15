<?php

add_action('add_meta_boxes', 'stag_metabox_gallery');

function stag_metabox_gallery(){

  $meta_box = array(
    'id' => 'stag-metabox-custom-background-settings',
    'title' => __('Custom Background Settings', 'stag'),
    'description' => __('Here you can set a custom background for this post.', 'stag'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('Background Pattern', 'stag'),
        'desc' => __('Choose background pattern for this post.', 'stag'),
        'id' => '_stag_custom_pattern',
        'type' => 'file',
        'std' => ''
        ),
      array(
        'name' => __('Background Pattern Repeat', 'stag'),
        'desc' => __('Choose background pattern for this post.', 'stag'),
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
        'desc' => __('Choose background color for this post.', 'stag'),
        'id' => '_stag_post_background',
        'type' => 'color',
        'std' => '#empty',
        'val' => '#empty'
        ),
      array(
        'name' => __('Text Color', 'stag'),
        'desc' => __('Choose text color for this post.', 'stag'),
        'id' => '_stag_post_color',
        'type' => 'color',
        'std' => '#ffffff',
        'val' => '#ffffff'
        ),
      array(
        'name' => __('Link Color', 'stag'),
        'desc' => __('Choose link color for this post.', 'stag'),
        'id' => '_stag_post_link',
        'type' => 'color',
        'std' => '#ffffff',
        'val' => '#ffffff'
        ),
      )
    );
  stag_add_meta_box($meta_box);

  // Gallery Metabox
  $meta_box = array(
    'id' => 'stag-metabox-gallery',
    'title' => __('Gallery Settings', 'stag'),
    'description' => __('Set up your gallery', 'stag'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('Upload Images', 'stag'),
        'desc' => __('Upload gallery images.', 'stag'),
        'id' => '_stag_gallery_images',
        'type' => 'file',
        'std' => '',
        'multiple' => "true",
        'title' => __('Choose Images', 'stag')
        ),
      )
    );
  stag_add_meta_box($meta_box);

  // Link Metabox
  $meta_box = array(
    'id' => 'stag-metabox-link',
    'title' => __('Link Settings', 'stag'),
    'description' => __('Input your link', 'stag'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('Link', 'stag'),
        'desc' => __('Input your link e.g. http://codestag.com', 'stag'),
        'id' => '_stag_link_url',
        'type' => 'text',
        'std' => ''
        ),
      )
    );
  stag_add_meta_box($meta_box);

  // Quote Metabox
  $meta_box = array(
    'id' => 'stag-metabox-quote',
    'title' => __('Quote Settings', 'stag'),
    'description' => __('Input your quote', 'stag'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('The Quote', 'stag'),
        'desc' => __('Input your quote', 'stag'),
        'id' => '_stag_quote_quote',
        'type' => 'textarea',
        'std' => ''
        ),
      )
    );
  stag_add_meta_box($meta_box);

  // Audio Metabox
  $meta_box = array(
    'id' => 'stag-metabox-audio',
    'title' => __('Audio Settings', 'stag'),
    'description' => __('This setting enables you to embed audio for this post.', 'stag'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('MP3 File URL', 'stag'),
        'desc' => __('Enter URL to .mp3 file.', 'stag'),
        'id' => '_stag_audio_mp3',
        'type' => 'text',
        'std' => ''
        ),
      array(
        'name' => __('OGA File URL', 'stag'),
        'desc' => __('Enter URL to .oga, .ogg file.', 'stag'),
        'id' => '_stag_audio_oga',
        'type' => 'text',
        'std' => ''
        ),
      array(
        'name' => __('Embed Audio URL', 'stag'),
        'desc' => __('Enter URL or shortcode to embed an Audio Player', 'stag'),
        'id' => '_stag_audio_embed',
        'type' => 'textarea',
        'std' => ''
        ),
      )
    );
  stag_add_meta_box($meta_box);

  $meta_box = array(
    'id' => 'stag-metabox-video',
    'title' => __('Video Settings', 'stag'),
    'description' => __('This setting enables you to embed video for this post.', 'stag'),
    'page' => 'post',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => __('M4V File URL', 'stag'),
        'desc' => __('Enter URL to .m4v video file.', 'stag'),
        'id' => '_stag_video_m4v',
        'type' => 'text',
        'std' => ''
        ),
      array(
        'name' => __('OGV File URL', 'stag'),
        'desc' => __('Enter URL to .ogv video file.', 'stag'),
        'id' => '_stag_video_ogv',
        'type' => 'text',
        'std' => ''
        ),
      array(
        'name' => __('Embedded Code', 'stag'),
        'desc' => __('If you are using a video other than self-hosted such as YouTube or Vimeo, paste the embed code here.<br><br>This field will override the above.', 'stag'),
        'id' => '_stag_video_embed',
        'type' => 'textarea',
        'std' => ''
        ),
      )
    );
  stag_add_meta_box($meta_box);


}


function stag_custom_post_colors_output($content){

  $output = "/* Custom Post Backgrounds */\n";

  $posts = get_posts( array(
      'numberposts' => -1,
      'post_type' => 'post')
  );

  if( empty($posts) ) return $content;

  foreach($posts as $post){
    $postid = $post->ID;

    $pattern = get_post_meta($postid, '_stag_custom_pattern', true);
    $repeat = get_post_meta($postid, '_stag_custom_pattern_repeat', true);

    $bg = get_post_meta($postid, '_stag_post_background', true);
    $text = get_post_meta($postid, '_stag_post_color', true);
    $link = get_post_meta($postid, '_stag_post_link', true);



    if(!empty($pattern)){
      $output .= "\n\n#post-$postid .custom-background{";
      $output .= "background-image: url({$pattern});";
      $output .= "background-repeat: {$repeat};";
      $output .= "}";
    }

    if( !empty($bg) && !empty($text) && !empty($link) ):
      $output .= "\n\n#post-$postid{";
      if($bg !== '#empty' && !empty($bg)) $output .= "background-color: {$bg};";
      if($text !== '#ffffff'  && !empty($text)) $output .= "color: {$text};";
      $output .= "}";
      if($link !== '#ffffff'  && !empty($link)) $output .= "#post-$postid a{color: $link;}\n";
      if($link !== '#ffffff'  && !empty($link)) $output .= "#post-$postid .entry-title a{color: $text;}\n";
    endif;

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
add_action( 'stag_custom_styles', 'stag_custom_post_colors_output', 25);