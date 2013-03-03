<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Post Full Width Standard Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

$image_width = 1180;
$image_height = 665;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
	<?php 
		echo '<h2 class="entry-title">' . cmsms_title(get_the_ID(), false) . '</h2>';
		
		if (has_post_thumbnail()) { 
			echo '<div class="post_img">';
			
			cmsms_thumb(get_the_ID(), $image_width, $image_height, false, 'prettyPhoto', true, true);
			
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