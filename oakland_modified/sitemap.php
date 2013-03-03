<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Template Name: Sitemap
 * Created by CMSMasters
 * 
 */


get_header();

global $sitemap_pages_show, 
	$sitemap_categories_show, 
	$sitemap_archives_show;

$page_layout = get_post_meta(get_the_ID(), 'page_layout', true);

if (!$page_layout) { 
    $page_layout = 'nobg'; 
}

if ($page_layout != 'nobg') {
	$image_width = 760;
	$image_height = 430;
} else {
	$image_width = 1180;
	$image_height = 665;
}

?>
<!--_________________________ Start Content _________________________ -->
<?php 
	if ($page_layout == 'sidebar_bg') {
		echo '<section id="content">';
	} elseif ($page_layout == 'sidebar_bg sidebar_left') {
		echo '<section id="content" class="fr">';
	} else {
		echo '<section id="middle_content">';
	}
	
	echo '<div class="entry">';
	
	if (have_posts()) : the_post();
		if (has_post_thumbnail()) { 
			cmsms_thumb(get_the_ID(), $image_width, $image_height, false, 'prettyPhoto');
		}
		
		if (get_the_content() != '') {
			echo '<div class="entry-content">';
			
			the_content();
			
			echo '</div>';
			
			wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
			
			echo '<br />' . 
			'<div class="divider"></div>' . 
			'<br />';
		}
	endif;
	
	if ($sitemap_pages_show) { 
	?>
		<div class="one_third">
			<h2><?php _e('Pages', 'cmsmasters'); ?></h2>
			<?php 
				wp_nav_menu(array(
					'theme_location' => 'primary', 
					'container' => '', 
					'sort_column' => 'menu_order', 
					'menu_class' => 'sitemap navigation_menu' 
				)); 
			?>
		</div>
	<?php 
	} 
	
	if ($sitemap_categories_show) { 
	?>
		<div class="one_third">
			<h2><?php _e('Categories', 'cmsmasters'); ?></h2>
			<ul class="sitemap">
			<?php 
				wp_list_categories(array(
					'title_li' => '', 
					'orderby' => 'name', 
					'order' => 'ASC' 
				)); 
			?>
			</ul>
		</div>
	<?php 
	} 
	
	if ($sitemap_archives_show) { 
	?>
		<div class="one_third">
			<h2><?php _e('Archives', 'cmsmasters'); ?></h2>
			<ul class="sitemap">
			<?php 
				wp_get_archives(array('show_post_count' => true, 
					'format' => 'custom', 
					'before' => '<li>', 
					'after' => '</li>' 
				)); 
			?>
			</ul>
		</div>
	<?php 
	} 
	
	echo '</div>' . 
	'</section>';
?>
<!-- _________________________ Finish Content _________________________ -->


<!-- _________________________ Start Sidebar _________________________ -->
<?php 
    if ($page_layout == 'sidebar_bg') { 
        echo '<section id="sidebar">';
		
        get_sidebar();
		
        echo '</section>';
    } elseif ($page_layout == 'sidebar_bg sidebar_left') { 
        echo '<section id="sidebar" class="fl">';
		
        get_sidebar();
		
        echo '</section>';
    }
?>
<!-- _________________________ Finish Sidebar _________________________ -->


<?php get_footer(); ?>