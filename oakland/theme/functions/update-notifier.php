<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Update Notifier
 * Changed by CMSMasters
 * 
 */


global $themename, $shortname;

define('NOTIFIER_THEME_NAME', $themename); 
define('NOTIFIER_THEME_FOLDER_NAME', get_template()); 
define('NOTIFIER_XML_FILE', 'http://' . $shortname . '.cmsmasters.net/version.xml'); 
define('NOTIFIER_CACHE_INTERVAL', 21600); 


function update_notifier_menu() {
	if (function_exists('simplexml_load_string')) {
		$xml = get_latest_theme_version(NOTIFIER_CACHE_INTERVAL); 
		$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); 
		
		if (version_compare($xml->latest, $theme_data['Version'], '>')) { 
			add_dashboard_page(NOTIFIER_THEME_NAME . ' ' . __('Theme Updates', 'cmsmasters'), NOTIFIER_THEME_NAME . ' <span class="update-plugins count-1"><span class="update-count">' . $xml->latest . '</span></span>', 'administrator', 'theme-update-notifier', 'update_notifier');
		}
	}
}

add_action('admin_menu', 'update_notifier_menu');


function update_notifier_bar_menu() {
	if (function_exists('simplexml_load_string')) {
		global $wpdb, $wp_admin_bar;
		
		if (!is_super_admin() || !is_admin_bar_showing()) { 
			return; 
		}
		
		$xml = get_latest_theme_version(NOTIFIER_CACHE_INTERVAL); 
		$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); 
		
		if (version_compare($xml->latest, $theme_data['Version'], '>')) {
			$wp_admin_bar->add_menu(array('id' => 'update_notifier', 'title' => '<span>' . NOTIFIER_THEME_NAME . ' <span id="ab-updates">' . $xml->latest . '</span></span>', 'href' => get_admin_url() . 'index.php?page=theme-update-notifier'));
		}
	}
}

add_action('admin_bar_menu', 'update_notifier_bar_menu', 1000);


function update_notifier() {
	$xml = get_latest_theme_version(NOTIFIER_CACHE_INTERVAL);
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
?>
<style type="text/css">
	.update-nag {display:none;}
	
	h3.title {
		border-top:1px solid #dddddd;
		padding:30px 0 0; 
		margin:30px 0 0; 
	}
</style>
<div class="wrap">
	<div id="icon-tools" class="icon32"></div>
	<h2><?php echo NOTIFIER_THEME_NAME . ' ' . __('Theme Updates', 'cmsmasters'); ?></h2>
	<div id="message" class="updated below-h2" style="margin-top:20px;">
		<p><strong><?php echo __('There is a new version of the', 'cmsmasters') . ' ' . NOTIFIER_THEME_NAME . ' ' . __('theme available', 'cmsmasters'); ?>.</strong> <?php echo __('You have version', 'cmsmasters') . ' ' . $theme_data['Version'] . ' ' . __('installed', 'cmsmasters') . '. ' . __('Update to version', 'cmsmasters') . ' ' . $xml->latest; ?>.</p>
	</div>
	<img style="float:left; margin:10px 30px 0 0; border:1px solid #dddddd;" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
	<div id="instructions" style="position:relative; overflow:hidden;">
		<h3><?php echo __('Instructions For Downloading And Installing', 'cmsmasters') . NOTIFIER_THEME_NAME . ' ' . $xml->latest; ?></h3>
		<p><?php echo '<strong>' . __('Please note', 'cmsmasters') . ':</strong> ' . __('make a', 'cmsmasters')  . ' <strong>' . __('backup', 'cmsmasters') . '</strong> ' . __('of the Theme inside your WordPress installation folder', 'cmsmasters') . ' <strong>/wp-content/themes/' . NOTIFIER_THEME_FOLDER_NAME . '/</strong>'; ?></p>
		<p><?php echo __('To update the Theme, login to', 'cmsmasters') . ' <a target="_blank" href="http://www.themeforest.net/">' . __('ThemeForest', 'cmsmasters') . '</a>, ' . __('head over to your', 'cmsmasters') . ' <strong>' . __('downloads', 'cmsmasters') . '</strong> ' . __('section and re-download the theme like you did when you bought it', 'cmsmasters') . '.'; ?></p>
		<p><?php echo __("Extract the zip's contents, look for the extracted theme folder, and after you have all the new files upload them using FTP to the", 'cmsmasters') . ' <strong>/wp-content/themes/' . NOTIFIER_THEME_FOLDER_NAME . '/</strong> ' . __("folder overwriting the old ones (this is why it's important to backup any changes you've made to the theme files)", 'cmsmasters') . '.'; ?></p>
		<p><?php _e("If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed.", 'cmsmasters'); ?></p>
	</div>
	<div style="clear:both;"></div>
	<h3 class="title"><?php _e('Changelog', 'cmsmasters'); ?></h3>
	<?php echo $xml->changelog; ?>
</div>
<?php 
}

