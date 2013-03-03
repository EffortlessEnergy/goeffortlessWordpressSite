<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Default Page Template
 * Created by CMSMasters
 * 
 */


get_header();

$page_layout = get_post_meta(get_the_ID(), 'page_layout', true);

if (!$page_layout) {
    $page_layout = 'sidebar_bg';
}

if ($page_layout != 'nobg') {
	$image_width = 760;
	$image_height = 430;
} else {
	$image_width = 1180;
	$image_height = 665;
}

?>
<!-- _________________________ Start Content _________________________ -->
<?php 
	if ($page_layout == 'sidebar_bg') {
		echo '<section id="content">';
	} elseif ($page_layout == 'sidebar_bg sidebar_left') {
		echo '<section id="content" class="fr">';
	} else {
		echo '<section id="middle_content">';
	}
	
	if (have_posts()) : the_post();
		echo '<div class="entry">';
		
		if (has_post_thumbnail()) { 
			cmsms_thumb(get_the_ID(), $image_width, $image_height, false, 'prettyPhoto');
		}
		
		if (get_the_content() != '') {
			echo '<div class="entry-content">';
			
			the_content();
			
			echo '</div>';
			
			wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
		}
		
		echo '</div>';
	endif;
	
	comments_template();
	
	echo '</section>';
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