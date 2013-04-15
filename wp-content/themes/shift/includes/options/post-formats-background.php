<?php
add_action('admin_init', 'stag_post_formats_background');
function stag_post_formats_background(){
    $post_formats['description'] = 'Customize default background colors for each post format';

    $post_formats[] = array(
        'title' => __('Standard Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Standard Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_standard',
        'val'   => '#34495e'
    );

    $post_formats[] = array(
        'title' => __('Standard Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Standard Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_standard',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Status Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Status Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_status',
        'val'   => '#3e5f96'
    );

    $post_formats[] = array(
        'title' => __('Status Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Status Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_status',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Aside Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Aside Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_aside',
        'val'   => '#403937'
    );

    $post_formats[] = array(
        'title' => __('Aside Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Aside Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_aside',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Chat Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Chat Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_chat',
        'val'   => '#f3be3f'
    );

    $post_formats[] = array(
        'title' => __('Chat Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Chat Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_chat',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Link Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Link Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_link',
        'val'   => '#c84941'
    );

    $post_formats[] = array(
        'title' => __('Link Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Link Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_link',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Quote Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Quote Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_quote',
        'val'   => '#3e9ddc'
    );

    $post_formats[] = array(
        'title' => __('Quote Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Quote Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_quote',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Image Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Image Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_image',
        'val'   => '#2c3e50'
    );

    $post_formats[] = array(
        'title' => __('Image Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Image Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_image',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Gallery Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Gallery Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_gallery',
        'val'   => '#2b373c'
    );

    $post_formats[] = array(
        'title' => __('Gallery Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Gallery Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_gallery',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Audio Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Audio Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_audio',
        'val'   => '#1ea061'
    );

    $post_formats[] = array(
        'title' => __('Audio Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Audio Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_audio',
        'val'   => '#ffffff'
    );

    $post_formats[] = array(
        'title' => __('Video Post Format Background', 'stag'),
        'desc'  => __('Choose background color for Video Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_background_video',
        'val'   => '#2f3233'
    );

    $post_formats[] = array(
        'title' => __('Video Post Format Color', 'stag'),
        'desc'  => __('Choose text color for Video Post Format', 'stag'),
        'type'  => 'color',
        'id'    => 'post_color_video',
        'val'   => '#ffffff'
    );

    stag_add_framework_page( 'Post Formats Colors', $post_formats, 15 );
}



function stag_post_formats_background_output($content){
  $output = "/* Custom Post Formats Colors */\n";

  $output .= ".format-standard{ background-color: ".stag_get_option('post_background_standard')."; }\n";
  $output .= ".format-standard, .format-standard a{ color: ".stag_get_option('post_color_standard')."; }\n\n";

  $output .= ".format-video{ background-color: ".stag_get_option('post_background_video')."; }\n";
  $output .= ".format-video, .format-video a{ color: ".stag_get_option('post_color_video')."; }\n\n";
  $output .= ".format-video .jp-seek-bar,.format-video .jp-volume-bar{ background-color: ".stag_get_option('post_background_video')."; }\n";
  $output .= ".format-video .jp-play-bar, .format-video .jp-volume-bar-value{ background-color: ".stag_get_option('post_color_video')."; }\n\n";

  $output .= ".format-audio{ background-color: ".stag_get_option('post_background_audio')."; }\n";
  $output .= ".format-audio, .format-audio a{ color: ".stag_get_option('post_color_audio')."; }\n";
  $output .= ".format-audio .jp-seek-bar,.format-audio .jp-volume-bar{ background-color: ".stag_get_option('post_background_audio')."; }\n";
  $output .= ".format-audio .jp-play-bar, .format-audio .jp-volume-bar-value{ background-color: ".stag_get_option('post_color_audio')."; }\n\n";

  $output .= ".format-gallery{ background-color: ".stag_get_option('post_background_gallery')."; }\n";
  $output .= ".format-gallery, .format-gallery a{ color: ".stag_get_option('post_color_gallery')."; }\n\n";

  $output .= ".format-image{ background-color: ".stag_get_option('post_background_image')."; }\n";
  $output .= ".format-image, .format-image a{ color: ".stag_get_option('post_color_image')."; }\n\n";

  $output .= ".format-quote{ background-color: ".stag_get_option('post_background_quote')."; }\n";
  $output .= ".format-quote, .format-quote a{ color: ".stag_get_option('post_color_quote').";  }\n\n";

  $output .= ".format-link{ background-color: ".stag_get_option('post_background_link')."; }\n";
  $output .= ".format-link, .format-link a{ color: ".stag_get_option('post_color_link').";  }\n";
  $output .= ".format-link .entry-title:before{ border-color: #333 ".stag_get_option('post_background_link')."; }\n";
  $output .= ".format-link .entry-title:before{ border-color: rgba(0, 0, 0, .1) ".stag_get_option('post_background_link')."; }\n";

  $output .= ".format-aside{ background-color: ".stag_get_option('post_background_aside')."; }\n";
  $output .= ".format-aside, .format-aside a{ color: ".stag_get_option('post_color_aside').";  }\n\n";

  $output .= ".format-chat{ background-color: ".stag_get_option('post_background_chat')."; }\n";
  $output .= ".format-chat, .format-chat a{ color: ".stag_get_option('post_color_chat').";  }\n\n";

  $output .= ".format-status{ background-color: ".stag_get_option('post_background_status')."; }\n";
  $output .= ".format-status, .format-status a{ color: ".stag_get_option('post_color_status').";  }\n";
  $output .= ".format-status .entry-title a{ border-color: ".stag_get_option('post_color_status').";  }\n\n";

  $output .= stag_format_accent();

  $content .= $output."\n\n";
  return $content;
}
add_action( 'stag_custom_styles', 'stag_post_formats_background_output', 20);



function stag_format_accent(){
    $output = "/* Custom Single Post Format Styling */\n";

    $arr = array('aside','gallery','image','link','quote','video','audio','status','chat', 'standard');

    foreach($arr as $format){
        $output .= ".single-format-".$format." a{ color: ". stag_get_option('post_background_'.$format) ."; }\n";
        $output .= ".single-format-".$format." blockquote p{ border-color: ". stag_get_option('post_background_'.$format) ."; }\n";
        $output .= ".single-format-".$format." .hentry a{ color: ". stag_get_option('post_color_'.$format) ."; }\n";
        $output .= ".single-format-".$format." .entry-content a{ border-bottom: 1px solid ". stag_get_option('post_color_'.$format) ."; }\n";
        $output .= ".single-format-".$format." .page-navigation .left-right-nav a{ background: ". stag_get_option('post_background_'.$format) ."; }\n";
        $output .= ".single-format-".$format." #submit{ background: ". stag_get_option('post_background_'.$format) ."; color: ". stag_get_option('post_color_'.$format) ."; }\n";
        $output .= ".single-format-".$format." .accent-background{ background: ". stag_get_option('post_background_'.$format) ."; color: ". stag_get_option('post_color_'.$format) ."; }\n";
        $output .= ".single-format-".$format." .accent-color{ color: ". stag_get_option('post_background_'.$format) ."; }\n";
        $output .= ".single-format-".$format." .bypostauthor,.single-format-".$format." .sticky,.single-format-".$format." .gallery-caption{ color: ". stag_get_option('post_color_'.$format) ."; }\n";
        $output .= "body[class*='".$format."'] .accent-color{ color: ". stag_get_option('post_color_'.$format) ."; }\n";
        $output .= "\n";
    }

    return $output;
}