<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page Full Width Video Post Format Template
 * Created by CMSMasters
 * 
 */


$post_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_video_link', true)));

$image_width = 1180;
$image_height = 665;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php 
		cmsms_heading(get_the_ID());
		
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
		
		cmsms_meta();
	?>
		<div class="cl"></div>
	</header>
    <?php cmsms_exc_cont(); ?>
	<footer>
	<?php 
		cmsms_tags(get_the_ID());
		
		cmsms_more(get_the_ID());
    ?>
	</footer>
</article>