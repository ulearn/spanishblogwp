<?php
/*
Plugin Name: Spotify Play Button for WordPress
Plugin URI: http://jonk.pirateboy.net/blog/category/bloggeriet/wordpress/plugins/
Description: Show Spotify Play Button in any page or post with a simple hook. Example: [spotifyplaybutton play="spotify:user:jonk:playlist:1FcGEv4FVNoTV00GYG9gy5" view="coverart" size="500" sizetype="width" theme="white"] The plugin also has a general settings page in wp-admin to manage your default settings.
Version: 1.0
Author: Jonk
Author URI: http://jonk.pirateboy.net
*/
function spotifyplaybutton_menu() {
	add_options_page('Spotify Play Button settings', 'Spotify Play Button settings', 'manage_options', 'spotifyplaybutton_settings', 'spotifyplaybutton_options');
}

function spotifyplaybutton_options() {
	global $spotifyplaybutton_Order;
	global $spotifyplaybutton_OrderType;

	if( isset($_POST['save_spotifyplaybutton_settings'] )) {

        update_option('spotifyplaybutton_view', $_POST['spotifyplaybutton_view'] );
        update_option('spotifyplaybutton_size', $_POST['spotifyplaybutton_size'] );
        update_option('spotifyplaybutton_sizetype', $_POST['spotifyplaybutton_sizetype'] );
        update_option('spotifyplaybutton_theme', $_POST['spotifyplaybutton_theme'] );

		echo "<div id=\"message\" class=\"updated fade\"><p>Your settings are now updated</p></div>\n";
		
	}
	$spotifyplaybutton_view = stripslashes( get_option( 'spotifyplaybutton_view' ) );
	$spotifyplaybutton_size = stripslashes( get_option( 'spotifyplaybutton_size' ) );
	$spotifyplaybutton_sizetype = stripslashes( get_option( 'spotifyplaybutton_sizetype' ) );
	$spotifyplaybutton_theme = stripslashes( get_option( 'spotifyplaybutton_theme' ) );	
	?>
  <div class="wrap">
	<h2>Spotify Play Button settings</h2>
	<form method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">View</th>
				<td>
					<select style="width:200px;" name="spotifyplaybutton_view" id="spotifyplaybutton_view">
							<option <?php if ($spotifyplaybutton_view == '') { echo 'selected="selected"'; } ?> value="">List</option>
							<option <?php if ($spotifyplaybutton_view == 'coverart') { echo 'selected="selected"'; } ?> value="coverart">Coverart</option>
					</select>
					<br/><span style="font-style:italic;">The button can show a list of songs or the cover art of each song.</span>
				</td> 
			</tr>
			<tr valign="top">
				<th scope="row">Size</th>
				<td>
					<input type="text" style="width:200px;" name="spotifyplaybutton_size" id="spotifyplaybutton_size" value="<?php if (isset($spotifyplaybutton_size)) { print($spotifyplaybutton_size); } else { print('500'); } ?>"/>
					<br/><span style="font-style:italic;">Example: 500</span>
				</td> 
			</tr>
			<tr valign="top">
				<th scope="row">Size type</th>
				<td>
					<select style="width:200px;" name="spotifyplaybutton_sizetype" id="spotifyplaybutton_sizetype">
							<option <?php if ($spotifyplaybutton_sizetype == 'width') { echo 'selected="selected"'; } ?> value="width">Width</option>
							<option <?php if ($spotifyplaybutton_sizetype == 'height') { echo 'selected="selected"'; } ?> value="height">Height</option>
							<option <?php if ($spotifyplaybutton_sizetype == 'compact') { echo 'selected="selected"'; } ?> value="compact">Compact</option>
					</select>
					<br/><span style="font-style:italic;">Should the size set above be the width or the height? Or do you want to use compact (your size above and 80px height)</span>
				</td> 
			</tr>
			<tr valign="top">
				<th scope="row">Theme</th>
				<td>
					<select style="width:200px;" name="spotifyplaybutton_theme" id="spotifyplaybutton_theme">
							<option <?php if ($spotifyplaybutton_theme == 'dark') { echo 'selected="selected"'; } ?> value="">Dark</option>
							<option <?php if ($spotifyplaybutton_theme == 'white') { echo 'selected="selected"'; } ?> value="white">White</option>
					</select>
					<br/><span style="font-style:italic;">The look of the song list.</span>
				</td> 
			</tr>
		</table>

		<div class="submit">
			<input type="submit" name="save_spotifyplaybutton_settings" value="<?php _e('Save Settings') ?>" class="button-primary" />
		</div>		
	</form>
  </div>
<?php
}

add_action('admin_menu', 'spotifyplaybutton_menu');

function spotifyplaybutton_func( $atts ) {
	extract( shortcode_atts( array(
		'play' => 'spotify:album:7JggdVIipgSShK1uk7N1hP',
		'view' => get_option('spotifyplaybutton_view',''),
		'size' => get_option('spotifyplaybutton_size',500),
		'sizetype' => get_option('spotifyplaybutton_sizetype','width'),
		'theme' => get_option('spotifyplaybutton_theme','')
	), $atts ) );
	
	$size = round($size);
	if ($sizetype == "width") {
		$width = $size;
		$height = $size+80;
	} elseif ($sizetype == "height") {
		$height = $size;
		$width = $size-80;
	} elseif ($sizetype == "compact") {
		$height = 80;
		$width = $size;
	}
	if ($height < 80) {
		$height = 80;
	}
	
	return "<iframe src=\"https://embed.spotify.com/?uri={$play}&view={$view}&theme={$theme}\" style=\"width:{$width}px; height:{$height}px;\" frameborder=\"0\" allowTransparency=\"true\"></iframe>";
}
add_shortcode( 'spotifyplaybutton', 'spotifyplaybutton_func' );
?>
