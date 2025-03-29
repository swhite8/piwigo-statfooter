<?php
/*
Plugin Name: Stat Footer
Version: 1.0
Description: Add additional page statistics to footer.
Plugin URI: 
Author: swhite-photos, original author of Perso Footer: ddtddt
Author URI: 
*/
// +-----------------------------------------------------------------------+
// | Stat Footer plugin for Piwigo by swhite-photos Based On:		   |
// | Perso Footer plugin for Piwigo by TEMMII                              |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('SFT_DIR' , basename(dirname(__FILE__)));
define('SFT_PATH' , PHPWG_PLUGINS_PATH . SFT_DIR . '/');

add_event_handler('loc_end_page_tail', 'sft');

function sft(){
	global $template;
	include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
	$stats = get_pwg_general_statitics();

/* Stats Items:
[nb_photos]
[nb_categories]
[nb_tags]
[nb_image_tag]
[nb_users]
[nb_admins]
[nb_groups]
[nb_rates]
[nb_views]
[disk_usage]
[nb_formats]
[formats_disk_usage]
*/

	$template->assign('nb_views',number_format_human_readable($stats['nb_views']));
	$template->set_filename('STAT_FOOTER', realpath(SFT_PATH.'statfooter.tpl'));
	$template->append('footer_elements', $template->parse('STAT_FOOTER', true));
}
?>
