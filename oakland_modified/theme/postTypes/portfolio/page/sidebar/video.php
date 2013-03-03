<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Portfolio Page with Sidebar Video Project Format Template
 * Created by CMSMasters
 * 
 */


global $selected_numbercolumns_sidebar;

$project_cover = get_post_meta(get_the_ID(), 'project_cover', true);

$project_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'project_video_link', true)));

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
<article id="post-<?php the_ID(); ?>" <?php post_class('format-video'); ?> data-category="<?php echo $pt_categs; ?>">
<?php 
	if ($project_cover == 'true' && has_post_thumbnail()) { 
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '<div class="video_block">';
		}
		
		cmsms_thumb(get_the_ID(), $image_width, $image_height);
		
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '</div>';
		}
    } elseif ($project_video_link[0] != '') { 
        $try_link = explode(':', $project_video_link[0], 2);
		
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '<div class="video_block">';
		}
		
        if ($try_link[0] != 'http') {
			foreach ($project_video_link as $post_video) {
				$link = explode(':', $post_video, 2);
				
				if ($link[0] != 'http') {
					$video_link[$link[0]] = $link[1];
				}
			}
			
			if (has_post_thumbnail()) {
				$video_link['poster'] = get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path(get_the_ID()) . '&w=' . $image_width . '&h=' . $image_height . '&zc=1';
			}
			
			echo cmsmastersSingleVideoPlayer($video_link);
		} else {
			echo '<div class="resizable_block">' . 
				get_video_iframe($project_video_link[0]) . 
			'</div>';
		}
		
		if ($selected_numbercolumns_sidebar == 'one_block') { 
			echo '</div>';
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