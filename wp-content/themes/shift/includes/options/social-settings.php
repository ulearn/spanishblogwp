<?php
add_action('admin_init', 'stag_social_settings');
function stag_social_settings(){

  $social_settings['description'] = __('Customize your social profile URLs.<br>Quick tip: you can use shortcode <code>[social url="facebook, twitter, dribbble"]</code> to display social links anywhere between posts.', 'stag');

  $social_settings[] = array(
    'title' => __('Facebook', 'stag'),
    'desc'  => __('Enter your facebook profile/page URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_facebook',
    'val'   => 'http://facebook.com/codestag'
  );

  $social_settings[] = array(
    'title' => __('Twitter', 'stag'),
    'desc'  => __('Enter your twitter profile URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_twitter',
    'val'   => 'https://twitter.com/codestag'
  );

  $social_settings[] = array(
    'title' => __('Dribbble', 'stag'),
    'desc'  => __('Enter your dribbble URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_dribbble',
    'val'   => 'http://dribbble.com/codestag'
  );

  $social_settings[] = array(
    'title' => __('Google+', 'stag'),
    'desc'  => __('Enter your Google+ profile/page URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_google-plus',
    'val'   => ''
  );

  $social_settings[] = array(
    'title' => __('Pinterest', 'stag'),
    'desc'  => __('Enter your Pinterest profile URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_pinterest',
    'val'   => ''
  );

  $social_settings[] = array(
    'title' => __('Vimeo', 'stag'),
    'desc'  => __('Enter your Vimeo profile URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_vimeo',
    'val'   => ''
  );

  $social_settings[] = array(
    'title' => __('Forrrst', 'stag'),
    'desc'  => __('Enter your Forrrst profile URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_forrst',
    'val'   => ''
  );

  $social_settings[] = array(
    'title' => __('LinkedIn', 'stag'),
    'desc'  => __('Enter your LinkedIn profile URL', 'stag'),
    'type'  => 'text',
    'id'    => 'social_linkedin',
    'val'   => ''
  );

  stag_add_framework_page( 'Social Settings', $social_settings, 25 );
}