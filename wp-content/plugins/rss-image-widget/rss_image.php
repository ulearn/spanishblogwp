<?php
/*
Plugin Name: RSS Images
Plugin URI: http://wp.zackdesign.biz/rss-image-widget/
Description: RSS Image display using SimplePie
Author: Isaac Rowntree
Version: 1.4.1
Author URI: http://zackdesign.biz

	Copyright (c) 2005, 2006 Isaac Rowntree (http://zackdesign.biz)
	QuickShop is released under the GNU General Public
	License (GPL) http://www.gnu.org/licenses/gpl.txt

	This is a WordPress plugin (http://wordpress.org).

*/

/**
 * RSSImages Class
 */
class RSSImages extends WP_Widget {
    /** constructor */
    function RSSImages() {
        parent::WP_Widget(false, $name = 'RSS Images');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        
	echo $before_widget; 
        
	if ( $title )
            echo $before_title . $title . $after_title; 
	
	if (!empty($instance['url']))
    	{
        if (!class_exists('SimplePie'))
		    require_once(ABSPATH.'/wp-includes/class-simplepie.php');
		
		$feed = new SimplePie();
		$feed->set_feed_url($instance['url']);
		$feed->set_cache_location( ABSPATH.'/wp-content/cache');
		$feed->init();
		
		if ($instance['images'])
		{
		    echo '<div class="simplepie">';
		    
		    $count = 0;
		    
		    foreach ($feed->get_items() as $item)
		    {
			if ($count < $instance['images'])
			{			    
			    $count++;
			    $url = '';
			    
			    if ($enclosure = $item->get_enclosure())
	        { 
		         $url = $enclosure->get_link();
				
				if (empty($instance['width']))
	    	    	    	    $instance['width'] = 150;
				if (empty($instance['height']))
				    $instance['height'] = 150;
				    
				// Remove questions marks as well
				$image = str_replace("?", '', htmlspecialchars($item->get_title()).'.jpg');
				$image_thumb = str_replace("?", '', htmlspecialchars($item->get_title()).'_'.$instance['width'].'x'.$instance['height'] .'.jpg');
				
				
				$cache_path = ABSPATH.'/wp-content/cache/rss_image_cache_'.date('n');
				
				// Garbage Collection
				for ($i = 1; $i < date('n'); $i++)
				{
				    rss_image_delTree(ABSPATH.'/wp-content/cache/rss_image_cache_'.$i);
				}
				
				// Create the image file if it doesn't exist
				if (!file_exists($cache_path.'/'.$image))
				{
				    // PHPThumb caching
				    require_once(ABSPATH.'/wp-content/plugins/rss-image-widget/phpthumb/ThumbLib.inc.php');
				    
				    $thumb = PhpThumbFactory::create($url);  
				    
				    if (!file_exists($cache_path))
				        mkdir($cache_path);
				        
				    $thumb->save($cache_path.'/'.$image);				
				    // Image width/height	
				    $thumb->resize($instance['width'], $instance['height'])->save($cache_path.'/'.$image_thumb);  
				    
				    chmod($cache_path.'/'.$image_thumb, 0755);
				}
			    }		    
			    
			    echo '
			      <div class="rss_image">
            <a title="'.$item->get_title().'" class="gallery" href="'.get_bloginfo('wpurl').'/wp-content/cache/rss_image_cache_'.date('n').'/'.$image.'"><img src="'.get_bloginfo('wpurl').'/wp-content/cache/rss_image_cache_'.date('n').'/'.$image_thumb.'" alt="'.$item->get_title().'" /></a>
            <h5><a title="'.$item->get_title().'" class="site" href="'.$item->get_permalink().'">'.$item->get_title().'</a></h5>
				    </div><br />';
			}
			else
			    break;
		    }
		    
		    echo '</div>';
		}
	}
        
	echo $after_widget; 
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        if (isset($instance['title'])) : $title = esc_attr($instance['title']); else : $title = ''; endif;
	if (isset($instance['url'])) : $url = esc_attr($instance['url']); endif;
	if (isset($instance['images'])) : $images = esc_attr($instance['images']); endif;
	if (isset($instance['width'])) : $width = esc_attr($instance['width']); endif;
	if (isset($instance['height'])) : $height = esc_attr($instance['height']); endif;
	
	if (empty($url))
	    $url = 'http://api.flickr.com/services/feeds/photos_public.gne?id=25087033@N04&lang=en-us&format=atom';
        
	if (empty($images))
	    $images = 0;
	
	if (empty($width))
	    $width = 150;
	    
	if (empty($height))
	    $height = 150;
	
      ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	    <p><label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Feed Url:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" /></label></p>
	    <p><label for="<?php echo $this->get_field_id('images'); ?>"><?php _e('# of Images:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('images'); ?>" name="<?php echo $this->get_field_name('images'); ?>" type="text" value="<?php echo $images; ?>" /></label></p>
	    <p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Max Image Width:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" /></label></p>
	    <p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Max Image Height:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" /></label></p>
      <?php 
    }

} // class RSSImages

if (!class_exists("RSSImagesMain"))  {
  class RSSImagesMain {
  
    private $cachepath;
    
    function RSSImagesMain() {
       $this->cachepath = ABSPATH.'/wp-content/cache';
       
       add_action('wp_enqueue_scripts', array(&$this, 'shadowBoxScript'));
       
    }
    function shadowBoxScript() {
        if (!is_admin()) {
	  wp_enqueue_script('jquery');
          wp_register_script('shadowbox', plugins_url('/shadowbox-3.0.3/shadowbox.js', __FILE__));            
          wp_enqueue_script('shadowbox');
          wp_register_style('shadowbox', plugins_url('/shadowbox-3.0.3/shadowbox.css', __FILE__));
          wp_enqueue_style('shadowbox');
          wp_register_script('shadowBoxInitScript', plugins_url('/js/shadowbox-init.js', __FILE__));
          wp_enqueue_script('shadowBoxInitScript');
        }
    }
         
        
    function checkCache() 
    {
      if (file_exists($this->cachepath)) 
      {
        add_action('widgets_init', create_function('', 'return register_widget("RSSImages");')); // register RSSImages widget
      }
      else
      {
        add_action('admin_notices', array(&$this, 'displayCacheError'));
      }
    }
    
    function displayCacheError()
    {        
        echo '<div class="error fade" style="background-color:red;"><p><strong>RSS Images: Error - Image cache not found, please create a cache folder under wp-content in your Wordpress folder. (e.g. <i>wp-content/cache</i>)</strong></p></div>'; 
    }
  }
}

if (class_exists('RSSImagesMain'))
{
  $rssImages = new RSSImagesMain();
  $rssImages->checkCache();
  
  
}



    function rss_image_delTree($dir) {
        $files = glob( $dir . '*', GLOB_MARK );
        foreach( $files as $file )
	{
            if( substr( $file, -1 ) == '/' )
                rss_image_delTree( $file );
            else
                unlink( $file );
        }
        if (is_dir($dir)) rmdir( $dir );
    } 

?>
