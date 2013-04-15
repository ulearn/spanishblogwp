<?php

/*
Plugin Name: Simple Auto Featured Image
Plugin URI: http://www.geekpress.fr/wordpress/extension/simple-auto-featured-image-generer-auto-thumbnail-articles-1126/
Description: Automatically generates the featured image (Post Thumbnail) for a post, page or custom post type if it does not have one.
Version: 1.0
Author: GeekPress
Author URI: http://www.geekpress.fr/

Copyright 2011 Jonathan Buttigieg
	
	This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/


class Simple_Auto_featured_Image {
	
	private $options = array(); // Set $options in array
	
	function Simple_Auto_featured_Image() 
	{
	
		// Add translations
		if (function_exists('load_plugin_textdomain'))
			load_plugin_textdomain( 'simple-auto-featured-image', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
		
		// Get options
		$this->options = get_option('_auto_featured_image');
		
		// If options is not empty 
		if( is_array($this->options) ) {
			add_theme_support('post-thumbnails', $this->options);	
			add_action('save_post', array(&$this, 'save_post'), 10, 2);
		}
		
		// Add menu page
		add_action('admin_menu', array(&$this, 'add_submenu'));
		
		// Settings API
		add_action('admin_init', array(&$this, 'register_setting'));
		
		//tell wp what to do when plugin is activated
		if (function_exists('register_activation_hook'))
			register_activation_hook(__FILE__, array(&$this, 'activate'));
	}
	
	
	/**
	 * method activate
	 *
	 * This function is called when plugin is activated.
	 *
	 * @since 1.0
	**/
	function activate() 
	{
		if( !is_array( $this->options ) )
			update_option('_auto_featured_image', array('post'));	
	}
	
	
	/**
	 * method register_setting
	 *
	 * Register settings via the WP Settings API
	 *
	 * @since 1.0
	**/
	function register_setting() 
	{
		register_setting('_auto_featured_image', '_auto_featured_image');		
	}
	
	
	/**
	*  method add_submenu
	*
	* @since 1.0
	*/	
	function add_submenu() 
	{
		
		// Add submenu in menu "Settings"
		add_options_page( 'Simple Auto Featured Image', 'Simple Auto Featured Image', 'manage_options', __FILE__, array(&$this, 'display_page') );
	}
	
	
	/**
	*  method save_post
	*
	* @since 1.0
	*/
	function save_post( $post_id, $post )
	{
		
	  if( !current_user_can('upload_files') 
	  	  || !in_array( $post->post_type, $this->options) ) 
	   
	  return false;
          
	  if (!has_post_thumbnail($post_id))  {
	  	
	  	$attached_image = get_children( array(
								'post_parent'		=> $post_id,
								'post_type'			=> 'attachment',
								'post_mime_type'	=> 'image',
								'numberposts'		=> 1 ));
	  	  
	  	  
	  	  if( !count($attached_image) ) return false;
	  	  
	  	  $attached_image = array_keys( $attached_image );
	      set_post_thumbnail($post_id, $attached_image[0]);	
	  	  
	   }
	}
	
	
	/**
	*  method display_page
	*
	* @since 1.O
	*/
	function display_page() 
	{ ?>
		
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Simple Auto Featured Image</h2>
			
			<form method="post" action="options.php">
				
			    <?php settings_fields('_auto_featured_image'); ?>
			    			    
				<table class="form-table">
					<tr>
						<th scope="row"><?php _e('Check post type to enable auto featured image', 'simple-auto-featured-image') ?></th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><span><?php _e('Check to enable for the post type', 'simple-auto-featured-image') ?></span></legend>
								<?php
								
								$post_types = array_merge( get_post_types( array( 'public' => true, '_builtin' => true ), 'objects' ), get_post_types( array( 'public' => true ), 'objects' ) );  
								unset($post_types['attachment']);
								
								foreach ($post_types as $post_type ) { ?>
								
								<label for="safi_<?php echo esc_attr( $post_type->name ); ?>">
									<input type="checkbox" <?php checked( in_array( $post_type->name, (array)$this->options ), true ); ?> value="<?php echo esc_attr( $post_type->name ); ?>" id="safi_<?php echo esc_attr( $post_type->name ); ?>" name="_auto_featured_image[]"> <?php echo $post_type->labels->singular_name; ?>
								</label>
								 <br/>
								<?php
								}
								?>
							</fieldset>
						</td>
					</tr>
				</table>
				
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				</p>
				
			</form>
		</div>
			
	<?php
	}	
}

// Start this plugin once all other plugins are fully loaded
global $Simple_Auto_featured_Image; $Simple_Auto_featured_Image = new Simple_Auto_featured_Image();