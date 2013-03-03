<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Portfolio Page with Sidebar Album Project Format Template
 * Created by CMSMasters
 * 
 */


global $selected_numbercolumns_sidebar;

$project_cover = get_post_meta(get_the_ID(), 'project_cover', true);

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC' 
));

if (!$selected_numbercolumns_sidebar) {
    $selected_numbercolumns_sidebar = 'three_blocks';
}

if ($selected_numbercolumns_sidebar == 'three_blocks' || $selected_numbercolumns_sidebar == 'two_blocks') {
    $image_width = 440;
    $image_height = 250;
} elseif ($selected_numbercolumns_sidebar == 'one_block') {
    $image_width = 485;
    $image_height = 275;
}

$pt_sort_categs = get_the_terms(0, 'pt-sort-categ');

if ($pt_sort_categs != '') {
	$pt_categs = '';
	
	foreach ($pt_sort_categs as $pt_sort_categ) {
		$pt_categs .= ' ' . $pt_sort_categ->slug;
	}
	
	$pt_categs = ltrim($pt_categs, ' ');
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('format-album'); ?> data-category="<?php echo $pt_categs; ?>">
<?php 
	if ($project_cover == 'true' && has_post_thumbnail()) { 
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '<div class="video_block">';
		}
		
		cmsms_thumb(get_the_ID(), $image_width, $image_height);
		
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '</div>';
		}
	} elseif (sizeof($attachments) > 0) {
		foreach ($attachments as $attachment) { 
			if (!isset($counter) && $counter = true) {
		?>
			<figure<?php if ($selected_numbercolumns_sidebar == 'one_block') { echo ' class="fullwidth"'; } ?>>
				<a class="preloader" href="<?php echo $attachment->guid; ?>" rel="prettyPhoto[<?php the_ID(); ?>]" title="<?php cmsms_title(get_the_ID()); ?>">
					<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;h=' . $image_height . '&amp;zc=1'; ?>" alt="<?php cmsms_title(get_the_ID()); ?>" class="fullwidth" />
				</a>
			</figure>
		<?php 
			}
		}
	} elseif (has_post_thumbnail()) { 
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '<div class="video_block">';
		}
		
		cmsms_thumb(get_the_ID(), $image_width, $image_height, false, 'prettyPhoto');
		
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '</div>';
		}
	}
	
	if ($project_cover != 'true' && sizeof($attachments) > 1) { 
        echo '<div style="display:none;">';
        
        foreach ($attachments as $attachment) { 
			if (!isset($counter)) {
		?>
			<a href="<?php echo $attachment->guid; ?>" rel="prettyPhoto[<?php the_ID(); ?>]" title="<?php echo $attachment->post_title; ?>">
				<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;h=' . $image_height . '&amp;zc=1'; ?>" alt="<?php echo $attachment->post_title; ?>" />
			</a>
		<?php 
			} else {
				$counter = false;
			}
        }
        
        echo '</div>';
	}
	
	if ($selected_numbercolumns_sidebar == 'one_block') { 
		echo '<div class="port_text">';
	}
	
	cmsms_heading(get_the_ID(), 'project', 'sidebar');
	
	cmsms_meta('project', 'page', get_the_ID(), 'pt-sort-categ', 'sidebar');
	
	cmsms_exc_cont('project', 'sidebar');
	
	cmsms_more(get_the_ID(), 'project', 'sidebar');
	
	if ($selected_numbercolumns_sidebar == 'one_block') { 
		echo '</div>';
	}
	?>
    <div class="cl"></div>
</article>