function get_latest_theme_version($interval) {
	$notifier_file_url = NOTIFIER_XML_FILE;
	$db_cache_field = 'notifier-cache';
	$db_cache_field_last_updated = 'notifier-cache-last-updated';
	$last = get_option($db_cache_field_last_updated);
	$now = time();
	
	if (!$last || (($now - $last) > $interval)) {
		if (function_exists('curl_init')) {
			$ch = curl_init();
			
            curl_setopt($ch, CURLOPT_URL, NOTIFIER_XML_FILE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 2);
			
            if (!$cache = curl_exec($ch)) {
				$error = (curl_error($ch));
			}
			
			curl_close($ch);
		} else {
			$cache = @file_get_contents($notifier_file_url);
		}
		
		if ($cache) {
			update_option($db_cache_field, $cache);
			update_option($db_cache_field_last_updated, time());
		}
		
		$notifier_data = get_option($db_cache_field);
	} else {
		$notifier_data = get_option($db_cache_field);
	}
	
	if (strpos((string)$notifier_data, '<notifier>') === false) {
		$notifier_data = '<?xml version="1.0" encoding="utf-8"?><notifier><latest>1.0</latest><changelog><![CDATA[<h4>' . __('Version', 'cmsmasters') . ' 1.0</h4><ul><li>' . __('Released!', 'cmsmasters') . '</li></ul>]]></changelog></notifier>';
	}
	
	$xml = simplexml_load_string($notifier_data);
	
	return $xml;
}

function update_notifier_cmsms() {
	$xml = get_latest_theme_version(NOTIFIER_CACHE_INTERVAL);
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
?>
<tr>
	<td>
		<?php if (version_compare($xml->latest, $theme_data['Version'], '>')) { ?>
		<div class="wrapper" style="position:relative; overflow:hidden;">
			<h3 style="margin:0 0 -45px;">&nbsp;</h3>
			<div id="update-message" class="updated below-h2">
				<p><strong><?php echo __('There is a new version of the', 'cmsmasters') . ' ' . NOTIFIER_THEME_NAME . ' ' . __('theme available', 'cmsmasters'); ?>.</strong> <?php echo __('You have version', 'cmsmasters') . ' ' . $theme_data['Version'] . ' ' . __('installed', 'cmsmasters') . '. ' . __('Update to version', 'cmsmasters') . ' ' . $xml->latest; ?>.</p>
			</div>
			<h3><?php echo __('Instructions For Downloading And Installing', 'cmsmasters') . NOTIFIER_THEME_NAME . ' ' . $xml->latest; ?></h3>
			<img style="float:left; margin:20px 30px 10px 0; border: 1px solid #e0e0e0;" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
			<div id="instructions" style="margin-top:20px; position:relative; overflow:hidden;">
				<p><?php echo '<strong>' . __('Please note', 'cmsmasters') . ':</strong> ' . __('make a', 'cmsmasters')  . ' <strong>' . __('backup', 'cmsmasters') . '</strong> ' . __('of the Theme inside your WordPress installation folder', 'cmsmasters') . ' <strong>/wp-content/themes/' . NOTIFIER_THEME_FOLDER_NAME . '/</strong>'; ?></p>
				<p><?php echo __('To update the Theme, login to', 'cmsmasters') . ' <a target="_blank" href="http://www.themeforest.net/">' . __('ThemeForest', 'cmsmasters') . '</a>, ' . __('head over to your', 'cmsmasters') . ' <strong>' . __('downloads', 'cmsmasters') . '</strong> ' . __('section and re-download the theme like you did when you bought it', 'cmsmasters') . '.'; ?></p>
				<p><?php echo __("Extract the zip's contents, look for the extracted theme folder, and after you have all the new files upload them using FTP to the", 'cmsmasters') . ' <strong>/wp-content/themes/' . NOTIFIER_THEME_FOLDER_NAME . '/</strong> ' . __("folder overwriting the old ones (this is why it's important to backup any changes you've made to the theme files)", 'cmsmasters') . '.'; ?></p>
				<p><?php _e("If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed.", 'cmsmasters'); ?></p>
			</div>
		</div>
		<?php } ?>
		<div class="wrapper">
			<h3 class="title"><?php _e('Changelog', 'cmsmasters'); ?></h3>
			<?php echo $xml->changelog; ?>
		</div>
	</td>
</tr>
<?php } ?>