<?php

/**
 * @package Insert_Script
 * @version 1.3
 */
/*
Plugin Name: Insert Script
Plugin URI: http://belchamber.us/wordpress/plugins/insert-script.zip
Description: With the [insert_script] shortcode, this calls on the absolute path of any script from the path you provide with the "path=" attribute.  Now allows "vals" and "strings" as GET URL attribute,
             "json_string" for properly encoded JSON string arrays will return $json_vals_arr to your script, and passes on "save_db" and "section" as $save_db and $section variables to whatever values you assign them to your external scripts.
Author: Aaron Belchamber
Version: 1.3
Author URI: http://www.belchamber.us
*/


/*  Copyright 2013-2015 Aaron Belchamber (email: aaron at belchamber.us)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


if (!class_exists("InsertScript")) {

    class InsertScript {

        public function __construct()
        {
            add_shortcode('insert_script', array($this, 'shortcode'));
        }

        function shortcode($atts){
            /*
             * Dynamically include file from path
             *
             * $path  String
             * example [insert_script path='/resources/main.php'] (paths start at public_html)
             *
             * $strings   Uses PHP parse_str function -- look it up
             *
             */

            ob_start();

            extract(shortcode_atts(array('path' => '','vals'=>'','strings' => '','save_db' => '','section'=>'','json_string'=>''), $atts));
            $path=html_entity_decode(trim($path));
            $strings=html_entity_decode(trim($strings));
            $vals=html_entity_decode(trim($vals));
            $save_db=html_entity_decode(trim($save_db));
            $section=html_entity_decode(trim($section));

            $json_string=html_entity_decode(trim($json_string));
            $json_vals_arr=json_decode($json_string,true);

            if ($strings!=''){
                parse_str($strings);// Assign strings before including file to parse to inject values
            }

            if ($vals!=''){
                parse_str($vals);
            }

            if ($path!=''){
                @include($_SERVER['DOCUMENT_ROOT'].$path);
            }

            $html=ob_get_clean();
            return $html;
        }

    }

}


if (class_exists("InsertScript")) {
    $abInsertScript = new InsertScript();
}