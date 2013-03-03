<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Portfolio Project with Sidebar Video Project Format Template
 * Created by CMSMasters
 * 
 */


global $portfolio_post_tags;

$project_tags = get_the_terms(get_the_ID(), 'pt-tags');

$project_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'project_video_link', true)));

$image_width = 760;
$image_height = 430;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('format-video', 'project')); ?>>
<?php 
	echo '<header class="entry-header">' . 
		'<h2 class="entry-title">' . cmsms_title(get_the_ID(), false) . '</h2>';
	
	cmsms_meta('project', 'post', get_the_ID(), 'pt-sort-categ');
	
	echo '</header>';
	
    if ($project_video_link[0] != '') {
        $try_link = explode(':', $project_video_link[0], 2);
        
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
	} elseif (has_post_thumbnail()) { 
		cmsms_thumb(get_the_ID(), $image_width, $image_height, false, 'prettyPhoto');
    } 
	
	echo '<div class="entry-content">';
	
    the_content();
	
	echo '</div>';
	
	wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>'); 
	
	if ($portfolio_post_tags && $project_tags) { 
		echo '<footer class="entry-meta">';
		
		cmsms_tags(get_the_ID(), 'project', 'post', 'sidebar', 'pt-tags');
		
		echo '</footer>';
	}
?>
</article>