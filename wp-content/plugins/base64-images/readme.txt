=== Base64 Images ===
Contributors: macprawn
Tags: base64, encoder, image, images
Requires at least: 4.0.0
Tested up to: 5.5.3
Stable tag: 1.1.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically base64 encodes media images on your site.

== Description ==
    __NOTE__
    I am moving away from WordPress development, focusing more on web app development, which means maintaining this plugin no longer makes sense for me.
    It will no longer receive updates, unless someone wants to take over the code base? If you are interested, please reach out to me.
    Thank you all for your interest and support!

Base64 Images is a simple plugin to encode your media images on your site. Base64 encoding of images can have some [SEO benefits](https://varvy.com/pagespeed/base64-images.html) for your site.

The plugin is as unobtrusive as possible: activate it, and media images are encoded. Deactivate it, and they are not. No settings, no gunk left in your database. * It hooks into WordPress approved hooks and filters to do its job.

(* There is some caching used for speed benefits, but the cached data will be totally removed when you uninstall the plugin completely.)

== Installation ==
Install like any other plugin, directly from your plugins page.

Activate the plugin - and that\'s all there is to it!

== Screenshots ==
1. Plugin deactivated: image loads from the \"uploads\" folder.
2. Plugin activated: image no longer loads separately. Instead, it is embedded in the page\'s source.

== Changelog ==
= 1.1.5 =
* Tested with newer versions of WoordPress.
* Added note about end of life

= 1.1.4 =
* Plugin defers action until after page header, to allow open graph images to embed un-encoded.

= 1.1.3 =
* Fixed plugin's Settings link on the Plugins page.

= 1.1.2 =
* Fixed syntax error on older PHP versions.

= 1.1.1 =
* Fixed bug when deleting posts/attachments.

= 1.1 =
* Added setting to control the maximum image size that should be encoded.
* Fixed bug when multiple images on a page would sometimes not all get encoded.

= 1.0.2 =
* Fixed issue with WooCommerce category images.

= 1.0.1 =
* Fixed small bug when uninstalling the plugin.

= 1.0 =
* Initial release.