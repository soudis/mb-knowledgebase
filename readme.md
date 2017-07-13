# MB Knowledgebase (forked from KB Knowledgebase) 

Contributors: EnigmaWeb, helgatheviking, Base29, macbookandrew, soudis
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CEJ9HFWJ94BG4
Tags: MB Knowledgebase, knowledgebase, knowledge base, faqs, wiki
Requires at least: 2.7
Tested up to: 4.5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple and flexible knowledgebase plugin for WordPress

## Description 

Create an attractive and professional knowledgebase. It's easy to use, easy to customise, and works with any theme.

### Key Features 

* Simple and easy to use
* Fully RESPONSIVE
* Customise your catalogue presentation easily (choose theme colour, sidebar layouts, number of articles to show etc)
* Super fast search, with predictive text - handy!
* A selection of sidebar widgets (search, categories, tags, posts)
* Integrated breacrumb (on/off)
* Display comments on knowledgebase articles (on/off)
* Drag & Drop for custom ordering of articles and categories
* Works across all major browsers and devices - IE8+, Safari, Firefox, Chrome
* Editable slug (default is /knowledgebase )

### Important 

On activation, the plugin will create a page called "Knowledgebase" and on that page there will be the shortcode `[kbe_knowledgebase]`. If you want to change the slug of that page do so via the WP Knowledgebase settings.

### Advanced Customisation 

Developers, you can completely customise the way the WP Knowledgebase displays by copying the plugin templates to your theme and customising them there. You may be familiar with this method of templating as used by WooCommerce.

In the plugin's root directory you will find a folder called `template`. You can override that folder and any of the files within, by copying them into your active theme and renaming the folder to `/yourtheme/wp_knowledgebase`. WP Knowledgebase plugin will automatically load any template files you have in that folder in your theme, and use them instead of its default template files. If no such folder or files exist in your theme, it will use the ones from the plugin.

This is the safest way to customise the WP Knowledebase templates, as it means that your changes will not be overwritten when the plugin updates.

### Official Demo 

*	[Click here](http://demo.enigmaweb.com.au/knowledgebase/) for out-of-the-box demo

### User Examples 

*	[Orpheus](http://orpheus-app.com/knowledgebase) Android app knowledgebase
*	[Cub Themes](http://cubthemes.com/support/) knowledgebase
*  [Enigma Plugins](https://enigmaplugins.com/knowledgebase/) knowledgebase

### Languages 

English, German, Dutch, Blugarian, Spanish - Spain, Spanish - USA, Spanish - Puerto Rico, Brazilian Portaguese, Swedish, Polish and Indonesian.

Translators, thank you all for your contribution to this plugin. Much appreciated. If you'd like to help translate this plugin into your language please get in touch. It's very easy - you don't have to know any code and it's a great way to contribute to the WordPress community. Please [contact Maeve](http://www.enigmaplugins.com/contact/)


## Installation 

1. Upload the `wp-knowledgebase` folder to the `/wp-content/plugins/` directory or install it from the plugin directory via your Plugins dash.
1. Activate the WP Knowledgebase plugin through the 'Plugins' menu in WordPress
1. Configure the plugin by going to the `Knowledgebase` tab that appears in your admin menu.

### Important 

On activation, the plugin will create a page called "Knowledgebase" and on that page there will be the shortcode `[kbe_knowledgebase]`. If you want to change the slug of that page do so via the WP Knowledgebase settings.

### Advanced Customisation 

Developers, you can completely customise the way the WP Knowledgebase displays by copying the plugin templates to your theme and customising them there. You may be familiar with this method of templating as used by WooCommerce.

In the plugin's root directory you will find a folder called `template`. You can override that folder and any of the files within, by copying them into your active theme and renaming the folder to `/yourtheme/wp_knowledgebase`. WP Knowledgebase plugin will automatically load any template files you have in that folder in your theme, and use them instead of its default template files. If no such folder or files exist in your theme, it will use the ones from the plugin.

This is the safest way to customise the WP Knowledebase templates, as it means that your changes will not be overwritten when the plugin updates.
 
## Frequently Asked Questions 

### I'm getting a 404 error 

Please go to Settings > Permalinks and resave your permalink structure.

### Can I add the search bar to my theme template manually? 

Yes, use this php snippet `<?php kbe_search_form(); ?>`

### Can users vote on articles? Like a thumbs up/down thing? 

This feature is not built into the plugin, however you can use another plugin to achieve this easily. I recommend [WTI Like Post](https://wordpress.org/plugins/wti-like-post/)

### How can I customise the design? 

You can do some basic presentation adjustments via Knowledgebase > Settings.

Developers, you can completely customise the way the WP Knowledgebase displays by copying the plugin templates to your theme and customising them there. You may be familiar with this method of templating as used by WooCommerce.

In the plugin's root directory you will find a folder called `template`. You can override that folder and any of the files within, by copying them into your active theme and renaming the folder to `/yourtheme/wp_knowledgebase`. WP Knowledgebase plugin will automatically load any template files you have in that folder in your theme, and use them instead of its default template files. If no such folder or files exist in your theme, it will use the ones from the plugin.

This is the safest way to customise the WP Knowledebase templates, as it means that your changes will not be overwritten when the plugin updates.

### It does not look good on my theme 

Please check that the shortcode `[kbe_knowledgebase]` is added on the Knowledgebase main page.  You can tweak the design using CSS in your theme. Or for more advanced customisation see previous point.

### Can I control privacy or content restrictions for WP Knowledgebase categories and posts? 

Yes. Any content restriction solution that is compatible with Custom Post Types should work with WP Knowledgebase.

### Can I use WP Knowledgebase in my Language? 

Yes, the plugin is internationalized and ready for translation. If you would like to help with a translation please [contact me](http://www.enigmaweb.com.au/contact)
You can also use it WPML. After installing and activating both plugins, go to WPML > Translation Management > Multilangual Content Setup > scroll all the way down > tick the checkbox 'custom posts' and 'custom taxanomies' for this post type, set to 'Translate'.

### Can import/export WP Knowledgebase data? 

Yes. You can import/export data using the built in WordPress function via Tools. It may not import any images in use (although it will import the file paths) so you will need to copy across any images from your old site to the new site uploads folder via FTP. If images still appear broken or missing then you might need to run a search and replace tool to correct the image filepaths for your new site.

### Where can I get support for this plugin? 

If you've tried all the obvious stuff and it's still not working please request support via the forum.


## Screenshots 

1. An example of WP Knowledgebase in action, main KB home view
2. Another example of WP Knowledgebase front-end, article view
3. The settings screen in WP-Admin
4. Available widgets
