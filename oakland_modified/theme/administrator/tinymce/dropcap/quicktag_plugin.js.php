<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.3
 * 
 * Dropcap Quick Tags Script
 * Created by CMSMasters
 * 
 */


define('DOING_AJAX', true);
define('WP_ADMIN', true);

require_once('../../../../../../../wp-load.php');
require_once('../../../../../../../wp-admin/includes/admin.php');

do_action('admin_init');

if (!is_user_logged_in()) {
	die(__('You must be logged in to access this script', 'cmsmasters') . '.');
}

?>
edButtons[edButtons.length] = new edButton(
    'cmsms_dropcap', 
    'dropcap 1', 
    '[dropcap]', 
    '[/dropcap]'
);

edButtons[edButtons.length] = new edButton(
    'cmsms_dropcap2', 
    'dropcap 2', 
    '[dropcap2]', 
    '[/dropcap2]'
);
