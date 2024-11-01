=== Widgets on Pages and Posts ===
Contributors: SmartTools
Tags: widgets, widgets in page, widgets in post, sidebar, pages, post, shortcode, inline, widgetise, widgetize, theme
Requires at least: 2.8
Tested up to: 5.7
Stable tag: 1.4

The easiest way to Add Widgets or Sidebars to Posts and Pages using Visual editor, shortcodes, or template tags.

== Description ==

The easiest, and fastest way to Add Widgets to Posts and Pages. Create unlimited dynamic sidebars (widget areas) and insert them into a WordPress post or page.

Create as many widget areas (Turbo Sidebars) from the settings menu, and use them multiple times.

Each sidebar can be set up independently with a shortcode, and you can set up more than one per post/page.

Sidebars can be inserted in the post/page by using a shortcode like the following, where `x` is the name of the sidebar.

`[widgets_on_pages id=x]`


**HOW TO SETUP THE PLUGIN**

* Create a Turbo Sidebar, these are your special widget containers
* Add widgets to the Turbo Sidebar in the same way as you do for normal sidebars
* If using the visual editor use the Add Turbo Sidebar button to add the Shortcode into your post or page where you'd like it to appear.

The sidebars can also be added to any theme, using template tags. This is an ace way to add widgets/sidebars to a theme's header and footer (or any other part of a theme).

**Demo Video**

**Current Features Include**

* Highest Rating - 122 5* Reviews
* No Coding needed
* Create unlimited sidebars
* Place them in posts/pages/custom post types
* Add to themes using template tags
* Works with ALL widgets and themes (let us know if you have an issue)


== Installation ==

1. Install the plugin from within the Dashboard or upload the directory `widgets-on-pages` and all its contents to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add the widgets you want to the `Widgets on Pages` widget area in the admin screens
1. Add the shortcut `[widgets_on_pages id=x]` to the page or post in the place where you'd like your widgets to appear (where 'x' = the id of the sidebar to use (or the name if you have named it such as `[widgets_on_pages id=TagCloud]`). If using only the default sidebar then no 'id' argument is needed (i.e. `[widgets_on_pages]`).
1. To add a sidebar into a theme you can add the following type of code to the relevant PHP theme file. `<?php widgets_on_template("wop_1"); ?>`
1. If you see bullet points/images next to the widget titles when using this plugin use the 'Enable Styling' setting in the options page
1. For further info check out these ace videos put together by Jessica Barnard
[youtube ]

== Frequently Asked Questions ==

= How can I remove the bullet points which appear next to each widget? =

Simply select the 'Enable Styling' setting in the Widgets on Pages options page.

= I did the above but the bullets still show, what now =

Your theme's CSS is probably overriding your setting... you could try using your browsers *inspect element" function to see what part of the CSS is setting the list-style.

= Can I have more than one defined sidebar area =

Yes... you can have an unlimited number of sidebars defined. The number available can be administered via the settings menu.

= What widgets are supported? =

All of them. Yup, We've not come across a single non-working one yet.

= Auto Import for Headers/Footers isn't working - What now? =

This is a new feature, and is handled differently for various themes. Although tested with a variety of different ones I'm aware that this might not work straight out the box for all users. Please [post a support ticket]() and I'll look into it.

== Screenshots ==

1. Setting up the sidebars.

2. Widgets on Pages 'Turbo Sidebars' page.

3. Widgets section



