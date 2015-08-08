=== Plugin Name ===
Contributors: aaronbelchamber
Donate link: http://belchamber.us/wordpress/plugins
Tags: insert,shortcode,insert script,php
Requires at least: 3.0.1
Tested up to: 4.3
Stable tag: /trunk/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With the [insert_script] shortcode you can call on other local code.
== Description ==

With the [insert_script] shortcode, this calls on the absolute path of any script from the path you provide with the "path=" attribute.
It can also pass along declared variables from a "vars=" attribute where you can define GET values in URL safe declarations -- whatever
the script you are calling on requires.  

Now allows "vals" and "strings" you define with GET URL attribute (var1=value1&var2=value2).
Also pass JSON Array via "json_string" for properly encoded JSON string arrays which will pass array $json_vals_arr to your script, and passes on "save_db" and "section" as $save_db and $section variables to whatever values you assign them to your external scripts.
This allows a level of back-end integration with code, processes, and data outside of Wordpress.


== Installation ==

1. Upload `insert_script` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Screenshot of this powerful yet unobtrusive plug-in will be coming shortly.


== Changelog ==

1.3 Added new variables and ability to declare scalable "json_string" which will pass $json_vals_arr JSON array to your script too.

1.1 No changes made in  past two years and still works with every version of Wordpress to date.