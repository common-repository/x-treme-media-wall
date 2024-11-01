=== Xtreme Media Wall ===
Contributors: Flashtuning 
Tags: gallery, media, wall, flv, video, zoom, fullscreen, autoplay, xml, actionscript, as3, autoscroll, effects
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML Media Wall application. No Flash Knowledge required to insert the Media Wall SWF inside the HTML page(s) of your site.

== Description ==

XML Photo Wall / XML Image Gallery / Flash Media Gallery / Video Wall

**Features**

* No Flash Knowledge required to insert the wall SWF inside the HTML page(s) of your site
* Fully customizable XML driven content
* Customizable width, height and item size
* Unlimited number of images at different sizes (JPG, PNG, BMP, GIF) and SWF support
* Includes support for video objects (FLVs, MP4, M4A, MOV, MP4V, 3GP, 3G2)
* AutoPlay / Previous / Next with timer for each image
* Numeric navigation support
* Time period adjustable from the XML file (in seconds)
* Image description and effects support
* Optionally set the XML settings file path in HTML using FlashVars
* Full Screen mode support




== Installation ==

1. Download the plugin and upload it to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Download the [Free XtremeMediaWall](http://www.flashtuning.net/flash-samples/xtremeMediaWallFree.zip "Xtreme Media Wall") and copy the content of the archive in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-media-wall")
3. Insert the swf into post or page using this tag: `[xtreme-media-wall]`
4. If you want to modify the width and height of the media wall insert this attributes into the tag: **[xtreme-media-wall width="yourvalue" height="yourvalue"]**
5. If you want to use multiple instances of Xtreme Media Wall on different pages.  Follow this steps: ( you can enter [Flashtuning.net](http://www.flashtuning.net "Flashtuning") and check the 2 examples [Xtreme Media Wall](http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-media-wall.html "Sample Xtreme Media Wall") of the online demo. )
a. There are 2 xml files in **wp-content/flashtuning/xtreme-media-wall/assets/xml** folder: wall-settings.xml, used for general settings, and media.xml, used for individual items.
b. Modify the 2 xml files according to your needs and rename them (eg.: wall-settings2.xml, media2.xml)
c. Open the media-settings2.xml, search for this tag
    <url value="assets/xml/media.xml"/> </imageUrl></strong> and change the attribute value to <em>media2.xml</em>
d. Copy the 2 modified xml files to **wp-content/flashtuning/xtreme-media-wall/assets/xml** folder
e. Use the **xml** attribute [xtreme-media-wall xml="media-settings2.xml"] when you insert the media wall on a page.
6. Optionally for custom pages use this php function: **xtremeMediaWallEcho(width,height,xmlFile)** (e.g: xtremeMediaWallEcho(960,430,'media-settings.xml') )


== Screenshots ==

1. Fully customizable XML driven content (see the online demo at [Flashtuning.net](http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-media-wall.html "Sample Xtreme Media Wall") ). No Flash Knowledge required to insert the Media Wall SWF inside the HTML page(s) of your site.

