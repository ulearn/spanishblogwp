<?php
add_action('admin_init', 'stag_overlay_options');
function stag_overlay_options(){

  $header_overlay['description'] = __('Customize your settings for header overlay. You can insert widgets in overlay under <a href="'.admin_url('widgets.php').'">widgets</a>.', 'stag');

  $header_overlay[] = array(
    'title' => __('Enable', 'stag'),
    'desc'  => __('Here you can enable or disable the header overlay.', 'stag'),
    'type'  => 'checkbox',
    'id'    => 'overlay_state',
    'val'   => 'off'
  );

  $header_overlay[] = array(
    'title' => __('Overlay Duration', 'stag'),
    'desc'  => __('Enter the duration between overlay open and close, 100 equals to 1 second.', 'stag'),
    'type'  => 'number',
    'id'    => 'overlay_duration',
    'val'   => '600',
    'attr'  => 'step="100"'
  );

  stag_add_framework_page( 'Header Overlay', $header_overlay, 30 );
}