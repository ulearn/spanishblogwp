<?php
/*--------------------------------------------------*/
/* Include Theme Options
/*--------------------------------------------------*/
require_once('options/general-settings.php');
require_once('options/header-overlay.php');
require_once('options/post-formats-background.php');
require_once('options/social-settings.php');
require_once('options/styling-options.php');


/*--------------------------------------------------*/
/* Include Widgets
/*--------------------------------------------------*/
require_once('widgets/widget-custom-page.php');
require_once('widgets/widget-flickr.php');
require_once('widgets/widget-twitter.php');


/*--------------------------------------------------*/
/* Include Meta Boxes
/*--------------------------------------------------*/
if(stag_get_option('general_disable_seo_settings') == 'off'){
  require_once('meta/meta-seo.php');
}

require_once('meta/meta-post.php');
require_once('meta/meta-page.php');



require_once('post-likes.php');