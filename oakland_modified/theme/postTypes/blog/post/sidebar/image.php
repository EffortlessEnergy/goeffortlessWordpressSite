<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Post with Sidebar Image Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));

$image_width = 760;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
	<?php 
		echo '<h2 class="entry-title">' . cmsms_title(get_the_ID(), false) . '</h2>';
		
		if (has_post_thumbnail()) { 
			echo '<div class="post_img">';
			
			cmsms_thumb(get_the_ID(), $image_width, false, false, 'prettyPhoto', true, true);
			
			echo '</div>';
		} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
			echo '<div class="post_img">' . 
				'<figure>';
			
			foreach ($attachments as $attachment) { 
				if (!isset($counter) && $counter = true) {
			?>
				<a class="preloader inBlog" href="<?php echo $attachment->guid; ?>" rel="prettyPhoto" title="<?php cmsms_title(get_the_ID()); ?>">
					<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;zc=1'; ?>" alt="<?php cmsms_title(get_the_ID()); ?>" class="fullwidth" />
				</a>
			<?php 
				}
			}
			
			echo '</figure>' . 
			'</div>';
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