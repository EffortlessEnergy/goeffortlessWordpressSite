<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.3
 * 
 * Contact Form Quick Tag Script
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
    'cmsms_email', 
    'contact form', 
    '[contactform formname="<?php echo __('Insert you contact form ID here', 'cmsmasters') . '...'; ?>" email="<?php echo __('Insert you email address here', 'cmsmasters') . '...'; ?>"]' 
);
