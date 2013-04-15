<?php /*
Plugin Name: fblike_share
Plugin URI: http://prasanna.freeoda.com/blog/plugins/facebook/
Description:Fcae book like / share 
Author:Prasanna 
Version: 1
Author URI:http://prasanna.freeoda.com/blog/*/

function fblike_shareshow(){  
	$fblike_sharescript = get_option('fblike_sharescript');
	
	
	 echo $fblike_sharescript;
	 
}



function fblike_shareadmin_option() 
{
	//include_once("extra.php");
	echo "<div class='wrap'>";
	echo "<h2>"; 
	echo wp_specialchars( "Facebook like/share " ) ; 
	echo "</h2>";
    
	$fblike_sharescript = get_option('fblike_sharescript');
	/*$imght = get_option('imght');
	$imghwt = get_option('imghwt');
	$imgcl = get_option('imgcl');*/
	
	
	if ($_POST['cd_submit']) 
	{
		$fblike_sharescript = stripslashes($_POST['fblike_sharescript']);
		/*$imght = stripslashes($_POST['imght']);
		$imghwt = stripslashes($_POST['imghwt']);
		$imgcl = stripslashes($_POST['imgcl']);*/
		
		update_option('fblike_sharescript', $fblike_sharescript );
		/*update_option('imght', $imght );
		update_option('imghwt', $imghwt );
		update_option('imgcl', $imgcl );*/
	
	}
	?>
   

   
	<form name="cd_form" method="post" action="">
     <input name="hiddenid" type="hidden" id="hiddenid" value="<?php echo $edit_id; ?>">
        <input name="process" type="hidden" id="process" value="<?php echo $process; ?>">
   
	<table width="382" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="169">Facebook like/share Code </td>
    <td width="203">
      <textarea name="fblike_sharescript" id="fblike_sharescript"><?php echo $fblike_sharescript; ?></textarea></td>
  </tr>
  <!--<tr>
    <td>Height</td>
    <td><input type="text" name="imght" id="imght"  value="<?php// echo $imght; ?>"/></td>
  </tr>
  <tr>
    <td>Width</td>
    <td><input type="text" name="imghwt" id="imghwt"  value="<?php// echo $imghwt; ?>"/></td>
  </tr>
  <tr>
    <td>Class</td>
    <td><input type="text" name="imgcl" id="imgcl"  value="<?php //echo $imgcl; ?>"/></td>
  </tr>-->
  <tr>
    <td colspan="2" align="center"><input name="cd_submit" id="cd_submit" class="button-primary" value="Submit" type="submit" /></td>
  </tr>
</table>

</form>
<?php
	echo "</div>";
}



function fblike_shareinstall () 
 {
     add_option('fblike_sharescript', "Mike_More");
	/* add_option('imght', "170px");
	 add_option('imghwt', "160px");
	 add_option('imgcl', ""); */
  
  
  }

function fblike_sharedeactivation() 
{
	delete_option('fblike_sharescript');
	/*delete_option('imght');
	delete_option('imghwt');
	delete_option('imgcl');*/

}
function fblike_sharewidget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo "Facebook like/share";
	echo $after_title;	
	fblike_shareshow();
	echo $after_widget;
}


function fblike_sharecontrol()
{
	echo '<p>Facebook like/share.<br> Goto Facebook like/share .';
	echo ' <a href="options-general.php?page=fblike-share/fblike-share.php">';
	echo 'click here</a></p>';
}


function fblike_sharewidget_init() 
{
  	register_sidebar_widget(('Facebook like/share'), 'fblike_sharewidget');   
	
	if(function_exists('register_sidebar_widget')) 	
	{
		register_sidebar_widget('Facebook like/share', 'fblike_sharewidget');
	}
	
	if(function_exists('register_widget_control')) 	
	{
		register_widget_control(array('Facebook like/share', 'widgets'), 'fblike_sharecontrol');
	} 
}

function fblike_shareadd_to_menu() 
{
 add_options_page('Facebook like/share', 'Facebook like/share', 3, __FILE__, 'fblike_shareadmin_option' );
}

add_action('admin_menu', 'fblike_shareadd_to_menu');
add_action("plugins_loaded", "fblike_sharewidget_init");
register_activation_hook(__FILE__, 'fblike_shareinstall');
register_deactivation_hook(__FILE__, 'fblike_sharedeactivation');
add_action('init', 'fblike_sharewidget_init');







?>


