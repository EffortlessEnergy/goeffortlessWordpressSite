<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Portfolio Project Full Width Album Project Format Template
 * Created by CMSMasters
 * 
 */


global $portfolio_post_tags;

$selected_numbercolumns_full_album = get_post_meta(get_the_ID(), 'selected_numbercolumns_full_album', true);

$project_tags = get_the_terms(get_the_ID(), 'pt-tags');

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC' 
));

if (!$selected_numbercolumns_full_album) {
    $selected_numbercolumns_full_album = 'four_blocks';
}

if ($selected_numbercolumns_full_album == 'four_blocks' || $selected_numbercolumns_full_album == 'three_blocks') {
    $image_width = 440;
    $image_height = 250;
} elseif ($selected_numbercolumns_full_album == 'two_blocks') {
    $image_width = 575;
    $image_height = 325;
} elseif ($selected_numbercolumns_full_album == 'one_block') {
    $image_width = 1180;
    $image_height = 665;
}

$colnumb = 0;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('format-album', 'project', $selected_numbercolumns_full_album)); ?>>
<?php 
	echo '<header class="entry-header">' . 
		'<h2 class="entry-title">' . cmsms_title(get_the_ID(), false) . '</h2>';
	
	cmsms_meta('project', 'post', get_the_ID(), 'pt-sort-categ');
	
	echo '</header>';
	
	if (sizeof($attachments) > 0) { 
		echo '<div class="resize">';
		
		foreach ($attachments as $attachment) {
			if ($selected_numbercolumns_full_album == 'one_block') { 
				if ($colnumb == 1) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			} else if ($selected_numbercolumns_full_album == 'two_blocks') {
				if ($colnumb == 2) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			} else if ($selected_numbercolumns_full_album == 'three_blocks') {
				if ($colnumb == 3) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			} else if ($selected_numbercolumns_full_album == 'four_blocks') {
				if ($colnumb == 4) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			}
			
			echo '<figure>' . 
				'<a class="preloader' . (($selected_numbercolumns_full_album == 'one_block') ? ' inBlog' : '') . '" href="' . $attachment->guid . '" rel="prettyPhoto[' . get_the_ID() . ']" title="' . $attachment->post_title . '">' . 
					'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . (($selected_numbercolumns_full_album != 'one_block') ? '&amp;h=' . $image_height : '') . '&amp;zc=1" alt="' . $attachment->post_title . '" class="fullwidth" />' . 
				'</a>' . 
			'</figure>';
			
			$colnumb++;
		}
		
		echo '</div>';
	} elseif (has_post_thumbnail()) { 
		cmsms_thumb(get_the_ID(), $image_width, false, false, 'prettyPhoto', true, true);
	}
	
	echo '<div class="cl"></div>' . 
	'<br />' . 
	'<div class="entry-content">';
	
    the_content();
	
	echo '</div>';
	
	wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>'); 
	
	if ($portfolio_post_tags && $project_tags) { 
		echo '<footer class="entry-meta">';
		
		cmsms_tags(get_the_ID(), 'project', 'post', 'fullwidth', 'pt-tags');
		
		echo '</footer>';
	}
?>
</article>