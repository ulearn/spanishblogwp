=== RSS Image Widget ===
Contributors: zackdesign
http://wp.zackdesign.biz/rss-image-widget/
Tags: rss, image, feed, widget, simplepie, plugin
Requires at least: 2.8
Tested up to: 3.3.2
Stable tag: 1.4.1

This plugin provides you with a widget to display images from a feed. It requires the SimplePie plugin to be installed.

== Description ==

This Widget uses PHPThumb to automatically generate good-looking thumbnails from RSS feed images inside your template. These thumbnails and the feed are cached inside `wp-content/cache` so please ensure that the directory is writable. If your images still don't appear check to see that they're readable inside the cache.

Image Feeds will work in the plugin providing that they use enclosures. If you want you can change the template provided to suit your feed if necessary, though this should work if enclosures are used correctly.

I have set the default image width in the template to be 150 pixels wide. You can change these options in the widget area.

SimplePie plugin is no longer required for this plugin as it now ships with Wordpress 2.8 and above! 

Next version will include some extra options and possibly better HTML.

* Link to full image or enclosure URL option
* PHPThumb reflection option (and other options)
* Some cache options
* Much more
 
Please be aware that I'll only be updating this if I need to. Feel free to come on board and contribute!

== Screenshots ==

[Zack Design Plugin Showcase](http://wp.zackdesign.biz "Plugin Showcase")

== Installation ==

1. Upload the 'rss-image-widget' folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the Presentation menu in Wordpress Admin and choose 'Widgets' in the submenu.
4. Drag and drop the Rss Image widget onto your sidebar.
5. Click on the widget in the form area and it should popup the form. Put your feed address in the correct spot, and specify the amount of images you want to use.


== Changelog ==

1.4.1

- Updated the license requirements
- Tested in 3.3.2

1.4

- Now comes with Shadowbox for showing images in gallery
- Updated view of text makes layout easier for those using CSS
- Titles moved below image by default
- Clicking image shows the full size
- Clicking title sends you to the website
- Improved caching - provides an error message if there is no cache folder in admin

1.3.1

- Intelligent garbage collection (removal of old images based on month)
- Width/Height resizing now settable in widget

1.3 

- SimplePie dependency removed as it comes with Wordpress > 2.7
- Template dependency removed as a result of above. Now a truly plug and play solution!
- PHPThumb changed to latest version from http://phpthumb.gxdlabs.com/
- Now truly cachable

1.2.1

- Change image_widget.tmpl to validated XHTML 1.0 Transitional

1.2

- Uses Wordpress 2.8 widget class which means it now supports multiple instances!

1.1

- Addition to admin of changeable title

1.0

- First release

== Frequently Asked Questions ==

= Images aren't appearing =

Usually any problem is related to the cache, and write permissions to that cache. Check the permissions for `wp-content/cache`.

= I Need HELP!!! =

That's what I'm here for. I do Wordpress sites for many people in a professional capacity and
can do the same for you. Check out www.zackdesign.biz

= Where do I get SimplePie? =

Weren't you paying attention? Read the Description again!!!

