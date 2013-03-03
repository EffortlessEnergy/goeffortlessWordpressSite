<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page with Sidebar Image Post Format Template
 * Created by CMSMasters
 * 
 */

 
$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));

$image_width = 760;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php 
		cmsms_heading(get_the_ID());
		
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