<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Post Full Width Video Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

$post_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_video_link', true)));

$image_width = 1180;
$image_height = 665;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
	<?php 
		echo '<h2 class="entry-title">' . cmsms_title(get_the_ID(), false) . '</h2>';
		
		if ($post_video_link[0] != '') {
			$try_link = explode(':', $post_video_link[0], 2);
			
			echo '<div class="post_img post_img_nomargin">';
			
			if ($try_link[0] != 'http') {
				foreach ($post_video_link as $post_video) {
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
					get_video_iframe($post_video_link[0]) . 
				'</div>';
			}
			
			echo '</div>';
		} 
		
		cmsms_meta('post', 'post');
	?>
		<div class="cl"></div>
	</header>
	<div class="entry-content">
    <?php the_content(); ?>
	</div>
	<?php 
	wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>'); 
	
	if ($blog_post_tags && get_the_tags()) { 
		echo '<footer class="entry-meta">';
		
		cmsms_tags(get_the_ID(), 'post', 'post');
		
		echo '</footer>';
	}
	?>
</article>