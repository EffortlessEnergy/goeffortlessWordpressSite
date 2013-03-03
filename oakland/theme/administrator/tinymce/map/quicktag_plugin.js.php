<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.3
 * 
 * Google Map Quick Tag Script
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
    'cmsms_map', 
    'google map', 
    '[googlemap map_type="ROADMAP" zoom="14" address="<?php echo __('Insert you address here', 'cmsmasters') . '...'; ?>" latitude="<?php echo __('Insert you latitude here', 'cmsmasters') . '...'; ?>" longitude="<?php echo __('Insert you longitude here', 'cmsmasters') . '...'; ?>" marker="true" popup_html="<?php echo __('Insert you map popup text here', 'cmsmasters') . '...'; ?>" popup="true" scroll_wheel="true" map_type_control="true" zoom_control="true" pan_control="true" scale_control="true" street_view_control="true"]' 
);
