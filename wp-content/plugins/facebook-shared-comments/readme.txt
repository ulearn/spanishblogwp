=== Facebook Shared Comments ===
Contributors: vericgar
Tags: facebook, comments, cross-post
Requires at least: 2.7.1
Tested up to: 2.8.5
Stable tag: 1.1

Enables easy cross-posting of entries to Facebook, while syncronzing comments between the two sites.

== Description ==

It seems that everyone is on facebook these days, and for many of us, to stay connected and drive users to our own site, we cross-post our entries to facebook.

However, when you cross-post, the comments on facebook don't show up on your website, and the comments on your website don't show up on facebook - you have two seperate groups of people interacting with your post but not interacting with each other.

This plugin aims to solve that problem.

This plugin used the facebook API to automaticly cross-post your entry to facebook, and then replace the comments functionality for that entry with a facebook comments box that includes the discussion both on your wall AND on your own website.

In more plain terms, you will have one set of comments, shared between facebook and your own website.

== Installation ==

1. Upload the entire plugin directory to /wp-content/plugins/fb-shared-comments/
2. Activate the plugin through the plugins directory in WordPress
3. Get a facebook api key:
	- Visit the Facebook application creation page <http://www.facebook.com/developers/createapp.php>
	- Enter a descriptive name for your blog in the Application Name field. This will be seen by users when they sign up for your site.
	- Accept the Facebook Terms of Service.
	- Upload icon and logo images. The icon appears in News Feed stories and the logo appears in the Connect dialog when the user connects with your site.
	- Click Submit.
4. Enter the API Key and Application Secret into the settings page for the plugin.
5. Modify the <html> tag in your theme to include the fbml namespace. In the default theme, you will need to modify header.html. It will look something like this when completed - you are adding the xmlns:fb part:

	`<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">`

6. Add this line to your comments.php, just under the 'You can start editing' line:

	`<?php if ( apply_filters('facebook_comments', false)) { return; } ?>`
7. You may now cross-post to facebook using the new box on the edit entry page in Wordpress.

== Changelog ==

= 1.1 =
* Removed debugging code that required firebug
* Rewrote the excerpt code to generate an excerpt that is more in line with Facebook expectations
* Added a check to see if entry is private or password-protected

= 1.0 =
* Initial version

== Known Issues ==

* Probably does not interact well with other Facebook Connect plugins
* No way to edit post at Facebook
* No way to delete post at Facebook from within wordpress
* Wordpress comments system is hidden for Facebook posts
* Comment count is not accurate
* Comments are not in the RSS feed
* Post-dated entries do not automaticly post to Facebook
* Old entries are cross-posted when editing if they've never been cross-posted
