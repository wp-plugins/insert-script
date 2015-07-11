<?php

/**
 * @package Insert_Script
 * @version 1.1
 */
/*
Plugin Name: Insert Script
Plugin URI: http://belchamber.us/wordpress/plugins/insert-script.zip
Description: With the [insert_script] shortcode, this calls on the absolute path of any script from the path you provide with the "path=" attribute.
Author: Aaron Belchamber
Version: 1.1
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
            extract(shortcode_atts(array("path" => '',"vars"=>''), $atts));
            ob_start();
            include($_SERVER['DOCUMENT_ROOT'].$path);
            return ob_get_clean();
        }

    }

}


if (class_exists("InsertScript")) {
    $abInsertScript = new InsertScript();
}
