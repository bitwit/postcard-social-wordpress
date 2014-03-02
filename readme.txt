=== Postcard Social Networking Plugin for WordPress ===
Contributors: bitwit
Donate link: http://www.postcardsocial.net
Tags: social, networking, postcard, feed
Requires at least: 3.0
Tested up to: 3.8.1
Stable tag: 1.2.4
License: GPL v2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is designed for use with Postcard for iOS. Using shortcodes you can embed feeds and galleries of your content into posts and pages.


== Description ==

The Postcard Social Networking Plugin for WordPress is designed to be compatible with Postcard for iOS. Without the companion
app, this plugin won't serve much purpose.

The intention of the Postcard app and plugin is to help users achieve a few key things:

* Help users that want to post and display social content on their own website without any display restrictions
* Help users create fresh content for their website when there isn't time for long-form blogging
* Help users that want to own their content by creating sharable permalinks that are attached to messages to networks like Facebook and Twitter
* Help users drive traffic to their own websites

== Installation ==

1. Upload the `postcard-plugin`folder  to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Make sure that you are using a custom permalink structure (or your .htaccess is properly set up to re-route url calls)
4. Click the 'Postcard' button and confirm that your 'Server API Status' is 'Online'
5. You are now ready to setup the network up in Postcard on your mobile phone.
6. In the iOS app - Use the 'API Endpoint' as the website url and enter your username and password to get setup
7. Now you are ready to post content directly to your own website.

Once you are posting content to your website, you can use insert short tags in the post/pages editor to retrieve your content like so:

**[postcard-archive]**
This shortcode will create a feed of content that is queryable using url (a.k.a. GET) parameters such as ?tags=interesting
When you first install Postcard a page is created with this shortcode and used as your permalink url for all future shared content, should you choose to host picture/video content when sharing to other networks

**[postcard-feed]**
This shortcode will create feed od content that is filterable via attributes such as:

    [postcard-feed tags="interesting,useful"]

**[postcard-gallery]**
This shortcode will create an image gallery and only display image and video content and is filterable via attributes such as:

    [postcard-gallery count=20]

**#profile**
If you tag a photo upload with #profile or privataely tag it with 'profile' this will become your effective new 'profile picture'
that is used in the gallery overlay

== Changelog ==

= 1.2.4 =
* Basic text field editing for postcards: date, message, link url, image url, video url

= 1.2.3 =
* Content upload issue with domains that include a path (e.g. http://domain.com/blog/)

= 1.2.2 =
* jQuery conflict issue resolved

= 1.2 =
* Fixes a problem with the gallery javascript not being included

= 1.0 =
* This is a beta version and should not be used any longer

== Upgrade Notice ==

= 1.2.2 =
You should update to this version for full interactive gallery capabilities.

= 1.2 =
You should update to this version for full interactive gallery capabilities.
