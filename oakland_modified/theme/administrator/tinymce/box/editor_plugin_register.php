<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.1
 * 
 * Information Box Shortcodes & Quick Tags Register
 * Created by CMSMasters
 * 
 */


if (!class_exists('CMSMastersBox')) {
	class CMSMastersBox {
		var $buttonName;
        var $buttonTitle;
        var $buttonArray;
		
		function __construct() {
			$this->buttonName = 'box';
			$this->buttonTitle = __('Information Boxes', 'cmsmasters');
			$this->buttonArray = array(
                0 => array(__('Success Box', 'cmsmasters'), 'success_box'), 
                1 => array(__('Error Box', 'cmsmasters'), 'error_box'), 
                2 => array(__('Notice Box', 'cmsmasters'), 'notice_box'), 
                3 => array(__('Warning Box', 'cmsmasters'), 'warning_box'), 
                4 => array(__('Download Box', 'cmsmasters'), 'download_box') 
            );
		}
		
		function addDropdown() {
			if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
				return;
			}
			
			if (get_user_option('rich_editing') == 'true') {
				add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
				add_filter('mce_buttons_4', array($this, 'registerButton'));
				add_filter('wp_fullscreen_buttons', array($this, 'registerFscreenButton'));
			}
		}
		
		function registerButton($buttons) {
			array_push($buttons, $this->buttonName);
			
			return $buttons;
		}
		
		function registerTmcePlugin($buttons) {
			$buttons[$this->buttonName] = CMSMASTERS_ADMIN_TINYMCE . '/' . $this->buttonName . '/editor_plugin.js.php';
			
			return $buttons;
		}
		
		function registerFscreenButton($buttons) {
			$buttons[] = 'separator';
            
            foreach ($this->buttonArray as $val) {
                $buttons[$val[1]] = array(
                    'title' => $val[0],
                    'onclick' => "tinyMCE.execCommand('" . $val[1] . "_command');",
                    'both' => true
                );
            }
			
			return $buttons;
		}
		
		function registerQtagPluginButton($hook) {
			if ( 
				($hook == 'post.php') || 
				($hook == 'post-new.php') || 
				($hook == 'page.php') || 
				($hook == 'page-new.php') 
			) {
				wp_enqueue_script('cmsms_' . $this->buttonName . '_quicktag', CMSMASTERS_ADMIN_TINYMCE . '/' . $this->buttonName . '/quicktag_plugin.js.php', array('quicktags'));
			}
		}
	}
}

if (!isset($cmsmasters_shortcode_box)) {
	$cmsmasters_shortcode_box = new CMSMastersBox();
	
	add_action('admin_head', array($cmsmasters_shortcode_box, 'addDropdown'));
    add_action('admin_enqueue_scripts', array($cmsmasters_shortcode_box, 'registerQtagPluginButton'));
}

?>